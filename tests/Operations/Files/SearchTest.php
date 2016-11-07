<?php
    /**
     *    Copyright (c) Arturas Molcanovas <a.molcanovas@gmail.com> 2016.
     *    https://github.com/Alorel/dropbox-v2-php
     *
     *    Licensed under the Apache License, Version 2.0 (the "License");
     *    you may not use this file except in compliance with the License.
     *    You may obtain a copy of the License at
     *
     *        http://www.apache.org/licenses/LICENSE-2.0
     *
     *    Unless required by applicable law or agreed to in writing, software
     *    distributed under the License is distributed on an "AS IS" BASIS,
     *    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *    See the License for the specific language governing permissions and
     *    limitations under the License.
     */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\Search;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\SearchOptions as SO;
    use Alorel\Dropbox\Parameters\SearchMode;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Promise\PromiseInterface;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class SearchTest extends DBTestCase {
        use NameGenerator;

        private static $dir;

        /** @var  Search */
        private static $s;

        const NUM_FILES = 4;

        const PREFIX = 'foo';

        private static $deletedFname;

        static function setUpBeforeClass() {
            //Create a file name just so the cleanup can trigger
            self::genFileName();

            // Set up reusable objects
            self::$dir = '/' . self::generatorPrefix();
            self::$s = new Search();

            for ($i = 0; $i < 10; $i++) {
                try {
                    /** @var PromiseInterface[] $promises */
                    $promises = [];
                    $up = new Upload(true);

                    for ($i = 1; $i <= self::NUM_FILES; $i++) {
                        $promises[] = $up->raw(self::$dir . '/' . self::PREFIX . '-' . $i . '.txt', '.');
                    }

                    self::$deletedFname = self::PREFIX . '-' . $i . '.txt';

                    $promises[] = $up->raw(self::$dir . '/' . self::$deletedFname, '.');

                    foreach ($promises as $p) {
                        $p->wait();
                    }

                    (new Delete())->raw(self::$dir . '/' . self::$deletedFname);

                    return;
                } catch (\Exception $e) {
                    sleep(5);
                }
            }
        }

        private static function getResults(SO $opts = null) {
            return json_decode(self::$s->raw('foo', self::$dir, $opts)->getBody()->getContents(), true);
        }

        function testSearchAll() {
            $r = self::getResults();

            $this->assertEquals(self::NUM_FILES, count($r['matches']));
            $this->assertEquals(self::NUM_FILES, $r['start']);
            $this->assertFalse($r['more']);
        }

        function testMaxResultsAndStart() {
            $r = self::getResults((new SO())->setMaxResults(2)->setStart(1));

            $this->assertEquals(2, count($r['matches']));
            $this->assertEquals(3, $r['start']);
            $this->assertTrue($r['more']);
        }

        function testDeleted() {
            $r = self::getResults((new SO())->setSearchMode(SearchMode::deletedFilename()));

            $this->assertEquals(1, count($r['matches']));
            $this->assertEquals(1, $r['start']);
            $this->assertFalse($r['more']);

            $match = $r['matches'][0];
            $this->assertEquals('filename', $match['match_type']['.tag']);

            $match = $match['metadata'];
            $pathDisplay = self::$dir . '/' . self::$deletedFname;

            $this->assertEquals('deleted', $match['.tag']);
            $this->assertEquals($pathDisplay, $match['path_display']);
            $this->assertEquals(strtolower($pathDisplay), $match['path_lower']);
        }
    }
