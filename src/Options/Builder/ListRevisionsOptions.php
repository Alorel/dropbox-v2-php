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

    namespace Alorel\Dropbox\Options\Builder;

    use Alorel\Dropbox\Options\Mixins\LimitTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Additional options for the list_revisions operation
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-list_revisions
     */
    class ListRevisionsOptions extends Options {
        use LimitTrait;
    }