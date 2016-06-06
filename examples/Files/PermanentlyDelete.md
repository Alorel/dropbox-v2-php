```php
<?php

    use Alorel\Dropbox\Operation\Files\PermanentlyDelete;

    $op = new PermanentlyDelete();
    $op->raw('/file.txt');
```
Note that I haven't been able to test this method due to API permissions.