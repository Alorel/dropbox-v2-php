<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Download;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Exception\ClientException;

    class DownloadTest extends \PHPUnit_Framework_TestCase {

        use NameGenerator;

        function testDownload() {
            $fn = self::genFileName();
            try {
                (new Upload())->raw($fn, fopen(__FILE__, 'r'));
                $r = (new Download())->raw($fn);

                $this->assertEquals(filesize(__FILE__), $r->getHeaderLine('content-length'));
                $this->assertEquals('application/octet-stream', $r->getHeaderLine('content-type'));
            } catch (ClientException $e) {
                d(json_decode($e->getResponse()->getBody(), true));
                die(1);
            }
        }

    }
