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

    use Alorel\Dropbox\Util;

    /**
     * Abstract options wrapper
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class Options {

        /**
         * A Dropbox-friendly timestamp wrapper
         *
         * @var string
         */
        const DATETIME_FORMAT = 'Y-m-d\TH:i:s\Z';

        /**
         * The generated options
         *
         * @var array
         */
        private $options;

        /**
         * Options constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param array $defaults Default options
         */
        function __construct(array $defaults = []) {
            $this->options = Util::trimNulls($defaults);
        }

        /**
         * Create an Options object from a combination of configuration arrays and other option objects
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param array ...$options The items to merge
         *
         * @return Options
         */
        static function merge(...$options):self {
            $o = [];

            foreach ($options as $opt) {
                if (is_array($opt)) {
                    $o = array_merge($o, $opt);
                }
                if ($opt instanceof Options) {
                    $o = array_merge($o, $opt->getOptions());
                }
            }

            return new self(Util::trimNulls($o));
        }

        /**
         * Return the generated options
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return array
         */
        function getOptions():array {
            return $this->options;
        }

        /**
         * Set an option
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $key   Option key
         * @param mixed  $value Option value
         *
         * @return self
         */
        function setOption(string $key, $value) {
            $this->options[$key] = $value;

            return $this;
        }
    }