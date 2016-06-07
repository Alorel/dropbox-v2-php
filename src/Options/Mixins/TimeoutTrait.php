<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    /**
     * Created by PhpStorm.
     * User: Art
     * Date: 03/06/2016
     * Time: 23:26
     */

    namespace Alorel\Dropbox\Options\Mixins;

    use Alorel\Dropbox\Options\Option;

    /**
     * A timeout in seconds. The request will block for at most this length of time, plus up to 90 seconds of random
     * jitter added to avoid the thundering herd problem. Care should be taken when using this parameter, as some
     * network infrastructure does not support long timeouts. The default for this field is 30.
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    trait TimeoutTrait {

        /**
         * A timeout in seconds. The request will block for at most this length of time, plus up to 90 seconds of random
         * jitter added to avoid the thundering herd problem. Care should be taken when using this parameter, as some
         * network infrastructure does not support long timeouts. The default for this field is 30.
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param int $timeout The timeout
         *
         * @return self
         */
        function setTimeout($timeout) {
            $this[Option::TIMEOUT] = $timeout;

            return $this;
        }
    }