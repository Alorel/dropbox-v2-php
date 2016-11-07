<?php
    /**
     *    Copyright (c) Arturas Molcanovas <a.molcanovas@gmail.com> 2016.
     *    https://github.com/Alorel/dropbox-v2-php
     *
     *    Licensed under the Apache License, Version 2.0 (the "License");
     *    you may not use this file except in compliance with the License.
     *    You may obtain a copy of the License at
     *
     *        http://www.apache.org/licenses/LICENSE-2.0
     *
     *    Unless required by applicable law or agreed to in writing, software
     *    distributed under the License is distributed on an "AS IS" BASIS,
     *    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *    See the License for the specific language governing permissions and
     *    limitations under the License.
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Exception\NoTokenException;
    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Options\Option as O;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Promise\PromiseInterface;
    use Psr\Http\Message\ResponseInterface;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class UploadAndAbstractTest extends DBTestCase {

        use NameGenerator;

        private static $fileLength;

        static function setUpBeforeClass() {
            self::$fileLength = filesize(__FILE__);
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

            $filename = self::genFileName();
            $rsp = (new Upload())->raw($filename, \GuzzleHttp\Psr7\stream_for(fopen(__FILE__, 'r')));

            $this->assertEquals(self::$fileLength, json_decode($rsp->getBody(), true)[R::SIZE]);
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
