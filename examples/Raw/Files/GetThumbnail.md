```php
<?php

    use Alorel\Dropbox\Operation\Files\GetThumbnail;
    use Alorel\Dropbox\Options\Builder\GetThumbnailOptions;
    use Alorel\Dropbox\Parameters\ThumbnailFormat;
    use Alorel\Dropbox\Parameters\ThumbnailSize;

    //Data will be binary
    $op = new GetThumbnail();

    $jpg64x64 = $op->raw('/photo1.jpg')->getBody();

    $set = new GetThumbnailOptions();
    $set->setThumbnailSize(ThumbnailSize::w128h128())
        ->setThumbnailFormat(ThumbnailFormat::png());

    $png128x128 = $op->raw('/photo2.jpg', $set);
```
Output the thumbnail:
```php
    header('Content-Type: image/jpeg');
    while ($data = $jpg64x64->read(4096)) {
        echo $data;
    }
```
Or just create a data link (which might be quite large depending on the thumbnail size)
```php
    $base64 = 'data:image/png;base64,' . base64_encode($png128x128->getBody()->getContents());

    echo '<img src="' . $base64 . '"/>';
```