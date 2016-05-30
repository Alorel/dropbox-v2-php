<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Exception;

    /**
     * Exception for when the API key is not provided
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class NoTokenException extends DropboxException {

        /**
         * NoTokenException constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         */
        function __construct() {
            parent::__construct('The API token must be set either via the constructor or the static setDefaultToken() '
                                . 'method',
                                self::NO_TOKEN);
        }
    }