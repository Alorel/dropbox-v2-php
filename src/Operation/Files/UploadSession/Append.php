<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operation\Files\UploadSession;

    use Alorel\Dropbox\OperationKind\ContentUploadAbstractOperation;
    use Alorel\Dropbox\Options\Builder\UploadSession\UploadSessionActiveOptions;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Parameters\UploadSessionCursor;

    /**
     * Append more data to an upload session. When the parameter close is set, this call will close the session. A
     * single request should not upload more than 150 MB of file contents.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class Append extends ContentUploadAbstractOperation {

        /**
         * Perform the operation
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string|resource|\Psr\Http\Message\StreamInterface $data    The file contents. Can be a string, a fopen()
         * @param UploadSessionCursor                               $cursor  The upload session cursor
         * @param UploadSessionActiveOptions|null                   $options Additional operation options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function perform($data, UploadSessionCursor $cursor, UploadSessionActiveOptions $options = null) {
            return $this->send('upload_session/append_v2',
                               null,
                               $data,
                               Options::merge(
                                   $options,
                                   ['cursor' => $cursor]
                               ));
        }
    }