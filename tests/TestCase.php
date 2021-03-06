<?php namespace Engine\Tests;

use Closure;
use Exception;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function assertArrayInstanceOf($class, $array)
    {
        if (count($array)) {
            foreach ($array as $item) {
                if (!($item instanceof $class)) {
                    return $this->assertTrue(false);
                }
            }
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }

    public function assertException($exception, Closure $closure)
    {
        try {
            $closure();
            return $this->assertTrue(false);
        } catch (Exception $e) {
            return $this->assertInstanceOf($exception, $e);
        }
    }
    
    public function assertClassHasMethod($method_name, $object)
    {
        $this->assertTrue(method_exists($object, $method_name));
    }
}