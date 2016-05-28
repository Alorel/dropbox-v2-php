<?php

    namespace Alorel\Dropbox\OptionBuilder\UploadSession;

    use Alorel\Dropbox\OptionBuilder\Mixins\UploadSessionCursor;

    /**
     * Additional options for upload_session/append_v2
     *
     * @author Art <a.molcanovas@gmail.com>
     *
     * @see    \Alorel\Dropbox\Operation\Files\UploadSession\Append
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload_session-append_v2
     */
    class AppendOptions extends StartOptions {
        use UploadSessionCursor;
    }