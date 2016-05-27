<?php

    namespace Alorel\Dropbox\Operation\Files;

    use Alorel\Dropbox\OperationKind\ContentUploadOperation;
    use Alorel\Dropbox\OptionBuilder\UploadOptions;

    class Upload extends ContentUploadOperation {

        function perform(string $path, $data, UploadOptions $options = null) {
            return $this->send('files/upload', $path, $data, $options);
        }
    }