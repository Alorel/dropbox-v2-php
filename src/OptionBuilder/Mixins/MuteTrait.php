<?php

    namespace Alorel\Dropbox\OptionBuilder\Mixins;

    /**
     * Normally, users are made aware of any file modifications in their Dropbox account via notifications in the
     * client software. If true, this tells the clients that this modification shouldn't result in a user
     * notification. The default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @method $this setOption(string $key, $value)
     */
    trait MuteTrait {

        /**
         * Normally, users are made aware of any file modifications in their Dropbox account via notifications in the
         * client software. If true, this tells the clients that this modification shouldn't result in a user
         * notification. The default for this field is False.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $set The setting
         *
         * @return self
         */
        function setMute(bool $set) {
            return $this->setOption('mute', $set);
        }
    }