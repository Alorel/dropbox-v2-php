<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Files\UploadSession;

    use Alorel\Dropbox\OperationKind\ContentUploadAbstractOperation;
    use Alorel\Dropbox\Options\Builder\UploadSession\UploadSessionActiveOptions;

    /**
     * Upload sessions allow you to upload a single file using multiple requests. This call starts a new upload
     * session with the given data. You can then use upload_session/append to add more data and upload_session/finish
     * to save all the data to a file in Dropbox.
     * <br/><br/>
     * A single request should not upload more than 150 MB of file contents.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload_session-start
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload_session-append_v2
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload_session-finish
     * @see    Append
     * @see    Finish
     */
    class Start extends ContentUploadAbstractOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param UploadSessionActiveOptions|null $options Additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw(UploadSessionActiveOptions $options = null) {
            return $this->send('upload_session/start', null, null, $options);
        }
    }