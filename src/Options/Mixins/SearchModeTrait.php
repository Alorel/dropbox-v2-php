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
    use Alorel\Dropbox\Parameters\SearchMode;

    /**
     * The search mode (filename, filename_and_content, or deleted_filename). Note that searching file content is
     * only available for Dropbox Business accounts. The default for this union is filename.
     *
     * @author  Art <a.molcanovas@gmail.com>
     */
    trait SearchModeTrait {

        /**
         * The search mode (filename, filename_and_content, or deleted_filename). Note that searching file content is
         * only available for Dropbox Business accounts. The default for this union is filename.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param SearchMode $set The search mode
         *
         * @return self
         */
        public function setSearchMode(SearchMode $set) {
            $this[Option::MODE] = $set;

            return $this;
        }
    }