<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
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
        protected function __construct(string $tag) {
            parent::__construct([O::DOT_TAG => $tag]);
        }

        /**
         * Search file and folder names.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return SearchMode
         */
        static function filename():self {
            return new self(self::TAG_FILENAME);
        }

        /**
         * Search file and folder names as well as file contents.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return SearchMode
         */
        static function filenameAndContent():self {
            return new self(self::TAG_FILENAME_AND_CONTENT);
        }

        /**
         * Search for deleted file and folder names.
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return SearchMode
         */
        static function deletedFilename():self {
            return new self(self::DELETED_FILENAME);
        }
    }