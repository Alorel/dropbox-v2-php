<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Exception\NoTokenException;
    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Options\Option as O;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\NameGenerator;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Exception\ClientException;
    use GuzzleHttp\Promise\PromiseInterface;
    use Psr\Http\Message\ResponseInterface;

    class UploadAndAbstractTest extends \PHPUnit_Framework_TestCase {

        use NameGenerator;

        private static $fileLength;

        static function setUpBeforeClass() {
            self::$fileLength = filesize(__FILE__);
        }

        function testClientModified() {
            $filename = self::genFileName();

            $opts = (new UploadOptions())
                ->setClientModified(new \DateTime('2000-01-01'));

            try {
                $rsp = (new Upload())->raw($filename, __CLASS__, $opts);

                $this->assertInstanceOf(ResponseInterface::class, $rsp);
                $this->abstraction($rsp, $filename, $opts);
            } catch (ClientException $e) {
                d(json_decode($e->getResponse()->getBody(), true));
                die(1);
            }
        }

        function testResourceUpload() {
            $filename = self::genFileName();
            try {
                $rsp = (new Upload())->raw($filename, fopen(__FILE__, 'r'));

                $this->assertEquals(self::$fileLength, json_decode($rsp->getBody(), true)[R::SIZE]);
            } catch (ClientException $e) {
                d(json_decode($e->getResponse()->getBody(), true));
                die(1);
            }
        }

        function testStreamUpload() {

            try {
                $filename = self::genFileName();
                $rsp = (new Upload())->raw($filename, \GuzzleHttp\Psr7\stream_for(fopen(__FILE__, 'r')));

                $this->assertEquals(self::$fileLength, json_decode($rsp->getBody(), true)[R::SIZE]);
            } catch (ClientException $e) {
                d(json_decode($e->getResponse()->getBody(), true));
                die(1);
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
            try {
                $filename = self::genFileName();
                $promise = (new Upload(true))->raw($filename, __CLASS__);
                $this->assertInstanceOf(PromiseInterface::class, $promise);

                $this->abstraction($promise->wait(true), $filename, null);
            } catch (ClientException $e) {
                d(json_decode($e->getResponse()->getBody(), true));
                die(1);
            }
        }

        function abstraction(ResponseInterface $rsp, $filename, UploadOptions $opts = null) {
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
