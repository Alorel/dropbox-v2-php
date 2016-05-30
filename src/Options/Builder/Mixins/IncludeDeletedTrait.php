<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * If true, DeletedMetadata will be returned for deleted file or folder, otherwise LookupError.not_found will be
     * returned. The default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait IncludeDeletedTrait {

        /**
         * If true, DeletedMetadata will be returned for deleted file or folder, otherwise LookupError.not_found will
         * be returned. The default for this field is False.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $set The setting
         *
         * @return self
         */
        function setIncludeDeleted(bool $set) {
            $this[Option::INCLUDE_DELETED] = $set;

            return $this;
        }
    }