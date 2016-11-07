<?php
    /**
     *    Copyright (c) Arturas Molcanovas <a.molcanovas@gmail.com> 2016.
     *    https://github.com/Alorel/dropbox-v2-php
     *
     *    Licensed under the Apache License, Version 2.0 (the "License");
     *    you may not use this file except in compliance with the License.
     *    You may obtain a copy of the License at
     *
     *        http://www.apache.org/licenses/LICENSE-2.0
     *
     *    Unless required by applicable law or agreed to in writing, software
     *    distributed under the License is distributed on an "AS IS" BASIS,
     *    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *    See the License for the specific language governing permissions and
     *    limitations under the License.
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option as O;

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
        public function __construct($sessionID, $offset = 0) {
            parent::__construct([
                                    O::SESSION_ID => $sessionID,
                                    O::OFFSET     => $offset
                                ]);
        }

        /**
         * Sets the cursor offset
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param int $offset The offset
         *
         * @return self
         */
        public function setOffset($offset) {
            return $this->setArg(O::OFFSET, $offset);
        }
    }