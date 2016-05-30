<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Parameters;

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
        function __construct(string $path,
                             WriteMode $writeMode = null,
                             bool $autorename = false,
                             bool $mute = false,
                             DateTimeInterface $clientModified = null) {
            parent::__construct([
                                    'path'            => $path,
                                    'mode'            => $writeMode,
                                    'autorename'      => $autorename,
                                    'client_modified' => $clientModified ?
                                        $clientModified->format(Options::DATETIME_FORMAT) : null,
                                    'mute'            => $mute
                                ]);
        }
    }