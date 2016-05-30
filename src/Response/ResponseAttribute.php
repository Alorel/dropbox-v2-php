<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Response;

    /**
     * Response attributes
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ResponseAttribute {

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