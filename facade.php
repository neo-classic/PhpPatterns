<?php

/**
 * Пример паттерна проектировани Facade
 *
 * Он позволяет добавить просто интерфейс доступа к сложной системе.
 * Включает работу с несколькими объектами.
 * Кроме того, можно определить facade как singleton
 */
class CPU
{
    public function freeze()
    {
        echo "CPU: freeze";
    }
}

class Memory
{
    public function load()
    {
        echo "Memory: load";
    }
}

class HardDrive
{
    public function read()
    {
        echo "HD: read";
    }
}

class ComputerFacade
{
    protected $_cpu;
    protected $_memory;
    protected $_hd;

    public function __construct()
    {
        $this->_cpu = new CPU();
        $this->_memory = new Memory();
        $this->_hd = new HardDrive();
    }

    public function start()
    {
        $this->_cpu->freeze();
        $this->_memory->load();
        $this->_hd->read();
    }
}

$facade = new ComputerFacade();
$facade->start();