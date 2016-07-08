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


    /**
     * @var array
     */
    protected $annotations;

    /**
     * EasyAnnotationProperty constructor.
     * @param String $class
     * @param String $name
     */
    public function __construct(String $class, String $name)
    {
        parent::__construct($class, $name);

        $comment = $this->getDocComment();

        $re = "/@([\\\\\\w]+)[ \\t]*(\\((.*?)\\)(?:\\s|$))?/";

        preg_match_all($re, $comment, $matches);

        $annotations =  array();

        $i = 0;
        foreach($matches[0] as $annotation){
            $annotations[]  = array(
                'annotation'    => trim($annotation),
                'name'          => trim($matches[1][$i]),
                'value'         => $this->getAnnotationValue($matches[2][$i])
            );
            $i++;
        }

        $this->annotations  = $annotations;
    }

    /**
     * @param String $value
     * @return mixed|null|string
     */
    private function getAnnotationValue(String $value = null){
        $returnValue =  null;
        if(!($value === null)){
            $value = trim($value,' \t\n\r\0\x0B()');
            if($this->isJson($value)){
                $returnValue    = json_decode($value, true);
            }else{
                $returnValue    = trim($value);
            }
        }

        return $returnValue;
    }

    /**
     * @param String $annotation
     * @return bool
     */
    public function hasAnnotation(String $annotation){
        foreach ($this->annotations as $a){
            if(strtolower($a['name']) == strtolower($annotation)){
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function getAnnotations(){
        return $this->annotations;
    }

    /**
     * @param String $annotation
     * @return bool|mixed
     */
    public function getAnnotation(String $annotation){
        foreach ($this->annotations as $a){
            if(strtolower($a['name']) == strtolower($annotation)){
                return $a;
            }
        }
        return false;
    }

    /**
     * @param array ...$args
     * @return bool
     */
    private function isJson(...$args)  {
        json_decode(...$args);
        return (json_last_error()===JSON_ERROR_NONE);
    }




}