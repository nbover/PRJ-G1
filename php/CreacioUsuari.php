<?php
      if ($_POST)
      {
      $user="$_POST[user]";
      $pwd1= "$_POST[pwd1]";
      $nom= "$_POST[nom]";
      $llin1= "$_POST[llin1]";
      $llin2= "$_POST[llin2]";
      $correu= "$_POST[correu]";
      $data= "$_POST[data]";
      $gender= "$_POST[gender]";
      }

      function fullname($nom,$llin1,$llin2)
      {
        return "$nom $llin1 $llin2";
      }

      function llinatges($llin1,$llin2)
      {
        return "$llin1 $llin2";
      }


        $llinatges2= llinatges($llin1,$llin2);

      include_once "db_empresa.php";

      $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

      $query_select = "select * from usuaris where Usuari = '$user'";
      $result_select = $con->query($query_select);
      $usuari_existent = $result_select->fetch_object();





?>
<html>
<head>
  <link rel="shortcut icon" href="../imatges/logoicon.ico">
  <title>Nima Deports</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Raleway:500,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="..\css\FormIniciNouUsuari.css">
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
  <?php
    if($usuari_existent != null){
   ?>
    <div class="contenedor">
			<form method="post" action="FormIniciNouUsuari.php" class="form">
				<div class="form-general">
					<h1 class="form-title">I<span class="titol">nfo </span>D<span class="titol">el </span>R<span class="titol">egistre</span></h1>
          <div style="text-align: center;font-size:20px;">
            <br><p style="color: red;">XXXXXXXXXXXXXXXXXXXXX </p><p>L'Usuari <b><?php echo $user ?></b> ja existeix. <p style="color: red;">XXXXXXXXXXXXXXXXXXXXX </p><br>
        </div>
        <button type="submit">Retornar al Formulari</button>
       </div>
    </form>
   </div>
      <?php
          }else{
      ?>
    <div class="contenedor">
  		<form method="post" action="FormIniciUsuari.php" class="form">
  			<div class="form-general">
  				<h1 class="form-title">I<span class="titol">nfo </span>D<span class="titol">el </span>R<span class="titol">egistre</span></h1>
          <div style="text-align: center;font-size:20px;">
          <?php
          $md5=md5($pwd1);
          $query = "INSERT INTO usuaris (Usuari,Password,Nom,Llinatges,Email,DataN,Sexe) values ('$user','$md5','$nom','$llinatges2','$correu','$data','$gender');";
          $res = mysqli_query($con, $query);

          echo "<br><br><b>Benvingut a NIMA<br></b>";
          echo fullname($nom,$llin1,$llin2);
          echo "<br>";
          echo "<br>";
          echo "<b>El teu usuari és: </b><br>".$user." <br><br><br>";


          ?>
         </div>
    			<button type="submit">Iniciar Sesió</button>
        </div>
			</form>
    </div>
    <?php
      }
     ?>
    <div class="right">
  <!--  <h2>About</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>-->
  </div>
</div>

<div class="footer">© 2020 - 2021 - NIMA, SL</div>
</body>
</html>
