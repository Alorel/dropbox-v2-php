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

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\ListRevisions;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\ListRevisionsOptions;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Parameters\WriteMode;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class ListRevisionsTest extends DBTestCase {
        use NameGenerator;

        private static $fname;

        private static $opt;

        /** @var  ListRevisions */
        private static $lr;

        /** @var  Upload */
        private static $up;

        static function setUpBeforeClass() {
            self::$up = new Upload();
            self::$opt = (new UploadOptions())->setWriteMode(WriteMode::overwrite());
            self::$lr = new ListRevisions();
            self::$fname = self::genFileName();
        }

        /** @dataProvider providerRevisionIncrement */
        function testRevisionIncrement($i) {
            self:: $up->raw(self::$fname, (pow(10, $i)), self:: $opt);
            $rsp = json_decode(self::$lr->raw(self::$fname)->getBody()->getContents(), true);

            $this->assertFalse($rsp['is_deleted']);
            $this->assertEquals($i + 1, count($rsp['entries']));
        }

        function providerRevisionIncrement() {
            yield [0];
            yield [1];
        }

        /** @depends testRevisionIncrement */
        function testLimit() {
            $rsp = json_decode(
                self::$lr->raw(self::$fname, (new ListRevisionsOptions())->setLimit(1))->getBody()->getContents(),
                true
            );
            $this->assertFalse($rsp['is_deleted']);
            $this->assertEquals(1, count($rsp['entries']));

            //Prep for next test
            (new Delete())->raw(self::$fname);
        }

//         /**
//          * @dataProvider providerDeleted
//          * @depends      testLimit
//          */
//         function testDeleted($limit) {
//             if ($limit) {
//                 $options = (new ListRevisionsOptions())->setLimit($limit);
//                 $count = $limit - 1;
//             } else {
//                 $options = null;
//                 $count = 2;
//             }

//             $rsp = json_decode(
//                 self::$lr->raw(self::$fname, $options)->getBody()->getContents(),
//                 true
//             );
//             $this->assertTrue($rsp['is_deleted']);
//             $this->assertEquals($count, count($rsp['entries']));
//         }
//
//         function providerDeleted() {
//             yield '1' => [1];
//             yield '2' => [2];
//             yield 'null' => [null];
//         }
    }
