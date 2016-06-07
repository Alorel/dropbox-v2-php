<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Options\Builder;

    use Alorel\Dropbox\Options\Mixins\MaxResultsTrait;
    use Alorel\Dropbox\Options\Mixins\SearchModeTrait;
    use Alorel\Dropbox\Options\Mixins\StartTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Options for the search operation
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-search
     */
    class SearchOptions extends Options {
        use StartTrait;
        use MaxResultsTrait;
        use SearchModeTrait;
    }