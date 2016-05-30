<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Exception\NoTokenException;
    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Promise\PromiseInterface;
    use Psr\Http\Message\ResponseInterface;

    //@todo clean files after delete is implemented
    class UploadAndAbstractTest extends \PHPUnit_Framework_TestCase {

        private static $generatedNames = [];

        private static $fileLength;

        private static $prefix;

        static function setUpBeforeClass() {
            self::$fileLength = strlen(file_get_contents(__FILE__));
            self::$prefix = md5(__CLASS__) . '/';
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

            $this->assertEquals(self::$fileLength, json_decode($rsp->getBody(), true)['size']);
        }

        function testStreamUpload() {
            $stream = \GuzzleHttp\Psr7\stream_for(fopen(__FILE__, 'r'));

            try {
                $filename = self::genFileName();
                $rsp = (new Upload())->raw($filename, $stream);

                $this->assertEquals(self::$fileLength, json_decode($rsp->getBody(), true)['size']);
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

        private static function genFileName() {
            return TestUtil::genFileName(self::$prefix, self::$generatedNames);
        }

        function testAsync() {
            $filename = self::genFileName();
            $promise = (new Upload(true))->raw($filename, __CLASS__);
            $this->assertInstanceOf(PromiseInterface::class, $promise);

            $this->abstraction($promise->wait(true), $filename, null);
        }

        function abstraction(ResponseInterface $rsp, string $filename, UploadOptions $opts = null) {
            $body = json_decode($rsp->getBody()->getContents(), true);
            $this->assertEquals($filename, $body['path_display']);
            $this->assertEquals(strtolower($filename), $body['path_lower']);
            $this->assertEquals(strlen(__CLASS__), $body['size']);

            if (isset($opts[Option::CLIENT_MODIFIED])) {
                $this->assertEquals($opts[Option::CLIENT_MODIFIED], $body['client_modified']);
            }
        }

        function testGetToken() {
            $key = 'foo';
            $this->assertEquals($key, TestUtil::invokeMethod(new Upload(false, $key), 'getToken'));
        }

        static function tearDownAfterClass() {
            TestUtil::releaseName(...self::$generatedNames);
            (new Delete())->raw('/' . rtrim(self::$prefix, '/'));
        }
    }
