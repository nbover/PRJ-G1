<?php

if($_GET){
  $id = $_GET['delete'];

}





?>
<html>
<body>
<h2>Delete Form</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<p>ID: <input type="text" name="id" value="<?php echo $id ?>" readonly></p>
<input type="submit"  name='submit' value="Confirmar">
</form>
</body>
</html>
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
  echo "<tr><th>Resultat</th><th>Acció</th></tr>";

  echo "<tr>";
  echo "<td>Has eliminat el vehicle de la base de dades</td>";
  echo "<td><a href='AdminPagina.php'><button class='button button1' >Retornar</button></a></td>";
  echo "</tr>";

echo "</table>";
}



?>
