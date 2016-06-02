<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Parameters\ThumbnailFormat;

    /**
     * The format for the thumbnail image, jpeg (default) or png. For images that are photos, jpeg should be preferred,
     * while png is better for screenshots and digital arts. The default for this union is jpeg.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait ThumbnailFormatTrait {

        /**
         * The format for the thumbnail image, jpeg (default) or png. For images that are photos, jpeg should be preferred,
         * while png is better for screenshots and digital arts. The default for this union is jpeg.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param ThumbnailFormat $format The format
         *
         * @return self
         */
        function setThumbnailFormat(ThumbnailFormat $format) {
            $this[Option::FORMAT] = $format;

            return $this;
        }
    }