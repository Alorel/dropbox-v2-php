<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * The maximum number of entries returned. The default for this field is 10.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait LimitTrait {

        /**
         * The maximum number of entries returned. The default for this field is 10.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param int $set The setting
         *
         * @return self
         */
        function setLimit($set) {
            $this[Option::LIMIT] = $set;

            return $this;
        }
    }