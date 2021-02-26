<?php
error_reporting (0);
if ($_POST)
{
$user="$_POST[cookiename]";
$pwd= "$_POST[cookiepwd]";
}

//Conecció BDD
include_once "../db_empresa.php";
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

$query_select = "select * from usuaris where Usuari = '$user' and Password='$pwd'";
$result_select = $con->query($query_select);
$usuari_existent = $result_select->fetch_object();

//Variables de Sesió
session_start();
if ($usuari_existent!=null){
  $_SESSION['usuari_login']=$usuari_existent;
  $_SESSION['nom']=$user;
}

 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family:Verdana;color:#aaaaaa;">

<div style="background-color:#e5e5e5;padding:15px;text-align:center;">
  <h1>Hello World</h1>
<?php
//SI S'USUARI EXISTEIX, MOSTRA AIXÓ
if ($usuari_existent!=null) {
?>   <a href="../formlogin.php"><h1>LOGOUT</h1></a>
      <h1>Benvingut <?php echo $_SESSION['nom']; ?>, miam que compres avui</h1>
      <a href="prova.php"> <h1>Info usuari</h1></a>

<?php
  }else {
    //SI S'USUARI NO EXISTEIX, MOSTRA AIXÓ
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

</div>
</body>
</html>
<?php
