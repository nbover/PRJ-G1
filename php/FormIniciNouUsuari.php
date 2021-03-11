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

    <div class="contenedor">
			<form method="post" action="CreacioUsuari.php" class="form">
				<div class="form-general">
					<h1 class="form-title">R<span class="titol">egistre </span>D<span class="titol">e </span>U<span class="titol">suari</span></h1>

          <div class="grupo">
    				<input type="text" name="user" id="name" required><span class="barra"></span>
            <label class="label" for="">Usuari</label>
          </div>
          <div class="grupo">
    				<input type="password" name="pwd1" id="password" required><span class="barra"></span><button onclick="mostrarContrasena()" style="height: 20px;width: 40%;text-align:center;font-size:15px;">Visualitza</button>
            <label class="label" for="">Password</label>
          </div>
          <div class="grupo">
    				<input type="text" name="nom" id="name" required><span class="barra"></span>
            <label class="label" for="">Nom</label>
          </div>
          <div class="grupo">
    				<input type="text" name="llin1" id="name" required><span class="barra"></span>
            <label class="label" for="">Primer Llinatge</label>
          </div>
          <div class="grupo">
    				<input type="text" name="llin2" id="name" required><span class="barra"></span>
            <label class="label" for="">Segon Llinatge</label>
          </div>
          <div class="grupo">
    				<input type="email" name="correu" id="name" required><span class="barra"></span>
            <label class="label" for="">Email</label>
          </div>
          <div class="grupo">
    				<input type="date" name="data" id="name" required><span class="barra"></span>
            <label class="dataN" for="">Data de Naixement</label>
          </div>
          <div class="grupo">
            <div class="radio">
              <input type="radio" id="male" name="gender" value="Home">
              <label for="Home" >Home</label>
            </div>
            <div class="radio">
              <input type="radio" id="female" name="gender" value="Dona" >
              <label for="Dona" >Dona</label>
            </div>
            <div class="radio">
              <input type="radio" id="other" name="gender" value="Altre">
              <label for="Altre" >Altre</label>
            </div>
          </div>
    			<button type="submit">Sign Up</button>
        </div>
			</form>
    </div>
    <div class="right">
  <!--  <h2>About</h2>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>-->
  </div>
</div>

<div class="footer">© 2020 - 2021 - NIMA, SL</div>

<script>
//funció per mostrar password visible
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
</body>
</html>
