[![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/Alorel/dropbox-v2-php.svg)](http://isitmaintained.com/project/Alorel/dropbox-v2-php "Average time to resolve an issue")
[![Percentage of issues still open](http://isitmaintained.com/badge/open/Alorel/dropbox-v2-php.svg)](http://isitmaintained.com/project/Alorel/dropbox-v2-php "Percentage of issues still open")
[![Build Status](https://travis-ci.org/Alorel/dropbox-v2-php?branch=master)](https://travis-ci.org/Alorel/dropbox-v2-php)
[![Build Status](https://coveralls.io/repos/github/Alorel/dropbox-v2-php/badge.svg?branch=master)](https://coveralls.io/github/Alorel/dropbox-v2-php?branch=master)

[![Latest Stable Version](https://poser.pugx.org/alorel/dropbox-v2-php/v/stable)](https://packagist.org/packages/alorel/dropbox-v2-php)
[![Total Downloads](https://poser.pugx.org/alorel/dropbox-v2-php/downloads)](https://packagist.org/packages/alorel/dropbox-v2-php)
[![License](https://poser.pugx.org/alorel/dropbox-v2-php/license)](https://packagist.org/packages/alorel/dropbox-v2-php)

----------

A PHP SDK for Dropbox's v2 SDK. If you haven't tried Dropbox out yet, [do](https://db.tt/u56WHf8q "referral link") - it's great!

#Table of Contents

 1. [Requirements](#requirements)
 2. [Installation](#installation)
 3. [Usage](#usage)
 4. [Supported API operations](#supported-api-operations)
 5. [API Documentation](#api-documentation)

#Requirements
This package requires PHP 7.0+.

#Installation
Installation is only available via [Composer](https://getcomposer.org/). Run:

    composer require alorel/dropbox-v2-php
And include the Composer autoloader somewhere in your code:
```php
<?php
    require_once 'vendor/autoload.php';
```

#Usage
Every Dropbox API operation is located in the [\Alorel\Dropbox\Operation](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.1/docs/master/Alorel/Dropbox/Operation.html) namespace and is a class named after the API endpoint. There are a few exceptions to this, however, e.g. the class for `https://content.dropboxapi.com/2/files/upload_session/start` is `\Alorel\Dropbox\Operation\Files\UploadSession\Start`. 

All operation classes inherit the AbstractOperation constructor:
```php
  /**
    * Operation constructor.
    *
    * @param bool   $async       Whether requests should be asynchronous
    * @param string $accessToken Our access token
    */
    function __construct($async = null, string $accessToken = null) {}
```
The first parameter is a boolean determining whether operations should run synchronously or asynchronously (defaults to synchronous), the second is the access token created when the user authorises your application. Both can have default values set via [AbstractOperation::setDefaultToken()](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.1/docs/master/Alorel/Dropbox/Operation/AbstractOperation.html#method_setDefaultToken) and [AbstractOperation::setDefaultAsync()](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.1/docs/master/Alorel/Dropbox/Operation/AbstractOperation.html#method_setDefaultAsync) respectively.

Currently the only supported way of making requests is with the respective operation class' `raw` method, which will return an instance of `PromiseInterface` when operating in asynchronous mode or an instance of `ResponseInterface` if operating in synchronous mode. See [guzzlephp.org](http://guzzlephp.org/) for more information on promises and responses.

In future releases I will be adding 'management' classes that will automatically format the response.

#Supported API Operations
Unless specified otherwise, any operation that is not currently supported will be added in a future release.

 - Files
   - [ ] alpha/get_metadata
   - [ ] alpha/upload
   - [x] copy
 - Sharing
   - [ ] add_folder_member

#API Documentation
[0.1](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.1/docs/master/index.html)

----------

# Links
 - [Changelog](https://github.com/Alorel/dropbox-v2-php/releases)
 - [Dropbox REST API docs](https://www.dropbox.com/developers/documentation/http/documentation)
 - [Dropbox API explorer](https://dropbox.github.io/dropbox-api-v2-explorer)