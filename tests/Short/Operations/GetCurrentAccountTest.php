<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operations\Users;

    use Alorel\Dropbox\Operation\Users\GetCurrentAccount;
    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Exception\ClientException;

    class GetCurrentAccountTest extends DBTestCase {

        function testGetCurrentAccount() {
            try {
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
            } catch (ClientException $e) {
                TestUtil::decodeClientException($e);
                die(1);
            }
        }
    }
