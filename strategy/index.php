<?php
/**
 * Strategy pattern in action
 */

include("characters/AbstractCharacter.php");
include("characters/King.php");
include("characters/Warrior.php");

include("weapons/WeaponBehavior.php");
include("weapons/Blunt.php");
include("weapons/Bow.php");
include("weapons/Knife.php");
include("weapons/Sword.php");

$king = new King();
$king->talk();
echo "<br/>";
echo $king->attack();
echo "<br/>";
echo "<br/>";

$king->setWeapon(new Knife());
echo $king->attack();
