<?php
    /**
     * The MIT License (MIT)
     *
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     *
     * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
     * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
     * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit
     * persons to whom the Software is furnished to do so, subject to the following conditions:
     *
     * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
     * Software.
     *
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT
     * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
     * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
     * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
     * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
     */

    namespace Alorel\Dropbox\OptionBuilder\Mixins;

    /**
     * Your intent when writing a file to some path. This is used to determine what constitutes a conflict and what the
     * autorename strategy is.
     * <br/><br/>
     * In some situations, the conflict behavior is identical: (a) If the target path doesn't
     * contain anything, the file is always written; no conflict. (b) If the target path contains a folder, it's always
     * a conflict. (c) If the target path contains a file with identical contents, nothing gets written; no conflict.
     * <br/><br/>
     * The conflict checking differs in the case where there's a file at the target path with contents different from
     * the contents you're trying to write
     *
     * @author  Art <a.molcanovas@gmail.com>
     * @method $this setOption(string $key, $value)
     */
    trait WriteModeTrait {

        /**
         * Never overwrite the existing file. The autorename strategy is to append a number to the file name. For
         * example, "document.txt" might become "document (2).txt".
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return self
         */
        function setWriteModeAdd() {
            return $this->setOption('mode', ['.tag' => 'add']);
        }

        /**
         * Always overwrite the existing file. The autorename strategy is the same as it is for add.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @return self
         */
        function setWriteModeOverwrite() {
            return $this->setOption('mode', ['.tag' => 'overwrite']);
        }

        /**
         * Overwrite if the given "rev" matches the existing file's "rev". The autorename strategy is to append the
         * string "conflicted copy" to the file name. For example, "document.txt" might become "document (conflicted
         * copy).txt" or "document (Panda's conflicted copy).txt".
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $rev The "rev"
         *
         * @return string
         */
        function setWriteModeUpdate(string $rev):string {
            return $this->setOption('mode',
                                    [
                                        '.tag' => 'update',
                                        'rev'  => $rev
                                    ]);
        }
    }