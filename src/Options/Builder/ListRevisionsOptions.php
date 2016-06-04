<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder;

    use Alorel\Dropbox\Options\Mixins\LimitTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Additional options for the list_revisions operation
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-list_revisions
     */
    class ListRevisionsOptions extends Options {
        use LimitTrait;
    }