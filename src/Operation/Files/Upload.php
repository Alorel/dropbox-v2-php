<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Files;

    use Alorel\Dropbox\OperationKind\ContentUploadAbstractOperation;
    use Alorel\Dropbox\Options\Builder\UploadOptions;

    /**
     * Create a new file with the contents provided in the request. Do not use this to upload a file larger than
     * 150 MB. Instead, create an upload session with upload_session/start.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    \Alorel\Dropbox\Operation\Files\UploadSession\Start
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload
     */
    class Upload extends ContentUploadAbstractOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                                            $path    The path to upload the file to
         * @param string|resource|\Psr\Http\Message\StreamInterface $data    The file contents. Can be a string, a fopen()
         *                                                                   resource or an instance of StreamInterface
         * @param UploadOptions|null                                $options Any additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw($path, $data, UploadOptions $options = null) {
            return $this->send('upload', $path, $data, $options);
        }
    }