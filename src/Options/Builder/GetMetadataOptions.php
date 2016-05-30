<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder;

    use Alorel\Dropbox\Options\Builder\Mixins\IncludeDeletedTrait;
    use Alorel\Dropbox\Options\Builder\Mixins\IncludeHasExplicitSharedMembersTrait;
    use Alorel\Dropbox\Options\Builder\Mixins\IncludeMediaInfoTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Additional options for the GetMetadata operation
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    \Alorel\Dropbox\Operation\Files\GetMetadata
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-get_metadata
     */
    class GetMetadataOptions extends Options {
        use IncludeDeletedTrait;
        use IncludeHasExplicitSharedMembersTrait;
        use IncludeMediaInfoTrait;
    }