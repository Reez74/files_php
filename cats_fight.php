<?php
class Cat {
    public $age;
    public $weight;
    public $strength;

    function __construct() {
    }

    function fight($anotherCat) {
        if($this->age * $this->weight + $this->strength > $anotherCat->age * $anotherCat->weight + $anotherCat->strength)
            return true;
        else
            return false;
    }
}

$cat1 = new Cat();
$cat1->age = 5;
$cat1->weight = 7;
$cat1->strength = 6;

$cat2 = new Cat();
$cat2->age = 4;
$cat2->weight = 5;
$cat2->strength = 12;

$result = $cat1->fight($cat2);
echo $result ? "Winner: Cat #1" : "Winner: Cat #2";
?>
