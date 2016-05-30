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
    }