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
    use Alorel\Dropbox\Options\Builder\UploadSession\UploadSessionActiveOptions;
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Parameters\UploadSessionCursor;

    /**
     * Append more data to an upload session. When the parameter close is set, this call will close the session. A
     * single request should not upload more than 150 MB of file contents.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class Append extends ContentUploadAbstractOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string|resource|\Psr\Http\Message\StreamInterface $data    The file contents. Can be a string, a fopen()
         * @param UploadSessionCursor                               $cursor  The upload session cursor
         * @param UploadSessionActiveOptions|null                   $options Additional operation options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        public function raw($data, UploadSessionCursor $cursor, UploadSessionActiveOptions $options = null) {
            return $this->send('upload_session/append_v2',
                               null,
                               $data,
                               Options::merge(
                                   $options,
                                   [Option::CURSOR => $cursor]
                               ));
        }
    }