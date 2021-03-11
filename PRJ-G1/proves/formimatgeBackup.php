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
                if (isset($_REQUEST['guardar'])) {
                    if (isset($_FILES['foto']['name'])) {
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
                        $query = "INSERT INTO roba (imatge,tipoimatge) values ('" . $binariosImagen . "','" . $tipoArchivo . "');";
                        $res = mysqli_query($con, $query);
                    }
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="foto">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="guardar">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
