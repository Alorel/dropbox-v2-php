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

    use Alorel\Dropbox\Operation\Files\GetTemporaryLink;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class GetTemporaryLinkTest extends DBTestCase {

        use NameGenerator;

        private static $n;

        const CONTENTS = __CLASS__;

        static function setUpBeforeClass() {
            for ($i = 0; $i < 10; $i++) {
                try {
                    self::$n = self::genFileName();
                    (new Upload())->raw(self::$n, self::CONTENTS);

                    return;
                } catch (\Exception $e) {
                    fwrite(STDERR, PHP_EOL . $e->getMessage());
                    sleep(3);
                }
            }

            trigger_error('Upload failed', E_USER_ERROR);
        }

        function testTempLink() {
            $r = json_decode((new GetTemporaryLink())->raw(self::$n)->getBody()->getContents(), true);
            sleep(1);

            $this->assertTrue(is_string($r['link']));
            $this->assertEquals(self::CONTENTS, file_get_contents($r['link']));
        }
    }
