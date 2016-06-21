<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\GetTemporaryLink;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class GetTemporaryLinkTest extends DBTestCase {

        use NameGenerator;

        private static $n;

        const CONTENTS = __CLASS__;

        static function setUpBeforeClass() {
            for ($i = 0; $i < 20; $i++) {
                try {
                    self::$n = self::genFileName();
                    (new Upload())->raw(self::$n, self::CONTENTS);

                    return;
                } catch (\Exception $e) {
                    fwrite(STDERR, PHP_EOL . $e->getMessage());
                    sleep(3);
                }
            }
        }

        function testTempLink() {
            $r = json_decode((new GetTemporaryLink())->raw(self::$n)->getBody()->getContents(), true);
            sleep(1);

            $this->assertTrue(is_string($r['link']));
            $this->assertEquals(self::CONTENTS, file_get_contents($r['link']));
        }
    }
