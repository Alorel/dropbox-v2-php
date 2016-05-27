<?php

    namespace Alorel\Dropbox;

    use GuzzleHttp\Client;
    use League\OAuth2\Client\Provider\GenericProvider;

    abstract class Operation {

        /**
         * @var string
         */
        private $token;

        /**
         * @var callable
         */
        private $sendCallable;

        /**
         * @var GenericProvider
         */
        private static $provider;

        /**
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
                self::$provider = new GenericProvider();
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
         * @param string $url        The URL to call
         * @param array  $options    Request options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @see    \League\OAuth2\Client\Provider\AbstractProvider::getAuthenticatedRequest()
         */
        protected final function send(string $httpMethod, string $url, array $options = []) {
            return call_user_func(
                $this->sendCallable,
                self::$provider->getAuthenticatedRequest($httpMethod, $url, $this->token, $options)
            );
        }
    }