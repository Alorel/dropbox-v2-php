<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Files;

    use Alorel\Dropbox\OperationKind\ContentDownloadOperation;
    use Alorel\Dropbox\Options\Builder\GetThumbnailOptions;

    /**
     * Get the file's thumbnail
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-get_thumbnail
     */
    class GetThumbnail extends ContentDownloadOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                   $path Path to the file on Dropbox
         * @param GetThumbnailOptions|null $opts Additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw($path, GetThumbnailOptions $opts = null) {
            return $this->send('get_thumbnail', $path, $opts);
        }
    }