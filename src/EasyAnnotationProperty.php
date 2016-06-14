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
    public function __construct($class, $name)
    {
        parent::__construct($class, $name);
    }

    public function getAnnotations(){

        $comment = $this->getDocComment();

        $re = "/@([\\\\\\w]+)\\((.*?)\\)(?:\\s|$)/";

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
        

        return $annotations;
    }

    private function isJson(...$args) {
        json_decode(...$args);
        return (json_last_error()===JSON_ERROR_NONE);
    }




}