PHPEasyAnnotation
=========================

Created by [Daniel Schneider](https://github.com/Schneidoa)

Introduction
------------

PHPEasyAnnotation is a simple PHP Annotation Library.  It is designed to be very
simple and easy to extend.


Requirements
------------
* PHP>=5.6 
* [Reflection](http://php.net/manual/de/book.reflection.php)


Installation
------------

### Main Setup

#### With composer

1. Add this project in your composer.json:

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
     * @Json({"data": 1})
     */
    public $userId;
    
    /**
     *
     * @Column(username)
     * @NotNull()
     * @Json({"data": "dummy"})
     */
     public $username;
 }
///////
 
    use Schneidoa\EasyAnnotation\EasyAnnotationClass;
    use Schneidoa\EasyAnnotation\EasyAnnotationProperty;


    $p = new EasyAnnotationClass(get_class($this));
    $p = $p->getAnnotationProperty('userId');
    var_dump( $p->getAnnotations());
    
 //or
 
    $p = new EasyAnnotationClass(get_class($this));
    $properties = $p->getAnnotationProperties();
    
    foreach($properties as $property){
        var_dump($property->getAnnotations());
    }
    

```


### Output on PHP

```php
array (size=2)
  0 => 
    array (size=3)
      'annotation' => string '@Column(user_id)' (length=16)
      'name' => string 'Column' (length=6)
      'value' => string 'user_id' (length=7)
  1 => 
    array (size=3)
      'annotation' => string '@Json({"data": 1})' (length=18)
      'name' => string 'Json' (length=4)
      'value' => 
        array (size=1)
          'data' => int 1
```       


```php
array (size=2)
  0 => 
    array (size=3)
      'annotation' => string '@Column(user_id)' (length=16)
      'name' => string 'Column' (length=6)
      'value' => string 'user_id' (length=7)
  1 => 
    array (size=3)
      'annotation' => string '@Json({"data": 1})' (length=18)
      'name' => string 'Json' (length=4)
      'value' => 
        array (size=1)
          'data' => int 1

array (size=3)
  0 => 
    array (size=3)
      'annotation' => string '@Column(username)' (length=17)
      'name' => string 'Column' (length=6)
      'value' => string 'username' (length=8)
  1 => 
    array (size=3)
      'annotation' => string '@NotNull()' (length=10)
      'name' => string 'NotNull' (length=7)
      'value' => string '' (length=0)
  2 => 
    array (size=3)
      'annotation' => string '@Json({"data": "dummy"})' (length=24)
      'name' => string 'Json' (length=4)
      'value' => 
        array (size=1)
          'data' => string 'dummy' (length=5) 
```