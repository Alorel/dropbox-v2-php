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
    use Alorel\Dropbox\Operation\Files\GetMetadata;
    use Alorel\Dropbox\Operation\Files\PermanentlyDelete;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\OperationKind\SingleArgumentRPCOperation;
    use Alorel\Dropbox\Options\Builder\GetMetadataOptions;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Exception\ClientException;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class DeleteTest extends DBTestCase {

        use NameGenerator;

        /** @dataProvider providerDelete */
        function testDelete($class) {
            $filename = self::genFileName();
            (new Upload())->raw($filename, '.');
            $options = (new GetMetadataOptions())->setIncludeDeleted(true);
            $meta = new GetMetadata();

            $this->assertEquals('file',
                                json_decode(
                                    $meta->raw($filename, $options)->getBody()->getContents(),
                                    true
                                )[R::DOT_TAG]);

            /** @var SingleArgumentRPCOperation $obj */
            $obj = new $class();
            if ($class === Delete::class) {
                $obj->raw($filename);
                $this->assertEquals('deleted',
                                    json_decode(
                                        $meta->raw($filename, $options)->getBody()->getContents(),
                                        true
                                    )[R::DOT_TAG]);
            } else {
                try {
                    $obj->raw($filename);

                    $this->expectException(ClientException::class);
                    $this->expectExceptionCode(409);
                    $meta->raw($filename, $options)->getBody()->getContents();
                } catch (ClientException $e) {
                    $class = (new \ReflectionClass($class))->getShortName();
                    fwrite(STDERR,
                           PHP_EOL . 'Failed to ' . $class . ' (most likely due to API permissions): '
                           . $e->getMessage() . PHP_EOL);
                }
            }
        }

        function providerDelete() {
            yield Delete::class => [Delete::class];
            yield PermanentlyDelete::class => [PermanentlyDelete::class];
        }
    }
