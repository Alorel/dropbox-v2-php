<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder\Mixins;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Parameters\WriteMode;

    class AllTheTraits extends Options {
        use AutoRenameTrait;
        use ClientModifiedTrait;
        use CloseTrait;
        use MuteTrait;
        use WriteModeTrait;
        use IncludeDeletedTrait;
        use IncludeMediaInfoTrait;
        use IncludeHasExplicitSharedMembersTrait;
    }

    class TraitTest extends \PHPUnit_Framework_TestCase {

        /** @var  AllTheTraits */
        private $cfg;

        /** @before */
        function before() {
            $this->cfg = new AllTheTraits();
        }

        function testBlankConstruct() {
            $this->assertEquals([], (new AllTheTraits())->toArray());
        }

        /** @dataProvider allTraits */
        function testAllTraits(string $method, string $varname, $value, $outValue = null) {
            /** @var AllTheTraits $call */
            $call = call_user_func([$this->cfg, $method], $value);
            $this->assertEquals(
                [$varname => $outValue ?? $value],
                $call->toArray()
            );
        }

        function allTraits() {
            $dt = new \DateTime();
            $return = [
                ['setClientModified', Option::CLIENT_MODIFIED, $dt, $dt->format(Options::DATETIME_FORMAT)],
                ['setWriteMode', Option::MODE, WriteMode::add()],
                ['setWriteMode', Option::MODE, WriteMode::overwrite()],
                ['setWriteMode', Option::MODE, WriteMode::update(__CLASS__)]
            ];

            // Do booleans
            foreach ([
                         ['setAutoRename', Option::AUTO_RENAME],
                         ['setClose', Option::CLOSE],
                         ['setMute', Option::MUTE],
                         ['setIncludeDeleted', Option::INCLUDE_DELETED],
                         ['setIncludeHasExplicitSharedMembers', Option::INCLUDE_HAS_EXPLICIT_SHARED_MEMBERS],
                         ['setIncludeMediaInfo', Option::INCLUDE_MEDIA_INFO]
                     ] as $v) {
                $v[2] = true;
                $return[] = $v;
                $v[2] = false;
                $return[] = $v;
            }

            return $return;
        }

        function testOffsets() {
            $this->assertFalse(isset($this->cfg[__METHOD__]));
            $this->assertNull($this->cfg[__METHOD__]);

            $this->cfg[__METHOD__] = __CLASS__;

            $this->assertTrue(isset($this->cfg[__METHOD__]));
            $this->assertEquals(__CLASS__, $this->cfg[__METHOD__]);

            unset($this->cfg[__METHOD__]);
            $this->assertFalse(isset($this->cfg[__METHOD__]));
            $this->assertNull($this->cfg[__METHOD__]);
        }

        function testDefaultsConstruct() {
            $a = ['foo' => 'bar'];
            $this->assertEquals($a, (new AllTheTraits($a))->toArray());
        }

        /** @dataProvider merge */
        function testMerge(array $final, ...$items) {
            $out = Options::merge(...$items);

            $this->assertEquals($final, $out->toArray());
        }

        function testSetOptionRaw() {
            $this->cfg['foo'] = 'bar';
            $this->assertEquals(new AllTheTraits(['foo' => 'bar']), $this->cfg);
        }

        function merge() {
            return [
                'Nulls'         => [
                    ['foo' => 'bar'],
                    ['foo' => 'bar'],
                    ['baz' => null]
                ],
                '2 arrays'      => [
                    ['foo' => 'bar', 'qux' => 'baz'],
                    ['foo' => 'bar'],
                    ['qux' => 'baz']
                ],
                '1 array 1 obj' => [
                    ['foo' => 'bar', 'qux' => 'baz'],
                    ['foo' => 'bar'],
                    new AllTheTraits(['qux' => 'baz'])
                ],
                '2 obj'         => [
                    ['foo' => 'bar', 'qux' => 'baz'],
                    new AllTheTraits(['foo' => 'bar']),
                    new AllTheTraits(['qux' => 'baz'])
                ]
            ];
        }
    }