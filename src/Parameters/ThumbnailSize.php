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

    use Alorel\Dropbox\Options\Option;
    use ReflectionClass;

    /**
     * The size for the thumbnail image. The default for this union is 64x64.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ThumbnailSize extends AbstractParameter {

        /**
         * ThumbnailSize constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param int $width  Thumbnail width
         * @param int $height Thumbnail height
         */
        public function __construct($width, $height) {
            parent::__construct([Option::DOT_TAG => 'w' . $width . 'h' . $height]);
        }

        /**
         * Make the size 32 pixels wide, 32 pixels height
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        public static function w32h32() {
            return new self(32, 32);
        }

        /**
         * Make the size 64 pixels wide, 64 pixels high
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        public static function w64h64() {
            return new self(64, 64);
        }

        /**
         * Make the size 128 pixels wide, 128 pixels high
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        public static function w128h128() {
            return new self(128, 128);
        }

        /**
         * Make the size 640 pixels wide, 480 pixels high
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        public static function w640h480() {
            return new self(640, 480);
        }

        /**
         * Make the size 1024 pixels wide, 768 pixels high
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        public static function w1024h768() {
            return new self(1024, 768);
        }

        /**
         * Return a list ov available thumbnail sizes
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return array
         */
        public static function availableSizes() {
            $r = [];
            foreach ((new ReflectionClass(ThumbnailSize::class))->getMethods() as $m) {
                if (preg_match('~^w[0-9]+h[0-9]+$~', $m->getName())) {
                    $r[] = $m->getName();
                }
            };

            return $r;
        }
    }