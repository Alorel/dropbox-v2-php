<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\ListRevisions;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\ListRevisionsOptions;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Parameters\WriteMode;
    use Alorel\Dropbox\Test\NameGenerator;

    class ListRevisionsTest extends \PHPUnit_Framework_TestCase {
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

        /**
         * @dataProvider providerDeleted
         * @depends      testLimit
         */
        function testDeleted($limit) {
            if ($limit) {
                $options = (new ListRevisionsOptions())->setLimit($limit);
                $count = $limit - 1;
            } else {
                $options = null;
                $count = 2;
            }
            $rsp = json_decode(
                self::$lr->raw(self::$fname, $options)->getBody()->getContents(),
                true
            );
            $this->assertTrue($rsp['is_deleted']);
            $this->assertEquals($count, count($rsp['entries']));
        }

        function providerDeleted() {
            yield '1' => [1];
            yield '2' => [2];
            yield 'null' => [null];
        }
    }
