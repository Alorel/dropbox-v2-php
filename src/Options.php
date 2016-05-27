<?php

    namespace Alorel\Dropbox;

    abstract class Options {

        const DATETIME_FORMAT = 'Y-m-d\TH:i:s\Z';

        private $options = [];

        function setOption(string $key, $value) {
            $this->options[$key] = $value;

            return $this;
        }

        function getOptions():array {
            return $this->options;
        }
    }