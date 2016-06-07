<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\CreateFolder;
    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\GetMetadata;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use GuzzleHttp\Exception\ClientException;

    class CreateFolderTest extends \PHPUnit_Framework_TestCase {
        function testCreateFolder() {
            $srcFile = '/' . md5(__CLASS__ . __METHOD__);
            $die = false;

            try {
                (new CreateFolder())->raw($srcFile);
                $ae = json_decode((new GetMetadata())->raw($srcFile)->getBody()->getContents(), true)[R::DOT_TAG];
                $this->assertEquals('folder', $ae);
            } catch (ClientException $e) {
                d(json_decode($e->getResponse()->getBody(), true));
                $die = true;
            } finally {
                try {
                    (new Delete())->raw($srcFile);
                } catch (ClientException $e) {

                }
                if ($die) {
                    die(1);
                }
            }
        }
    }
