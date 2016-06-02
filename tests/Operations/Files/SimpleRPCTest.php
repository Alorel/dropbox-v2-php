<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operations\Files;

    use Alorel\Dropbox\Operation\Files\Copy;
    use Alorel\Dropbox\Operation\Files\CopyReference\Get;
    use Alorel\Dropbox\Operation\Files\CopyReference\Save;
    use Alorel\Dropbox\Operation\Files\CreateFolder;
    use Alorel\Dropbox\Operation\Files\Delete;
    use Alorel\Dropbox\Operation\Files\Download;
    use Alorel\Dropbox\Operation\Files\GetMetadata;
    use Alorel\Dropbox\Operation\Files\GetPreview;
    use Alorel\Dropbox\Operation\Files\Move;
    use Alorel\Dropbox\Operation\Files\PermanentlyDelete;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\OperationKind\SingleArgumentRPCOperation;
    use Alorel\Dropbox\Options\Builder\GetMetadataOptions;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\NameGenerator;
    use GuzzleHttp\Exception\ClientException;
    use GuzzleHttp\Exception\ServerException;

    class SimpleRPCTest extends \PHPUnit_Framework_TestCase {

        use NameGenerator;

        function testGetMetadata() {
            $filename = self::genFileName();
            $dt = new \DateTime('2001-01-01');
            (new Upload())->raw($filename, __METHOD__, (new UploadOptions())->setClientModified($dt));
            $meta = json_decode(
                (new GetMetadata())->raw(
                    $filename,
                    (new GetMetadataOptions())->setIncludeHasExplicitSharedMembers(true)
                )->getBody()->getContents(),
                true
            );

            $this->assertEquals('file', $meta[R::DOT_TAG]);
            $this->assertEquals($filename, $meta[R::PATH_DISPLAY]);
            $this->assertEquals(strtolower($filename), $meta[R::PATH_LOWERCASE]);
            $this->assertEquals($dt->format(Options::DATETIME_FORMAT), $meta[R::CLIENT_MODIFIED]);
            $this->assertEquals(strlen(__METHOD__), $meta[R::SIZE]);
            $this->assertTrue(is_bool($meta[R::HAS_EXPLICIT_SHARED_MEMBERS]));
        }

        function testDownload() {
            $fn = self::genFileName();
            (new Upload())->raw($fn, fopen(__FILE__, 'r'));
            $r = (new Download())->raw($fn);

            $this->assertEquals(filesize(__FILE__), $r->getHeaderLine('content-length'));
            $this->assertEquals('application/octet-stream', $r->getHeaderLine('content-type'));
        }

        function testGetPreview() {
            $filename = '/' . md5(__METHOD__) . '.docx';
            try {
                (new Upload())->raw($filename, fopen(__DIR__ . DIRECTORY_SEPARATOR . 'forPreview.docx', 'r'));
                $response = (new GetPreview())->raw($filename);

                $this->assertEquals('application/octet-stream', $response->getHeaderLine('content-type'));
            } finally {
                try {
                    (new Delete())->raw($filename);
                } catch (\Exception $e) {
                    fwrite(STDERR, $e->getMessage());
                }
            }
        }

        function testCreateFolder() {
            $srcFile = '/' . md5(__CLASS__ . __METHOD__);

            try {
                (new CreateFolder())->raw($srcFile);
                $ae = json_decode((new GetMetadata())->raw($srcFile)->getBody()->getContents(), true)[R::DOT_TAG];
                $this->assertEquals('folder', $ae);
            } finally {
                try {
                    (new Delete())->raw($srcFile);
                } catch (ClientException $e) {

                }
            }

        }

        function testCopyReference() {
            $srcFile = self::genFileName();
            (new Upload())->raw($srcFile, __METHOD__);
            try {
                $ref = json_decode((new Get())->raw($srcFile)->getBody()->getContents(), true)[R::COPY_REFERENCE];

                $this->assertEquals(
                    strlen(__METHOD__),
                    json_decode(
                        (new Save())->raw(self::genFileName(), $ref)->getBody()->getContents(),
                        true
                    )[R::METADATA][R::SIZE]
                );
            } catch (ServerException $e) {
                // This copy_reference API endpoints seem to throw exceptions
                fwrite(STDERR, PHP_EOL . '(beyond my control) ' . $e->getMessage() . PHP_EOL);
            }
        }

        function testCopy() {
            $src = self::genFileName();
            $dest = self::genFileName();
            $meta = new GetMetadata();

            (new Upload())->raw($src, __METHOD__);
            (new Copy())->raw($src, $dest);

            $this->assertEquals(
                json_decode($meta->raw($src)->getBody()->getContents(), true)[R::SIZE],
                json_decode($meta->raw($dest)->getBody()->getContents(), true)[R::SIZE]
            );
        }

        function testMove() {
            $src = self::genFileName();
            $dest = self::genFileName();
            $meta = new GetMetadata();

            $srcSize = json_decode((new Upload())->raw($src, __METHOD__)->getBody()->getContents(), true)[R::SIZE];
            (new Move())->raw($src, $dest);

            $this->assertEquals($srcSize, json_decode($meta->raw($dest)->getBody()->getContents(), true)[R::SIZE]);

            $this->expectException(ClientException::class);
            $this->expectExceptionCode(409);
            $meta->raw($src);
        }

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
            return [
                Delete::class            => [Delete::class],
                PermanentlyDelete::class => [PermanentlyDelete::class]
            ];
        }
    }
