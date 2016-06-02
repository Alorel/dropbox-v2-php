<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Parameters\ThumbnailSize;

    /**
     * The size for the thumbnail image. The default for this union is w64h64.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait ThumbnailSizeTrait {

        /**
         * The size for the thumbnail image. The default for this union is w64h64.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param ThumbnailSize $size The size
         *
         * @return self
         */
        function setThumbnailSize(ThumbnailSize $size) {
            $this[Option::SIZE] = $size;

            return $this;
        }
    }