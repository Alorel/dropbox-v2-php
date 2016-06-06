```php
<?php

    use Alorel\Dropbox\Operation\Files\SaveUrl\CheckJobStatus;
    use Alorel\Dropbox\Operation\Files\SaveUrl\SaveURL;

    $saveURL = new SaveURL();
    $resp = json_decode($saveURL->raw('/google.html', 'https://www.google.com')->getBody()->getContents(), true);

    if (isset($resp['async_job_id'])) {
        $check = new CheckJobStatus();

        do {
            sleep(3); //Wait a bit
            $r = json_decode($check->raw($resp['async_job_id'])->getBody()->getContents(), true);
        } while (isset($r['.tag']) && $r['.tag'] == 'in_progress');

        //You're done - URL saved
    } else {
        //You're done - URL saved
    }
```