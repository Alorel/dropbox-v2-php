<?php
    /**
 * The MIT License (MIT)
 *
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated 
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the 
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit 
 * persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT 
 * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, 
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Promise\PromiseInterface;
    use Psr\Http\Message\ResponseInterface;

    class UploadTest extends \PHPUnit_Framework_TestCase {

        private static $generatedNames = [];

        function testClientModified() {
            $filename = TestUtil::genFileName(md5(__CLASS__) . '/', self::$generatedNames);

            $opts = (new UploadOptions())
                ->setClientModified(new \DateTime('2000-01-01'));

            $rsp = (new Upload(getenv('APIKEY')))->perform($filename, __CLASS__, $opts);

            $this->assertInstanceOf(ResponseInterface::class, $rsp);
            $this->abstraction($rsp, $filename, $opts);
        }

        /**
         * @long
         */
        function testAsync() {
            $filename = TestUtil::genFileName(md5(__CLASS__) . '/', self::$generatedNames);
            $promise = (new Upload(getenv('APIKEY'), true))->perform($filename, __CLASS__);
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
            $up = new Upload(getenv('APIKEY'));
            $meth = (new \ReflectionClass(get_class($up)))->getMethod('getToken');
            $meth->setAccessible(true);

            $this->assertEquals(getenv('APIKEY'), $meth->invoke($up));
        }

        /** @afterClass */
        static function afterClass() {
            TestUtil::releaseName(...self::$generatedNames);
        }
    }
