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
    protected $annotationProperties;

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
    
    private function initAnnotationProperties($filter = null){
        $this->annotationProperties = $this->getAnnotationProperties($filter);
    }
        
    
    public function getPropertyWithAnnotation($name)
    {
        if(!isset($this->annotationProperties)){
            $this->initAnnotationProperties();
        }

        $properties =   array();
        foreach($this->annotationProperties as $property){
            if($property->hasAnnotation($name)){
                $properties[] =  $property;
            }
        }
        
        return $properties;
    }


}
