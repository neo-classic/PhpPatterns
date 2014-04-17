<?php

/**
 * Пример реализации паттерна Composite (Компоновщик)
 *
 * Структурный паттерн, который позволяет объединять объекты в древовидную структуру.
 * Предоставляет единый интерфейс доступа как к составному, так и к конечному объекту.
 *
 */

// Абстрактный класс, который будут наследовать и составной и конечный классы
abstract class Component
{
    protected $_name;
    protected $_children = array();

    abstract public function add(Component $component);

    abstract public function remove($index);

    abstract public function getChild($index);

    abstract public function getChildren();

    abstract public function operation();
}

// сам компоновщик
class Composite extends Component
{
    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function add(Component $component)
    {
        $this->_children[] = $component;
    }

    public function remove($index)
    {
        if (!isset($this->_children[$index]))
            throw new Exception('Такого элемента нет');

        unset($this->_children[$index]);
    }

    public function getChild($index)
    {
        if (!isset($this->_children[$index]))
            throw new Exception('Такого элемента нет');

        return $this->_children[$index];
    }

    public function getChildren()
    {
        return $this->_children;
    }

    public function operation()
    {
        echo $this->_name . ' : ' . count($this->getChildren()) . "<br />";
        foreach ($this->getChildren() as $child) {
            $child->operation();
        }
    }
}

// конечный класс
class Leaf extends Component
{
    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function add(Component $component)
    {
        throw new Exception("Невозможно добавить дочерний элемент");
    }

    public function remove($index)
    {
        throw new Exception("Невозможно удалить дочерний элемент");
    }

    public function getChild($index)
    {
        throw new Exception("Невозможно получить дочерний элемент");
    }

    public function getChildren()
    {
        throw new Exception("Невозможно удалить дочерние элементы");
    }

    public function operation()
    {
        echo $this->_name . "<br/>";
    }
}

$root = new Composite('Root');
$root->add(new Leaf('---leaf1'));
$root->add(new Leaf('---leaf2'));

$comp = new Composite('---SubRoot');
$comp->add(new Leaf('------leaf3'));
$comp->add(new Leaf('------leaf4'));

$root->add($comp);
$root->add(new Leaf('---leaf5'));

$root->operation();