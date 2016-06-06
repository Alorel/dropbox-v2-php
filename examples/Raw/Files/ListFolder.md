```php
<?php

    use Alorel\Dropbox\Operation\Files\ListFolder\ListFolder;
    use Alorel\Dropbox\Options\Builder\ListFolderOptions;

    $lf = new ListFolder();

    //List items only in the folder
    $result = json_decode($lf->raw('/my-folder')->getBody()->getContents(), true);

    //Or list them recursively
    $result = json_decode($lf->raw('/my-folder', (new ListFolderOptions())->setRecursive(true)), true);
```
Mind that, at the time of writing, Dropbox has a 2k result limit, so you might want to scan for them until there are no results available
```php
<?php

    use Alorel\Dropbox\Operation\Files\ListFolder\ListFolder;
    use Alorel\Dropbox\Operation\Files\ListFolder\ListFolderContinue;
    use Alorel\Dropbox\Options\Builder\ListFolderOptions;
    
    function listFolder($folder, ListFolderOptions $options = null) {
        $res = json_decode((new ListFolder())->raw($folder, $options)->getBody()->getContents(), true);

        foreach ($res['entries'] as $i => $e) {
            yield $e['path_lower'] => $e;
            unset($res['entries'][$i]);
        }

        if ($res['has_more']) {
            $more = new ListFolderContinue();

            while ($res['has_more']) {
                $res = json_decode($more->raw($res['cursor'])->getBody()->getContents(), true);

                foreach ($res['entries'] as $i => $e) {
                    yield $e['path_lower'] => $e;
                    unset($res['entries'][$i]);
                }
            }
        }
    }
```