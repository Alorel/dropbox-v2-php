<?php

    namespace Alorel\Dropbox\Operation;

    use Alorel\Dropbox\OperationKind\ContentUploadOperation;
    use Alorel\Dropbox\OptionBuilder\UploadOptions;
    use Alorel\Dropbox\OptionBuilder\UploadSession\StartOptions;

    /**
     * Upload-based operations
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class Upload extends ContentUploadOperation {

        /**
         * Create a new file with the contents provided in the request. Do not use this to upload a file larger than
         * 150 MB. Instead, create an upload session with upload_session/start.
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
        function upload(string $path, $data, UploadOptions $options = null) {
            return $this->send('files/upload', $path, $data, $options);
        }

        /**
         * @param string            $path
         * @param                   $data
         * @param StartOptions|null $options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function sessionStart(string $path, $data, StartOptions $options = null) {
            return $this->send('files/upload_session/start', $path, $data, $options);
        }
    }