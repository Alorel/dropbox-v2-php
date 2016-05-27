<?php

    namespace Alorel\Dropbox\OptionBuilder;

    use Alorel\Dropbox\OptionBuilder\Mixins\AutoRenameTrait;
    use Alorel\Dropbox\OptionBuilder\Mixins\ClientModifiedTrait;
    use Alorel\Dropbox\OptionBuilder\Mixins\MuteTrait;
    use Alorel\Dropbox\OptionBuilder\Mixins\WriteModeTrait;
    use Alorel\Dropbox\Options;

    /**
     * Additional options for the Upload operation
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    \Alorel\Dropbox\Operation\Files\Upload
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload
     */
    class UploadOptions extends Options {

        use WriteModeTrait;
        use AutoRenameTrait;
        use ClientModifiedTrait;
        use MuteTrait;
    }