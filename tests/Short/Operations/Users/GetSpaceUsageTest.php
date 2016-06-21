<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
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
