<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Files\SaveUrl;

    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Option;

    /**
     * Check the status of a save_url job.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-save_url-check_job_status
     */
    class CheckJobStatus extends RPCOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $jobID The asynchronous job ID
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw(string $jobID) {
            return $this->send('files/save_url/check_job_status',
                               [
                                   Option::ASYNC_JOB_ID => $jobID
                               ]);
        }
    }