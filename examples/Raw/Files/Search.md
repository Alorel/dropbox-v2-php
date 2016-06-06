Base setup:
```php
<?php

    use Alorel\Dropbox\Operation\Files\Search;
    use Alorel\Dropbox\Options\Builder\SearchOptions;
    use Alorel\Dropbox\Parameters\SearchMode;

    $op = new Search();
    $folder = '/my-folder'; //Folder to search in. Can be an empty string to search in root
    $query = 'foo-'; //Search for items that have "foo-" in their names
```
Search for deleted files:
```php
    $results = json_decode(
        $op->raw(
            $query,
            $folder,
            (new SearchOptions())->setSearchMode(SearchMode::deletedFilename())
        )->getBody()->getContents(),
        true
    );
```
Search for file names, limit to 5 items:
```php
    $results = json_decode(
        $op->raw(
            $query,
            $folder,
            (new SearchOptions())->setSearchMode(SearchMode::filename())->setMaxResults(5)
        )->getBody()->getContents(),
        true
    );
```
Search in file contents too (only available to Business accounts):
```php
    $results = json_decode(
        $op->raw(
            $query,
            $folder,
            (new SearchOptions())->setSearchMode(SearchMode::filenameAndContent())
        )->getBody()->getContents(),
        true
    );
```
Perform a large search:
```php
    function search($query, $folder, SearchOptions $options = null) {
        $op = new Search();
        do {
            $result = json_decode($op->raw($query, $folder, $options)->getBody()->getContents(), true);

            foreach($result['matches'] as $k => $match) {
                yield $match['metadata']['path_lower'] => $match;
            }
        } while ($result && isset($result['more']) && $result['more']);
    }

    $matches = search($query,$folder);
```