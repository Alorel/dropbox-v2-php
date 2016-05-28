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

    namespace Alorel\Dropbox\Operation\Files\UploadSession;

    use Alorel\Dropbox\OperationKind\ContentUploadOperation;
    use Alorel\Dropbox\OptionBuilder\UploadSession\AppendOptions;

    /**
     * Append more data to an upload session. When the parameter close is set, this call will close the session. A
     * single request should not upload more than 150 MB of file contents.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class Append extends ContentUploadOperation {

        /**
         * Perform the operation
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                                            $path    The path to upload the file to
         * @param string|resource|\Psr\Http\Message\StreamInterface $data    The file contents. Can be a string, a fopen()
         * @param AppendOptions|null                                $options Additional operation options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function perform(string $path, $data, AppendOptions $options = null) {
            return $this->send('upload_session/append_v2', $path, $data, $options);
        }
    }