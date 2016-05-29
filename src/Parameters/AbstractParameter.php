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

    namespace Alorel\Dropbox\Parameters;

    use JsonSerializable;

    /**
     * Topmost abstract parameter class
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    abstract class AbstractParameter implements JsonSerializable {

        /**
         * Parameter arguments
         *
         * @var array
         */
        private $args;

        /**
         * AbstractParameter constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param array $args Arguments to set
         */
        protected function __construct(array $args = []) {
            foreach ($args as $k => $v) {
                if ($v === null) {
                    unset($args[$k]);
                }
            }
            $this->args = $args;
        }

        /**
         * Specify data which should be serialized to JSON
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @see    http://php.net/manual/en/jsonserializable.jsonserialize.php
         * @return array data which can be serialized by <b>json_encode</b>, which is a value of any type other than
         * a resource.
         */
        function jsonSerialize() {
            return $this->args;
        }

        /**
         * A shorthand for JSON-encoding parameters
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return string
         * @uses   json_encode()
         */
        function __toString() {
            return json_encode($this);
        }
    }