<?php
class LanguageUtility
{
    public static function initializeClass($class)
    {   
        try 
        {   
            // Get a static method named 'initialize'. If not found,
            // ReflectionMethod() will throw a ReflectionException.
            $ref = new \ReflectionMethod($class, 'initialize');

            // The 'initialize' method is probably 'private'.
            // Make it accessible before calling 'invoke'.
            // Note that 'setAccessible' is not available
            // before PHP version 5.3.2.
            $ref->setAccessible(true);

            // Execute the 'initialize' method.
            $ref->invoke(null);
        }   
        catch (Exception $e) 
        {
        }   
    }   
}
