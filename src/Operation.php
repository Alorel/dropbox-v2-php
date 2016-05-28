<?php
    /**
     * The MIT License (MIT)
     *
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     *
     * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
     * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
     * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit
     * persons to whom the Software is furnished to do so, subject to the following conditions:
     *
     * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
     * Software.
     *
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT
     * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
     * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
     * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
     * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
     */

    namespace Alorel\Dropbox;

    use GuzzleHttp\Client;
    use League\OAuth2\Client\Provider\GenericProvider;

    /**
     * The most abstract operation wrapper
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    abstract class Operation {

        /**
         * Dropbox API version
         *
         * @var int
         */
        const API_VERSION = 2;

        /**
         * The access token
         *
         * @var string
         */
        private $token;

        /**
         * Method to call when sending requests. This will be either send or sendAsync.
         *
         * @var callable
         * @see Client::send()
         * @see Client::sendAsync()
         */
        private $sendCallable;

        /**
         * The oAuth2 provider for request generation
         *
         * @var GenericProvider
         */
        private static $provider;

        /**
         * The client that will send requests
         *
         * @var Client
         */
        private static $client;

        /**
         * Operation constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $accessToken Our access token
         * @param bool   $async       Whether requests should be asynchronous
         */
        function __construct(string $accessToken, bool $async = false) {
            $this->token = $accessToken;

            if (!self::$provider) {
                $opts = [
                    'urlAuthorize'            => 'https://www.dropbox.com/1/oauth2/authorize',
                    'urlAccessToken'          => 'https://api.dropboxapi.com/1/oauth2/token',
                    'urlResourceOwnerDetails' => null

                ];
                self::$provider = new GenericProvider($opts);
            }

            if (!self::$client) {
                self::$client = new Client();
            }

            $this->sendCallable = [self::$client, $async ? 'sendAsync' : 'send'];
        }

        /**
         * Return our token
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return string
         */
        protected final function getToken():string {
            return $this->token;
        }

        /**
         * Send our request
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $httpMethod The HTTP method to use (GET, POST etc)
         * @param string $url        The URL to call. This is automatically prepended with https:// in this method
         * @param array  $options    Request options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @see    \League\OAuth2\Client\Provider\AbstractProvider::getAuthenticatedRequest()
         * @throws \GuzzleHttp\Exception\ClientException
         */
        protected final function sendAbstract(string $httpMethod, string $url, array $options = []) {
            return call_user_func(
                $this->sendCallable,
                self::$provider->getAuthenticatedRequest($httpMethod, 'https://' . $url, $this->token, $options)
            );
        }
    }