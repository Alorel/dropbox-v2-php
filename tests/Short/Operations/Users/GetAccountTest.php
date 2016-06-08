<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Short\Operations\Users;

    use Alorel\Dropbox\Operation\Users\GetAccount;
    use Alorel\Dropbox\Operation\Users\GetCurrentAccount;
    use Alorel\Dropbox\Test\DBTestCase;
    use Alorel\Dropbox\Test\TestUtil;
    use GuzzleHttp\Exception\ClientException;

    class GetAccountTest extends DBTestCase {

        private static $existing;

        private static $getAccount;

        static function setUpBeforeClass() {
            try {
                self::$existing = json_decode((new GetCurrentAccount())->raw()->getBody()->getContents(), true);
                self::$getAccount = json_decode(
                    (new GetAccount())->raw(self::$existing['account_id'])->getBody()->getContents(),
                    true
                );
            } catch (ClientException $e) {
                TestUtil::decodeClientException($e);
                die(1);
            }
        }

        /** @dataProvider providerTestValidity */
        function testValidity($field) {
            $this->assertEquals(self::$existing[$field], self::$getAccount[$field]);
        }

        function testIsTeammateIfExists() {
            if (isset(self::$getAccount['is_teammate'])) {
                $this->assertTrue(is_bool(self::$getAccount['is_teammate']));
            }
        }

        function testPrepend() {
            $id = str_ireplace('dbid:', '', self::$existing['account_id']);
            try {
                $a = json_decode(
                    (new GetAccount())->raw($id)->getBody()->getContents(),
                    true
                );
                $this->assertEquals(self::$getAccount, $a);
            } catch (ClientException $e) {
                TestUtil::decodeClientException($e);
                die(1);
            }
        }

        function providerTestValidity() {
            yield ['account_id'];
            yield ['name'];
            yield ['email'];
            yield ['email_verified'];
            yield ['disabled'];
        }
    }
