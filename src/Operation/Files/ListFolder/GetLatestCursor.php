<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operation\Files\ListFolder;

    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Builder\ListFolderOptions;

    /**
     * A way to quickly get a cursor for the folder's state. Unlike list_folder, list_folder/get_latest_cursor
     * doesn't return any entries. This endpoint is for app which only needs to know about new files and
     * modifications and doesn't need to know about files that already exist in Dropbox.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder-get_latest_cursor
     */
    class GetLatestCursor extends RPCOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                 $path    Path to the folder
         * @param ListFolderOptions|null $options Additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw(string $path = '', ListFolderOptions $options = null) {
            return $this->send('files/list_folder/get_latest_cursor', $path, $options);
        }
    }