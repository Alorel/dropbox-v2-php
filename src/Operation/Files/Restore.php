<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Files;

    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Options\Options;

    /**
     * Restore a file to a specific revision
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-restore
     */
    class Restore extends RPCOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $path     Path to the folder
         * @param string $revision The revision you want to restore to
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw($path, $revision) {
            return $this->send('files/restore', $path, new Options([Option::REVISION => $revision]));
        }
    }