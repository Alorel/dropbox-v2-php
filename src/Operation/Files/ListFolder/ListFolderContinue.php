<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operation\Files\ListFolder;

    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\OperationKind\RPCOperation;

    /**
     * Once a cursor has been retrieved from list_folder, use this to paginate through all files and retrieve updates
     * to the folder.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder-continue
     */
    class ListFolderContinue extends AbstractOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $cursor The cursor returned by {@link ListFolder}
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw(string $cursor) {
            return $this->sendAbstract(
                'POST',
                RPCOperation::HOST . '/' . self::API_VERSION . '/files/list_folder/continue',
                [
                    'headers' => ['Content-Type' => 'application/json'],
                    'body'    => json_encode(['cursor' => $cursor])
                ]
            );
        }
    }