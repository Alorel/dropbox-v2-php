<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Builder\UploadSession;

    use Alorel\Dropbox\Options\Mixins\CloseTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Additional options for upload_session/start
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload_session-start
     * @see    \Alorel\Dropbox\Operation\Files\UploadSession\Start
     */
    class UploadSessionActiveOptions extends Options {

        use CloseTrait;
    }