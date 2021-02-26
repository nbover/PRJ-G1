<?php
session_start();
$user=$_SESSION['nom'];

include_once "../db_empresa.php";
$conn = new mysqli($db_host, $db_user, $db_pass, $db_database);

$query_select = "select * from usuaris where Usuari = '$user'";
$result_select = $conn->query($query_select);
while($row = $result_select->fetch_assoc()) {
    $usuari=$row["Usuari"];
    $correu=$row["Email"];
    $data=$row["DataN"];
    $sexe=$row["Sexe"];
  }

if ($_SESSION['usuari_login']!=null) {
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h1>Hola, aqui tens la teva info</h1>
     <h3><?php echo $usuari; ?></h3>
     <h3><?php echo $correu; ?></h3>
     <h3><?php echo $data; ?></h3>
     <h3><?php echo $sexe; ?></h3>
     <a href="../formlogin.php"><h1>Logout</h1></a>
   </body>
 </html>
<?php
}else {
 ?>
    <a href="../formlogin.php"<h1>LOGIN</h1></a>
    <h1>DONDE VAS PAYASO, SI NO TE LOGUEAS NO HACÉS NADA CRACK</h1>
    <h1>DONDE VAS PAYASO, SI NO TE LOGUEAS NO HACÉS NADA CRACK</h1>
    <h1>DONDE VAS PAYASO, SI NO TE LOGUEAS NO HACÉS NADA CRACK</h1>
    <h1>DONDE VAS PAYASO, SI NO TE LOGUEAS NO HACÉS NADA CRACK</h1>
    <h1>DONDE VAS PAYASO, SI NO TE LOGUEAS NO HACÉS NADA CRACK</h1>
<?php
  }
 ?>
