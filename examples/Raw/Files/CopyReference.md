The following example will copy a file from User 1's Dropbox to User 2's Dropbox
```php
<?php

    use Alorel\Dropbox\Operation\Files\CopyReference\Get;
    use Alorel\Dropbox\Operation\Files\CopyReference\Save;

    $get = new Get(false, 'key-from-user-1');
    $save = new Save(false, 'key-from-user-2');

    $copyRef = json_decode($get->raw('/file.txt')->getBody()->getContents(), true)['copy_reference'];
    $save->raw('/can-be-any-name.txt', $copyRef);
```