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

    use AloFramework\Common\Alo;
    use Alorel\Dropbox\Options\Option as O;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Parameters\SearchMode as SM;
    use Alorel\Dropbox\Parameters\ThumbnailFormat as TF;
    use Alorel\Dropbox\Parameters\ThumbnailSize as TS;
    use Alorel\Dropbox\Parameters\WriteMode as WM;
    use Alorel\Dropbox\Test\AllTheTraits;
    use Alorel\Dropbox\Test\DBTestCase;

    class TraitTest extends DBTestCase {

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
        function testAllTraits($method, $varname, $value, $outValue = null) {
            /** @var AllTheTraits $call */
            $call = call_user_func([$this->cfg, $method], $value);
            $this->assertEquals(
                [$varname => Alo::ifnull($outValue, $value, true)],
                $call->toArray()
            );
        }

        function allTraits() {
            $dt = new \DateTime();
            yield ['setClientModified', O::CLIENT_MODIFIED, $dt, $dt->format(Options::DATETIME_FORMAT)];
            yield ['setWriteMode', O::MODE, WM::add()];
            yield ['setWriteMode', O::MODE, WM::overwrite()];
            yield ['setWriteMode', O::MODE, WM::update(__CLASS__)];
            yield ['setThumbnailSize', O::SIZE, TS::w32h32()];
            yield ['setThumbnailSize', O::SIZE, TS::w64h64()];
            yield ['setThumbnailSize', O::SIZE, TS::w128h128()];
            yield ['setThumbnailSize', O::SIZE, TS::w640h480()];
            yield ['setThumbnailSize', O::SIZE, TS::w1024h768()];
            yield ['setThumbnailFormat', O::FORMAT, TF::jpeg()];
            yield ['setThumbnailFormat', O::FORMAT, TF::png()];
            yield ['setTimeout', O::TIMEOUT, 5];
            yield ['setLimit', O::LIMIT, 20];
            yield ['setSearchMode', O::MODE, SM::deletedFilename()];
            yield ['setSearchMode', O::MODE, SM::filename()];
            yield ['setSearchMode', O::MODE, SM::filenameAndContent()];
            yield ['setMaxResults', O::MAX_RESULTS, 10];
            yield ['setStart', O::START, 5];

            // Do booleans
            foreach ([
                         ['setAutoRename', O::AUTO_RENAME],
                         ['setClose', O::CLOSE],
                         ['setMute', O::MUTE],
                         ['setIncludeDeleted', O::INCLUDE_DELETED],
                         ['setIncludeHasExplicitSharedMembers', O::INCLUDE_HAS_EXPLICIT_SHARED_MEMBERS],
                         ['setIncludeMediaInfo', O::INCLUDE_MEDIA_INFO],
                         ['setRecursive', O::RECURSIVE]
                     ] as $v) {
                $v[2] = true;
                yield $v;
                $v[2] = false;
                yield $v;
            }
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
            yield 'Nulls' => [
                ['foo' => 'bar'],
                ['foo' => 'bar'],
                ['baz' => null]
            ];
            yield    '2 arrays' => [
                ['foo' => 'bar', 'qux' => 'baz'],
                ['foo' => 'bar'],
                ['qux' => 'baz']
            ];
            yield   '1 array 1 obj' => [
                ['foo' => 'bar', 'qux' => 'baz'],
                ['foo' => 'bar'],
                new AllTheTraits(['qux' => 'baz'])
            ];
            yield    '2 obj' => [
                ['foo' => 'bar', 'qux' => 'baz'],
                new AllTheTraits(['foo' => 'bar']),
                new AllTheTraits(['qux' => 'baz'])
            ];
        }
    }