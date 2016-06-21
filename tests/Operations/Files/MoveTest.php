<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\GetMetadata;
    use Alorel\Dropbox\Operation\Files\Move;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Exception\ClientException;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class MoveTest extends DBTestCase {
        use NameGenerator;

        private static $src;

        static function setUpBeforeClass() {
            self::$src = self::genFileName();
        }

        function testMove() {
            $dest = self::genFileName();

            $srcSize =
                json_decode((new Upload())->raw(self::$src, __METHOD__)->getBody()->getContents(), true)[R::SIZE];
            (new Move())->raw(self::$src, $dest);

            $this->assertEquals(
                $srcSize,
                json_decode((new GetMetadata())->raw($dest)->getBody()->getContents(), true)[R::SIZE]
            );
        }

        /** @depends testMove */
        function testOldNoExist() {
            $this->expectException(ClientException::class);
            $this->expectExceptionCode(409);
            (new GetMetadata())->raw(self::$src);
        }
    }
