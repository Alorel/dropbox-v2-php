<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Parameters;

    class ThumbnailFormatTest extends \PHPUnit_Framework_TestCase {

        function testThumbnailFormat() {
            $expected = [ThumbnailFormat::JPEG, ThumbnailFormat::PNG];
            $actual = ThumbnailFormat::availableFormats();

            sort($expected);
            sort($actual);

            $this->assertEquals($expected, $actual);
        }
    }
