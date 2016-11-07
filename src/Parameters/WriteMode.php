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

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option as O;

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
     */
    class WriteMode extends AbstractParameter {

        /**
         * Used by {@link WriteMode::add()}
         *
         * @var string
         */
        const TAG_ADD = 'add';

        /**
         * Used by {@link WriteMode::overwrite()}
         *
         * @var string
         */
        const TAG_OVERWRITE = 'overwrite';

        /**
         * Used by {@link WriteMode::update()}
         *
         * @var string
         */
        const TAG_UPDATE = 'update';

        /**
         * WriteMode constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string      $tag The main write mode
         * @param string|null $rev The revision, if updating
         */
        protected function __construct($tag, $rev = null) {
            parent::__construct([
                                    O::DOT_TAG => $tag,
                                    O::UPDATE  => $rev
                                ]);
        }

        /**
         * Never overwrite the existing file. The autorename strategy is to append a number to the file name. For
         * example, "document.txt" might become "document (2).txt".
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @return self
         */
        public static function add() {
            return new self(static::TAG_ADD);
        }

        /**
         * Always overwrite the existing file. The autorename strategy is the same as it is for add.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        public static function overwrite() {
            return new self(static::TAG_OVERWRITE);
        }

        /**
         * Overwrite if the given "rev" matches the existing file's "rev". The autorename strategy is to append the
         * string "conflicted copy" to the file name. For example, "document.txt" might become "document (conflicted
         * copy).txt" or "document (Panda's conflicted copy).txt".
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $rev The "rev" from the description
         *
         * @return self
         */
        public static function update($rev) {
            return new self(static::TAG_UPDATE, $rev);
        }
    }