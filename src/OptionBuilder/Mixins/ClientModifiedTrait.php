<?php

    namespace Alorel\Dropbox\OptionBuilder\Mixins;

    use Alorel\Dropbox\Options;
    use DateTimeInterface;

    /**
     * The value to store as the client_modified timestamp. Dropbox automatically records the time at which the file
     * was written to the Dropbox servers. It can also record an additional timestamp, provided by Dropbox desktop
     * clients, mobile clients, and API apps of when the file was actually created or modified
     *
     * @author Art <a.molcanovas@gmail.com>
     * @method $this setOption(string $key, $value)
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
            return $this->setOption('client_modified', $set->format(Options::DATETIME_FORMAT));
        }
    }