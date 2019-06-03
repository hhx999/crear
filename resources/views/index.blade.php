<?php 
use App\Libraries\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
<title>INICIO - PLATAFORMA CREAR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
<link rel="shortcut icon" href="resources/assets/img/logo.svg" type="image/x-icon"/>
<style type="text/css">
:root {
  --mainColor: #8bc34a;
}
a {
background:
  linear-gradient(
            to bottom, var(--mainColor) 0%,
               var(--mainColor) 100%
              );
            background-position: 0 100%;
            background-repeat: repeat-x;
            background-size: 4px 4px;
            color: #000;
            text-decoration: none;
            transition: all .6s;
  }
a:hover {
        background-size: 4px 50px;
        color: white;
        }
</style>
</head>
<body>
  <div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white w3-center">

      <div style="margin-bottom: 30px;">
        
      </div>
      <div class="w3-container">
        <h3>Bienvenido a la plataforma web de la Agencia de Desarrollo Rionegrino CREAR.</h3>
        <p>Si usted ya posee una cuenta ingrese con su número de documento y contraseña, en caso contrario puede <a href="index.php/registro">registrarse desde aquí</a>.</p>
      <div class="w3-card-4">
        <div class="w3-container w3-light-green">
          <h3 style="color:white;">INGRESO</h3>
        </div>
        <form class="w3-container" action="" method="post">
          {{ csrf_field() }}
          <p>      
          <label class="w3-text"><b>DNI</b></label>
          <input class="w3-input w3-border w3-pale-green" style="text-align: center;" name="dni" type="text"></p>
          <p>      
          <label class="w3-text"><b>Contraseña</b></label>
          <input class="w3-input w3-border w3-pale-green" style="text-align: center;" name="password" type="password"></p>
          <p>
          <?=$msgError?>
          <button class="w3-btn w3-light-green" style="color:white !important;">INGRESAR</button></p>
        </form>
      </div>
  <p><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>
</div>
      <div style="height: 150px;"></div>
  </div>
    
  <div class="w3-col m1 w3-center"><p></p></div>

</body>
</html>    