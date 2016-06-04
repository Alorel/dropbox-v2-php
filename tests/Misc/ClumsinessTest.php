<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\ClumsinessPrevention;

    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Builder\GetMetadataOptions;
    use Alorel\Dropbox\Options\Mixins\AutoRenameTrait;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Test\TestUtil;
    use ReflectionClass as RC;

    class ClumsinessTest extends \PHPUnit_Framework_TestCase {

        private function abstractionSubclass(string $baseClass, string $testClass, ...$constructorArgs) {
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
        function testOptionBuilder(string $class) {
            $this->abstractionSubclass(Options::class, $class);
        }

        function providerOptionBuilder() {
            return TestUtil::allClassesInClassDirectory(GetMetadataOptions::class, true);
        }

        /** @dataProvider providerOptionMixins */
        function testOptionMixins(string $mixin) {
            $this->assertTrue((new RC($mixin))->isTrait());
        }

        function providerOptionMixins() {
            return TestUtil::allClassesInClassDirectory(AutoRenameTrait::class, true);
        }

        /** @dataProvider providerOperationKind */
        function testOperationKind(string $class) {
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