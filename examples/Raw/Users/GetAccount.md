```php
<?php

    use Alorel\Dropbox\Operation\Users\GetAccount;

    $accountID = 'dbid:foo'; // Replace with actual ID
    $response = (new GetAccount())->raw($accountID)->getBody()->getContents();

    echo 'It\'s this guy:';
    var_dump(json_decode($response, true));
```