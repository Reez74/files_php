<?php
header('Content-Type: text/html; charset=utf-8');
abstract class Animal{
  private $nickname;
  private $age;
  private $breed;
  function __construct($nick,$age,$breed){
    $this->nickname = $nick;
    $this->age = $age;
    $this->breed = $breed;
  }
  function getNickame(){return $this->nickname;}
  function getAge(){return $this->age;}
  function getBreed(){return $this->breed;}
}

class Horse extends Animal {
  function run(){ 
    echo("Игого, я поскакал(а)<br/>"); 
  }
} 

class Pegasus extends Horse {
  function fly(){
    echo("Игого, я полетел(а)<br/>");    
  }
}

$agat = new Horse("Agat",7,"Mustang");
$pegas = new Pegasus("Pegas",8,"Spirit");

echo $agat->run();
echo $pegas->fly();
?>
