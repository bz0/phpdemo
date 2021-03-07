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
     * @property id
     */
    public $id;

    /**
     * @property description
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

$class = 'Foo';
$rc = new \ReflectionClass($class);

//クラスコメント
var_dump($rc->getDocComment());

//メソッドコメント
var_dump($rc->getMethod('fn')->getDocComment());

//プロパティの取得
$properties = $rc->getProperties();

foreach($properties as $prop){
    $reflection_property = new \ReflectionProperty($class, $prop->name);
    echo $prop->name . ":\n";
    $doc = $reflection_property->getDocComment();
    var_dump($doc);
}

