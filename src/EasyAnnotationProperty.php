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

        /*
        $i = 0;
        foreach($matches as $match){
            if($this->isJson($match[2])){
                $matches[$i][2] = json_decode($match[2], true);
                $i++;
            }
        }
        */

        return $matches;
    }

    private function isJson(...$args) {
        json_decode(...$args);
        return (json_last_error()===JSON_ERROR_NONE);
    }




}