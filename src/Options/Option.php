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

    namespace Alorel\Dropbox\Options;

    /**
     * Option names
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class Option {

        /**
         * Write mode
         *
         * @var string
         * @see \Alorel\Dropbox\Options\Builder\Mixins\WriteModeTrait
         */
        const MODE = 'mode';

        /**
         * Mute change notifications
         *
         * @var string
         * @see \Alorel\Dropbox\Options\Builder\Mixins\MuteTrait
         */
        const MUTE = 'mute';

        /**
         * File upload closing
         *
         * @var string
         * @see \Alorel\Dropbox\Options\Builder\Mixins\CloseTrait
         */
        const CLOSE = 'close';

        /**
         * Client modified timestamp
         *
         * @var string
         * @see \Alorel\Dropbox\Options\Builder\Mixins\ClientModifiedTrait
         */
        const CLIENT_MODIFIED = 'client_modified';

        /**
         * File renaming policy
         *
         * @var string
         * @see \Alorel\Dropbox\Options\Builder\Mixins\AutoRenameTrait
         */
        const AUTO_RENAME = 'autorename';
    }