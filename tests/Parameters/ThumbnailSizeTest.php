<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    class ThumbnailSizeTest extends \PHPUnit_Framework_TestCase {

        function testAvailableSizes() {
            $actual = ThumbnailSize::availableSizes();
            $expected = [
                'w32h32',
                'w64h64',
                'w128h128',
                'w640h480',
                'w1024h768'
            ];

            sort($actual);
            sort($expected);
            $this->assertEquals($expected, $actual);
        }
    }
