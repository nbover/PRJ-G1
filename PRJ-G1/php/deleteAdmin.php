<?php
//pàgina per eliminar productes

if(!empty($_GET['delete'])){
       $id=$_GET["delete"];
     }
if(!empty($_GET["id"])){
     $id=$_GET["id"];
   }
   //obtenim les variables de sessió de l'usuari admin
   session_start();
   $existent=$_SESSION['usuari_login'];

   if (isset($_SESSION['user'])) {
     $user=$_SESSION['user'];
   }
//si tenim la variable de sessio de que hem accedir correctament , mostra aixo:
if ($existent=='existeix') {
  echo '<a href="../index.php"><button class="button2"><b>Log Out <img src="../imatges/logout.png" width="20px"></b></button></a>';
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <link rel="shortcut icon" href="../imatges/logoicon.ico">
    <title>Nima Deports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="..\css\CssAdminPaginaDelete.css">

  </head>
  <body>

  <div style="padding:15px;text-align:center;">
    <a href="AdminPagina.php"><img style="margin-left:-5%;" src="../imatges/logo1.png" width="200px"></a><h1 style="color:white;"><span class="linia">Administració productes</span></h1>
  </div>

  <div>
    <div class="top">
      <div><button class="button3" disabled>Benvingut <b><?php echo $user; ?></b></button> </div>
    </div>
    <div class="menu"></div>
    <div class="contenedor">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="form">
        <h1 class="form-title">E<span class="titol">liminar </span>P<span class="titol">roducte</span></h1>
        <p>ID: <input type="text" name="id" value="<?php echo $id ?>" readonly style="text-align:center;"></p>
        <input type="submit"  name='submit' value="Confirmar">
      </form>
    </div>

    <div class="main" style="height:31%">

        <h4 class="form-title" style="font-size:135%">R<span class="titol">esultat</span></h4>
        <?php

        if(isset($_GET['submit'])){
          $id2 = $_GET['id'];

          include_once "db_empresa.php";
          $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
          $query = "delete from roba where ID = $id2;";
          $res = mysqli_query($con, $query);

          echo "<style>
          #resultat {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 80%;
          margin: auto;
          text-align: center;
          }

          #resultat td, #resultat th {
          border: 1px solid #ddd;
          padding: 8px;
          }

          #resultat tr:nth-child(even){background-color: #f2f2f2;}

          #resultat tr:hover {background-color: #ddd;}

          #resultat th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #f44336;
          color: white;
          text-align: center;
          }

          .button {
          background-color: #4CAF50;
          border: none;
          color: white;
          padding: 10px 22px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 14px;
          margin: 1px 1px;
          margin-right: 5px;
          cursor: pointer;
          border-radius: 25px;
          }
          .button1 {background-color: #4CAF50;}
          </style>";
          echo "<table id='resultat'>";
          echo "<tr><th></th><th>Acció</th></tr>";

          echo "<tr>";
          echo "<td>Has eliminat el producte de la base de dades</td>";
          echo "<td><a href='AdminPagina.php'><button class='button button1' >Retornar</button></a></td>";
          echo "</tr>";

        echo "</table>";
          }
        ?>
    </div>
    <div class="footer" style="margin-left:42%">© 2020 - 2021 - NIMA, SL</div>
  </body>
  </html>
  <?php
  //si no existeix l'usuari logueat mostra:
}else {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <link rel="shortcut icon" href="../imatges/logoicon.ico">
    <title>Nima Deports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="..\css\CssAdminPaginaDelete.css">
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
