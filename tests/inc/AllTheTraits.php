<?php

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Options;

    class AllTheTraits extends Options {
        use AutoRenameTrait;
        use ClientModifiedTrait;
        use CloseTrait;
        use MuteTrait;
        use WriteModeTrait;
        use IncludeDeletedTrait;
        use IncludeMediaInfoTrait;
        use IncludeHasExplicitSharedMembersTrait;
        use ThumbnailFormatTrait;
        use ThumbnailSizeTrait;
        use RecursiveTrait;
        use TimeoutTrait;
        use LimitTrait;
        use MaxResultsTrait;
        use SearchModeTrait;
        use StartTrait;
    }