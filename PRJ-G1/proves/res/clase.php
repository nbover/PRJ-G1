<html>
<head>
<title>crida</title>
</head>
<body>
<?php
require "person.php";
require "creador.php";

include_once "../db_empresa.php";
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
?><h3 align="center"><?php
$query = "select * from administradors where UsuariAdmin='nbover';";
$res = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($res)) {

$nico=new Creador($row['NomAdmin'],$row['Surname'],$row['Edat'],$row['Correu']);
echo $nico->print();
}
?></h3><h3 align="center"><?php
$query = "select * from administradors where UsuariAdmin='mbusquets';";
$res = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($res)) {

$marti=new Creador($row['NomAdmin'],$row['Surname'],$row['Edat'],$row['Correu']);
echo $marti->print();
}

?>
</h3>
<?php
$checksum = crc32("marti");
printf("%u\n", $checksum);

echo "<br>Nico<br>";
$str = "von32";
$juan=md5($str);
echo $juan;

echo "<br>Marti<br>";
$str = "1234";
echo md5($str);

?>
</body>
</html>
