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
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Exception\ClientException;

    class GetTemporaryLinkTest extends DBTestCase {

        use NameGenerator;

        private static $n;

        const CONTENTS = __CLASS__;

        static function setUpBeforeClass() {
            self::$n = self::genFileName();
            try {
                (new Upload())->raw(self::$n, self::CONTENTS);
            } catch (ClientException $e) {
                TestUtil::decodeClientException($e);
                die(1);
            }
        }

        function testTempLink() {
            try {
                $r = json_decode((new GetTemporaryLink())->raw(self::$n)->getBody()->getContents(), true);
                sleep(1);

                $this->assertTrue(is_string($r['link']));
                $this->assertEquals(self::CONTENTS, file_get_contents($r['link']));
            } catch (ClientException $e) {
                TestUtil::decodeClientException($e);
                die(1);
            }
        }
    }
