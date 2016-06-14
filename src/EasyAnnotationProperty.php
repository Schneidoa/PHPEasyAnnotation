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

        preg_match($re, $comment, $matches);

        if($this->isJson($matches[2])){
            $matches[2] = json_decode($matches[2], true);
        }

        return $matches;
    }

    private function isJson(...$args) {
        json_decode(...$args);
        return (json_last_error()===JSON_ERROR_NONE);
    }




}