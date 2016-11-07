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
     * What we're searching for<br/><br/>
     * Note: Recent changes may not immediately be reflected in search results due to a short delay in indexing.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-search
     */
    class SearchMode extends AbstractParameter {

        /**
         * Search only existing file names
         *
         * @var string
         */
        const TAG_FILENAME = 'filename';

        /**
         * Search file names and their contents
         *
         * @var string
         */
        const TAG_FILENAME_AND_CONTENT = 'filename_and_content';

        /**
         * Deleted file names
         *
         * @var string
         */
        const DELETED_FILENAME = 'deleted_filename';

        /**
         * SearchMode constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $tag The search mode
         */
        protected function __construct($tag) {
            parent::__construct([O::DOT_TAG => $tag]);
        }

        /**
         * Search file and folder names.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return SearchMode
         */
        public static function filename() {
            return new self(self::TAG_FILENAME);
        }

        /**
         * Search file and folder names as well as file contents.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return SearchMode
         */
        public static function filenameAndContent() {
            return new self(self::TAG_FILENAME_AND_CONTENT);
        }

        /**
         * Search for deleted file and folder names.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return SearchMode
         */
        public static function deletedFilename() {
            return new self(self::DELETED_FILENAME);
        }
    }