<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options;

    /**
     * Option names
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class Option {

        /**
         * Session cursor
         *
         * @var string
         */
        const CURSOR = 'cursor';

        /**
         * Session commit information
         *
         * @var string
         */
        const COMMIT_INFO = 'commit';

        /**
         * Write mode
         *
         * @var string
         */
        const MODE = 'mode';

        /**
         * Mute change notifications
         *
         * @var string
         */
        const MUTE = 'mute';

        /**
         * File upload closing
         *
         * @var string
         */
        const CLOSE = 'close';

        /**
         * Client modified timestamp
         *
         * @var string
         */
        const CLIENT_MODIFIED = 'client_modified';

        /**
         * File renaming policy
         *
         * @var string
         */
        const AUTO_RENAME = 'autorename';

        /**
         * Whether to include deleted entries
         *
         * @var string
         */
        const INCLUDE_DELETED = 'include_deleted';

        /**
         * Whether to include media info
         *
         * @var string
         */
        const INCLUDE_MEDIA_INFO = 'include_media_info';

        /**
         * Whether to include the "has_explicit_shared_members" flag
         *
         * @var string
         */
        const INCLUDE_HAS_EXPLICIT_SHARED_MEMBERS = 'include_has_explicit_shared_members';

        /**
         * The main target path
         *
         * @var string
         */
        const PATH = 'path';

        /**
         * The source path
         *
         * @var string
         */
        const PATH_SRC = 'from_path';

        /**
         * Destination path
         *
         * @var string
         */
        const PATH_DEST = 'to_path';

        /**
         * The upload session ID
         *
         * @var string
         */
        const SESSION_ID = 'session_id';

        /**
         * The session offset
         *
         * @var string
         */
        const OFFSET = 'offset';

        /**
         * Tags
         *
         * @var string
         */
        const DOT_TAG = '.tag';

        /**
         * Update revision
         *
         * @var string
         */
        const UPDATE = 'update';
    }