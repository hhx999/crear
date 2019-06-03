<?php 
use App\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
  <title>MENÚ USUARIO - FORMULARIOS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

<style type="text/css">
@keyframes blink {  
  0% { color: red; }
  50% { color: black; }
  100% { color: red; }
}
@-webkit-keyframes blink {
  0% { color: red; }
  50% { color: black; }
  100% { color: red; }
}
.blink {
  -webkit-animation: blink 1s linear infinite;
  -moz-animation: blink 1s linear infinite;
  animation: blink 1s linear infinite;
}
</style>
</head>
<body>

  <div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white w3-center">
      <div style="margin-bottom: 30px;">
        <!--<a href="index">
        <img src="resources/assets/img/logo_crear.jpg">
        </a>-->
      </div>
        <div class="w3-col m12 l12" style="margin-bottom: 20px;">
          <a href="{{ url('/logout') }}" class="w3-btn w3-red">LOGOUT(<?=$nombreUsuario?> <span class="blink">&#9673;</span>)</a>
          <a class="w3-btn w3-green" href="{{ url('/ingresarForm') }}">Ingresar formulario</a>
        </div>
        <div class="w3-col m12 l12" style="margin-bottom: 20px;">
          ENVIADO <span style="width: 15px;height: 15px;display: inline-block;border: 1px solid black;" class="w3-white"></span>
          OBSERVACIÓN <span style="width: 15px;height: 15px;display: inline-block;" class="w3-orange"></span>
          ACTUALIZADO <span style="width: 15px;height: 15px;display: inline-block;" class="w3-khaki"></span>
          COMPLETO <span style="width: 15px;height: 15px;display: inline-block;" class="w3-light-green"></span>
          <br>
        </div>
        <div class="w3-col w3-container m4 l3 w3-white">
            <div class="w3-card-4">
              <div class="w3-container w3-green">
                <p><b>Búsqueda</b></p>
              </div>
              <form class="w3-container" action="" method="get">
                <input class="w3-input" type="text" name="busqueda">
                <p>
                  <button class="w3-btn" style="background-color: #0176b9;color:white !important;">Buscar formulario</button>
                </p> 
              </form>
            </div>
            <div class="w3-container">
              <br>
              <b>La búsqueda se puede hacer por:</b>
              <div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border">
                  <ul class="w3-ul">
                  <li>Nombre del solicitante</li>
                  <li>Título del proyecto</li>
                  <li>Localidad</li>
                  <li>Agencia</li>
                  <li>Monto</li>
                </ul>
                </div>
            </div>
            <br>
        </div>
                <!-- TABS DE FORMULARIOS SEGÚN ESTADOS -->
        <div class="w3-col w3-container m8 l9">
          <div class="w3-container">
            <div class="w3-row">
              <a href="javascript:void(0)" id="tramite" class="tabLinks">
                <div class="w3-half tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-khaki">En trámite</div>
              </a>
              <a href="javascript:void(0)" id="completos" class="tabLinks">
                <div class="w3-half tablink w3-bottombar w3-hover-light-grey w3-padding">Completos</div>
              </a>
            </div>

            <div id="tramite" class="w3-container city w3-animate-opacity" style="display:block">
              <br>
              <div class="w3-responsive">  
                <?php Helpers::crearRegistrosForm('user',$formularios,'tramite');?>
              </div>
            </div>

            <div id="completos" class="w3-container city w3-animate-opacity" style="display:none">
              <br>
              <div class="w3-responsive">  
                <?php Helpers::crearRegistrosForm('user',$formularios,'completos');?>
              </div>
            </div>
            <p><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>

          </div>
        </div>
      </div>
    <div class="w3-col m1 w3-center"><p></p></div>
 <script>
        $('.tabLinks').click(function() {
          var nombre = $(this).attr('id');
          if (nombre == 'verTodos') {
            var clase = 'w3-border-indigo';
          } else if (nombre == 'eliminados'){
            var clase = 'w3-border-red';
          } else if (nombre == 'archivados'){
            var clase = 'w3-border-grey';
          } else if (nombre == 'tramite'){
            var clase = 'w3-border-khaki';
          }
            else if (nombre == 'completos'){
            var clase = 'w3-border-light-green';
          }
          $(this).children('div').addClass(clase);
          $('.city').each(function(){
            if ($(this).attr('id') == nombre ) {
              $(this).css("display","block");
            } else {
              $(this).css("display","none");
              $('.tabLinks').each(function() {
                if ($(this).attr('id') != nombre) {
                      $(this).children("div").removeClass('w3-border-light-green');
                      $(this).children("div").removeClass('w3-border-red');
                      $(this).children("div").removeClass('w3-border-grey');
                      $(this).children("div").removeClass('w3-border-khaki');
                      $(this).children("div").removeClass('w3-border-indigo');
                    }
              })
            }
          });
        });
        </script>
</body>
</html>    