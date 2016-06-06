```php
<?php

    use Alorel\Dropbox\Operation\Files\Delete;

    $op = new Delete();
    $op->raw('/folder');
    $op->raw('/some-dir/file.txt');
```