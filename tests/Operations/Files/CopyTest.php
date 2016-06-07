<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Copy;
    use Alorel\Dropbox\Operation\Files\GetMetadata;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Exception\ClientException;

    class CopyTest extends \PHPUnit_Framework_TestCase {
        use NameGenerator;

        function testCopy() {
            $src = self::genFileName();
            $dest = self::genFileName();
            $meta = new GetMetadata();

            try {
                (new Upload())->raw($src, __METHOD__);
                (new Copy())->raw($src, $dest);

                $this->assertEquals(
                    json_decode($meta->raw($src)->getBody()->getContents(), true)[R::SIZE],
                    json_decode($meta->raw($dest)->getBody()->getContents(), true)[R::SIZE]
                );
            } catch (ClientException $e) {
                d(json_decode($e->getResponse()->getBody()), true);
                die(1);
            }
        }
    }
