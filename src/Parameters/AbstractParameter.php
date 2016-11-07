<?php
    /**
     *    Copyright (c) Arturas Molcanovas <a.molcanovas@gmail.com> 2016.
     *    https://github.com/Alorel/dropbox-v2-php
     *
     *    Licensed under the Apache License, Version 2.0 (the "License");
     *    you may not use this file except in compliance with the License.
     *    You may obtain a copy of the License at
     *
     *        http://www.apache.org/licenses/LICENSE-2.0
     *
     *    Unless required by applicable law or agreed to in writing, software
     *    distributed under the License is distributed on an "AS IS" BASIS,
     *    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *    See the License for the specific language governing permissions and
     *    limitations under the License.
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Util;
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
            $this->args = Util::trimNulls($args);
        }

        /**
         * Sets an argument value
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $key   The argument
         * @param mixed  $value The value
         *
         * @return self
         */
        protected function setArg($key, $value) {
            if ($value !== null) {
                $this->args[$key] = $value;
            }

            return $this;
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
        public function jsonSerialize() {
            return $this->args;
        }

        /**
         * A shorthand for JSON-encoding parameters
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return string
         * @uses   json_encode()
         */
        public function __toString() {
            return json_encode($this);
        }
    }