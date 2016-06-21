<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\CopyReference\Get;
    use Alorel\Dropbox\Operation\Files\CopyReference\Save;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class CopyReferenceTest extends DBTestCase {
        use NameGenerator;

        /** @large */
        function testCopyReference() {
            $src = self::genFileName();
            (new Upload())->raw($src, __METHOD__);
            $dst = self::genFileName();

            $r1 = json_decode((new Get())->raw($src)->getBody()->getContents(), true);
            $copyRef = $r1[R::COPY_REFERENCE];

            $this->assertTrue(is_string($copyRef));

            $r2 = json_decode((new Save())->raw($dst, $r1[R::COPY_REFERENCE])->getBody()->getContents(), true);

            $this->assertEquals($r1[R::METADATA][R::SIZE], $r2[R::METADATA][R::SIZE]);
        }
    }