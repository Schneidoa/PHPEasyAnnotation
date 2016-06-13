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
            return $matches;
        }

}