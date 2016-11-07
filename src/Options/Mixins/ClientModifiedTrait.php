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
    use Alorel\Dropbox\Options\Options;
    use DateTimeInterface;

    /**
     * The value to store as the client_modified timestamp. Dropbox automatically records the time at which the file
     * was written to the Dropbox servers. It can also record an additional timestamp, provided by Dropbox desktop
     * clients, mobile clients, and API apps of when the file was actually created or modified
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait ClientModifiedTrait {

        /**
         * The value to store as the client_modified timestamp. Dropbox automatically records the time at which the
         * file was written to the Dropbox servers. It can also record an additional timestamp, provided by Dropbox
         * desktop clients, mobile clients, and API apps of when the file was actually created or modified.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param DateTimeInterface $set The setting
         *
         * @return self
         */
        public function setClientModified(DateTimeInterface $set) {
            $this[Option::CLIENT_MODIFIED] = $set->format(Options::DATETIME_FORMAT);

            return $this;
        }
    }