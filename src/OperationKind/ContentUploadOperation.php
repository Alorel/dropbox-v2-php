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

    namespace Alorel\Dropbox\OperationKind;

    use Alorel\Dropbox\Operation\AbstractOperation;
    use Alorel\Dropbox\Options\Options;

    /**
     * A wrapper for the ContentUpload group of operations
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#formats
     */
    abstract class ContentUploadAbstractOperation extends AbstractOperation {

        /**
         * The hostname for these operations
         *
         * @var string
         */
        const HOST = 'content.dropboxapi.com';

        /**
         * Send the request
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                                            $url  The URL to send to. This will be prepended
         *                                                                with the HOST and API version
         * @param string                                            $path The path to upload the file to
         * @param string|resource|\Psr\Http\Message\StreamInterface $body The file contents. Can be a string, a fopen()
         *                                                                resource or an instance of StreamInterface
         * @param \Alorel\Dropbox\Options\Options|null              $opts Any additional, operation-specific options
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         * @see    ContentUploadOperation::HOST
         * @see    Operation::API_VERSION
         */
        protected function send(string $url, string $path, $body, Options $opts = null) {
            $headers = [
                'Content-Type'    => 'application/octet-stream',
                'Dropbox-API-Arg' => []
            ];
            $arg = &$headers['Dropbox-API-Arg'];

            if ($path) {
                $arg['path'] = $path;
            }

            if ($opts) {
                $arg = array_merge($arg, $opts->getOptions());
            }

            $arg = json_encode($arg);

            return $this->sendAbstract('POST',
                                       self::HOST . '/' . self::API_VERSION . '/' . $url,
                                       [
                                           'headers' => $headers,
                                           'body'    => $body
                                       ]);
        }

    }