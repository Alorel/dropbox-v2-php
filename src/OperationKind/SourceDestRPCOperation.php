<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\OperationKind;

    use Alorel\Dropbox\Operation\Files\Copy;
    use Alorel\Dropbox\Operation\Files\Move;
    use Alorel\Dropbox\Options\Option as O;

    /**
     * A subtype of RPC that only needs a source path and a destination path
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class SourceDestRPCOperation extends RPCOperation {

        /**
         * Class to URL mapping
         *
         * @var string[]
         */
        private static $map = [
            Move::class => 'files/move',
            Copy::class => 'files/copy'
        ];

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $from The source path
         * @param string $to   The destination path
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw($from, $to) {
            return $this->send(self::$map[get_class($this)],
                               [
                                   O::PATH_SRC  => $from,
                                   O::PATH_DEST => $to
                               ]);
        }
    }