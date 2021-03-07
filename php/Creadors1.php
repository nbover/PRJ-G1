<html>
<head>
<link rel="shortcut icon" href="imatges/logoicon.ico">
<title>Nima Deports</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/efe0365769.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="..\css\CssCreadors.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
</h3>

<div style="padding:15px;text-align:center;">
  <a href="../index.php"><img src="../imatges/logo1.png" width="200px"></a><h1 style="color:white;"><span class="linia">Els nostres creadors</span></h1>
</div>

<div style="overflow:auto;">
  <div class="main">
      <?php
      require "clase2pe.php";
      require "clase3cr.php";

      include_once "db_empresa.php";
      $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
      ?>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <h4 class="form-title">C<span class="titol">reador</span></h4>
              <?php
              $query = "select * from administradors where UsuariAdmin='mbusquets';";
              $res = mysqli_query($con, $query);
              while ($row = mysqli_fetch_assoc($res)) {

              $marti=new Creador($row['NomAdmin'],$row['Surname'],$row['Edat'],$row['Correu']);
              echo $marti->print();
              }
              ?>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="form-title">C<span class="titol">reador</span></h4>
              <?php
              $query = "select * from administradors where UsuariAdmin='nbover';";
              $res = mysqli_query($con, $query);
              while ($row = mysqli_fetch_assoc($res)) {

              $nico=new Creador($row['NomAdmin'],$row['Surname'],$row['Edat'],$row['Correu']);
              echo $nico->print();
              }
              ?>
          </div>
        </div>
        <div class="card-final">
          <div>
              <h4 class="form-title">I<span class="titol">nfo</h4></span>Nosaltres som els creadors d'aquesta pàgina.
              Esperem que sigui del vostre agrad i <br>la disfruteu tant com nosaltres de fer-la.<br><br></h4>
          </div>
      </div>
      <div class="footer">© 2020 - 2021 - NIMA, SL</div>
  </div>
</div>
</body>
</html>
