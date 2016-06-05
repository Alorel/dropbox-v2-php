<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * The starting index within the search results (used for paging). The default for this field is 0.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait StartTrait {

        /**
         * The starting index within the search results (used for paging). The default for this field is 0.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param int $start The start index
         *
         * @return self
         */
        function setStart(int $start) {
            $this[Option::START] = $start;

            return $this;
        }
    }