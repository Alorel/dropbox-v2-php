<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * If true, current session will be closed. You cannot do upload_session/append any more to current session The
     * default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    \Alorel\Dropbox\Operation\Files\UploadSession\Append
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload_session-append_v2
     */
    trait CloseTrait {

        /**
         * If true, current session will be closed. You cannot do upload_session/append any more to current session The
         * default for this field is False.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $set The switch
         *
         * @return self
         */
        function setClose(bool $set) {
            $this[Option::CLOSE] = $set;

            return $this;
        }
    }