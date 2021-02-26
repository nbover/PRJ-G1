<?php

session_start();
$_SESSION['usuari_login']=null;
/*
$_SESSION['nom']=null;
$_SESSION['contra']=null;
*/
 ?>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>hhh</title>
   </head>
   <body>
     Login:
     <form action="./res/contingutlogin.php" method="post">
       usuari:
       <input type="text" name="cookiename">
       contra:
       <input type="password" name="cookiepwd">
       <br>
       <input type="submit" value="Envia">
     </form>
   </body>
 </html>
<?php
/*$nomcokie="usuaria";
if(isset($_GET['cookiename']))
{
$usuaricookie=$_GET['cookiename'];
}
if (isset($usuaricookie))
setcookie('nom', 'Maadiva');

setcookie($nomcokie,$usuaricookie,time()+120,"./res/");
*/
 ?>
