Base setup:
```php
<?php

    use Alorel\Dropbox\Operation\Files\Upload;
    use Alorel\Dropbox\Options\Builder\UploadOptions;
    use Alorel\Dropbox\Parameters\WriteMode;

    $op = new Upload();
    $path = '/foo.php';
```
The following are equivalent:
```php
    //Upload as string
    $op->raw($path, file_get_contents(__FILE__));

    //...as resource
    $op->raw($path, fopen(__FILE__, 'r'));

    //...or as a PSR7 stream
    $op->raw($path, \GuzzleHttp\Psr7\stream_for(fopen(__FILE__, 'r')));
```
You can be sneaky with your uploads:
```php
    $op->raw($path, 'data', (new UploadOptions())->setMute(true));
```
Control the write mode:
```php
    $op->raw($path, 'data', (new UploadOptions())->setWriteMode(WriteMode::overwrite()));
```
Set a ClientModified value to whenever you want:
```php
    $op->raw($path, 'data', (new UploadOptions())->setClientModified(new DateTime('2000-01-01')));
```
Or combine all three:
```php
    $op->raw(
        $path,
        'data',
        (new UploadOptions())
            ->setClientModified(new DateTime('2000-01-01'))
            ->setMute(true)
            ->setWriteMode(WriteMode::add())
    );
```