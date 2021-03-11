<?php
//pagini d'inici admin
  if(isset($_POST['submit']))
  {

    $user = $_POST['user'];
    $pw = $_POST['password'];
    $md5=md5($pw);

    include_once "db_empresa.php";

    $db = new mysqli($db_host, $db_user, $db_pass, $db_database);
    $sql = "select UsuariAdmin from administradors where UsuariAdmin = '$user'";
    $resultat = $db->query($sql);
    while($row = $resultat->fetch_assoc()){
      $var = $row["UsuariAdmin"];

    }
    $sql = "select PasswordAdmin from administradors where UsuariAdmin = '$user'";
    $resultat = $db->query($sql);
    while($row = $resultat->fetch_assoc()){
      $var2 = $row["PasswordAdmin"];

    }
error_reporting(E_ALL ^ E_NOTICE);
    //si l'usuari no existeix:
    if($var !== $user){
      echo '<script type="text/javascript">
      alert("El Usuari introduït no existeix");
      </script>';
      //si l'usuari no te la password inserida:
    }elseif ($var2 !== $md5) {
      echo '<script type="text/javascript">
      alert("La contrasenya no concideix amb el usuari introduït");
      </script>';
    }else{
      //si has iniciat correctament, publica unes sessions i et redirigeix cap a una pagina.
      session_start();
      $_SESSION['usuari_login'] = "existeix";
      $_SESSION['user'] = $user;
      header('Location: AdminPagina.php');
    }





  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../imatges/logoicon.ico">
  <title>Nima Deports</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Raleway:500,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="..\css\FormIniciAdminn.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
</head>
<body>

<div style="padding:15px;text-align:center;">
  <a href="../index.php"><img src="../imatges/logo1.png" width="200px"></a><h1 style="color:white;"><span class="linia">Uneix-te al deport</span></h1>
</div>

<div style="overflow:auto;">
  <div class="menu">
    <!--<a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
    <a href="#">Link 4</a>-->

  </div>

    <div class="contenedor">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form">
				<div class="form-general">
					<h1 class="form-title">A<span class="titol">dministrador</span></h1>

          <div class="grupo">
    				<input type="text" name="user" id="name" required><span class="barra"></span>
            <label for="">Usuari</label>
          </div>
          <div class="grupo">
    				<input type="password" name="password" id="name" required><span class="barra"></span>
            <label for="">Password</label>
          </div>
    			<button type="submit" name="submit">Login</button>
        </div>

			</form>
    </div>


  <div class="right">
  <!--  <h2>About</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>-->

  </div>
</div>

<div class="footer">© 2020 - 2021 - NIMA, SL</div>

</script>
</body>
</html>
