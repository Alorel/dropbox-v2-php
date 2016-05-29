<?php
    /**
 * The MIT License (MIT)
 *
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated 
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the 
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit 
 * persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT 
 * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, 
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

    namespace Alorel\Dropbox\OptionBuilder\Mixins;

    use Alorel\Dropbox\Options;
    use Alorel\Dropbox\Parameters\WriteMode;

    class AllTheTraits extends Options {
        use AutoRenameTrait;
        use ClientModifiedTrait;
        use CloseTrait;
        use MuteTrait;
        use WriteModeTrait;
    }

    class TraitTest extends \PHPUnit_Framework_TestCase {

        /** @var  AllTheTraits */
        private $cfg;

        /** @before */
        function before() {
            $this->cfg = new AllTheTraits();
        }

        function testBlankConstruct() {
            $this->assertEquals([], (new AllTheTraits())->getOptions());
        }

        /** @dataProvider allTraits */
        function testAllTraits(string $method, string $varname, $value, $outValue = null) {
            $this->assertEquals(
                [$varname => $outValue ?? $value],
                call_user_func([$this->cfg, $method], $value)->getOptions()
            );
        }

        function allTraits() {
            $dt = new \DateTime();
            $return = [
                ['setClientModified', 'client_modified', $dt, $dt->format(Options::DATETIME_FORMAT)],
                ['setWriteMode', 'mode', WriteMode::add()],
                ['setWriteMode', 'mode', WriteMode::overwrite()],
                ['setWriteMode', 'mode', WriteMode::update(__CLASS__)]
            ];

            // Do booleans
            foreach ([
                         ['setAutoRename', 'autorename'],
                         ['setClose', 'close'],
                         ['setMute', 'mute']
                     ] as $v) {
                $v[2] = true;
                $return[] = $v;
                $v[2] = false;
                $return[] = $v;
            }

            return $return;
        }

        function testDefaultsConstruct() {
            $a = ['foo' => 'bar'];
            $this->assertEquals($a, (new AllTheTraits($a))->getOptions());
        }

        /** @dataProvider merge */
        function testMerge(array $final, ...$items) {
            $out = Options::merge(...$items);

            $this->assertEquals($final, $out->getOptions());
        }

        function testSetOptionRaw() {
            $this->assertEquals(new AllTheTraits(['foo' => 'bar']), $this->cfg->setOption('foo', 'bar'));
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