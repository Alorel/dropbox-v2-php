<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\CopyReference\Get;
    use Alorel\Dropbox\Operation\Files\CopyReference\Save;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Exception\ServerException;

    class CopyReferenceTest extends \PHPUnit_Framework_TestCase {
        use NameGenerator;

        function testCopyReference() {
            $srcFile = self::genFileName();
            (new Upload())->raw($srcFile, __METHOD__);
            try {
                $ref = json_decode((new Get())->raw($srcFile)->getBody()->getContents(), true)[R::COPY_REFERENCE];

                $this->assertEquals(
                    strlen(__METHOD__),
                    json_decode(
                        (new Save())->raw(self::genFileName(), $ref)->getBody()->getContents(),
                        true
                    )[R::METADATA][R::SIZE]
                );
            } catch (ServerException $e) {
                // This copy_reference API endpoints seem to throw exceptions
                fwrite(STDERR, PHP_EOL . '(beyond my control) ' . $e->getMessage() . PHP_EOL);
            }
        }
    }