<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\OperationKind;

    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Options\Options;

    /**
     * Wrapper for RPC endpoints
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class RPCOperation extends AbstractOperation {

        /**
         * The hostname for these requests
         *
         * @var string
         */
        const HOST = 'api.dropboxapi.com';

        /**
         * Send the request
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string       $url     The URL to send to. This will be prepended with the HOST and API version
         * @param array|string $path    The paths involved. Will be a string for most operations or an array for
         *                              move/copy operations
         * @param Options|null $options Additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        protected function send($url, $path, Options $options = null) {
            $body = is_array($path) ? $path : [
                Option::PATH => $path
            ];
            if ($options) {
                $body = array_merge($body, $options->toArray());
            }

            return $this->sendAbstract(
                'POST',
                self::HOST . '/' . self::API_VERSION . '/' . $url,
                [
                    'headers' => ['Content-Type' => 'application/json'],
                    'body'    => json_encode($body)
                ]
            );
        }
    }