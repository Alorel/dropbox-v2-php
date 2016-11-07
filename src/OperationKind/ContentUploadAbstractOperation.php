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

    namespace Alorel\Dropbox\OperationKind;

    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Options\Options;

    /**
     * A wrapper for the ContentUpload group of operations
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#formats
     */
    abstract class ContentUploadAbstractOperation extends AbstractOperation {

        /**
         * The hostname for these operations
         *
         * @var string
         */
        const HOST = 'content.dropboxapi.com';

        /**
         * Send the request
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                                            $url  The URL to send to. This will be prepended
         *                                                                with the HOST, API version and "files/"
         * @param string                                            $path The path to upload the file to
         * @param string|resource|\Psr\Http\Message\StreamInterface $body The file contents. Can be a string, a fopen()
         *                                                                resource or an instance of StreamInterface
         * @param \Alorel\Dropbox\Options\Options|null              $opts Any additional, operation-specific options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         * @see    ContentUploadOperation::HOST
         * @see    Operation::API_VERSION
         */
        protected function send($url, $path, $body, Options $opts = null) {
            $headers = [
                'Content-Type'    => 'application/octet-stream',
                'Dropbox-API-Arg' => []
            ];
            $arg = &$headers['Dropbox-API-Arg'];

            if ($path) {
                $arg[Option::PATH] = $path;
            }

            if ($opts) {
                $arg = array_merge($arg, $opts->toArray());
            }

            $arg = $arg ? json_encode($arg) : '{}';

            $params = [
                'headers' => $headers
            ];
            if ($body !== null) {
                $params['body'] = $body;
            }

            return $this->sendAbstract('POST',
                                       self::HOST . '/' . self::API_VERSION . '/files/' . $url,
                                       $params);
        }

    }