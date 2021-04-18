<?php
namespace Authlete\Types;

trait EnumTrait
{
    private static $values;
    private $name;

    private static function initialize()
    {
        // The class which uses this trait.
        $class = new \ReflectionClass(self::class);

        // The name of the class.
        $className = $class->getName();

        // Extract (static) public properties defined in the class.
        $properties = $class->getProperties(\ReflectionProperty::IS_PUBLIC);

        // For each (static) public property.
        foreach ($properties as $property)
        {
            // What is done here is:
            //
            //   self::$PROPERTY_NAME = new CLASS('PROPERTY_NAME');
            //

            // The name of the property.
            $propertyName = $property->getName();

            // Create an instance of the class with a string argument.
            $instance = new $className($propertyName);

            // Use the new instance as the value of the property.
            self::$$propertyName = $instance;

            // Add the instance to the list of property values.
            self::$values[] = $instance;
        }
    }

    public static function values()
    {
        return self::$values;
    }

    public static function valueOf($value)
    {
        if ($value instanceof self)
        {
            return $value;
        }

        if (!is_string($value))
        {
            return null;
        }

        foreach (self::$values as $element)
        {
            if ($element->name() == $value)
            {
                return $element;
            }
        }

        return null;
    }

    private function __construct($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function name()
    {
        return $this->name;
    }
}
