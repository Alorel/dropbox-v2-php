```php
<?php

    use Alorel\Dropbox\Operation\Files\Copy;

    $source = '/foo.txt';
    $target = '/bar.txt';

    $op = new Copy();
    $op->raw($source, $target);
```