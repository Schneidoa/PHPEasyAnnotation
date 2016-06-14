PHPEasyAnnotation
=========================

Created by [Daniel Schneider](https://github.com/Schneidoa)

Introduction
------------

PHPEasyAnnotation is a simple Simple PHP Annotation Library.  It is designed to be very
simple and easy to extend.

cUserDoctrineMongoODM](https://github.com/ZF-Commons/ZfcUserDoctrineMongoODM) - Doctrine2 MongoDB ODM

Requirements
------------
* PHP>=5.6 
* [Reflection](http://php.net/manual/de/book.reflection.php)


Installation
------------

### Main Setup

#### With composer

1. Add this project and [ZfcBase](https://github.com/ZF-Commons/ZfcBase) in your composer.json:

    ```json
    "require": {
        "schneidoa/php-easy-annotation": "dev-master"
    }
    ```

2. Now tell composer to download PHPEasyAnnotation:

    ```bash
    $ php composer.phar update
    ```

## Usage

```php
class Example 
{
    /**
     *
     * @Column(user_id)
     * @NotNull
     * @Json({"data": 1})
     */
    public $userId;
 
   
```php

```php
<?php

use Schneidoa\EasyAnnotation\EasyAnnotationClass;
use Schneidoa\EasyAnnotation\EasyAnnotationProperty;
```php


### Output on PHP


