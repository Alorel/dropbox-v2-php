<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Users;

    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\OperationKind\RPCOperation;

    /**
     * Get information about the current user's account.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class GetCurrentAccount extends AbstractOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw() {
            return $this->sendAbstract(
                'POST',
                RPCOperation::HOST . '/' . self::API_VERSION . '/users/get_current_account'
            );
        }
    }