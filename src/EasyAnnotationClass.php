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

    /**
     * @param String $name
     * @return EasyAnnotationProperty
     */
    public function getAnnotationProperty($name)
    {
        if(empty($this->getName())){
            throw new \Exception("ReflectionClassName is empty!");
        }
        return new EasyAnnotationProperty($this->getName(), $name);
    }

    /**
     * @param int|null $filter
     * @return EasyAnnotationProperty[]
     */
    public function getAnnotationProperties($filter = null)
    {
        $properties =  ($filter === NULL ? parent::getProperties() : parent::getProperties($filter));
        $property   = array();
        foreach( $properties as $p){
            $property[] = new EasyAnnotationProperty($this->getName(),$p->getName());
        }

        return $property;
    }

    /**
     * @param int|null $filter
     */
    private function initAnnotationProperties($filter = null){
        $this->annotationProperties = $this->getAnnotationProperties($filter);
    }


    /**
     * @param String $name
     * @return EasyAnnotationProperty[]
     */
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
