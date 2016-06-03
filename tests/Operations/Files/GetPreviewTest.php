<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\GetPreview;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Test\NameGenerator;

    class GetPreviewTest extends \PHPUnit_Framework_TestCase {

        use NameGenerator;

        function testGetPreview() {
            $filename = self::genFileName('docx');
            try {
                (new Upload())->raw($filename, fopen(__DIR__ . DIRECTORY_SEPARATOR . '_forPreview.docx', 'r'));
                $response = (new GetPreview())->raw($filename);

                $this->assertEquals('application/octet-stream', $response->getHeaderLine('content-type'));
            } finally {
                try {
                    (new Delete())->raw($filename);
                } catch (\Exception $e) {
                    fwrite(STDERR, $e->getMessage());
                }
            }
        }
    }
