<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
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
        function setSearchMode(SearchMode $set) {
            $this[Option::MODE] = $set;

            return $this;
        }
    }