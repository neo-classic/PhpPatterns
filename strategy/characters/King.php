<?php
class King extends AbstractCharacter
{
    public function __construct()
    {
        $this->_weapon = new Sword();
    }

    public function talk()
    {
        echo "King inda house!";
    }
} 