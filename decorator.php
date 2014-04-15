<?php
/**
 * Пример реализации паттерна Decorator
 *
 * Этот шаблон предназначен для добавления поведения к объекту
 *  - добавляет функциональность до или после функциональности основного объекта
 */

// Определение основного объекта
abstract class AbstractComponent
{
    abstract public function method();
}

class Component1 extends AbstractComponent
{
    public function method()
    {
        echo "Component1->method()";
    }
}

// Определение декоратора
abstract class AbstractComponentDecorator extends AbstractComponent
{
    protected $_component;

    public function __construct(AbstractComponent $component)
    {
        $this->_component = $component;
    }
}

class Component1Decorator extends AbstractComponentDecorator
{
    // Декорируемый метод
    public function method()
    {
        echo "=====";
        $this->_component->method();
        echo "=====";
    }
}

$decorator = new Component1Decorator(new Component1());
$decorator->method();