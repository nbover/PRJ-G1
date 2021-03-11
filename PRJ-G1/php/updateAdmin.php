<?php 
if(!empty($_GET['update'])){
       $id=$_GET["update"];
     }
if(!empty($_POST["id"])){
     $id=$_POST["id"];
   }

if (isset($_POST['submit'])) {
                  $tipus = $_POST['tipus'];
                  $nom = $_POST['nom'];
                  $genere = $_POST['genere'];
                  $talla = $_POST['talla'];
                  $color = $_POST['color'];
                  $preu = $_POST['preu'];
                  $stock = $_POST['stock'];
                  $id2 = $_POST['id'];
                  if(empty($_FILES['foto']['type'])){
                    $foto = "imatge = imatge, tipoimatge = tipoimatge";
                  } else {

                      $tipoArchivo = $_FILES['foto']['type'];

                      $permitido=array("image/png","image/jpeg");

                      //if per comprovar que es format de sa imatge sigui un d'aquells 2
                      if( in_array($tipoArchivo,$permitido) ==false ){
                          die("Archivo no permitido.");
                      }
                      //format imatge per crear es binari dins una variable
                      $tamanoArchivo = $_FILES['foto']['size'];
                      $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
                      $binariosImagen = fread($imagenSubida, $tamanoArchivo);
                      //conexio
                      include_once "db_empresa.php";
                      $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
                      $binariosImagen = mysqli_escape_string($con, $binariosImagen);

                      $foto = "imatge = '" . $binariosImagen . "', tipoimatge = '" . $tipoArchivo . "'";
                  }
                  //query
                  include_once "db_empresa.php";

                  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
                  $query = "UPDATE roba SET Producte = '$tipus', Nom = '$nom', Genere = '$genere',
                  Talla = '$talla', Color = '$color', Preu = $preu, Stock = $stock, $foto where ID = $id2;";
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
  <link rel="stylesheet" type="text/css" href="..\css\CssAdminPaginaUpdate2.css">

</head>
<body>

<div style="padding:15px;text-align:center;">
  <a href="AdminPagina.php"><img style="margin-left:-5%;" src="../imatges/logo1.png" width="200px"></a><h1 style="color:white;"><span class="linia">Administració productes</span></h1>
</div>

<div>
  <div class="top">
    <div><button class="button3" disabled>Benvingut <b><?php echo $user;?></b></button> </div>
  </div>
  <div class="menu"></div>
  <div class="contenedor">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form">
				<div class="form-general">
					<h1 class="form-title">E<span class="titol">dició </span>D<span class="titol">el </span>P<span class="titol">roducte</span></h1>

          <div class="dataN">
    				<input type="text" name="id" value="<?php echo $id ?>" readonly style="text-align:center;"><span class="barra"></span>
            <label class="label" for="">ID</label>
          </div>
          <?php
              include_once "db_empresa.php";

              $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
              $query = "SELECT * FROM roba where ID = $id;";
              $res = mysqli_query($con, $query);
              while ($row = mysqli_fetch_assoc($res)) {
          ?>
              <div class="grupo">
        				<input type="text" name="tipus" value="<?php echo $row['Producte']; ?>" required><span class="barra"></span>
                <label class="label" for="">Tipus de producte</label>
              </div>
              <div class="grupo">
        				<input type="text" name="nom" value="<?php echo $row['Nom']; ?>" required><span class="barra"></span>
                <label class="label" for="">Nom Comercial</label>
              </div>
              <div class="grupo">
        				<input type="text" name="genere" value="<?php echo $row['Genere']; ?>" required><span class="barra"></span>
                <label class="label" for="">Genere</label>
              </div>
              <div class="grupo">
        				<input type="text" name="talla" value="<?php echo $row['Talla']; ?>" required><span class="barra"></span>
                <label class="label" for="">Talla</label>
              </div>
              <div class="grupo">
        				<input type="text" name="color" value="<?php echo $row['Color']; ?>" required><span class="barra"></span>
                <label class="label" for="">Color</label>
              </div>
              <div class="grupo">
        				<input type="number" name="preu" value="<?php echo $row['Preu']; ?>" step="any" required><span class="barra"></span>
                <label class="label" for="">Preu</label>
              </div>
              <div class="grupo">
        				<input type="number" name="stock" value="<?php echo $row['Stock']; ?>" required><span class="barra"></span>
                <label class="label" for="">Stock</label>
              </div>
              <div class="grupo">
        			  <input type="file" name="foto"><span class="barra"></span>
                <label class="dataN" for="">Imatge</label>
              </div>
          <?php
              }
            ?>
    			<button type="submit" name="submit" class="button">Editar</button>
        </div>
			</form>
    </div>


    <div class="main" id="productes">
      <h1 class="form-title">P<span class="titol">roducte</span></h1>
      <table id="resultat">
        <tr class="tr">
          <th>Producte</th>
          <th>Nom</th>
          <th>Genere</th>
          <th>Talla</th>
          <th>Color</th>
          <th>Preu</th>
          <th>Stock</th>
          <th>Acció</th>
        </tr>

      <?php
          include_once "db_empresa.php";

          $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
          $query = "SELECT * FROM roba where ID = $id;";
          $res = mysqli_query($con, $query);
          while ($row = mysqli_fetch_assoc($res)) {
      ?>
        <tr class="trr">
          <td><?php echo $row['Producte']; ?></td>
          <td><?php echo $row['Nom']; ?></td>
          <td><?php echo $row['Genere']; ?></td>
          <td><?php echo $row['Talla']; ?></td>
          <td><?php echo $row['Color']; ?></td>
          <td><?php echo $row['Preu']; ?> €</td>
          <td><?php echo $row['Stock']; ?> Unid.</td>
          <td><a href='AdminPagina.php'><button class='button99 button98' >Retornar</button></a></td>
        </tr>


      </table>
      <img width="200" style="margin-left: 35%;" src="data:<?php echo $row['tipoimatge']; ?>;base64,<?php echo  base64_encode($row['imatge']); ?>">
      <?php
          }
        ?>
      </div>


    </table>
  </div>
  <div class="right"></div>
</div>
<div>
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
  <link rel="stylesheet" type="text/css" href="..\css\CssAdminPagina2.css">
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

<div class="footer" style="margin-left:42%">© 2020 - 2021 - NIMA, SL</div>

</body>
</html>
<?php
}
?>
