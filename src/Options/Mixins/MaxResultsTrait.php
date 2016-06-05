<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * The maximum number of search results to return. The default for this field is 100.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait MaxResultsTrait {

        /**
         * The maximum number of search results to return. The default for this field is 100.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param int $set The max number of results
         *
         * @return self
         */
        function setMaxResults(int $set) {
            $this[Option::MAX_RESULTS] = $set;

            return $this;
        }
    }