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
    use Alorel\Dropbox\Parameters\WriteMode;

    /**
     * Selects what to do if the file already exists. The default for this union is add.
     * <br/><br/>
     * Your intent when writing a file to some path. This is used to determine what constitutes a conflict and what the
     * autorename strategy is.
     * <br/><br/>
     * In some situations, the conflict behavior is identical:
     * <ol>
     * <li>If the target path doesn't contain anything, the file is always written; no conflict.</li>
     * <li>If the target path contains a folder, it's always a conflict.</li>
     * <li>If the target path contains a file with identical contents, nothing gets written; no conflict</li>
     * </ol>
     * The conflict checking differs in the case where there's a file at the target path with contents different from
     * the contents you're trying to write
     *
     * @author  Art <a.molcanovas@gmail.com>
     */
    trait WriteModeTrait {

        /**
         * Selects what to do if the file already exists. The default for this union is add.
         * <br/><br/>
         * Your intent when writing a file to some path. This is used to determine what constitutes a conflict and what the
         * autorename strategy is.
         * <br/><br/>
         * In some situations, the conflict behavior is identical:
         * <ol>
         * <li>If the target path doesn't contain anything, the file is always written; no conflict.</li>
         * <li>If the target path contains a folder, it's always a conflict.</li>
         * <li>If the target path contains a file with identical contents, nothing gets written; no conflict</li>
         * </ol>
         * The conflict checking differs in the case where there's a file at the target path with contents different from
         * the contents you're trying to write
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param WriteMode $set The write mode
         *
         * @return self
         */
        public function setWriteMode(WriteMode $set) {
            $this[Option::MODE] = $set;

            return $this;
        }
    }