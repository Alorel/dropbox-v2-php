<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * If true, the operation will apply to all subfolders, too. The default value is false.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait RecursiveTrait {

        /**
         * If true, the operation will apply to all subfolders, too. The default value is false.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $set The setting
         *
         * @return self
         */
        function setRecursive($set) {
            $this[Option::RECURSIVE] = $set;

            return $this;
        }
    }