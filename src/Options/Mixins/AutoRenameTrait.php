<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * If there's a conflict, as determined by mode, have the Dropbox server try to autorename the file to avoid
     * conflict. The default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait AutoRenameTrait {

        /**
         * If there's a conflict, as determined by mode, have the Dropbox server try to autorename the file to avoid
         * conflict. The default for this field is False.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $set The setting
         *
         * @return self
         */
        function setAutoRename($set) {
            $this[Option::AUTO_RENAME] = $set;

            return $this;
        }
    }