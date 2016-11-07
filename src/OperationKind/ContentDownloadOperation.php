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
     * Abstraction for content downloads
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ContentDownloadOperation extends AbstractOperation {

        /**
         * The host for this set of operations
         *
         * @var string
         */
        const HOST = 'content.dropboxapi.com';

        /**
         * Send our request
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string       $url  Endpoint URL
         * @param string       $path Path to the target
         * @param Options|null $opts Any additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        public function send($url, $path, Options $opts = null) {
            $params = [
                Option::PATH => $path
            ];

            if ($opts) {
                $params = array_merge($params, $opts->toArray());
            }

            return $this->sendAbstract(
                'POST',
                self::HOST . '/' . self::API_VERSION . '/files/' . $url,
                ['headers' => ['Dropbox-API-Arg' => json_encode($params)]]
            );
        }
    }