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

    namespace Alorel\Dropbox\Operation\Files;

    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Builder\SearchOptions;
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Options\Options;

    /**
     * Searches for files and folders. Note: Recent changes may not immediately be reflected in search results due to
     * a short delay in indexing.
     *
     * @author Art <a.molcanovas@gmail.com>
     *
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-search
     */
    class Search extends RPCOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string             $query   The search query
         * @param string             $path    The folder to search
         * @param SearchOptions|null $options Additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        public function raw($query, $path = '', SearchOptions $options = null) {
            return $this->send(
                'files/search',
                $path,
                Options::merge([Option::QUERY => $query], $options)
            );
        }
    }