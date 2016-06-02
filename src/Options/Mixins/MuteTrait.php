<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * Normally, users are made aware of any file modifications in their Dropbox account via notifications in the
     * client software. If true, this tells the clients that this modification shouldn't result in a user
     * notification. The default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
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
            $this[Option::MUTE] = $set;

            return $this;
        }
    }