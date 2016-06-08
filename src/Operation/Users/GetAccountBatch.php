<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Users;

    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Option;

    /**
     *Get information about multiple user accounts. At most 300 accounts may be queried per request.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#users-get_account_batch
     */
    class GetAccountBatch extends RPCOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string[] $accountIDs The ID of the account we're grabbing. Unlike with {@link GetAccount}, you need to include the "dbid:" prefix with this method
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw(...$accountIDs) {

            return $this->send('users/get_account_batch',
                               [
                                   Option::ACCOUNT_IDS => $accountIDs
                               ]);
        }
    }