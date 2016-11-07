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

    use Alorel\Dropbox\Operation\Files\CopyReference\Get;
    use Alorel\Dropbox\Operation\Files\CopyReference\Save;
    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Response\ResponseAttribute as R;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\NameGenerator;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class CopyReferenceTest extends DBTestCase {
        use NameGenerator;

        /** @large */
        function testCopyReference() {
            $src = self::genFileName();
            (new Upload())->raw($src, __METHOD__);
            $dst = self::genFileName();

            $r1 = json_decode((new Get())->raw($src)->getBody()->getContents(), true);
            $copyRef = $r1[R::COPY_REFERENCE];

            $this->assertTrue(is_string($copyRef));

            $r2 = json_decode((new Save())->raw($dst, $r1[R::COPY_REFERENCE])->getBody()->getContents(), true);

            $this->assertEquals($r1[R::METADATA][R::SIZE], $r2[R::METADATA][R::SIZE]);
        }
    }