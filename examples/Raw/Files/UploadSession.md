Upload sessions should be preferred to normal Uploads if there is a possibility that a file might be 150MB in size or more.
```php
<?php

    use Alorel\Dropbox\Operation\Files\UploadSession\Append;
    use Alorel\Dropbox\Operation\Files\UploadSession\Finish;
    use Alorel\Dropbox\Operation\Files\UploadSession\Start;
    use Alorel\Dropbox\Parameters\CommitInfo;
    use Alorel\Dropbox\Parameters\UploadSessionCursor;

    $localPathToFile = '/path/to/large/file.csv';
    $filesize = filesize($localPathToFile);
    $buffer = 1024 * 1024 * 10; //Send 10MB at a time - increase or lower this based on your setup
    $destinationPath = '/foo.csv'; // Path on the user's Dropbox

    $fh = \GuzzleHttp\Psr7\stream_for(fopen($localPathToFile, 'r')); //Open our file

    $append = new Append();
    $sessionID = json_decode((new Start())->raw()->getBody()->getContents(), true)['session_id']; //Get a session ID
    $cursor = new UploadSessionCursor($sessionID); //Create a cursor from the session ID
    $offset = 0;
    $finished = false;

    // Keep appending until we're at the last segment
    while (!$finished) {
        $cursor->setOffset($offset);
        $data = \GuzzleHttp\Psr7\stream_for($fh->read($buffer));
        $offset += $buffer;

        if ($data->getSize() == $buffer || $offset < $filesize) {
            // Haven't scanned the entire file
            $append->raw($data, $cursor);
        } else {
            //Send the last segment
            $finished = true;
            $commit = new CommitInfo($destinationPath);
            (new Finish())->raw($data,$cursor,$commit);
        }
    }
```