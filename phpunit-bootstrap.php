<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Test;

    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Operation\Files\Delete;

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

    class TestUtil {

        private static $generatedNames = [];

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

        static function out(...$messages) {
            foreach ($messages as $msg) {
                fwrite(STDOUT, PHP_EOL . $msg . PHP_EOL);
            }
        }

        static function err(...$messages) {
            foreach ($messages as $msg) {
                fwrite(STDERR, PHP_EOL . $msg . PHP_EOL);
            }
        }

        static function allClassesInDirectory(string $dirname, bool $asProviderArgs = true) {
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
        static function allClassesInClassDirectory(string $class, bool $asProviderArgs = true) {
            $dirname = dirname((new \ReflectionClass($class))->getFileName());

            return self::allClassesInDirectory($dirname, $asProviderArgs);
        }

        static function setPropertyValue($object, string $prop, $value) {
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

        static function getPropertyValue($object, string $prop) {
            $class = self::parseObjectArg($object);

            $prop = $class->getProperty($prop);
            $prop->setAccessible(true);

            return $prop->getValue($object);
        }

        static function invokeMethod($object, string $method, ...$args) {
            $class = self::parseObjectArg($object);

            $meth = $class->getMethod($method);
            $meth->setAccessible(true);

            return $meth->invokeArgs($object, $args);
        }

        static function genFileName(string $prefix = '', array &$storeTo = null, string $ext = 'txt') {
            do {
                $name = '/' . $prefix . md5(uniqid(__METHOD__, true) . mt_rand(PHP_INT_MIN, PHP_INT_MAX)) . ".$ext";
            } while (array_search($name, self::$generatedNames) !== false);

            self::$generatedNames[] = $name;

            if ($storeTo !== null) {
                $storeTo[] = $name;
            }

            return $name;
        }

        static function releaseName(...$names) {
            foreach ($names as $name) {
                unset(self::$generatedNames[$name]);
            }
        }
    }

    trait NameGenerator {

        private static $generatedNames = [];

        public static $uniqid;

        private static function genFileName(string $ext = 'txt') {
            return TestUtil::genFileName(self::generatorPrefix() . '/', self::$generatedNames, $ext);
        }

        private static function generatorPrefix() {
            return md5(self::$uniqid . __CLASS__);
        }

        static function tearDownAfterClass() {
            if (!empty(self::$generatedNames)) {
                TestUtil::releaseName(...self::$generatedNames);
                try {
                    (new Delete())->raw('/' . self::generatorPrefix());
                } catch (\Exception $e) {

                }
            }
        }
    }

    NameGenerator::$uniqid = uniqid(mt_rand(PHP_INT_MAX, PHP_INT_MAX) . serialize($_SERVER), true);