<?php

    namespace Alorel\Dropbox\OperationKind;

    use Alorel\Dropbox\Operation;
    use Alorel\Dropbox\Options;

    abstract class ContentUploadOperation extends Operation {

        const HOST = 'content.dropboxapi.com';

        protected function send(string $url, string $path, $body, Options $opts = null) {
            return $this->sendAbstract('POST',
                                       self::HOST . '/' . self::API_VERSION . '/' . $url,
                                       [
                                           'headers' => [
                                               'Content-Type'    => 'application/octet-stream',
                                               'Dropbox-API-Arg' => json_encode(array_merge(
                                                                                    ['path' => $path],
                                                                                    $opts ? $opts->getOptions() : []
                                                                                ))
                                           ],
                                           'body'    => $body
                                       ]);
        }

    }