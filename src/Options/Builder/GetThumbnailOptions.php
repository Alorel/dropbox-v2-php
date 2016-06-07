<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Builder;

    use Alorel\Dropbox\Options\Mixins\ThumbnailFormatTrait;
    use Alorel\Dropbox\Options\Mixins\ThumbnailSizeTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Options for the get_thumbnail operation
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class GetThumbnailOptions extends Options {
        use ThumbnailSizeTrait;
        use ThumbnailFormatTrait;
    }