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

    namespace Alorel\Dropbox;

    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Builder\GetMetadataOptions;
    use Alorel\Dropbox\Options\Mixins\AutoRenameTrait;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\TestUtil;
    use ReflectionClass as RC;

    if (1 != getenv('TRAVISCI')) {

        class AntiClumsinessDBTest extends DBTestCase {

            private static $BASE_NAMESPACE;

            static function setUpBeforeClass() {
                self::$BASE_NAMESPACE = (new RC(Util::class))->getNamespaceName();
            }

            private function abstractionSubclass($baseClass, $testClass, ...$constructorArgs) {
                $rc = new RC($testClass);

                if ($rc->isInstantiable()) {
                    $this->assertInstanceOf($baseClass, $rc->newInstanceArgs($constructorArgs));
                } else {
                    $parents = [$testClass];
                    while ($rc = $rc->getParentClass()) {
                        $parents[] = $rc->getName();
                    }
                    $this->assertContains($baseClass, $parents);
                }
            }

            /** @dataProvider providerOptionBuilder */
            function testOptionBuilder($class) {
                $this->abstractionSubclass(Options::class, $class);
            }

            /** @dataProvider providerFilePaths */
            function testFilePaths($class) {
                $rf = new RC($class);
                $trim = trim(str_replace(self::$BASE_NAMESPACE, '', $rf->getNamespaceName()), '\\');
                $ns = 'src\\' . $trim . ($trim ? '\\' : '') . $rf->getShortName() . '.php';

                $this->assertNotFalse(stripos($rf->getFileName(), $ns));
            }

            function providerFilePaths() {
                return TestUtil::allClassesInClassDirectory(Util::class, true);
            }

            function providerOptionBuilder() {
                return TestUtil::allClassesInClassDirectory(GetMetadataOptions::class, true);
            }

            /** @dataProvider providerOptionMixins */
            function testOptionMixins($mixin) {
                $this->assertTrue((new RC($mixin))->isTrait());
            }

            function providerOptionMixins() {
                return TestUtil::allClassesInClassDirectory(AutoRenameTrait::class, true);
            }

            /** @dataProvider providerOperationKind */
            function testOperationKind($class) {
                $this->abstractionSubclass(AbstractOperation::class, $class);
            }

            function providerOperationKind() {
                foreach ([RPCOperation::class, AbstractOperation::class] as $srcClass) {
                    foreach (TestUtil::allClassesInClassDirectory($srcClass, true) as $k => $v) {
                        yield $k => $v;
                    }
                }
            }
        }
    }