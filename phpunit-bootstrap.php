<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Test;

    use Alorel\Dropbox\Operation\AbstractOperation;

    if (!getenv('APIKEY')) {
        if (file_exists('API_KEY')) {
            if (is_readable('API_KEY')) {
                putenv('APIKEY=' . file_get_contents('API_KEY'));
            } else {
                trigger_error('The API_KEY file is not readable - do you have the right permissions?', E_USER_ERROR);
            }
        } else {
            trigger_error('Please refer to tests/README.md for instructions on how to run unit tests', E_USER_ERROR);
        }
    }

    require_once 'vendor/autoload.php';

    AbstractOperation::setDefaultAsync(false);
    AbstractOperation::setDefaultToken(getenv('APIKEY'));

    class TestUtil {

        private static $generatedNames = [];

        public static $key;

        static function formatParameterArgs(array $args = []) {
            foreach ($args as $k => $v) {
                if ($v === null) {
                    unset($args[$k]);
                }
            }

            return $args;
        }

        static function setPropertyValue($object, string $prop, $value) {
            $class = self::parseObjectArg($object);
            $prop = $class->getProperty($prop);
            $prop->setAccessible(true);

            $prop->setValue($object, $value);
        }

        private static function parseObjectArg(&$object) {
            if (is_string($object)) {
                $class = new \ReflectionClass($object);
                $object = null;
            } else {
                $class = new \ReflectionClass(get_class($object));
            }

            return $class;
        }

        static function getPropertyValue($object, string $prop) {
            $class = self::parseObjectArg($object);

            $prop = $class->getProperty($prop);
            $prop->setAccessible(true);

            return $prop->getValue($object);
        }

        static function invokeMethod($object, string $method, ...$args) {
            $class = self::parseObjectArg($object);

            $meth = $class->getMethod($method);
            $meth->setAccessible(true);

            return $meth->invokeArgs($object, $args);
        }

        static function genFileName(string $prefix = '', array &$storeTo = null) {
            do {
                $name = '/' . $prefix . md5(uniqid(__CLASS__, true) . mt_rand(PHP_INT_MIN, PHP_INT_MAX)) . '.txt';
            } while (array_search($name, self::$generatedNames) !== false);

            self::$generatedNames[] = $name;

            if ($storeTo !== null) {
                $storeTo[] = $name;
            }

            return $name;
        }

        static function releaseName(string ...$names) {
            foreach ($names as $name) {
                unset(self::$generatedNames[$name]);
            }
        }
    }