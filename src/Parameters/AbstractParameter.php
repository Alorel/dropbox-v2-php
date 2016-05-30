<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
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