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

    namespace Alorel\Dropbox\Short\Operations\Users;

    use Alorel\Dropbox\Operation\Users\GetAccountBatch;
    use Alorel\Dropbox\Operation\Users\GetCurrentAccount;
    use Alorel\Dropbox\Test\DBTestCase;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class GetAccountBatchTest extends DBTestCase {

        private static $accountID;

        private static $curr;

        private static $batch;

        static function setUpBeforeClass() {
            for ($i = 0; $i < 10; $i++) {
                try {
                    self::$curr = json_decode((new GetCurrentAccount())->raw()->getBody()->getContents(), true);
                    self::$accountID = self::$curr['account_id'];
                    self::$batch = json_decode(
                        (new GetAccountBatch())->raw(self::$accountID)->getBody()->getContents(),
                        true
                    );

                    return;
                } catch (\Exception $e) {
                    sleep(5);
                }
            }
        }

        function testCount() {
            $this->assertTrue(is_array(self::$batch));
            $this->assertEquals(1, count(self::$batch));
        }

        /** @dataProvider providerFields */
        function testFields($f) {
            $this->assertEquals(self::$curr[$f], self::$batch[0][$f]);
        }

        function testWithArray() {
            $b = json_decode(
                (new GetAccountBatch())->raw(...[self::$accountID])->getBody()->getContents(),
                true
            );
            $this->assertEquals(self::$batch[0], $b[0]);
        }

        function providerFields() {
            yield ['account_id'];
            yield ['name'];
            yield ['email'];
            yield ['email_verified'];
            yield ['disabled'];
        }
    }
