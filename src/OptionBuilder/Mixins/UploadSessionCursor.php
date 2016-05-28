<?php

    namespace Alorel\Dropbox\OptionBuilder\Mixins;

    /**
     * Set the upload session ID and the offset.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @method $this setOption(string $key, $value)
     */
    trait UploadSessionCursor {

        /**
         * Set the upload session ID and the offset.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $sessionID The session ID
         * @param int    $offset    Our upload offset
         *
         * @return self
         */
        function setUploadCursor(string $sessionID, int $offset) {
            return $this->setOption('cursor',
                                    [
                                        'session_id' => $sessionID,
                                        'offset'     => $offset
                                    ]);
        }
    }