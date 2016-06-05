<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
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
        function raw(string $query, string $path = '', SearchOptions $options = null) {
            return $this->send(
                'files/search',
                $path,
                Options::merge([Option::QUERY => $query], $options)
            );
        }
    }