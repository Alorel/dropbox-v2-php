```php
<?php

    use Alorel\Dropbox\Operation\Files\Restore;

    $rev = 'a1c10ce0dd78';
    $file = '/foo.txt'; //It can be a deleted file, too.

    (new Restore())->raw($file, $rev);
```