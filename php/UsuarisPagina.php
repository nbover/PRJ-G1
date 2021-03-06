
<?php
session_start();
$existent=$_SESSION['usuari_login2'];

if (isset($_SESSION['user2'])) {
  $user=$_SESSION['user2'];
}


if (isset($_POST['submitComentari'])) {

  $user1 = $user;
  $comentari = $_POST['comentari'];

  include_once "db_empresa.php";

  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
  $query = "INSERT INTO comentaris (Usuari,Comentari) values ('$user1','$comentari');";
  $res = mysqli_query($con, $query);


}


if ($existent=='existeix') {
  echo '<a href="../index.php"><button class="button6"><b>Log Out <img src="../imatges/logout.png" width="20px"></b></button></a>';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../imatges/logoicon.ico">
  <title>Nima Deports</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/efe0365769.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="..\css\CssUsuarisPagina30.css">
</head>
<body>

<div style="padding:15px;text-align:center;">
  <a href=""><img style="margin-left:-5%;" src="../imatges/logo1.png" width="200px"></a><h1 style="color:white;"><span class="linia">Descobreix els nostres productes</span></h1>
</div>
<div class="top">
  <div><button class="button3" disabled>Benvingut <b><?php echo $user; ?></b></button> </div>
</div>
<div style="overflow:auto;">
  <div class="main">

      <h4 class="form-title">F<span class="titol">iltre</span></h4>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
          <label  for="">Producte</label>
          <select  name="tipus" style="width: 15%;">
            <option value=""></option>
            <option value="Deportives">Deportives</option>
            <option value="Calçons">Calçons</option>
            <option value="Sudaderes">Sudaderes</option>
          </select>
          <label  for="">Genere</label>
          <select  name="genere" style="width: 15%;">
            <option value=""></option>
            <option value="Home">Home</option>
            <option value="Dona">Dona</option>
          </select>
          <label  for="">Talla</label>
          <input type="text" name="talla" style="max-width: 15%;">
          <label  for="">Color</label>
          <select  name="color" style="width: 15%;">
            <option value=""></option>
            <option value="Blanc">Blanc</option>
            <option value="Negre">Negre</option>
            <option value="Gris">Gris</option>
          </select>
        <button type="submit" name="submitFiltre" class="button2">Filtrar</button>
      </form>
      </div>
      <?php





        if(isset($_POST['submitFiltre'])){
                if(empty($_POST['tipus'])){
                  $limit = "Producte = Producte";
                }else {

                  $tipusF = $_POST["tipus"];
                  $limit = "Producte = '".$tipusF."'";
                }

                if(empty($_POST['genere'])){
                  $limit1 = "Genere = Genere";
                }else {

                  $genereF = $_POST['genere'];
                  $limit1 = "Genere = '".$genereF."'";
                }

                if(empty($_POST['talla'])){
                  $limit2 = "Talla = Talla";
                }else {

                  $tallaF = $_POST['talla'];
                  $limit2 = "Talla = '".$tallaF."'";
                }

                if(empty($_POST['color'])){
                  $limit3 = "Color = Color";
                } else {

                  $colorF = $_POST['color'];
                  $limit3 = "Color = '".$colorF."'";
                }
      ?>
      <div class="grid" >
        <h1 class="form-title">P<span class="titol">roductes</span></h1>

        <?php


            include_once "db_empresa.php";

            $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
            $query = "SELECT * FROM roba where $limit and $limit1 and $limit2 and $limit3;";
            $res = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <div class="item" id="item" data-descripcion="<?php echo $row['Nom'];?> <?php echo $row['Preu']; ?> €">
          <div class="item-contenido" id="item">
            <img width="200" src="data:<?php echo $row['tipoimatge']; ?>;base64,<?php echo  base64_encode($row['imatge']); ?>">
          </div>
          </div>
        <?php
            }
          ?>

      </div>
    </div>
    <?php
    include_once "db_empresa.php";

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
    $query = "SELECT * FROM roba;";
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {
     ?>
     <div class="overlay" id="overlay">
       <div class="contenedor-img">
         <button id="btn-cerrar-popup"><i class="fas fa-times"></i></button>
         <img width="200" src="">
         <p class="descripcion"></p>
       </div>
     </div>
     <?php
     }
       ?>
       <div>
         <div class="comentaris">
           <h3 class="form-title">C<span class="titol">omentari</span></h3>
           <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
             <textarea rows="6" cols="116" name="comentari"></textarea>
             <button type="submit" name="submitComentari" class="button2">Enviar</button>
           </form>
         </div>
         <div class="right"></div>
       </div>


      <?php
      }elseif (!isset($_POST['submitFiltre']))  {
       ?>



      <div class="grid" >
        <h1 class="form-title">P<span class="titol">roductes</span></h1>

        <?php


            include_once "db_empresa.php";

            $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
            $query = "SELECT * FROM roba;";
            $res = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <div class="item" id="item" data-descripcion="<?php echo $row['Nom'];?> <?php echo $row['Preu']; ?> €">
          <div class="item-contenido" id="item">
            <img width="200" src="data:<?php echo $row['tipoimatge']; ?>;base64,<?php echo  base64_encode($row['imatge']); ?>">
          </div>
        </div>

    <?php
        }

      ?>



    </div>
</div>
<?php
include_once "db_empresa.php";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
$query = "SELECT * FROM roba;";
$res = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($res)) {
 ?>
 <div class="overlay" id="overlay">
   <div class="contenedor-img">
     <button id="btn-cerrar-popup"><i class="fas fa-times"></i></button>
     <img width="200" src="">
     <p class="descripcion"></p>
   </div>
 </div>
 <?php
 }
   ?>
   <div>
     <div class="comentaris">
       <h3 class="form-title">C<span class="titol">omentari</span></h3>
       <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
         <textarea rows="6" cols="116" name="comentari"></textarea>
         <button type="submit" name="submitComentari" class="button2">Enviar</button>
       </form>
     </div>
     <div class="right"></div>
   </div>

<?php
}
  ?>

<script src="https://cdn.jsdelivr.net/npm/muuri@0.9.3/dist/muuri.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/web-animations-js@2.3.2/web-animations.min.js"></script>
<script src="../js/UsuarioReg.js"></script>
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
  <link rel="stylesheet" type="text/css" href="..\css\CssUsuarisPagina2.css">
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
