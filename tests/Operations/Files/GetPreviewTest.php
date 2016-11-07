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
    use Alorel\Dropbox\Operation\Files\GetPreview;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;
    use Alorel\Dropbox\Test\TestUtil;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class GetPreviewTest extends DBTestCase {

        use NameGenerator;

        function testGetPreview() {
            $filename = self::genFileName('docx');
            try {
                (new Upload())->raw($filename, fopen(TestUtil::INC_DIR . 'forPreview.docx', 'r'));
                $response = (new GetPreview())->raw($filename);

                $this->assertNotFalse(array_search($response->getHeaderLine('content-type'),
                                                   TestUtil::$PREVIEW_CONTENT_TYPES,
                                                   true));
            } finally {
                try {
                    (new Delete())->raw($filename);
                } catch (\Exception $e) {
                    fwrite(STDERR, $e->getMessage());
                }
            }
        }
    }
