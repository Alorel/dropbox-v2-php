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

namespace Alorel\Dropbox\Parameters;

    /**
     * Contains the upload session ID and the offset.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class UploadSessionCursor extends AbstractParameter {

        /**
         * UploadSessionCursor constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string $sessionID The upload session ID (returned by upload_session/start).
         * @param int    $offset    The amount of data that has been uploaded so far. We use this to make sure upload
         *                          data isn't lost or duplicated in the event of a network error.
         */
        function __construct(string $sessionID, int $offset = 0) {
            parent::__construct([
                                    'session_id' => $sessionID,
                                    'offset'     => $offset
                                ]);
        }
    }