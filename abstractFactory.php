<?php
/**
 * Пример реализации паттерна Abstract Factory
 * Создание абстрактной фабрики для работы с формами и валидацией
 *
 * Абстрактная фабрика позволяет связать несколько объектов.
 */
// Формы
abstract class Form
{
    abstract public function generateForm();
}

class LoginForm extends Form
{
    public function generateForm()
    {
        echo "Generate Login form";
    }
}

class RegistrationForm extends Form
{
    public function generateForm()
    {
        echo "generate registration form";
    }
}


// Валидаторы форм
abstract class Validator
{
    abstract public function validate();
}

class LoginValidator extends Validator
{
    public function validate()
    {
        echo "Validate login form";
    }
}

class RegistrationValidator extends Validator
{
    public function validate()
    {
        echo "validate registration form";
    }
}


// Абстрактные фабрики
abstract class FormFactory
{
    abstract public function getForm();
    abstract public function getValidator();
}

class LoginFormFactory extends FormFactory
{
    public function getForm()
    {
        return new LoginForm();
    }

    public function getValidator()
    {
        return new LoginValidator();
    }
}

class RegistrationFormFactory extends FormFactory
{
    public function getForm()
    {
        return new RegistrationForm();
    }

    public function getValidator()
    {
        return new RegistrationValidator();
    }
}

$form = new LoginFormFactory();
die(var_dump($form->getForm()->generateForm()));