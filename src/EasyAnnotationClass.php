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

    public function getProperty($name)
    {
        return new EasyAnnotationProperty($this->getName(), $name);
    }

    public function getAnnotationProperties($filter = null)
    {
        $properties =  $this->getProperties($filter);
        var_dump($this->getName());
        $property   = array();
        foreach( $properties as $p){
            $property[] = new EasyAnnotationProperty($this->getName(),$p->getName());

        }

        
        return $property;
    }


}
