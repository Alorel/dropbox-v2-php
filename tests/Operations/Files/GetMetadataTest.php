<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\GetMetadata;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\GetMetadataOptions;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\NameGenerator;

    class GetMetadataTest extends \PHPUnit_Framework_TestCase {

        use NameGenerator;

        function testGetMetadata() {
            $filename = self::genFileName();
            $dt = new \DateTime('2001-01-01');
            (new Upload())->raw($filename, __METHOD__, (new UploadOptions())->setClientModified($dt));
            $meta = json_decode(
                (new GetMetadata())->raw(
                    $filename,
                    (new GetMetadataOptions())->setIncludeHasExplicitSharedMembers(true)
                )->getBody()->getContents(),
                true
            );

            $this->assertEquals('file', $meta[R::DOT_TAG]);
            $this->assertEquals($filename, $meta[R::PATH_DISPLAY]);
            $this->assertEquals(strtolower($filename), $meta[R::PATH_LOWERCASE]);
            $this->assertEquals($dt->format(Options::DATETIME_FORMAT), $meta[R::CLIENT_MODIFIED]);
            $this->assertEquals(strlen(__METHOD__), $meta[R::SIZE]);
            $this->assertTrue(is_bool($meta[R::HAS_EXPLICIT_SHARED_MEMBERS]));
        }
    }
