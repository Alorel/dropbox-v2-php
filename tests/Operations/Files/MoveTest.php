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
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Exception\ClientException;

    class MoveTest extends \PHPUnit_Framework_TestCase {
        use NameGenerator;

        function testMove() {
            $src = self::genFileName();
            $dest = self::genFileName();
            $meta = new GetMetadata();

            $srcSize = json_decode((new Upload())->raw($src, __METHOD__)->getBody()->getContents(), true)[R::SIZE];
            (new Move())->raw($src, $dest);

            $this->assertEquals($srcSize, json_decode($meta->raw($dest)->getBody()->getContents(), true)[R::SIZE]);

            $this->expectException(ClientException::class);
            $this->expectExceptionCode(409);
            $meta->raw($src);
        }
    }
