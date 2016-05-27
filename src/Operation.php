<?php

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