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

    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\Download;
    use Alorel\Dropbox\Operation\Files\Restore;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Parameters\WriteMode;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class RestoreTest extends DBTestCase {

        use NameGenerator;

        const SLEEP_TIME = 5;

        private $name;

        private $rev1;

        private $rev2;

        /** @before */
        public function createFile() {
            $opts = (new UploadOptions())->setWriteMode(WriteMode::overwrite());
            $up = new Upload();
            for ($i = 0; $i < 10; $i++) {
                try {
                    $this->name = self::genFileName();
                    $this->rev1 = json_decode($up->raw($this->name, '.', $opts)->getBody()->getContents(), true)['rev'];
                    $this->rev2 =
                        json_decode($up->raw($this->name, '..', $opts)->getBody()->getContents(), true)['rev'];

                    return;
                } catch (\Exception $e) {
                    fwrite(STDOUT,
                           PHP_EOL . 'Failed to upload and get revisions for ' . $this->name . ': ' . $e->getMessage() .
                           PHP_EOL);
                    sleep(5);
                }
            }
        }

        function testRestoreNonDeleted() {
            $this->assertEquals(2, strlen((new Download())->raw($this->name)->getBody()));
            $this->assertEquals(
                1,
                json_decode((new Restore())->raw($this->name, $this->rev1)->getBody()->getContents(), true)['size']
            );
        }

        /** @depends testRestoreNonDeleted */
        function testRestoreDeleted() {
            (new Delete())->raw($this->name);
            $this->assertEquals(
                2,
                json_decode((new Restore())->raw($this->name, $this->rev2)->getBody()->getContents(), true)['size']
            );
        }
    }
