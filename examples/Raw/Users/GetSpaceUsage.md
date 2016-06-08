```php
<?php

    use Alorel\Dropbox\Operation\Users\GetSpaceUsage;
    
    $rsp = json_decode((new GetSpaceUsage())->raw()->getBody()->getContents(), true);
    echo 'You\'re using ' . ($rsp['used'] / 1024 / 1024) . ' MB of your Dropbox allowance';
```