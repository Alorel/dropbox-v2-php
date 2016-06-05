<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Files;

    use Alorel\Dropbox\OperationKind\SingleArgumentRPCOperation;

    /**
     * Get a temporary link to stream content of a file. This link will expire in four hours and afterwards you will
     * get 410 Gone. Content-Type of the link is determined automatically by the file's mime type.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-get_temporary_link
     */
    class GetTemporaryLink extends SingleArgumentRPCOperation {

    }