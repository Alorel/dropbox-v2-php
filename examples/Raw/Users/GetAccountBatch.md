```php
<?php

    use Alorel\Dropbox\Operation\Users\GetAccountBatch;

    $accountIDs = [
        'dbid:foo',
        'dbid:bar',
        'dbid:qux'
    ];

    $response = json_decode((new GetAccountBatch())->raw(...$accountIDs)->getBody()->getContents(), true);

    foreach ($response as $account) {
        echo 'Say hello to...';
        var_dump($account);
    }
```