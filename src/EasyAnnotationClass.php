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

    public function getAnnotationProperty(String $name)
    {
        return new EasyAnnotationProperty($this->getName(), $name);
    }

    public function getAnnotationProperties($filter = null)
    {
        $properties =  ($filter === NULL ? parent::getProperties() : parent::getProperties($filter));
        $property   = array();
        foreach( $properties as $p){
            $property[] = new EasyAnnotationProperty($this->getName(),$p->getName());
        }

        return $property;
    }


}
