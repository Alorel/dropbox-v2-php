<?php
    /**
     * The MIT License (MIT)
     *
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     *
     * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
     * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
     * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit
     * persons to whom the Software is furnished to do so, subject to the following conditions:
     *
     * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
     * Software.
     *
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT
     * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
     * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
     * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
     * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
     */

    namespace Alorel\Dropbox\Operation\Files;

    use Alorel\Dropbox\OperationKind\ContentUploadOperation;
    use Alorel\Dropbox\OptionBuilder\UploadOptions;

    /**
     * Create a new file with the contents provided in the request. Do not use this to upload a file larger than
     * 150 MB. Instead, create an upload session with upload_session/start.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    \Alorel\Dropbox\Operation\Files\UploadSession\Start
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload
     */
    class Upload extends ContentUploadOperation {

        /**
         * Create a new file with the contents provided in the request. Do not use this to upload a file larger than
         * 150 MB. Instead, create an upload session with upload_session/start.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                                            $path    The path to upload the file to
         * @param string|resource|\Psr\Http\Message\StreamInterface $data    The file contents. Can be a string, a fopen()
         *                                                                   resource or an instance of StreamInterface
         * @param UploadOptions|null                                $options Any additional options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function perform(string $path, $data, UploadOptions $options = null) {
            return $this->send('files/upload', $path, $data, $options);
        }
    }