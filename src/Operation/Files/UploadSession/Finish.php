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

    namespace Alorel\Dropbox\Operation\Files\UploadSession;

    use Alorel\Dropbox\OperationKind\ContentUploadAbstractOperation;
    use Alorel\Dropbox\Options\Option as O;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Parameters\CommitInfo;
    use Alorel\Dropbox\Parameters\UploadSessionCursor;

    /**
     * Finish an upload session and save the uploaded data to the given file path. A single request should not upload
     * more than 150 MB of file contents.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class Finish extends ContentUploadAbstractOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string|resource|\Psr\Http\Message\StreamInterface $data       The file contents. Can be a string, a fopen()
         *                                                                      resource or an instance of StreamInterface
         * @param UploadSessionCursor                               $cursor     The upload session cursor
         * @param CommitInfo                                        $commitInfo Final info, such as path and options
         *                                                                      available to the regular upload
         *                                                                      operation
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        public function raw($data, UploadSessionCursor $cursor, CommitInfo $commitInfo) {
            return $this->send('upload_session/finish',
                               null,
                               $data,
                               new Options([
                                               O::CURSOR      => $cursor,
                                               O::COMMIT_INFO => $commitInfo
                                           ]));
        }
    }