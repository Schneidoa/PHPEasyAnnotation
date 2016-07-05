<?php
require_once 'src/EasyAnnotationClass.php';
require_once 'src/EasyAnnotationProperty.php';
require_once 'example/ExampleClass.php';


class EasyAnnotationClassTest extends PHPUnit\Framework\TestCase
{

    public function testGetAnnotationProperty(){

        $a =    new Schneidoa\EasyAnnotation\EasyAnnotationClass(
                        Schneidoa\EasyAnnotation\Example\ExampleClass::class
                );

        // Assert
        $this->assertInstanceOf(Schneidoa\EasyAnnotation\EasyAnnotationProperty::class, $a->getAnnotationProperty("userId"));

    }

}