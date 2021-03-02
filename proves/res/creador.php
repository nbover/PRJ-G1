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
  echo "El correu és $this->gmail<br><br>";
}
}
?>
