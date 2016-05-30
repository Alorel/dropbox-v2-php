<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * If true, the results will include a flag for each file indicating whether or not that file has any explicit
     * members. The default for this field is False.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait IncludeHasExplicitSharedMembersTrait {

        /**
         * If true, the results will include a flag for each file indicating whether or not that file has any explicit
         * members. The default for this field is False.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param bool $set The setting
         *
         * @return self
         */
        function setIncludeHasExplicitSharedMembers(bool $set) {
            $this[Option::INCLUDE_HAS_EXPLICIT_SHARED_MEMBERS] = $set;

            return $this;
        }
    }