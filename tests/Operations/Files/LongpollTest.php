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

    use Alorel\Dropbox\Operation\Files\CreateFolder;
    use Alorel\Dropbox\Operation\Files\ListFolder\ListFolder;
    use Alorel\Dropbox\Operation\Files\ListFolder\Longpoll;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\LongpollOptions;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use Alorel\Dropbox\Test\TestUtil;
    use Psr\Http\Message\ResponseInterface;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class LongpollTest extends DBTestCase {
        use NameGenerator;

        private static $dir;

        static function setUpBeforeClass() {
            for ($i = 0; $i < 10; $i++) {
                try {
                    self::$dir = '/' . self::generatorPrefix();
                    (new CreateFolder())->raw(self::$dir);

                    return;
                } catch (\Exception $e) {
                    sleep(5);
                }
            }
        }

        /** @large */
        function testShort() {
            $cursor =
                json_decode((new ListFolder(false))->raw(self::$dir)->getBody()->getContents(), true)['cursor'];
            $lp = (new Longpoll(true))->raw($cursor);

            (new Upload(false))->raw(self::genFileName(), '.');
            /** @var ResponseInterface $w8 */
            $w8 = $lp->wait(true);

            $rsp = json_decode($w8->getBody()->getContents(), true);

            $this->assertTrue($rsp['changes']);
        }

        /** @large */
        function testLong() {
            $cursor =
                json_decode((new ListFolder(false))->raw(self::$dir)->getBody()->getContents(), true)['cursor'];
            TestUtil::out('Running ' . __METHOD__ . ' - this will take a while.');
            $lp = (new Longpoll(true))->raw($cursor, (new LongpollOptions())->setTimeout(60));

            sleep(31); //Default timeout is 30s
            (new Upload(false))->raw(self::genFileName(), '.');
            /** @var ResponseInterface $w8 */
            $w8 = $lp->wait(true);

            $rsp = json_decode($w8->getBody()->getContents(), true);

            $this->assertTrue($rsp['changes']);
        }
    }
