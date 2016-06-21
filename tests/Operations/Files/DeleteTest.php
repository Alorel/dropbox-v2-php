<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
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
