<?php
/**
 * Created by PhpStorm.
 * User: Schneidoa
 * Date: 14.06.16
 * Time: 00:04
 */

namespace Schneidoa\EasyAnnotation;


class EasyAnnotationProperty extends \ReflectionProperty
{


    protected $annotations;

    public function __construct(String $class, String $name)
    {
        parent::__construct($class, $name);

        $comment = $this->getDocComment();

        $re = "/@([\\\\\\w]+)[ ]*\\((.*?)\\)(?:\\s|$)/";

        preg_match_all($re, $comment, $matches);

        $annotations =  array();

        $i = 0;
        foreach($matches[0] as $annotation){
            $annotations[]  = array(
                'annotation'    => trim($annotation),
                'name'          => trim($matches[1][$i]),
                'value'         => (($this->isJson($matches[2][$i])) ? json_decode($matches[2][$i], true) : trim($matches[2][$i]))
            );
            $i++;
        }

        $this->annotations  = $annotations;
    }

    public function hasAnnotation(String $annotation){
        foreach ($this->annotations as $a){
            if(strtolower($a['name']) == strtolower($annotation)){
                return true;
            }
        }
        return false;
    }

    public function getAnnotations(){
        return $this->annotations;
    }

    public function getAnnotation($annotation){
        foreach ($this->annotations as $a){
            if(strtolower($a['name']) == strtolower($annotation)){
                return $a;
            }
        }
        return false;
    }

    private function isJson(...$args)  {
        json_decode(...$args);
        return (json_last_error()===JSON_ERROR_NONE);
    }




}