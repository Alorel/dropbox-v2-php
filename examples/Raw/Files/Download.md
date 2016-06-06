```php
<?php

    use Alorel\Dropbox\Operation\Files\Download;

    $op = new Download();
    $response = $op->raw('/file.txt')->getBody()->getContents();
    
    echo $response;
```