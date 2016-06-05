<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Options\Options;
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

        /** @dataProvider thumbnailFormat */
        function testThumbnailFormat(string $format) {
            $expect = [
                '.tag' => $format
            ];
            $this->factoryAbstraction(ThumbnailFormat::class, $format, [], $expect);
        }

        function thumbnailFormat() {
            yield 'jpeg' => ['jpeg'];
            yield 'png' => ['png'];
        }

        /** @dataProvider thumbnailSize */
        function testThumbnailSize(int $width, int $height) {
            $method = 'w' . $width . 'h' . $height;
            $expect = ['.tag' => $method];
            $this->factoryAbstraction(ThumbnailSize::class, $method, [], $expect);
        }

        function thumbnailSize() {
            yield '32x32' => [32, 32];
            yield  '64x64' => [64, 64];
            yield  '128x128' => [128, 128];
            yield  '640x480' => [640, 480];
            yield  '1024x768' => [1024, 768];
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
            yield WriteMode::TAG_ADD => [WriteMode::TAG_ADD];
            yield WriteMode::TAG_OVERWRITE => [WriteMode::TAG_OVERWRITE];
            yield WriteMode::TAG_UPDATE => [WriteMode::TAG_UPDATE, __CLASS__];
        }

        /** @dataProvider searchMode */
        function testSearchMode(string $method, string $value) {

            $this->factoryAbstraction(SearchMode::class,
                                      $method,
                                      [],
                                      [
                                          Option::DOT_TAG => $value
                                      ]);
        }

        function searchMode() {
            yield 'filename' => ['filename', SearchMode::TAG_FILENAME];
            yield 'filenameAndContent' => ['filenameAndContent', SearchMode::TAG_FILENAME_AND_CONTENT];
            yield 'deletedFilename' => ['deletedFilename', SearchMode::DELETED_FILENAME];
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
            yield   'Both set' => [PHP_INT_MAX];
            yield   'No offset' => [];
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

            yield 'AllParamsSet' => [
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
            ];
            yield 'SomeParamsSet' => [
                [
                    'path'       => __CLASS__,
                    'mode'       => WriteMode::overwrite(),
                    'autorename' => false,
                    'mute'       => true
                ],
                WriteMode::overwrite(),
                false,
                true
            ];
        }
    }
