<?php

/**
 * Class FactoryMethod
 *
 * Пример реализации паттерна Factory Method
 *
 * @author Yuriy Belyakov
 */
class FactoryMethod
{
    public static function build($className)
    {
        if (class_exists($className))
            return new $className;
        else
            return false;
    }
}

class TestClass
{
    private $_name = 'Yuriy';

    public function getName()
    {
        return $this->_name;
    }
}

$tmp = FactoryMethod::build('TestClass')->getName();
die(var_dump($tmp));