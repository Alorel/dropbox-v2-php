<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder;

    use Alorel\Dropbox\Options\Mixins\AutoRenameTrait;
    use Alorel\Dropbox\Options\Mixins\ClientModifiedTrait;
    use Alorel\Dropbox\Options\Mixins\MuteTrait;
    use Alorel\Dropbox\Options\Mixins\WriteModeTrait;
    use Alorel\Dropbox\Options\Options;

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