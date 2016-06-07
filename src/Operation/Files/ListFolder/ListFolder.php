<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Files\ListFolder;

    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Builder\ListFolderOptions;

    /**
     * Returns the contents of a folder.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder
     */
    class ListFolder extends RPCOperation {

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
        function raw($path = '', ListFolderOptions $options = null) {
            return $this->send('files/list_folder', $path, $options);
        }
    }