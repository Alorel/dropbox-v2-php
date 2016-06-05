<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\OperationKind;

    use Alorel\Dropbox\Operation\Files\CopyReference\Get;
    use Alorel\Dropbox\Operation\Files\CreateFolder;
    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\GetPreview;
    use Alorel\Dropbox\Operation\Files\GetTemporaryLink;
    use Alorel\Dropbox\Operation\Files\PermanentlyDelete;

    /**
     * A subtype of RPC that only accepts a single argument
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class SingleArgumentRPCOperation extends RPCOperation {

        /**
         * Class to URL mapping
         *
         * @var string[]
         */
        private static $map = [
            Delete::class            => 'files/delete',
            PermanentlyDelete::class => 'files/permanently_delete',
            Get::class               => 'files/copy_reference/get',
            CreateFolder::class      => 'files/create_folder',
            GetPreview::class        => 'files/get_preview',
            GetTemporaryLink::class  => 'files/get_temporary_link'
        ];

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $path The path operate on
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw(string $path) {
            return $this->send(self::$map[get_class($this)], $path);
        }
    }