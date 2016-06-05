All examples assume you are operating in sync mode by default and have a default token set, i.e.
```php
<?php
    use Alorel\Dropbox\Operation\AbstractOperation;
    
    AbstractOperation::setDefaultAsync(false);
    AbstractOperation::setDefaultToken('my-bearer-token');
```