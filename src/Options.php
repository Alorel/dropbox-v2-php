<?php

    namespace Alorel\Dropbox;

    /**
     * Abstract options wrapper
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    abstract class Options {

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
        private $options = [];

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

        /**
         * Return the generated options
         *
         * @author Art <a.molcanovas@gmail.com>
         * @return array
         */
        function getOptions():array {
            return $this->options;
        }
    }