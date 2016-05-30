<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Operation\Files\CopyReference;

    use Alorel\Dropbox\OperationKind\SingleArgumentRPCOperation;

    /**
     * Get a copy reference to a file or folder. This reference string can be used to save that file or folder to
     * another user's Dropbox by passing it to copy_reference/save.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-copy_reference-get
     */
    class Get extends SingleArgumentRPCOperation {

    }