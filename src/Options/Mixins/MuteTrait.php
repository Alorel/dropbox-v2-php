<?php
    /**
     *    Copyright (c) Arturas Molcanovas <a.molcanovas@gmail.com> 2016.
     *    https://github.com/Alorel/dropbox-v2-php
     *
     *    Licensed under the Apache License, Version 2.0 (the "License");
     *    you may not use this file except in compliance with the License.
     *    You may obtain a copy of the License at
     *
     *        http://www.apache.org/licenses/LICENSE-2.0
     *
     *    Unless required by applicable law or agreed to in writing, software
     *    distributed under the License is distributed on an "AS IS" BASIS,
     *    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *    See the License for the specific language governing permissions and
     *    limitations under the License.
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
        public function setMute($set) {
            $this[Option::MUTE] = $set;

            return $this;
        }
    }