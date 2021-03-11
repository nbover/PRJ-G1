<?php
//clase person
class Person
{
public $name;
public $dni;

public function setName($name)
{
$this->name=$name;
}

public function setSurname($surname)
{
$this->surname=$surname;
}

public function setEdat($edat)
{
$this->edat=$edat;
}

public function getName()
{
  return $this->name;
}

public function getSurname()
{
  return $this->surname;
}

public function getEdat()
{
  return $this->edat;
}

public function __construct($name,$surname,$edat)
{
$this->name=$name;
$this->surname=$surname;
$this->edat=$edat;
}

public function print()
{
  echo "$this->name $this->surname<br><br>";
  echo "Tenc $this->edat anys<br><br>";
}

protected function oneYearOlder()
  {
    $this->edat=++$this->edat;
  }

}
?>
