<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operation\Files\ListFolder;

    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Options\Builder\LongpollOptions;
    use Alorel\Dropbox\Options\Option as O;
    use GuzzleHttp\Psr7\Request;

    /**
     * A longpoll endpoint to wait for changes on an account. In conjunction with list_folder/continue, this call
     * gives you a low-latency way to monitor an account for file changes. The connection will block until there are
     * changes available or a timeout occurs. This endpoint is useful mostly for client-side apps.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder-longpoll
     */
    class Longpoll extends AbstractOperation {

        /**
         * The host for this operation
         *
         * @var string
         */
        const HOST = 'notify.dropboxapi.com';

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string          $cursor The cursor returned by {@link ListFolder}
         * @param LongpollOptions $opts   Additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw(string $cursor, LongpollOptions $opts = null) {
            $body = [O::CURSOR => $cursor];
            if ($opts) {
                $body = array_merge($body, $opts->toArray());
            }

            return call_user_func(
                $this->getSendCallable(),
                new Request(
                    'POST',
                    'https://' . self::HOST . '/' . self::API_VERSION . '/files/list_folder/longpoll',
                    ['Content-Type' => 'application/json'],
                    json_encode($body)
                )
            );
        }
    }