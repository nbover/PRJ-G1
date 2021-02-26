<?php

if ($_GET)
{
$color=$_GET['color'];
}

if (isset($color)) {
  setcookie('cookieMB',$color,time()+3600,"/");
}



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-color:<?php echo $_COOKIE['cookieMB'] ?>;">
    <a href="cookie.php?color=black">DARK MODE</a><br>
    <a href="cookie.php?color=white">White MODE</a><br>
    <a href="cookieresultat.php">Resultat</a>
  </body>
</html>
