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
         * @see \Alorel\Dropbox\Options\Builder\Mixins\WriteModeTrait
         */
        const MODE = 'mode';

        /**
         * Mute change notifications
         *
         * @var string
         * @see \Alorel\Dropbox\Options\Builder\Mixins\MuteTrait
         */
        const MUTE = 'mute';

        /**
         * File upload closing
         *
         * @var string
         * @see \Alorel\Dropbox\Options\Builder\Mixins\CloseTrait
         */
        const CLOSE = 'close';

        /**
         * Client modified timestamp
         *
         * @var string
         * @see \Alorel\Dropbox\Options\Builder\Mixins\ClientModifiedTrait
         */
        const CLIENT_MODIFIED = 'client_modified';

        /**
         * File renaming policy
         *
         * @var string
         * @see \Alorel\Dropbox\Options\Builder\Mixins\AutoRenameTrait
         */
        const AUTO_RENAME = 'autorename';
    }