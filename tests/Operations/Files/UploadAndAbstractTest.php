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
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Promise\PromiseInterface;
    use Psr\Http\Message\ResponseInterface;

    class UploadAndAbstractTest extends \PHPUnit_Framework_TestCase {

        private static $generatedNames = [];

        function testClientModified() {
            $filename = self::genFileName();

            $opts = (new UploadOptions())
                ->setClientModified(new \DateTime('2000-01-01'));

            $rsp = (new Upload())->perform($filename, __CLASS__, $opts);

            $this->assertInstanceOf(ResponseInterface::class, $rsp);
            $this->abstraction($rsp, $filename, $opts);
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
            return TestUtil::genFileName(md5(__CLASS__) . '/', self::$generatedNames);
        }

        /**
         * @long
         */
        function testAsync() {
            $filename = self::genFileName();
            $promise = (new Upload(true))->perform($filename, __CLASS__);
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

        /** @afterClass */
        static function afterClass() {
            TestUtil::releaseName(...self::$generatedNames);
        }
    }
