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

    use Alorel\Dropbox\Operation\Files\SaveUrl\CheckJobStatus;
    use Alorel\Dropbox\Operation\Files\SaveUrl\SaveURL;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use Alorel\Dropbox\Test\TestUtil;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class SaveURLTest extends DBTestCase {
        use NameGenerator;

        const URL = 'https://www.google.com';

        private static $fn;

        static function setUpBeforeClass() {
            self::$fn = self::genFileName();
        }

        function assertResponse(array $r) {
            $this->assertEquals(self::$fn, $r['path_display']);
            $this->assertEquals(strtolower(self::$fn), $r['path_lower']);
        }

        /** @large */
        function testTheThing() {
            $request = json_decode((new SaveURL())->raw(self::$fn, self::URL)->getBody()->getContents(), true);
            $check = new CheckJobStatus();
            sleep(1);

            $this->assertTrue(isset($request['complete']) || isset($request['async_job_id']));

            if (isset($request['complete'])) {
                $this->assertResponse($request);
            } else {
                do {
                    if (isset($s)) {
                        sleep(1);
                    }
                    $s = json_decode($check->raw($request['async_job_id'])->getBody()->getContents(), true);
                } while (isset($s[R::DOT_TAG]) && $s[R::DOT_TAG] == 'in_progress');

                if ($s[R::DOT_TAG] === 'complete') {
                    $this->assertResponse($s);
                } else {
                    TestUtil::err('Failed to SaveURL. self::$URL=' . self::URL);
                    d($s);
                }
            }
        }
    }
