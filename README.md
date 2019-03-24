Flientstone Package for Laravel 
================================

A key/value database store using flat files for laravel.

### Requirements

- PHP 7.0+
- laravel 5.0+

Features include:

* Memory efficient
* File locking
* Caching
* Gzip compression
* Easy to use

For full documentation please visit original project on http://www.xeweb.net/flintstone/

### Data types

Flintstone can store any data type that can be formatted into a string. By default this uses `serialize()`. See [Changing the formatter](#changing-the-formatter) for more details.

### Options

|Name				|Type		|Default Value	|Description														|
|---				|---		|---				|---														|
|dir				|string				|the current working directory			|The directory where the database files are stored (this should be somewhere that is not web accessible) e.g. /path/to/database/			|
|ext				|string				|.dat		|The database file extension to use							|
|gzip				|boolean			|false		|Use gzip to compress the database							|
|cache				|boolean or object	|true		|Whether to cache `get()` results for faster data retrieval								|
|formatter			|null or object		|null		|The formatter class used to encode/decode data				|
|swap_memory_limit	|integer			|2097152	|The amount of memory to use before writing to a temporary file	|


### Usage examples



To use this Laravel Package Add the following line to app.php on config folder:

providers:
```php
smh\Flintstone\FlintstoneServiceProvider::class, 
```
aliases
```php
'Flintstone' => \smh\Flintstone\FlintstoneFacade::class,
```
then run command 
```php
php artisan vendor:publish
```
you can set flintstone config on .env or not

for example enter to .env:
```php
FlintstoneDatabaseName=flientstoneDB
FlintstoneConfig_dir=/storage/app
FlintstoneConfig_ext=.dat
FlintstoneConfig_gzip=true
FlintstoneConfig_cache=true
``` 
 
if you don't set env, flintstone set by default with confif\flintstone.php 
also if you need to database formatter set this property in confif\flintstone.php

for example<br>

```php

"formatter"=>new Json_formatter(); 
```



Then you can use it anywhere from the project by :

```php
use smh\Flientstone;


// Load a database
$users = new Flientstone();
```
or
```php
// Load a database
$users = new Flentstone('filename','[
        "dir"=>'/storage/app',
        "FlintstoneConfig_ext"=>'.dat',
        "FlintstoneConfig_gzip"=true
        "FlintstoneConfig_cache"=true]');

// Set a key
$users->set('bob', ['email' => 'bob@site.com', 'password' => '123456']);

// Get a key
$user = $users->get('bob');
echo 'Bob, your email is ' . $user['email'];

// Retrieve all key names
$keys = $users->getKeys(); // returns array('bob')

// Retrieve all data
$data = $users->getAll(); // returns array('bob' => array('email' => 'bob@site.com', 'password' => '123456'));

// Delete a key
$users->delete('bob');

// Flush the database
$users->flush();
```
### Changing the formatter
By default Flintstone will encode/decode data using PHP's serialize functions, however you can override this with your own class if you prefer.

Just make sure it implements `Flintstone\Formatter\FormatterInterface` and then you can provide it as the `formatter` option.

If you wish to use JSON as the formatter, Flintstone already ships with this as per the example below:

```php
<?php

use smh\Flintstone\Flintstone;
use smh\Flintstone\Formatter\JsonFormatter;

$users = new Flintstone('users', [
    'dir' => __DIR__,
    'formatter' => new JsonFormatter()
]);
```
### Changing the cache
To speed up data retrieval Flintstone can store the results of `get()` in a cache store. By default this uses a simple array that only persist's for as long as the `Flintstone` object exists.

If you want to use your own cache store (such as Memcached) you can pass a class as the `cache` option. Just make sure it implements `smh\Flintstone\Cache\CacheInterface`.

### Who is using Flintstone?

- [Key-Value Store](https://github.com/adammbalogh/key-value-store)




-----------------------------------

Original Project Flintstone
==========
Copyright (c) 2010-2017 Jason M <b>

original project

[![Total Downloads](https://img.shields.io/packagist/dm/fire015/flintstone.svg)](https://packagist.org/packages/fire015/flintstone)
[![Build Status](https://travis-ci.org/fire015/flintstone.svg?branch=master)](https://travis-ci.org/fire015/flintstone)










