```php
<?php

    use Alorel\Dropbox\Operation\Files\GetPreview;

    // Actually unsure about the content type; should be PDF

    $buffer = 4096;
    $r = (new GetPreview())->raw('/foo.docx')->getBody();

    header('Content-Type: application/pdf');

    while ($data = $r->read($buffer)) {
        echo $data;
    }
```