<?php
    /**
     *    Copyright (c) Arturas Molcanovas <a.molcanovas@gmail.com> 2016.
     *    https://github.com/Alorel/dropbox-v2-php
     *
     *    Licensed under the Apache License, Version 2.0 (the "License");
     *    you may not use this file except in compliance with the License.
     *    You may obtain a copy of the License at
     *
     *        http://www.apache.org/licenses/LICENSE-2.0
     *
     *    Unless required by applicable law or agreed to in writing, software
     *    distributed under the License is distributed on an "AS IS" BASIS,
     *    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *    See the License for the specific language governing permissions and
     *    limitations under the License.
     */

    namespace Alorel\Dropbox\Test;

    use AloFramework\Common\Alo;
    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Options\Mixins\AutoRenameTrait;
    use Alorel\Dropbox\Options\Mixins\ClientModifiedTrait;
    use Alorel\Dropbox\Options\Mixins\CloseTrait;
    use Alorel\Dropbox\Options\Mixins\IncludeDeletedTrait;
    use Alorel\Dropbox\Options\Mixins\IncludeHasExplicitSharedMembersTrait;
    use Alorel\Dropbox\Options\Mixins\IncludeMediaInfoTrait;
    use Alorel\Dropbox\Options\Mixins\LimitTrait;
    use Alorel\Dropbox\Options\Mixins\MaxResultsTrait;
    use Alorel\Dropbox\Options\Mixins\MuteTrait;
    use Alorel\Dropbox\Options\Mixins\RecursiveTrait;
    use Alorel\Dropbox\Options\Mixins\SearchModeTrait;
    use Alorel\Dropbox\Options\Mixins\StartTrait;
    use Alorel\Dropbox\Options\Mixins\ThumbnailFormatTrait;
    use Alorel\Dropbox\Options\Mixins\ThumbnailSizeTrait;
    use Alorel\Dropbox\Options\Mixins\TimeoutTrait;
    use Alorel\Dropbox\Options\Mixins\WriteModeTrait;
    use Alorel\Dropbox\Options\Options;
    use GuzzleHttp\Exception\ClientException;
    use Ramsey\Uuid\Uuid;

    if (!getenv('APIKEY')) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'API_KEY';

        if (file_exists($file)) {
            if (is_readable($file)) {
                putenv('APIKEY=' . file_get_contents($file));
            } else {
                trigger_error('The API_KEY file is not readable - do you have the right permissions?', E_USER_ERROR);
            }
        } else {
            trigger_error('Please refer to tests/README.md for instructions on how to run unit tests', E_USER_ERROR);
        }
    }

    require_once 'vendor/autoload.php';

    AbstractOperation::setDefaultAsync(false);
    AbstractOperation::setDefaultToken(getenv('APIKEY'));

    if (!defined('PHP_INT_MIN')) {
        define('PHP_INT_MIN', ~PHP_INT_MAX);
    }

    class TestUtil {

        private static $generatedNames = [];

        const INC_DIR = __DIR__ . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR;

        public static $key;

        const DIR_ITERATOR_OPTS = \FilesystemIterator::CURRENT_AS_FILEINFO | \FilesystemIterator::SKIP_DOTS;

        public static $PREVIEW_CONTENT_TYPES = [
            'application/octet-stream',
            'application/pdf',
            'image/jpeg',
            'image/jpg',
            'image/png'
        ];

        static function formatParameterArgs(array $args = []) {
            foreach ($args as $k => $v) {
                if ($v === null) {
                    unset($args[$k]);
                }
            }

            return $args;
        }

        static function decodeClientException(ClientException $e) {
            echo PHP_EOL;
            $h = $e->getRequest()->getHeaders();
            if (Alo::get($h['Content-Type']) != 'application/octet-stream') {
                $body = json_decode($e->getRequest()->getBody()->getContents(), true);
            } else {
                $body = null;
            }
            foreach ($h as $k => $v) {
                if (is_array($v)) {
                    $v = $v[0];
                }
                if (stripos($v, getenv('APIKEY')) !== false) {
                    unset($h[$k]);
                }
            }
            d([
                  'RequestBody'     => $body,
                  'RequestHeaders'  => $h,
                  'ResponseBody'    => json_decode($e->getResponse()->getBody()->getContents(), true),
                  'ResponseCode'    => $e->getCode(),
                  'ResponseMessage' => $e->getMessage()
              ]);

            self::err($e->getTraceAsString());
        }

        static function out(...$messages) {
            fwrite(STDOUT, PHP_EOL . implode(PHP_EOL, $messages) . PHP_EOL);
        }

        static function err(...$messages) {
            fwrite(STDERR, PHP_EOL . implode(PHP_EOL, $messages) . PHP_EOL);
        }

        static function allClassesInDirectory($dirname, $asProviderArgs = true) {
            $allFiles = new \RecursiveDirectoryIterator($dirname, self::DIR_ITERATOR_OPTS);
            /** @var \SplFileInfo $f */
            foreach ($allFiles as $f) {
                if ($f->isDir()) {
                    foreach (self::allClassesInDirectory($f->getRealPath(), $asProviderArgs) as $k => $v) {
                        yield $k => $v;
                    }
                } else {
                    if ($f->getExtension() == 'php') {
                        $tokens = token_get_all(file_get_contents($f->getRealPath()));
                        $namespace = '';
                        for ($index = 0; isset($tokens[$index]); $index++) {
                            if (!isset($tokens[$index][0])) {
                                continue;
                            }
                            $i0 = $tokens[$index][0];
                            if (T_NAMESPACE === $i0) {
                                $index += 2; // Skip namespace keyword and whitespace
                                while (isset($tokens[$index]) && is_array($tokens[$index])) {
                                    $namespace .= $tokens[$index++][1];
                                }
                            }
                            if (T_CLASS === $i0 || T_TRAIT === $i0 || T_INTERFACE === $i0) {
                                $index += 2; // Skip class keyword and whitespace
                                if (isset($tokens[$index][1])) {
                                    $yield = $namespace . '\\' . $tokens[$index][1];
                                    if (stripos($yield, '=>') === false) {
                                        yield $yield => $asProviderArgs ? [$yield] : $yield;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        /**
         * @param string $class
         * @param bool   $asProviderArgs Each will be wrapped in an array if set to true
         *
         * @return \Generator
         */
        static function allClassesInClassDirectory($class, $asProviderArgs = true) {
            $dirname = dirname((new \ReflectionClass($class))->getFileName());

            return self::allClassesInDirectory($dirname, $asProviderArgs);
        }

        static function setPropertyValue($object, $prop, $value) {
            $class = self::parseObjectArg($object);
            $prop = $class->getProperty($prop);
            $prop->setAccessible(true);

            $prop->setValue($object, $value);
        }

        private static function parseObjectArg(&$object) {
            if (is_string($object)) {
                $class = new \ReflectionClass($object);
                $object = null;
            } else {
                $class = new \ReflectionClass(get_class($object));
            }

            return $class;
        }

        static function getPropertyValue($object, $prop) {
            $class = self::parseObjectArg($object);

            $prop = $class->getProperty($prop);
            $prop->setAccessible(true);

            return $prop->getValue($object);
        }

        static function invokeMethod($object, $method, ...$args) {
            $class = self::parseObjectArg($object);

            $meth = $class->getMethod($method);
            $meth->setAccessible(true);

            return $meth->invokeArgs($object, $args);
        }

        static function genFileName($prefix = '', array &$storeTo = null, $ext = 'txt') {
            do {
                $name = '/' . $prefix . md5(uniqid(__METHOD__, true) . mt_rand(PHP_INT_MIN, PHP_INT_MAX)) . ".$ext";
            } while (array_search($name, self::$generatedNames) !== false);

            self::$generatedNames[] = $name;

            if ($storeTo !== null) {
                $storeTo[] = $name;
            }

            return $name;
        }
    }

    trait NameGenerator {

        private static $generatedNames = [];

        private static $classUUIDs = [];

        private static function genFileName($ext = 'txt') {
            return TestUtil::genFileName(self::generatorPrefix() . '/', self::$generatedNames, $ext);
        }

        private static function generatorPrefix() {
            if (!array_key_exists(__CLASS__, self::$classUUIDs)) {
                self::$classUUIDs[__CLASS__] = Uuid::uuid4();
            }

            return self::$classUUIDs[__CLASS__];
        }

        static function tearDownAfterClass() {
            if (!empty(self::$generatedNames)) {
                try {
                    $path = '/' . self::generatorPrefix();
                    fwrite(STDOUT, PHP_EOL . 'Cleaning up: ' . $path . PHP_EOL);
                    (new Delete(false))->raw($path);
                } catch (\Exception $e) {

                }
            }
        }
    }

    class AllTheTraits extends Options {
        use AutoRenameTrait;
        use ClientModifiedTrait;
        use CloseTrait;
        use MuteTrait;
        use WriteModeTrait;
        use IncludeDeletedTrait;
        use IncludeMediaInfoTrait;
        use IncludeHasExplicitSharedMembersTrait;
        use ThumbnailFormatTrait;
        use ThumbnailSizeTrait;
        use RecursiveTrait;
        use TimeoutTrait;
        use LimitTrait;
        use MaxResultsTrait;
        use SearchModeTrait;
        use StartTrait;
    }

    if (class_exists('\PHPUnit_Framework_TestCase')) {
        /**
         * TestWrapper
         *
         * @author Art <a.molcanovas@gmail.com>
         */
        class DBTestCase extends \PHPUnit_Retriable_TestCase {

            private $getClass;

            function __construct($name = null, array $data = [], $dataName = '') {
                parent::__construct($name, $data, $dataName);
                $this->getClass = get_class($this);
            }

            /** @before */
            public final function _beforeAnnounceTest() {
                fwrite(STDOUT, 'Running ' . $this->getClass . '::' . $this->getName(true) . PHP_EOL);
            }
        }
    } else {
        /**
         * TestWrapper
         *
         * @author Art <a.molcanovas@gmail.com>
         */
        class DBTestCase extends \PHPUnit_Framework_TestCase {

            private $getClass;

            function __construct($name = null, array $data = [], $dataName = '') {
                parent::__construct($name, $data, $dataName);
                $this->getClass = get_class($this);
            }

            /** @before */
            public final function _beforeAnnounceTest() {
                fwrite(STDOUT, 'Running ' . $this->getClass . '::' . $this->getName(true) . PHP_EOL);
            }
        }
    }