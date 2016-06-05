```php
<?php

    use Alorel\Dropbox\Operation\Files\GetMetadata;
    use Alorel\Dropbox\Options\Builder\GetMetadataOptions;

    $op = new GetMetadata();
    $opts = (new GetMetadataOptions())->setIncludeMediaInfo(true);

    $rsp = json_decode($op->raw('/photo.jpg')->getBody()->getContents(),true);
```

`$rsp` will hold the following:
```json
{
  ".tag": "file",
  "name": "photo.jpg",
  "path_lower": "/photo.jpg",
  "path_display": "/photo.jpg",
  "id": "id:ERDTAvfOpwAAAAAAAAAAAQ",
  "client_modified": "2016-06-05T23:41:51Z",
  "server_modified": "2016-06-05T23:41:51Z",
  "rev": "6f449265218",
  "size": 61681,
  "media_info": {
    ".tag": "metadata",
    "metadata": {
      ".tag": "photo",
      "dimensions": {
        "height": 294,
        "width": 420
      }
    }
  }
}
```