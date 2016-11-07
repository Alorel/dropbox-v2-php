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
