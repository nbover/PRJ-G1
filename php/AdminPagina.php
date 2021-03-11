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
if (isset($_POST['submitDelComentari'])){

  $id = $_POST['submitDelComentari'];

  include_once "db_empresa.php";
  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
  $query = "delete from comentaris where ID = $id;";
  $res = mysqli_query($con, $query);



}
?>
<?php
//Variables de sessió de l'admin
session_start();
$existent=$_SESSION['usuari_login'];

if (isset($_SESSION['user'])) {
  $user=$_SESSION['user'];
}

//si tenim la variable de sessió que es fa quan iniciam sessió mostra aixo:
if ($existent=='existeix') {
  echo '<a href="../index.php"><button class="button2"><b>Log Out <img src="../imatges/logout.png" width="20px"></b></button></a>';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../imatges/logoicon.ico">
  <title>Nima Deports</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="..\css\CssAdminPagina1.css">

</head>
<body>

<div style="padding:15px;text-align:center;">
  <a href=""><img style="margin-left:-5%;" src="../imatges/logo1.png" width="200px"></a><h1 style="color:white;"><span class="linia">Administració productes</span></h1>
</div>

<div>
  <div class="top">
    <div><button class="button3" disabled>Benvingut <b><?php echo $user; ?></b></button> </div>
  </div>
  <div class="menu"></div>
  <div class="contenedor">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form">
				<div class="form-general">
					<h1 class="form-title">C<span class="titol">reació </span>D<span class="titol">el </span>P<span class="titol">roducte</span></h1>
          <!-- Formulari crear producte -->
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
    <!--Formulari filtre de productes -->
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




//perque funcioni el filtre juntament amb mysql
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
 <!-- Llistat de productes mitjançant select -->
  <div class="main" id="productes">
    <h1 class="form-title">P<span class="titol">roductes</span></h1>
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
        $query = "SELECT * FROM roba where $limit and $limit1 and $limit2 and $limit3;";
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
        <!-- Botons per editar i eliminar productes -->
        <td><a href='updateAdmin.php?update=<?php echo $row['ID']; ?>'><button class='button99 button98' >Editar</button></a><a href='deleteAdmin.php?delete=<?php echo $row['ID']; ?>'><button class='button99 button97'>Eliminar</button></a></td>
      </tr>

    <?php
        }
      ?>
    </table>
    </div>
    <?php
  }elseif (!isset($_POST['submitFiltre']))  {
    ?>
    <div class="main" id="productes">
      <h1 class="form-title">P<span class="titol">roductes</span></h1>
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
          $query = "SELECT * FROM roba;";
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
          <td><a href='updateAdmin.php?update=<?php echo $row['ID']; ?>'><button class='button99 button98' >Editar</button></a><a href='deleteAdmin.php?delete=<?php echo $row['ID']; ?>'><button class='button99 button97'>Eliminar</button></a></td>
        </tr>

      <?php
          }
        ?>
      </table>
      </div>
      <?php
  }
    ?>

    </table>
  </div>
  <div class="right"></div>
</div>
<div>
  <div class="comentaris" id="comentaris">
    <h3 class="form-title">C<span class="titol">omentari</span></h3>
    <table id="resultat">
      <tr class="tr">
        <th>Usuari</th>
        <th>Comentari</th>
        <th>Data</th>
        <th>Acció</th>
      </tr>
      <?php
          include_once "db_empresa.php";
          //llistat de comentaris d'usuaris
          $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
          $query = "SELECT * FROM comentaris;";
          $res = mysqli_query($con, $query);
          while ($row = mysqli_fetch_assoc($res)) {
      ?>
        <tr class="trr">
          <td><?php echo $row['Usuari']; ?></td>
          <td><?php echo $row['Comentari']; ?></td>
          <td><?php echo $row['Fecha']; ?></td>
          <td><form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  ><button type="submit" name="submitDelComentari" value="<?php echo $row['ID']; ?>" class='button99 button97'>Eliminar</button></td>
        </tr>

      <?php
          }
        ?>
      </table>
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
  <link rel="stylesheet" type="text/css" href="..\css\CssAdminPagina1.css">
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
