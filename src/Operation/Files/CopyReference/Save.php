<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Files\CopyReference;

    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Option as O;
    use Alorel\Dropbox\Options\Options;

    /**
     * Save a copy reference returned by copy_reference/get to the user's Dropbox.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-copy_reference-save
     */
    class Save extends RPCOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $destPath      Path in the user's Dropbox that is the destination.
         * @param string $copyReference A copy reference returned by copy_reference/get.
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw($destPath, $copyReference) {
            return $this->send('files/copy_reference/save',
                               $destPath,
                               new Options([O::COPY_REFERENCE => $copyReference]));
        }
    }