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

    use Alorel\Dropbox\Operation\Files\UploadSession\Append;
    use Alorel\Dropbox\Operation\Files\UploadSession\Finish;
    use Alorel\Dropbox\Operation\Files\UploadSession\Start;
    use Alorel\Dropbox\Parameters\CommitInfo;
    use Alorel\Dropbox\Parameters\UploadSessionCursor;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class UploadSessionTest extends DBTestCase {
        use NameGenerator;

        function testUploadSession() {
            $chunks = [
                '123' => 0,
                '456' => 3,
                '789' => 6,
                '!'   => 9
            ];

            $sessionID = json_decode(
                             (new Start())->raw()->getBody()->getContents(),
                             true
                         )[R::SESSION_ID];

            $append = new Append();
            $lastOffset = $chunks[array_keys($chunks)[count($chunks) - 1]];
            $cursor = new UploadSessionCursor($sessionID);

            foreach ($chunks as $data => $offset) {
                $cursor->setOffset($offset);
                $filename = self::genFileName();
                if ($offset == $lastOffset) {
                    $r = (new Finish())
                        ->raw(
                            $data,
                            $cursor,
                            new CommitInfo($filename)
                        );
                    $r = json_decode($r->getBody()->getContents(), true);

                    $this->assertEquals($filename, $r[R::PATH_DISPLAY]);
                    $this->assertEquals(strtolower($filename), $r[R::PATH_LOWERCASE]);
                    $this->assertEquals(10, $r[R::SIZE]);
                } else {
                    $append->raw($data, $cursor);
                }
            }
        }
    }