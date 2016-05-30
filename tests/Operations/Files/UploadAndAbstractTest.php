<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Exception\NoTokenException;
    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Operation\Files\UploadSession\Append;
    use Alorel\Dropbox\Operation\Files\UploadSession\Finish;
    use Alorel\Dropbox\Operation\Files\UploadSession\Start;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Options\Option as O;
    use Alorel\Dropbox\Parameters\CommitInfo;
    use Alorel\Dropbox\Parameters\UploadSessionCursor;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\NameGenerator;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Promise\PromiseInterface;
    use Psr\Http\Message\ResponseInterface;

    class UploadAndAbstractTest extends \PHPUnit_Framework_TestCase {

        use NameGenerator;

        private static $fileLength;

        static function setUpBeforeClass() {
            self::$fileLength = strlen(file_get_contents(__FILE__));
        }

        function testUploadSession() {
            $chunks = [
                '123' => 0,
                '456' => 3,
                '789' => 6,
                '!'   => 9
            ];
            $sessionID = json_decode(
                             (new Start())->raw()->getBody()->getContents(),
                             true
                         )[R::SESSION_ID];

            $append = new Append();
            $lastOffset = $chunks[array_keys($chunks)[count($chunks) - 1]];
            $cursor = new UploadSessionCursor($sessionID);

            foreach ($chunks as $data => $offset) {
                $cursor->setOffset($offset);
                $filename = self::genFileName();
                if ($offset == $lastOffset) {
                    $r = (new Finish())
                        ->raw(
                            $data,
                            $cursor,
                            new CommitInfo($filename)
                        );
                    $r = json_decode($r->getBody()->getContents(), true);

                    $this->assertEquals($filename, $r[R::PATH_DISPLAY]);
                    $this->assertEquals(strtolower($filename), $r[R::PATH_LOWERCASE]);
                    $this->assertEquals(10, $r[R::SIZE]);
                } else {
                    $append->raw($data, $cursor);
                }
            }
        }

        function testClientModified() {
            $filename = self::genFileName();

            $opts = (new UploadOptions())
                ->setClientModified(new \DateTime('2000-01-01'));

            $rsp = (new Upload())->raw($filename, __CLASS__, $opts);

            $this->assertInstanceOf(ResponseInterface::class, $rsp);
            $this->abstraction($rsp, $filename, $opts);
        }

        function testResourceUpload() {
            $filename = self::genFileName();
            $rsp = (new Upload())->raw($filename, fopen(__FILE__, 'r'));

            $this->assertEquals(self::$fileLength, json_decode($rsp->getBody(), true)[R::SIZE]);
        }

        function testStreamUpload() {
            $stream = \GuzzleHttp\Psr7\stream_for(fopen(__FILE__, 'r'));

            try {
                $filename = self::genFileName();
                $rsp = (new Upload())->raw($filename, $stream);

                $this->assertEquals(self::$fileLength, json_decode($rsp->getBody(), true)[R::SIZE]);
            } finally {
                $stream->close();
            }
        }

        function testDefaultToken() {
            $currentToken = TestUtil::getPropertyValue(AbstractOperation::class, 'defaultToken');

            try {
                $this->assertEquals($currentToken, TestUtil::invokeMethod(new Upload(), 'getToken'));
                AbstractOperation::setDefaultToken(__METHOD__);
                $this->assertEquals(__METHOD__, TestUtil::invokeMethod(new Upload(), 'getToken'));
            } finally {
                AbstractOperation::setDefaultToken($currentToken);
            }
        }

        function testConstructNoToken() {
            $currentToken = TestUtil::getPropertyValue(AbstractOperation::class, 'defaultToken');
            $this->expectException(NoTokenException::class);
            $this->expectExceptionCode(NoTokenException::NO_TOKEN);
            $this->expectExceptionMessage('The API token must be set either via the constructor or the static '
                                          . 'setDefaultToken() method');

            try {
                AbstractOperation::setDefaultToken('');
                new Upload();
            } finally {
                AbstractOperation::setDefaultToken($currentToken);
            }
        }

        function testDefaultAsync() {
            $currentAsync = (new Upload())->isAsync();

            try {
                AbstractOperation::setDefaultAsync(false);
                $this->assertFalse((new Upload())->isAsync());
                AbstractOperation::setDefaultAsync(true);
                $this->assertTrue((new Upload())->isAsync());

            } finally {
                AbstractOperation::setDefaultAsync($currentAsync);
            }
        }

        function testAsync() {
            $filename = self::genFileName();
            $promise = (new Upload(true))->raw($filename, __CLASS__);
            $this->assertInstanceOf(PromiseInterface::class, $promise);

            $this->abstraction($promise->wait(true), $filename, null);
        }

        function abstraction(ResponseInterface $rsp, string $filename, UploadOptions $opts = null) {
            $body = json_decode($rsp->getBody()->getContents(), true);
            $this->assertEquals($filename, $body[R::PATH_DISPLAY]);
            $this->assertEquals(strtolower($filename), $body[R::PATH_LOWERCASE]);
            $this->assertEquals(strlen(__CLASS__), $body[R::SIZE]);

            if (isset($opts[O::CLIENT_MODIFIED])) {
                $this->assertEquals($opts[O::CLIENT_MODIFIED], $body[R::CLIENT_MODIFIED]);
            }
        }

        function testGetToken() {
            $key = 'foo';
            $this->assertEquals($key, TestUtil::invokeMethod(new Upload(false, $key), 'getToken'));
        }
    }
