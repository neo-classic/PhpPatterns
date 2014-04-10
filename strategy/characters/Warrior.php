<?php
class Warrior extends AbstractCharacter
{
    function __construct()
    {
        $this->_weapon = new Blunt();
    }

    public function talk()
    {
        echo "Warrior inda house";
    }
} 