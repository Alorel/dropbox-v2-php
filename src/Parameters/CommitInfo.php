<?php
    /**
     *    Copyright (c) Arturas Molcanovas <a.molcanovas@gmail.com> 2016.
     *    https://github.com/Alorel/dropbox-v2-php
     *
     *    Licensed under the Apache License, Version 2.0 (the "License");
     *    you may not use this file except in compliance with the License.
     *    You may obtain a copy of the License at
     *
     *        http://www.apache.org/licenses/LICENSE-2.0
     *
     *    Unless required by applicable law or agreed to in writing, software
     *    distributed under the License is distributed on an "AS IS" BASIS,
     *    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *    See the License for the specific language governing permissions and
     *    limitations under the License.
     */

    namespace Alorel\Dropbox\Parameters;

    use Alorel\Dropbox\Options\Option as O;
    use Alorel\Dropbox\Options\Options;
    use DateTimeInterface;

    /**
     * Contains the path and other optional modifiers for the commit.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class CommitInfo extends AbstractParameter {

        /**
         * CommitInfo constructor.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                 $path           Path in the user's Dropbox to save the file.
         * @param WriteMode|null         $writeMode      Selects what to do if the file already exists. The default for
         *                                               this union is add.
         * @param bool                   $autorename     If there's a conflict, as determined by mode, have the Dropbox
         *                                               server try to autorename the file to avoid conflict. The default
         *                                               for this field is False.
         * @param bool                   $mute           Normally, users are made aware of any file modifications in their
         *                                               Dropbox account via notifications in the client software. If
         *                                               true, this tells the clients that this modification shouldn't
         *                                               result in a user notification. The default for this field is False.
         * @param DateTimeInterface|null $clientModified The value to store as the client_modified timestamp. Dropbox
         *                                               automatically records the time at which the file was written to
         *                                               the Dropbox servers. It can also record an additional timestamp,
         *                                               provided by Dropbox desktop clients, mobile clients, and API apps
         *                                               of when the file was actually created or modified. This field is
         *                                               optional.
         *
         * @see    WriteMode
         */
        public function __construct($path,
                                    WriteMode $writeMode = null,
                                    $autorename = false,
                                    $mute = false,
                                    DateTimeInterface $clientModified = null) {
            parent::__construct([
                                    O::PATH            => $path,
                                    O::MODE            => $writeMode,
                                    O::AUTO_RENAME     => $autorename,
                                    O::CLIENT_MODIFIED => $clientModified ?
                                        $clientModified->format(Options::DATETIME_FORMAT) : null,
                                    O::MUTE            => $mute
                                ]);
        }
    }