<?php
    /**
 * The MIT License (MIT)
 *
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated 
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the 
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit 
 * persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT 
 * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, 
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options;
    use Alorel\Dropbox\Test\TestUtil;

    class ParametersTest extends \PHPUnit_Framework_TestCase {

        protected function constructedAbstraction(string $class, array $args, array $expectedArray) {
            $this->abstraction(new $class(...$args), $expectedArray);
        }

        protected function factoryAbstraction(string $class, string $method, array $args, array $expectedArray) {
            $this->abstraction(call_user_func_array("$class::$method", $args), $expectedArray);
        }

        protected function abstraction(AbstractParameter $c, array $expectedArray) {
            $j = $c->jsonSerialize();
            $expect = TestUtil::formatParameterArgs($expectedArray);
            $json = json_encode($expect);

            $this->assertEquals($expect, $j);
            $this->assertEquals($json, json_encode($j));
            $this->assertEquals($json, (string)$c);
        }

        /** @dataProvider writeMode */
        function testWriteMode(string $tag, string $rev = null) {
            $expect = [
                '.tag' => $tag
            ];
            if ($rev) {
                $expect['update'] = $rev;
            }

            $this->factoryAbstraction(WriteMode::class, $tag, $rev ? [$rev] : [], $expect);
        }

        function writeMode() {
            return [
                [WriteMode::TAG_ADD],
                [WriteMode::TAG_OVERWRITE],
                [WriteMode::TAG_UPDATE, __CLASS__]
            ];
        }

        /** @dataProvider uploadSessionCursor */
        function testUploadSessionCursor(int $offset = 0) {
            $expect = [
                'session_id' => __METHOD__,
                'offset'     => $offset
            ];
            $this->constructedAbstraction(UploadSessionCursor::class, [__METHOD__, $offset], $expect);
        }

        function uploadSessionCursor() {
            return [
                'Both set'  => [PHP_INT_MAX],
                'No offset' => []
            ];
        }

        /** @dataProvider commitInfo */
        function testCommitInfo(array $expectedArray,
                                WriteMode $writeMode = null,
                                bool $autorename = false,
                                bool $mute = false,
                                \DateTimeInterface $clientModified = null) {
            $this->constructedAbstraction(CommitInfo::class,
                                          [
                                              __CLASS__,
                                              $writeMode,
                                              $autorename,
                                              $mute,
                                              $clientModified
                                          ],
                                          $expectedArray);
        }

        function commitInfo() {
            $dt = new \DateTime();

            return [
                'AllParamsSet'  => [
                    [
                        'path'            => __CLASS__,
                        'mode'            => WriteMode::add(),
                        'autorename'      => true,
                        'client_modified' => $dt->format(Options::DATETIME_FORMAT),
                        'mute'            => true
                    ],
                    WriteMode::add(),
                    true,
                    true,
                    $dt
                ],
                'SomeParamsSet' => [
                    [
                        'path'       => __CLASS__,
                        'mode'       => WriteMode::overwrite(),
                        'autorename' => false,
                        'mute'       => true
                    ],
                    WriteMode::overwrite(),
                    false,
                    true
                ]
            ];
        }
    }
