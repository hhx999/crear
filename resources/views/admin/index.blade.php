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
.modal {
  display: block; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

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

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
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
<body>

  <div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white w3-center">
    <fieldset style="margin-bottom: 20px;">
      <legend style="color:green;">Opciones de administración</legend>
        <div class="w3-col m12 l12" style="margin-bottom: 20px;">
          <a href="{{ url('/logout') }}" class="w3-btn w3-red">Cerrar sesión(<?=$nombreUsuario?> <span class="blink">&#9673;</span>)</a>
          <a class="w3-btn w3-green" href="{{ url('/') }}">Ver sitio</a>
          <a class="w3-btn w3-light-green" href="{{ url('/registro') }}" style="color: #fff !important;">Registrar usuario</a>
          <a class="w3-btn w3-blue-gray" href="{{ url('/adminUsuarios') }}" style="color: #fff !important;">Ver usuarios</a>
        </div>
      </fieldset>
        <!-- GUÍAS PARA EL ADMINISTRADOR DE ESTADOS 
        <div class="w3-col m12 l12" style="margin-bottom: 20px;">
          ELIMINADO <span style="width: 15px;height: 15px;display: inline-block;" class="w3-red"></span>
          ENVIADO <span style="width: 15px;height: 15px;display: inline-block;border: 1px solid black;" class="w3-white"></span>
          OBSERVACIÓN <span style="width: 15px;height: 15px;display: inline-block;" class="w3-orange"></span>
          ACTUALIZADO <span style="width: 15px;height: 15px;display: inline-block;" class="w3-khaki"></span>
          ARCHIVADO <span style="width: 15px;height: 15px;display: inline-block;" class="w3-grey"></span>
          COMPLETO <span style="width: 15px;height: 15px;display: inline-block;" class="w3-light-green"></span>
          <br>
        </div>
        -->
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
                  <span style="width: 15px;height: 15px;display: inline-block;" class="w3-red"></span> Eliminado
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
                <div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding">Completos</div>
              </a>
              <a href="javascript:void(0)" id="eliminados" class="tabLinks">
                <div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding">Eliminados</div>
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
    div = $(this).parents('div');
    id = $(this).parents('tr').find('td')[0].textContent;
    div.prepend('<div class="modal">\
                  <div class="modal-content">\
                    <div class="modal-header">\
                      <span class="close">&times;</span>\
                      <h2>Desea eliminar el formulario con ID '+id+' ?</h2>\
                      <p id="idEliminar" style="display:none;">'+id+'</p>\
                    </div>\
                    <div class="modal-footer">\
                        <button id="siModal" class="w3-button w3-teal" type="button">SI</button>\
                        <button id="noModal" class="w3-button w3-red" type="button">NO</button>\
                    </div>\
                  </div>\
                </div>');
  });
  $(document).on('click','.close',function() {
    console.log('Este click cierra la ventana');
    $(".modal").css('display','none');
    $(".modal").remove();
  });
  $(document).on('click','#noModal',function() {
    $(".modal").css('display','none');
    $(".modal").remove();
  });
  $(document).on('click','#siModal',function() {
    var datos = {};
        datos['id'] = $('#idEliminar').text();
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
        alert('Formulario ELIMINADO correctamente!');
        location.reload();
    }).fail(function () {
        alert('Ocurrio un error. Por favor, pongase en contacto con el administrador.');
        console.log('Error');
        location.reload();
    });
  }); 
</script>

</body>
</html>    