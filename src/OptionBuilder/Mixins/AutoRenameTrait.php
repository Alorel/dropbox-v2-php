<?php

    namespace Alorel\Dropbox\OptionBuilder\Mixins;

    /**
     * If there's a conflict, as determined by mode, have the Dropbox server try to autorename the file to avoid
     * conflict. The default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @method $this setOption(string $key, $value)
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
        function setAutoRename(bool $set) {
            return $this->setOption('autorename', $set);
        }
    }