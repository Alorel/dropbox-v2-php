<?php
    /**
 * Copyright (c) 2016 Alorel, https://github.com/Alorel
 * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
 */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;
    use Alorel\Dropbox\Options\Options;
    use DateTimeInterface;

    /**
     * The value to store as the client_modified timestamp. Dropbox automatically records the time at which the file
     * was written to the Dropbox servers. It can also record an additional timestamp, provided by Dropbox desktop
     * clients, mobile clients, and API apps of when the file was actually created or modified
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait ClientModifiedTrait {

        /**
         * The value to store as the client_modified timestamp. Dropbox automatically records the time at which the
         * file was written to the Dropbox servers. It can also record an additional timestamp, provided by Dropbox
         * desktop clients, mobile clients, and API apps of when the file was actually created or modified.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param DateTimeInterface $set The setting
         *
         * @return self
         */
        function setClientModified(DateTimeInterface $set) {
            $this[Option::CLIENT_MODIFIED] = $set->format(Options::DATETIME_FORMAT);

            return $this;
        }
    }