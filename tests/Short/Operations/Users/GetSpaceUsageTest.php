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

    namespace Alorel\Dropbox\Short\Operations\Users;

    use Alorel\Dropbox\Operation\Users\GetSpaceUsage;
    use Alorel\Dropbox\Test\DBTestCase;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class GetSpaceUsageTest extends DBTestCase {

        function testGetSpaceUsage() {
            $r = json_decode((new GetSpaceUsage())->raw()->getBody()->getContents(), true);

            $this->assertTrue(isset($r['used']));
            $this->assertTrue(isset($r['allocation']));
            $this->assertTrue(is_numeric($r['used']));
        }
    }
