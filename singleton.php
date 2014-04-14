<?php

/**
 * Class Singleton
 *
 * Пример реализации паттерна Singleton
 * для доступа к настройкам приложения
 *
 * Чтобы проще запомнить:
 *  - __construct, __clone, __wakeup
 *  + getInstance
 */
class Singleton
{
    protected static $_instance = null;
    private $_settings = array();

    private function __construct()
    {
        $this->_settings = array(
            'db' => array(
                'host' => 'localhost',
                'username' => 'root',
                'password' => '',
            ),
            'name' => array(
                'firstName' => 'Yuriy',
                'lastName' => 'Belyakov',
            ),
        );
    }

    private function __clone()
    {

    }
    private function __wakeup()
    {

    }

    public static function getInstance()
    {
        if (is_null(self::$_instance))
            self::$_instance = new self();

        return self::$_instance;
    }

    public function get($setting)
    {
        return $this->_settings[$setting];
    }
}

$tmp = Singleton::getInstance()->get('db');
die(var_dump($tmp));