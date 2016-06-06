All examples assume you are operating in sync mode by default and have a default token set, i.e.
```php
<?php
    use Alorel\Dropbox\Operation\AbstractOperation;
    
    AbstractOperation::setDefaultAsync(false);
    AbstractOperation::setDefaultToken('my-bearer-token');
```

A synchronous example can be easily translated to an asynchronous one:

```php
<?php

    use Alorel\Dropbox\Operation\Files\Download;

    $op = new Download(false);
    $promises = [];
    $files = ['/file1.txt', '/file2.txt', '/file3.txt'];
    
    foreach($files as $file) {
        $promises[$file] = $op->raw($file);
    }
    
    $format = '<section>%s: %s</section>';

    foreach($promises as $key => $promise) {
        echo sprintf(
            $format, 
            $key, 
            $promise->wait(true)->getBody()->getContents()
        );
    }
```