<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\CreateFolder;
    use Alorel\Dropbox\Operation\Files\ListFolder\ListFolder;
    use Alorel\Dropbox\Operation\Files\ListFolder\Longpoll;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\LongpollOptions;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Exception\ClientException;
    use Psr\Http\Message\ResponseInterface;

    class LongpollTest extends DBTestCase {
        use NameGenerator;

        private static $dir;

        static function setUpBeforeClass() {
            self::$dir = '/' . self::generatorPrefix();
            try {
                (new CreateFolder())->raw(self::$dir);
            } catch (ClientException $e) {
                TestUtil::decodeClientException($e);
                die(1);
            }
        }

        /** @large */
        function testShort() {
            try {
                $cursor =
                    json_decode((new ListFolder(false))->raw(self::$dir)->getBody()->getContents(), true)['cursor'];
                $lp = (new Longpoll(true))->raw($cursor);

                (new Upload(false))->raw(self::genFileName(), '.');
                /** @var ResponseInterface $w8 */
                $w8 = $lp->wait(true);

                $rsp = json_decode($w8->getBody()->getContents(), true);

                $this->assertTrue($rsp['changes']);
            } catch (ClientException $e) {
                TestUtil::decodeClientException($e);
                die(1);
            }
        }

        /** @large */
        function testLong() {
            try {
                $cursor =
                    json_decode((new ListFolder(false))->raw(self::$dir)->getBody()->getContents(), true)['cursor'];
                TestUtil::out('Running ' . __METHOD__ . ' - this will take a while.');
                $lp = (new Longpoll(true))->raw($cursor, (new LongpollOptions())->setTimeout(60));

                sleep(31); //Default timeout is 30s
                (new Upload(false))->raw(self::genFileName(), '.');
                /** @var ResponseInterface $w8 */
                $w8 = $lp->wait(true);

                $rsp = json_decode($w8->getBody()->getContents(), true);

                $this->assertTrue($rsp['changes']);
            } catch (ClientException $e) {
                TestUtil::decodeClientException($e);
                die(1);
            }
        }
    }
