```php
<?php

    use Alorel\Dropbox\Operation\Users\GetCurrentAccount;

    $acc = json_decode((new GetCurrentAccount())->raw()->getBody()->getContents(), true);

    echo 'You\'re this guy:';
    var_dump($acc);
```