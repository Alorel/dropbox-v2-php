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
     * Abstraction for content downloads
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ContentDownloadOperation extends AbstractOperation {

        /**
         * The host for this set of operations
         *
         * @var string
         */
        const HOST = 'content.dropboxapi.com';

        /**
         * Send our request
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string       $url  Endpoint URL
         * @param string       $path Path to the target
         * @param Options|null $opts Any additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function send(string $url, string $path, Options $opts = null) {
            $params = [
                Option::PATH => $path
            ];

            if ($opts) {
                $params = array_merge($params, $opts->toArray());
            }

            return $this->sendAbstract(
                'POST',
                self::HOST . '/' . self::API_VERSION . '/files/' . $url,
                ['headers' => ['Dropbox-API-Arg' => json_encode($params)]]
            );
        }
    }