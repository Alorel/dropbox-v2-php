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

    namespace Alorel\Dropbox\Operations\Users;

    use Alorel\Dropbox\Operation\Users\GetCurrentAccount;
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Test\DBTestCase;

    /**
     * @sleepTime  5
     * @retryCount 10
     */
    class GetCurrentAccountTest extends DBTestCase {

        function testGetCurrentAccount() {
            $i = json_decode((new GetCurrentAccount())->raw()->getBody()->getContents(), true);
            $this->assertTrue(is_string($i['account_id']));
            $this->assertTrue(is_array($i['name']));

            $this->assertTrue(is_string($i['name']['given_name']));
            $this->assertTrue(is_string($i['name']['surname']));
            $this->assertTrue(is_string($i['name']['familiar_name']));
            $this->assertTrue(is_string($i['name']['display_name']));

            $this->assertTrue(is_string($i['email']));
            $this->assertTrue(is_bool($i['email_verified']));
            $this->assertTrue(is_bool($i['disabled']));
            $this->assertTrue(is_string($i['country']));
            $this->assertTrue(is_string($i['locale']));
            $this->assertTrue(is_string($i['referral_link']));
            $this->assertTrue(is_bool($i['is_paired']));

            $this->assertTrue(is_array($i['account_type']));
            $this->assertTrue(is_string($i['account_type'][Option::DOT_TAG]));
        }
    }
