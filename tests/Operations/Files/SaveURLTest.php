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
    use Alorel\Dropbox\Test\TestUtil;

    class SaveURLTest extends \PHPUnit_Framework_TestCase {
        use NameGenerator;

        const URL = 'https://raw.githubusercontent.com/Alorel/dropbox-v2-php/support-56/tests/inc/lorem-ipsum.txt';

        private static $fn;

        static function setUpBeforeClass() {
            self::$fn = self::genFileName('php');
        }

        function assertResponse(array $r) {
            $this->assertEquals(self::$fn, $r['path_display']);
            $this->assertEquals(strtolower(self::$fn), $r['path_lower']);
            $this->assertEquals(filesize(TestUtil::INC_DIR . 'lorem-ipsum.txt'), $r['size']);
        }

        /** @large */
        function testTheThing() {
            $request = json_decode((new SaveURL())->raw(self::$fn, self::URL)->getBody()->getContents(), true);
            $check = new CheckJobStatus();
            sleep(1);

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

                if ($s[R::DOT_TAG] === 'complete') {
                    $this->assertResponse($s);
                } else {
                    TestUtil::err('Failed to SaveURL. self::$URL=' . self::URL);
                    d($s);
                }
            }
        }
    }
