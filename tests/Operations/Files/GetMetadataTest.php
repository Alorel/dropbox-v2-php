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

    use Alorel\Dropbox\Operation\Files\GetMetadata;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\GetMetadataOptions;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Options\Options;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class GetMetadataTest extends DBTestCase {

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
    }
