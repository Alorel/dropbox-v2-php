<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\ListFolder;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Test\NameGenerator;

    class ListFolderTest extends \PHPUnit_Framework_TestCase {

        use NameGenerator;

        private static $dir;

        private static $txt;

        private static $img;

        static function setUpBeforeClass() {
            self::$dir = '/' . self::generatorPrefix();
            self::$txt = self::genFileName('txt');
            self::$img = self::genFileName('jpg');

            $up = new Upload(true);

            $pr1 = $up->raw(self::$txt, '.');
            $pr2 = $up->raw(self::$img, file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '_get-thumb.jpg'));

            $pr1->wait();
            $pr2->wait();
        }

        function testListFolder() {
            $lf = json_decode((new ListFolder())->raw(self::$dir)->getBody()->getContents(), true);

            $this->assertFalse($lf['has_more']);
            $this->assertTrue(is_array($lf['entries']));
            $this->assertTrue(is_string($lf['cursor']));
            $this->assertEquals(2, count($lf['entries']));
        }
    }
