<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Download;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Exception\ClientException;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class DownloadTest extends DBTestCase {

        use NameGenerator;

        function testDownload() {
            $fn = self::genFileName();
            try {
                (new Upload())->raw($fn, fopen(__FILE__, 'r'));
                $r = (new Download())->raw($fn);

                $this->assertEquals(filesize(__FILE__), $r->getHeaderLine('content-length'));
                $this->assertEquals('application/octet-stream', $r->getHeaderLine('content-type'));
            } catch (ClientException $e) {
                TestUtil::decodeClientException($e);
                die(1);
            }
        }

    }
