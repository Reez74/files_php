<?php
header('Content-Type: text/html; charset=utf-8');
class Person{
  private $name;
  private $lastname;
  private $age;
  private $mother;
  private $father;
  function __construct($name,$lastname,$age,$mother=null,$father=null){
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
  } 
  public function getName(){return $this->name;}
  public function getLastName(){return $this->lastname;}
  public function getAge(){return $this->age;}
  public function getMother(){return $this->mother;}
  public function getFather(){return $this->father;}
  public function getInfo(){
    return "
    Меня зовут: ".$this->name."<br>
    Мою маму зовут: ".$this->mother->name."<br>
    Моего папу зовут: ".$this->getFather()->getName()."<br>
    Мою бабушку по маминой линии зовут: ".$this->getMother()->getMother()->getName()."<br>
    Моего дедушку по маминой линии зовут: ".$this->getMother()->getFather()->getName()."<br>
    Мою бабушку по папиной линии зовут: ".$this->getFather()->getMother()->getName()."<br>
    Моего дедушку по папиной линии зовут: ".$this->getFather()->getFather()->getName();
  }
}
// Бабушка и дедушка по папиной линии:
$anna = new Person("Анна","Петрова",63);
$fedor = new Person("Федор","Петров",68);

// Бабушка и дедушка по маминой линии:
$nina = new Person("Нина","Иванова",64);
$pavel = new Person("Павел","Иванов",71);

$oleg = new Person("Олег","Петров",41,$anna,$fedor);
$olga = new Person("Ольга","Петрова",41,$nina,$pavel);
$igor = new Person("Игорь","Петров",12,$olga,$oleg);
echo $igor->getInfo();
?>
