```php
<?php

    use Alorel\Dropbox\Operation\Files\ListRevisions;
    
    $op = new ListRevisions();
    $revisions = json_decode($op->raw('/item.txt')->getBody()->getContents(), true);
```
Or limit the number of revisions you're interested in
```php
<?php

    use Alorel\Dropbox\Operation\Files\ListRevisions;
    use Alorel\Dropbox\Options\Builder\ListRevisionsOptions;
    
    $op = new ListRevisions();
    $opts = (new ListRevisionsOptions())->setLimit(3);
    $revisions = json_decode($op->raw('/item.txt', $opts)->getBody()->getContents(), true);
```