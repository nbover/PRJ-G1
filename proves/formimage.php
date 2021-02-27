<!doctype html>
<html lang="en">
<head>
    <title>Images</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
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
                        $query = "INSERT INTO roba (Producte,Nom,Genere,Talla,Color,Preu,Stock,imatge,tipoimatge) values
                        ('$tipus','$nom','$genere','$talla','$color',$preu,$stock,'" . $binariosImagen . "','" . $tipoArchivo . "');";
                        /* ('" . $binariosImagen . "','" . $tipoArchivo . "');";*/
                        $res = mysqli_query($con, $query);

                }
                ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="form-group">
                      <label class="label" for="">Tipus de producte</label>
                      <input type="text" name="tipus" required>
                  </div>
                  <div class="form-group">
                      <label class="label" for="">Nom Comercial</label>
                      <input type="text" name="nom" required>
                  </div>
                  <div class="form-group">
                      <label class="label" for="">Genere</label>
                      <input type="text" name="genere" required>
                  </div>
                  <div class="form-group">
                      <label class="label" for="">Talla</label>
                      <input type="text" name="talla" required>
                  </div>
                  <div class="form-group">
                      <label class="label" for="">Color</label>
                      <input type="text" name="color" required>
                  </div>
                  <div class="form-group">
                      <label class="label" for="">Preu</label>
                      <input type="number" name="preu" step="any" required>
                  </div>
                  <div class="form-group">
                      <label class="label" for="">Stock</label>
                      <input type="number" name="stock" required>
                  </div>
                    <div class="form-group">
                        <label class="label" for="">Imatge</label>
                        <input type="file" name="foto" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
