<?php
class Creador extends Person
{
//propietat
private $gmail;

//setter
public function setGmail($gmail)
{
  $this->gmail=$gmail;
}

//getter
public function getGmail()
{
  return $this->gmail;
}

//construct
public function __construct($name,$surname,$edat,$gmail)
{
  parent::__construct($name,$surname,$edat);
  $this->gmail=$gmail;
}

//print
public function print()//overriding print method from parent class Person
{
  parent::print();//calling print method from parent class Person
  echo "El correu és <a href='mailto:$this->gmail?subject=contactepagina'>$this->gmail </a><br>";
  parent::oneYearOlder($this->edat);
  echo "L'any que ve tendré $this->edat<br><br>";
}
}
?>
