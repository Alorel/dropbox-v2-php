<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option as O;
    use ReflectionClass;

    /**
     * The format for the thumbnail image, jpeg (default) or png. For images that are photos, jpeg should be
     * preferred, while png is better for screenshots and digital arts. The default for this union is jpeg.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ThumbnailFormat extends AbstractParameter {

        /**
         * Dot jpg
         *
         * @var string
         */
        const JPEG = 'jpeg';

        /**
         * dot png
         *
         * @var string
         */
        const PNG = 'png';

        /**
         * ImageFormat constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $format Image format
         */
        protected function __construct($format) {
            parent::__construct([O::DOT_TAG => $format]);
        }

        /**
         * Set the image format to JPEG
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function jpeg() {
            return new self(static::JPEG);
        }

        /**
         * Set the image format to PNG
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        static function png() {
            return new self(static::PNG);
        }

        /**
         * Return the available formats
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return array
         */
        static function availableFormats() {
            return (new ReflectionClass(ThumbnailFormat::class))->getConstants();
        }
    }