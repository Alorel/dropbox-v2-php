<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\UploadSession\Append;
    use Alorel\Dropbox\Operation\Files\UploadSession\Finish;
    use Alorel\Dropbox\Operation\Files\UploadSession\Start;
    use Alorel\Dropbox\Parameters\CommitInfo;
    use Alorel\Dropbox\Parameters\UploadSessionCursor;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Exception\ClientException;

    class UploadSessionTest extends \PHPUnit_Framework_TestCase {
        use NameGenerator;

        function testUploadSession() {
            $chunks = [
                '123' => 0,
                '456' => 3,
                '789' => 6,
                '!'   => 9
            ];
            try {
                $sessionID = json_decode(
                                 (new Start())->raw()->getBody()->getContents(),
                                 true
                             )[R::SESSION_ID];

                $append = new Append();
                $lastOffset = $chunks[array_keys($chunks)[count($chunks) - 1]];
                $cursor = new UploadSessionCursor($sessionID);

                foreach ($chunks as $data => $offset) {
                    $cursor->setOffset($offset);
                    $filename = self::genFileName();
                    if ($offset == $lastOffset) {
                        $r = (new Finish())
                            ->raw(
                                $data,
                                $cursor,
                                new CommitInfo($filename)
                            );
                        $r = json_decode($r->getBody()->getContents(), true);

                        $this->assertEquals($filename, $r[R::PATH_DISPLAY]);
                        $this->assertEquals(strtolower($filename), $r[R::PATH_LOWERCASE]);
                        $this->assertEquals(10, $r[R::SIZE]);
                    } else {
                        $append->raw($data, $cursor);
                    }
                }
            } catch (ClientException $e) {
                d(json_decode($e->getResponse()->getBody(), true));
                die(1);
            }
        }
    }