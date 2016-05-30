<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * If true, FileMetadata.media_info is set for photo and video. The default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait IncludeMediaInfoTrait {

        /**
         * If true, FileMetadata.media_info is set for photo and video. The default for this field is False.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $set The setting
         *
         * @return self
         */
        function setIncludeMediaInfo(bool $set) {
            $this[Option::INCLUDE_MEDIA_INFO] = $set;

            return $this;
        }
    }