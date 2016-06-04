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
    use Alorel\Dropbox\Test\NameGenerator;
    use Psr\Http\Message\ResponseInterface;

    class LongpollTest extends \PHPUnit_Framework_TestCase {
        use NameGenerator;

        private static $dir;

        static function setUpBeforeClass() {
            self::$dir = '/' . self::generatorPrefix();
            (new CreateFolder())->raw(self::$dir);
        }

        /** @large */
        function testShort() {
            $cursor = json_decode((new ListFolder(false))->raw(self::$dir)->getBody()->getContents(), true)['cursor'];
            $lp = (new Longpoll(true))->raw($cursor);

            (new Upload(false))->raw(self::genFileName(), '.');
            /** @var ResponseInterface $w8 */
            $w8 = $lp->wait(true);

            $rsp = json_decode($w8->getBody()->getContents(), true);

            $this->assertTrue($rsp['changes']);
        }

        /** @large */
        function testLong() {
            fwrite(STDOUT, PHP_EOL . 'Running ' . __METHOD__ . ' - this will take a while.' . PHP_EOL);
            $cursor = json_decode((new ListFolder(false))->raw(self::$dir)->getBody()->getContents(), true)['cursor'];
            $lp = (new Longpoll(true))->raw($cursor, (new LongpollOptions())->setTimeout(60));

            sleep(35); //Default timeout is 30s
            (new Upload(false))->raw(self::genFileName(), '.');
            /** @var ResponseInterface $w8 */
            $w8 = $lp->wait(true);

            $rsp = json_decode($w8->getBody()->getContents(), true);

            $this->assertTrue($rsp['changes']);
        }
    }
