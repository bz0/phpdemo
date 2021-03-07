<?php
/**
 * Foo class.
 * @Entity {"repositoryClass": "FooRepository"}
 * @Table  {"name": "foos"}
 * @author "Guilherme Blanco"
 */
class Foo
{
    /**
     * @MyAnnotation(myProperty="value1")
     */
    public $id;

    /**
     * @MyAnnotation(myProperty="value2")
     */
    public $description;

    /**
     * This is an example function
     */
    public function fn()
    {
        // void
    }
}

/**
 * @Annotation
 */
final class MyAnnotation
{
    public $myProperty;
}

require_once "./vendor/autoload.php";

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

// Deprecated and will be removed in 2.0 but currently needed
AnnotationRegistry::registerLoader('class_exists');

$reflectionClass = new ReflectionClass(Foo::class);
$property = $reflectionClass->getProperty('id');

$reader = new AnnotationReader();
$myAnnotation = $reader->getPropertyAnnotation(
    $property,
    MyAnnotation::class
);

echo $myAnnotation->myProperty; // result: "value1"
