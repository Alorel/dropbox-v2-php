<?php

    namespace Alorel\Dropbox\Operation\Files;

    use Alorel\Dropbox\OperationKind\ContentUploadOperation;
    use Alorel\Dropbox\OptionBuilder\UploadOptions;

    /**
     * Create a new file with the contents provided in the request. Do not use this to upload a file larger than
     * 150 MB. Instead, create an upload session with upload_session/start.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    \Alorel\Dropbox\Operation\Files\UploadSession\Start
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload
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
        function perform(string $path, $data, UploadOptions $options = null) {
            return $this->send('files/upload', $path, $data, $options);
        }
    }