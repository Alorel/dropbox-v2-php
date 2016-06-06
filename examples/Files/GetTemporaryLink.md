```php
<?php

    use Alorel\Dropbox\Operation\Files\GetTemporaryLink;

    $r = json_decode((new GetTemporaryLink())->raw('/my-file.mp4')->getBody()->getContents(), true);

    echo 'Your temp link is ' . $r['link'];
```