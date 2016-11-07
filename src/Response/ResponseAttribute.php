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

    namespace Alorel\Dropbox\Response;

    /**
     * Response attributes
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    abstract class ResponseAttribute {

        /**
         * A copy reference
         *
         * @var string
         */
        const COPY_REFERENCE = 'copy_reference';

        /**
         * Metadata
         *
         * @var string
         */
        const METADATA = 'metadata';

        /**
         * A tag
         *
         * @var string
         */
        const DOT_TAG = '.tag';

        /**
         * The display path
         *
         * @var string
         */
        const PATH_DISPLAY = 'path_display';

        /**
         * The lowercase path
         *
         * @var string
         */
        const PATH_LOWERCASE = 'path_lower';

        /**
         * The client modified timestamp
         *
         * @var string
         */
        const CLIENT_MODIFIED = 'client_modified';

        /**
         * The item size
         *
         * @var string
         */
        const SIZE = 'size';

        /**
         * Whether the item has explicit shared members
         *
         * @var string
         */
        const HAS_EXPLICIT_SHARED_MEMBERS = 'has_explicit_shared_members';

        /**
         * The session ID
         *
         * @var string
         */
        const SESSION_ID = 'session_id';
    }