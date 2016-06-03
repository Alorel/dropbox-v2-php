<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder;

    use Alorel\Dropbox\Options\Mixins\IncludeDeletedTrait;
    use Alorel\Dropbox\Options\Mixins\IncludeHasExplicitSharedMembersTrait;
    use Alorel\Dropbox\Options\Mixins\IncludeMediaInfoTrait;
    use Alorel\Dropbox\Options\Mixins\RecursiveTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Additional options for the ListFolder operation
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-list_folder
     */
    class ListFolderOptions extends Options {
        use IncludeDeletedTrait;
        use IncludeHasExplicitSharedMembersTrait;
        use IncludeMediaInfoTrait;
        use RecursiveTrait;
    }