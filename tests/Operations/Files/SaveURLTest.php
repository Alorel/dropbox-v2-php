<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\SaveUrl\CheckJobStatus;
    use Alorel\Dropbox\Operation\Files\SaveUrl\SaveURL;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\NameGenerator;

    class SaveURLTest extends \PHPUnit_Framework_TestCase {
        use NameGenerator;

        const URL = 'https://raw.githubusercontent.com/Alorel/dropbox-v2-php/master/tests/Operations/Files/_lorem-ipsum.txt';

        private static $fn;

        static function setUpBeforeClass() {
            self::$fn = self::genFileName('php');
        }

        function assertResponse(array $r) {
            $this->assertEquals(self::$fn, $r['path_display']);
            $this->assertEquals(strtolower(self::$fn), $r['path_lower']);
            $this->assertEquals(filesize(__DIR__ . DIRECTORY_SEPARATOR . '_lorem-ipsum.txt'), $r['size']);
        }

        /** @large */
        function testTheThing() {
            $request = json_decode((new SaveURL())->raw(self::$fn, self::URL)->getBody()->getContents(), true);
            $check = new CheckJobStatus();

            $this->assertTrue(isset($request['complete']) || isset($request['async_job_id']));

            if (isset($request['complete'])) {
                $this->assertResponse($request);
            } else {
                do {
                    if (isset($s)) {
                        sleep(1);
                    }
                    $s = json_decode($check->raw($request['async_job_id'])->getBody()->getContents(), true);
                } while (isset($s[R::DOT_TAG]) && $s[R::DOT_TAG] == 'in_progress');

                $this->assertResponse($s);
            }
        }
    }
