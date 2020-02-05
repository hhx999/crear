<?php 
use App\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
  <title>PANEL ADMINISTRACIÓN - FORMULARIOS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <style type="text/css">
    /* The Modal (background) */
/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* 
The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

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
.acciones {
  transition:all .2s ease-in-out;
}
.acciones:hover{
border-radius:50%;
-webkit-border-radius:50%;
box-shadow: 0px 0px 5px 5px #4caf50;
-webkit-box-shadow: 0px 0px 5px 5px #4caf50;
}
  </style>
</head>
<div id="formulario_eliminar" class="w3-modal">
  <div class="w3-modal-content">
  </div>
</div>
<body>
  <div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white w3-center">
    <h3>ADMINISTRACIÓN</h3>
    <fieldset style="margin-bottom: 20px;">
      <legend style="color:green;">Opciones de administración</legend>
        <div class="w3-col m12 l12" style="margin-bottom: 20px;">
          <a href="{{ url('/logout') }}" class="w3-btn w3-red">Cerrar sesión(<?=$nombreUsuario?> <span class="blink">&#9673;</span>)</a>
          <a class="w3-btn w3-green" href="{{ url('/crearLineaCredito') }}">Crear linea de crédito</a>
          <a class="w3-btn w3-light-green" href="{{ url('/verPendientesCreditos') }}" style="color: #fff !important;">Ver pendientes</a>
          <a class="w3-btn w3-blue-gray" href="{{ url('/adminUsuarios') }}" style="color: #fff !important;">Ver usuarios</a>
        </div>
      </fieldset>
        <!-- FORMULARIO DE BUSQUEDA -->
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
              <ul>
                <li style="display: table;">
                  <span style="width: 15px;height: 15px;display: inline-block;" class="w3-red"></span> Rechazado
                </li>
                <li style="display: table;">
                  <span style="width: 15px;height: 15px;display: inline-block;border: 1px solid black;" class="w3-white"></span> Enviado
                </li>
                <li style="display: table;">
                  <span style="width: 15px;height: 15px;display: inline-block;" class="w3-orange"></span> Observación
                </li>
                <li style="display: table;">
                  <span style="width: 15px;height: 15px;display: inline-block;" class="w3-khaki"></span> Actualización
                </li>
                <li style="display: table;">
                  <span style="width: 15px;height: 15px;display: inline-block;" class="w3-green"></span> Completo
                </li>
              </ul>
            </div>
            <br>
        </div>
        <!-- TABS DE FORMULARIOS SEGÚN ESTADOS -->
        <div class="w3-col w3-container m8 l9">
          <div class="w3-container">
            <div class="w3-row">
              <a href="javascript:void(0)" id="tramite" class="tabLinks">
                <div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding w3-border-khaki">En trámite</div>
              </a>
              <a href="javascript:void(0)" id="completos" class="tabLinks">
                <div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding">Aprobados</div>
              </a>
              <a href="javascript:void(0)" id="eliminados" class="tabLinks">
                <div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding">Rechazados</div>
              </a>
              <a href="javascript:void(0)" id="verTodos" class="tabLinks" style="text-decoration: none;">
                <div class="w3-rest tablink w3-bottombar w3-hover-light-grey w3-padding">VER TODOS</div>
              </a>
            </div>

            <div id="tramite" class="w3-container city w3-animate-opacity" style="display:block">
              <br>
              <div class="w3-responsive">  
                <?php Helpers::crearRegistrosForm('admin',$formularios,'tramite');?>
              </div>
            </div>

            <div id="completos" class="w3-container city w3-animate-opacity" style="display:none">
              <br>
              <div class="w3-responsive">  
                <?php Helpers::crearRegistrosForm('admin',$formularios,'completos');?>
              </div>
            </div>

            <div id="eliminados" class="w3-container city w3-animate-opacity" style="display:none">
              <br>
              <div class="w3-responsive">  
                <?php Helpers::crearRegistrosForm('admin',$formularios,'eliminados');?>
              </div>
            </div>

            <div id="verTodos" class="w3-container city w3-animate-opacity" style="display:none">
              <br>
              <div class="w3-responsive">  
                <?php Helpers::crearRegistrosForm('admin',$formularios,'verTodos');?>
              </div>
            </div>
          <p><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>
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
<script type="text/javascript">
  $("a#eliminar").click(function(){
    console.log('grewoak');
    div = $('#formulario_eliminar');
    id = $(this).parents('tr').find('td')[0].textContent;
    div.prepend('<div id="contenidoeliminar" class="w3-container w3-green" align="center" style="padding:20px;">\
                      <span class="close">&times;</span>\
                      <h2>Desea eliminar el formulario con ID '+id+' ?</h2>\
                      <select id="motivoEliminar" name="motivoEliminar">\
                        <option value="Errores de formulación">Errores de formulación</option>\
                        <option value="Inactividad del usuario(15 días hábiles sin contestar)">Inactividad del usuario(15 días hábiles sin contestar)</option>\
                      </select>\
                      <p id="idEliminar" style="display:none;">'+id+'</p>\
                        <button id="siModal" class="w3-button w3-teal" type="button">SI</button>\
                        <button id="noModal" class="w3-button w3-red" type="button">NO</button>\
                  </div>');
    $('#formulario_eliminar').show();
  });
  $(document).on('click','.close',function() {
    $('#formulario_eliminar').hide();
    $("#contenidoeliminar").remove();
  });
  $(document).on('click','#noModal',function() {
    $('#formulario_eliminar').hide();
    $("#contenidoeliminar").remove();
  });
  $(document).on('click','#siModal',function() {
    var datos = {};
    console.log($('#motivoEliminar'));
        datos['id'] = $('#idEliminar').text();
        datos['motivoEliminar'] = document.getElementById("motivoEliminar").value;
    var url = window.location.pathname.split('/');
    url = '/'+url[1]+'/'+url[2]+'/';
    $.ajax({
        type: 'POST',
        url: url+'eliminarFormulario',
        dataType: 'JSON',
        data : datos
    }).done(function (data) {
        $(".modal").css('display','none');
        $(".modal").remove();
        if (data == 1) {
          alert('Formulario ELIMINADO correctamente!');
        } else {
          alert('No existe un motivo para eliminar el formulario!');
        }
        //location.reload();
    }).fail(function () {
        alert('Ocurrio un error. Por favor, pongase en contacto con el administrador.');
        console.log('Error');
        location.reload();
    });
  }); 
</script>

</body>
</html>    