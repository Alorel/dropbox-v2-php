<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operation;

    use Alorel\Dropbox\Exception\NoTokenException;
    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\Request;

    /**
     * The most abstract operation wrapper
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    abstract class AbstractOperation {

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
         * The client that will send requests
         *
         * @var \GuzzleHttp\Client
         */
        private static $client;

        /**
         * The default access token to use across requests
         *
         * @var string
         */
        private static $defaultToken = null;

        /**
         * The default behaviour - sync or async
         *
         * @var bool
         */
        private static $defaultAsync = false;

        /**
         * Whether we're operating in async mode
         *
         * @var bool
         */
        private $async;

        /**
         * Operation constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool   $async       Whether requests should be asynchronous
         * @param string $accessToken Our access token
         *
         * @throws NoTokenException If $accessToken is not provided and the {@link AbstractOperation::$defaultToken default token} hasn't been set via {@link AbstractOperation::setDefaultToken() setDefaultToken()}
         */
        function __construct($async = null, string $accessToken = null) {
            $this->token = $accessToken ?? self::$defaultToken;
            if (!$this->token) {
                throw new NoTokenException();
            }

            if (!self::$client) {
                self::$client = new Client();
            }

            $this->setAsync((bool)($async ?? self::$defaultAsync));
        }

        /**
         * Sets the default token to use with the constructor
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $token The token
         */
        static final function setDefaultToken(string $token) {
            self::$defaultToken = $token;
        }

        /**
         * Returns the Guzzle callable
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return callable
         */
        protected function getSendCallable() {
            return $this->sendCallable;
        }

        /**
         * Return whether we're operating in async mode
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return boolean
         */
        public function isAsync():bool {
            return $this->async;
        }

        /**
         * Sets the sync/async operation mode
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $async true to perform operations in async mode, false to perform them in sync
         *
         * @return self
         */
        public final function setAsync(bool $async) {
            $this->async = $async;
            $this->sendCallable = [self::$client, $this->async ? 'sendAsync' : 'send'];

            return $this;
        }

        /**
         * Sets the default $async value for the constructor
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $async The default async value
         */
        static final function setDefaultAsync(bool $async) {
            self::$defaultAsync = $async;
        }

        /**
         * Return our token
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return string
         */
        protected function getToken():string {
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
                new Request(
                    $httpMethod,
                    'https://' . $url,
                    array_merge(
                        ['authorization' => 'Bearer ' . $this->token],
                        $options['headers'] ?? []
                    ),
                    $options['body'] ?? null)
            );
        }
    }