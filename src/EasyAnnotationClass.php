<?php

/**
 * Created by PhpStorm.
 * User: Schneidoa
 * Date: 13.06.16
 * Time: 23:51
 */
namespace Schneidoa\EasyAnnotation;

class EasyAnnotationClass extends \ReflectionClass
{

    public function __construct($argument)
    {
        parent::__construct($argument);
    }

    public function getProperty($name)
    {
        return new EasyAnnotationProperty($this->getName(), $name);
    }


}
