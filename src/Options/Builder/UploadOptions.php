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

    use Alorel\Dropbox\Options\Mixins\AutoRenameTrait;
    use Alorel\Dropbox\Options\Mixins\ClientModifiedTrait;
    use Alorel\Dropbox\Options\Mixins\MuteTrait;
    use Alorel\Dropbox\Options\Mixins\WriteModeTrait;
    use Alorel\Dropbox\Options\Options;

    /**
     * Additional options for the Upload operation
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    \Alorel\Dropbox\Operation\Files\Upload
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#files-upload
     */
    class UploadOptions extends Options {

        use WriteModeTrait;
        use AutoRenameTrait;
        use ClientModifiedTrait;
        use MuteTrait;
    }