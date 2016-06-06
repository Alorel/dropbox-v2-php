```php
<?php

    use Alorel\Dropbox\Operation\Files\Move;

    $source = '/foo.txt';
    $target = '/bar.txt';

    $op = new Move();
    $op->raw($source, $target);
```