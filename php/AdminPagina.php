<?php

if (isset($_POST['submit'])) {
                  $tipus = $_POST['tipus'];
                  $nom = $_POST['nom'];
                  $genere = $_POST['genere'];
                  $talla = $_POST['talla'];
                  $color = $_POST['color'];
                  $preu = $_POST['preu'];
                  $stock = $_POST['stock'];
                  $tipoArchivo = $_FILES['foto']['type'];

                  $permitido=array("image/png","image/jpeg");

                  //if per comprovar que es format de sa imatge sigui un d'aquells 2
                  if( in_array($tipoArchivo,$permitido) ==false ){
                      die("Archivo no permitido");
                  }
                  //format imatge per crear es binari dins una variable
                  $tamanoArchivo = $_FILES['foto']['size'];
                  $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
                  $binariosImagen = fread($imagenSubida, $tamanoArchivo);
                  //conexio
                  include_once "db_empresa.php";
                  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
                  $binariosImagen = mysqli_escape_string($con, $binariosImagen);
                  //query
                  include_once "db_empresa.php";

                  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
                  $query = "INSERT INTO roba (Producte,Nom,Genere,Talla,Color,Preu,Stock,imatge,tipoimatge) values
                  ('$tipus','$nom','$genere','$talla','$color',$preu,$stock,'" . $binariosImagen . "','" . $tipoArchivo . "');";
                  /* ('" . $binariosImagen . "','" . $tipoArchivo . "');";*/
                  $res = mysqli_query($con, $query);

          }
 ?>
<?php
session_start();
$existent=$_SESSION['usuari_login'];

if (isset($_SESSION['user'])) {
  $user=$_SESSION['user'];
}


if ($existent=='existeix') {
  echo '<a href="../index.php"><button class="button2"><b>Log Out <img src="../imatges/logout.png" width="20px"></b></button></a>';
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
  <a href=""><img style="margin-left:-5%;" src="../imatges/logo1.png" width="200px"></a><h1 style="color:white;"><span class="linia">Administració productes</span></h1>
</div>

<div style="overflow:auto;">
  <div class="top">
    <div><button class="button3" disabled>Benvingut <b><?php echo $user; ?></b></button> </div>
  </div>
  <div class="menu"></div>
  <div class="contenedor">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form">
				<div class="form-general">
					<h1 class="form-title">C<span class="titol">reació </span>D<span class="titol">el </span>P<span class="titol">roducte</span></h1>

          <div class="grupo">
    				<input type="text" name="tipus" required><span class="barra"></span>
            <label class="label" for="">Tipus de producte</label>
          </div>
          <div class="grupo">
    				<input type="text" name="nom"  required><span class="barra"></span>
            <label class="label" for="">Nom Comercial</label>
          </div>
          <div class="grupo">
    				<input type="text" name="genere" required><span class="barra"></span>
            <label class="label" for="">Genere</label>
          </div>
          <div class="grupo">
    				<input type="text" name="talla" required><span class="barra"></span>
            <label class="label" for="">Talla</label>
          </div>
          <div class="grupo">
    				<input type="text" name="color" required><span class="barra"></span>
            <label class="label" for="">Color</label>
          </div>
          <div class="grupo">
    				<input type="number" name="preu" step="any" required><span class="barra"></span>
            <label class="label" for="">Preu</label>
          </div>
          <div class="grupo">
    				<input type="number" name="stock" required><span class="barra"></span>
            <label class="label" for="">Stock</label>
          </div>
          <div class="grupo">
    			  <input type="file" name="foto" required><span class="barra"></span>
            <label class="dataN" for="">Imatge</label>
          </div>
    			<button type="submit" name="submit" class="button">Creació</button>
        </div>
			</form>
    </div>

  <div class="main">

      <h4 class="form-title">F<span class="titol">iltre</span></h4>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
          <label  for="">Producte</label>
          <input type="text" name="tipus" style="max-width: 15%;">
          <label  for="">Genere</label>
          <input type="text" name="genere" style="max-width: 15%;">
          <label  for="">Talla</label>
          <input type="text" name="talla" style="max-width: 15%;">
          <label  for="">Color</label>
          <input type="text" name="color" style="max-width: 15%;">
        <button type="submit" name="submitFiltre" class="button2">Filtrar</button>
      </form>
<?php

  if(isset($_POST['submitFiltre'])){
    if(isset($_POST['tipus'])){
      $tipus = $_POST['tipus'];
    }
    else{
      $tipus = 'Producte';
    }
    if(isset($_POST['genere'])){
      $genere = $_POST['genere'];
    }
    else {
      $genere = 'Genere';
    }
    if(isset($_POST['talla'])){
      $talla = $_POST['talla'];
    }
    else {
      $talla = 'Talla';
    }
    if(isset($_POST['color'])){
      $color = $_POST['color'];
    }
    else {
      $color = 'Color';
    }






 ?>
  </div>
  <div class="main">
    <h1 class="form-title">P<span class="titol">roductes</span></h1>
    <table>
      <tr>
        <th>Producte</th>
        <th>Nom</th>
        <th>Genere</th>
        <th>Talla</th>
        <th>Color</th>
        <th>Preu</th>
        <th>Stock</th>
      </tr>

    <?php
        include_once "db_empresa.php";

        $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
        $query = "SELECT * FROM roba where Producte = $tipus and Genere = $genere and Talla = $talla and Color = $color;";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($res)) {
    ?>
      <tr>
        <td><?php echo $row['Producte']; ?></td>
        <td><?php echo $row['Nom']; ?></td>
        <td><?php echo $row['Genere']; ?></td>
        <td><?php echo $row['Talla']; ?></td>
        <td><?php echo $row['Color']; ?></td>
        <td><?php echo $row['Preu']; ?> €</td>
        <td><?php echo $row['Stock']; ?> Unid.</td>
      </tr>
    </table>
    <?php
        }
      }
    ?>

  </div>
  <div class="right"></div>
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
  <div class="main2">
    <h2 style="text-align:center; padding-top:30px">No has iniciat sesió en aquesta pàgina, Retorna a l'inici </h2>
    <div align="center"><img src="../imatges/logoicon.png" width="20%" style="margin:auto"></div>
    <br>
    <div align="center" style="height:80px"><a href="../index.php"><button class="buttonn"><b>Inci</b></button></a></div>
    <br>
  </div>
</div>

<div class="footer">© 2020 - 2021 - NIMA, SL</div>

</body>
</html>
<?php
}
?>
