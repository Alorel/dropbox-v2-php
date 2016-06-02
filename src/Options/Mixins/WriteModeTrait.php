<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Parameters\WriteMode;

    /**
     * Selects what to do if the file already exists. The default for this union is add.
     * <br/><br/>
     * Your intent when writing a file to some path. This is used to determine what constitutes a conflict and what the
     * autorename strategy is.
     * <br/><br/>
     * In some situations, the conflict behavior is identical:
     * <ol>
     * <li>If the target path doesn't contain anything, the file is always written; no conflict.</li>
     * <li>If the target path contains a folder, it's always a conflict.</li>
     * <li>If the target path contains a file with identical contents, nothing gets written; no conflict</li>
     * </ol>
     * The conflict checking differs in the case where there's a file at the target path with contents different from
     * the contents you're trying to write
     *
     * @author  Art <a.molcanovas@gmail.com>
     */
    trait WriteModeTrait {

        /**
         * Selects what to do if the file already exists. The default for this union is add.
         * <br/><br/>
         * Your intent when writing a file to some path. This is used to determine what constitutes a conflict and what the
         * autorename strategy is.
         * <br/><br/>
         * In some situations, the conflict behavior is identical:
         * <ol>
         * <li>If the target path doesn't contain anything, the file is always written; no conflict.</li>
         * <li>If the target path contains a folder, it's always a conflict.</li>
         * <li>If the target path contains a file with identical contents, nothing gets written; no conflict</li>
         * </ol>
         * The conflict checking differs in the case where there's a file at the target path with contents different from
         * the contents you're trying to write
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param WriteMode $set The write mode
         *
         * @return self
         */
        function setWriteMode(WriteMode $set) {
            $this[Option::MODE] = $set;

            return $this;
        }
    }