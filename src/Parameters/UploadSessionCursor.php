<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Parameters;

    /**
     * Contains the upload session ID and the offset.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class UploadSessionCursor extends AbstractParameter {

        /**
         * UploadSessionCursor constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $sessionID The upload session ID (returned by upload_session/start).
         * @param int    $offset    The amount of data that has been uploaded so far. We use this to make sure upload
         *                          data isn't lost or duplicated in the event of a network error.
         */
        function __construct(string $sessionID, int $offset = 0) {
            parent::__construct([
                                    'session_id' => $sessionID,
                                    'offset'     => $offset
                                ]);
        }
    }