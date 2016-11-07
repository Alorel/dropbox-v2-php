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

    /**
     * Created by PhpStorm.
     * User: Art
     * Date: 03/06/2016
     * Time: 23:26
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * A timeout in seconds. The request will block for at most this length of time, plus up to 90 seconds of random
     * jitter added to avoid the thundering herd problem. Care should be taken when using this parameter, as some
     * network infrastructure does not support long timeouts. The default for this field is 30.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait TimeoutTrait {

        /**
         * A timeout in seconds. The request will block for at most this length of time, plus up to 90 seconds of random
         * jitter added to avoid the thundering herd problem. Care should be taken when using this parameter, as some
         * network infrastructure does not support long timeouts. The default for this field is 30.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param int $timeout The timeout
         *
         * @return self
         */
        public function setTimeout($timeout) {
            $this[Option::TIMEOUT] = $timeout;

            return $this;
        }
    }