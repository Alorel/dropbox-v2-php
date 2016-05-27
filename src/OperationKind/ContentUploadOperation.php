<?php

    namespace Alorel\Dropbox\OperationKind;

    use Alorel\Dropbox\Operation;
    use Alorel\Dropbox\Options;

    /**
     * A wrapper for the ContentUpload group of operations
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#formats
     */
    abstract class ContentUploadOperation extends Operation {

        /**
         * The hostname for these operations
         *
         * @var string
         */
        const HOST = 'content.dropboxapi.com';

        /**
         * Send the request
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                                            $url  The URL to send to. This will be prepended
         *                                                                with the HOST and API version
         * @param string                                            $path The path to upload the file to
         * @param string|resource|\Psr\Http\Message\StreamInterface $body The file contents. Can be a string, a fopen()
         *                                                                resource or an instance of StreamInterface
         * @param Options|null                                      $opts Any additional, operation-specific options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         * @see    ContentUploadOperation::HOST
         * @see    Operation::API_VERSION
         */
        protected function send(string $url, string $path, $body, Options $opts = null) {
            return $this->sendAbstract('POST',
                                       self::HOST . '/' . self::API_VERSION . '/' . $url,
                                       [
                                           'headers' => [
                                               'Content-Type'    => 'application/octet-stream',
                                               'Dropbox-API-Arg' => json_encode(array_merge(
                                                                                    ['path' => $path],
                                                                                    $opts ? $opts->getOptions() : []
                                                                                ))
                                           ],
                                           'body'    => $body
                                       ]);
        }

    }