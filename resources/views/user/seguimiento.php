<?php 
use App\Libraries\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
<title>MENÚ USUARIO - FORMULARIOS</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel='stylesheet' href="<?=$GLOBALS['raiz'].'resources/assets/css/fuente.css'?>">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel="icon" href="favicon.ico" type="image/x-icon"/>
  <link rel="shortcut icon" href="<?=$GLOBALS['raiz'].'resources/assets/img/logo.svg'?>" type="image/x-icon"/>
  
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['raiz'].'resources/assets/css/style.css'?>">
  
  <script src="<?=$GLOBALS['raiz'].'resources/assets/js/jquery.min.js'?>" type="text/javascript"></script>
</head>
<body>

  <div class="w3-col m1 w3-center"><p> </p></div>
  <div class="w3-col m10 w3-white w3-center">
      <div style="margin-bottom: 30px;">
        <img src="<?=$GLOBALS['raiz'].'resources/assets/img/logo_crear.jpg'?>">
      </div>
        <a href="<?=$GLOBALS['urlRaiz'].'user'?>"><button type="button">Volver a FORMULARIOS</button></a><br>
<br>
  <div class="w3-panel w3-pale-green w3-leftbar w3-border-light-green">
    <h3 align="left">Seguimiento FORMULARIO Nº<?=$id?> 
    </h3>
  </div>
EN ESPERA <span style="width: 15px;height: 15px;display: inline-block;border: 1px solid black;" class="w3-white"></span>
          OBSERVACIÓN <span style="width: 15px;height: 15px;display: inline-block;" class="w3-orange"></span>
          VERIFICADO <span style="width: 15px;height: 15px;display: inline-block;" class="w3-light-green"></span>
<br>
<br>

<div class="w3-bar w3-border w3-light-grey">
<?php Helpers::crearItemSeguimiento($pasosValidos,$observaciones);?>
</div>

<a href="<?=$GLOBALS['urlRaiz'].'editarFormulario/'.$id?>"><button type="button">EDITAR FORMULARIO</button></a><br>
     <p><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>
     </div>
    <div class="w3-col m1 w3-center"><p></p></div>

</body>
</html>    