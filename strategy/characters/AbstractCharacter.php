<?php
abstract class AbstractCharacter
{
    protected $_weapon;

    abstract public function talk();

    public function setWeapon(WeaponBehavior $weapon)
    {
        $this->_weapon = $weapon;
    }

    public function attack()
    {
        if (isset($this->_weapon))
            return $this->_weapon->damage();
        else
            throw new Exception('You must use setWeapon() function.');
    }
} 