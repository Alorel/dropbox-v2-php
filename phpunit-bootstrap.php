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

    namespace Alorel\Dropbox\Test;

    if (getenv('APIKEY')) {
        define('DROPBOX_API_KEY', getenv('APIKEY'));
    } elseif (file_exists('API_KEY')) {
        if (is_readable('API_KEY')) {
            putenv('APIKEY=' . file_get_contents('API_KEY'));
        } else {
            trigger_error('The API_KEY file is not readable - do you have the right permissions?', E_USER_ERROR);
        }
    } else {
        trigger_error('Please refer to tests/README.md for instructions on how to run unit tests', E_USER_ERROR);
    }

    require_once 'vendor/autoload.php';

    class TestUtil {

        static function formatParameterArgs(array $args = []) {
            foreach ($args as $k => $v) {
                if ($v === null) {
                    unset($args[$k]);
                }
            }

            return $args;
        }
    }