[![Percentage of issues still open](http://isitmaintained.com/badge/open/alorel/dropbox-v2-php.svg)](http://isitmaintained.com/project/alorel/dropbox-v2-php "Percentage of issues still open")
[![Build Status](https://travis-ci.org/Alorel/dropbox-v2-php.svg?branch=master)](https://travis-ci.org/Alorel/dropbox-v2-php)
[![codecov](https://codecov.io/gh/Alorel/dropbox-v2-php/branch/master/graph/badge.svg)](https://codecov.io/gh/Alorel/dropbox-v2-php)
[![Dependency Status](https://www.versioneye.com/user/projects/5756bd6b7757a0004a1de150/badge.svg)](https://www.versioneye.com/user/projects/5756bd6b7757a0004a1de150)

[![Latest Stable Version](https://poser.pugx.org/alorel/dropbox-v2-php/v/stable)](https://packagist.org/packages/alorel/dropbox-v2-php)
[![Total Downloads](https://poser.pugx.org/alorel/dropbox-v2-php/downloads)](https://packagist.org/packages/alorel/dropbox-v2-php)
[![License](https://poser.pugx.org/alorel/dropbox-v2-php/license)](https://packagist.org/packages/alorel/dropbox-v2-php)


Tested with PHP 5.6-7.1 and HHVM 3.18. See the [CI builds](https://travis-ci.org/Alorel/dropbox-v2-php/builds) page for the most accurate, up-to-date version list.

----------

# Maintainer(s) needed!

[10 Feb 2017] Unfortunately, I do not have time to maintain this SDK. I do not expect it to become out-of-date in terms of functionality for at least another year, but it won't be adding any new functionality. Please [open an issue](https://github.com/Alorel/dropbox-v2-php/issues) if you're interested.

-----

A PHP SDK for Dropbox's v2 API. If you haven't tried Dropbox out yet, [do](https://db.tt/u56WHf8q "referral link") - it's great!

# Table of Contents

 1. [Installation](#installation)
 1. [Usage](#usage)
 1. [Supported API operations](#supported-api-operations)
 1. [API Documentation](#api-documentation)

# Installation

Installation is only available via [Composer](https://getcomposer.org/).

## Quick version:

```sh
composer require alorel/dropbox-v2-php
```

## More informed version:

The package is still in its `0.x` development stage, therefore adding it as a `^` dependency, e.g. `"alorel/dropbox-v2-php":"^0.1"` will severely limit the amount of updates you receive, as, per [semver](http://semver.org/#spec-item-4) specification, `0.2` is allowed to be backwards-incompatible with `0.1`. While I definitely cannot guarantee **full** backwards compatibility if you fiddle with protected methods and derive your own subclasses, I do guarantee that the public API will remain backwards-compatible, therefore, if you only use the `raw` methods in your application e.g.

```php
$options = new UploadOptions(); //set your options
(new Upload())->raw('/file.txt', 'data', $options);
```

You can safely add the following as a dependency in your composer.json:

```json
{
  "require": {
    "alorel/dropbox-v2-php": ">=0.4 <1.0"
  }
}
```

Additionally, `composer outdated` is a useful command to know during the `0.x` development stage!

# Usage

Every Dropbox API operation is located in the [\Alorel\Dropbox\Operation](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.3.3/docs/master/Alorel/Dropbox/Operation.html) namespace and is a class named after the API endpoint. There are a few exceptions to this, however, e.g. the class for `https://content.dropboxapi.com/2/files/upload_session/start` is `\Alorel\Dropbox\Operation\Files\UploadSession\Start`. 

All operation classes inherit the AbstractOperation constructor:

```php
  /**
    * Operation constructor.
    *
    * @param bool   $async       Whether requests should be asynchronous
    * @param string $accessToken Our access token
    */
    public function __construct($async = null, string $accessToken = null) {}

```
The first parameter is a boolean determining whether operations should run synchronously or asynchronously (defaults to synchronous), the second is the access token created when the user authorises your application. Both can have default values set via [AbstractOperation::setDefaultToken()](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.3.3/docs/master/Alorel/Dropbox/Operation/AbstractOperation.html#method_setDefaultToken) and [AbstractOperation::setDefaultAsync()](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.3.3/docs/master/Alorel/Dropbox/Operation/AbstractOperation.html#method_setDefaultAsync) respectively.

Currently the only supported way of making requests is with the respective operation class' `raw` method, which will return an instance of `PromiseInterface` when operating in asynchronous mode or an instance of `ResponseInterface` if operating in synchronous mode. See [guzzlephp.org](http://guzzlephp.org/) for more information on promises and responses.

In future releases I will be adding 'management' classes that will automatically format the response.

# Supported API Operations

Unless specified otherwise, any operation that is not currently supported will be added in a future release.

## Files
All except:

- [ ] /alpha/get_metadata | *In Beta/Alpha on Dropbox - will implement once stable*
- [ ] /alpha/upload | *In Beta/Alpha on Dropbox - will implement once stable*
- [ ] /properties/add | *In Beta/Alpha on Dropbox - will implement once stable*
- [ ] /properties/overwrite | *In Beta/Alpha on Dropbox - will implement once stable*
- [ ] /properties/remove | *In Beta/Alpha on Dropbox - will implement once stable*
- [ ] /properties/template/get | *In Beta/Alpha on Dropbox - will implement once stable*
- [ ] /properties/template/list | *In Beta/Alpha on Dropbox - will implement once stable*
- [ ] /properties/update | *In Beta/Alpha on Dropbox - will implement once stable*

## Users

All

# API Documentation

[0.4](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.4/docs/master/index.html) |
[0.3.3](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.3.3/docs/master/index.html) |
[0.2](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.2/docs/master/index.html) |
[0.1.1](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.1.1/docs/master/index.html) |
[0.1](https://cdn.rawgit.com/Alorel/dropbox-v2-php/0.1/docs/master/index.html)

----------

# Links

 - [Changelog](https://github.com/Alorel/dropbox-v2-php/releases)
 - [Dropbox HTTP API docs](https://www.dropbox.com/developers/documentation/http/documentation) (this library is merely a HTTP request wrapper)
 - [Dropbox API explorer](https://dropbox.github.io/dropbox-api-v2-explorer)
