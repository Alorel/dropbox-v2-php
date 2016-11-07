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
        public static function jpeg() {
            return new self(static::JPEG);
        }

        /**
         * Set the image format to PNG
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        public static function png() {
            return new self(static::PNG);
        }

        /**
         * Return the available formats
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return array
         */
        public static function availableFormats() {
            return (new ReflectionClass(ThumbnailFormat::class))->getConstants();
        }
    }