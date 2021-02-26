<?php
session_start();
$existent=$_SESSION['usuari_login'];

if (isset($_SESSION['user'])) {
  $user=$_SESSION['user'];
}


if ($existent=='existeix') {
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../imatges/logoicon.ico">
  <title>Nima Deports</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="..\css\CssAdminPagina.css">
</head>
<body>

<div style="padding:15px;text-align:center;">
  <a href=""><img src="../imatges/logo1.png" width="200px"></a><h1 style="color:white;"><span class="linia">Administració productes</span></h1>
</div>

<div style="overflow:auto;">
  <div class="menu">
    <div><a href="../index.php"><button class="button2">Benvingut <?php echo $user; ?> <b>Log Out</b></button></a></div>
    <!--POSAR FORMULARI AMB IMATGES MIAM QUE TAL-->
    <div>
        <img src="../imatges/pantalones.jpg" width="10%" style="border-radius:50px;border: 1px solid black;">
        <img src="../imatges/pantalones.jpg" width="10%" style="border-radius:50px;border: 1px solid black;">
        <img src="../imatges/pantalones.jpg" width="10%" style="border-radius:50px;border: 1px solid black;">
        <img src="../imatges/pantalones.jpg" width="10%" style="border-radius:50px;border: 1px solid black;">
        <img src="../imatges/pantalones.jpg" width="10%" style="border-radius:50px;border: 1px solid black;">
    </div>
    <div></div>
  </div>

  <div class="main">
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
    <img src="../imatges/logo1.png" width="50%"><img src="../imatges/logo1.png" width="50%">
  </div>
</div>

<div class="footer">© 2020 - 2021 - NIMA, SL</div>

</body>
</html>
<?php
  }else {
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../imatges/logoicon.ico">
  <title>Nima Deports</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="..\css\CssAdminPagina.css">
</head>
<body>

<div style="padding:15px;text-align:center;">
  <a href=""><img src="../imatges/logo1.png" width="200px"></a><h1 style="color:white;"><span class="linia">Uep! Que fas per aquí!</span></h1>
</div>

<div style="overflow:auto;">
  <div class="main" style="min-width: 60%;">
    <h2 style="text-align:center; padding-top:30px">No has iniciat sesió en aquesta pàgina, Retorna a l'inici </h2>
    <div align="center"><img src="../imatges/logoicon.png" width="20%" style="margin:auto"></div>
    <br>
    <div align="center" style="height:80px"><a href="../index.php"><button class="button2"><b>Inci</b></button></a></div>
    <br>
  </div>
</div>

<div class="footer">© 2020 - 2021 - NIMA, SL</div>

</body>
</html>
<?php
}
?>
