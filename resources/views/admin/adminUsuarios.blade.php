<?php
use App\Libraries\Helpers;
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

/*
Code by https://codepen.io/AliRanjbar/pen/axomoY?page=2
*/
    * {
  -webkit-transition:all .35s ease;
  -o-transition:all .35s ease;
  transition:all .35s ease;
}
.excheckbox {
  width: 180px;
  height: 30px;
  background: #f0f0f0;
  border-radius: 15px;
  box-sizing: border-box;
  padding: 0 20px;
  position: relative;
  overflow: hidden;
}
.excheckbox label[id*=label-] {
  display: block;
  font-size: 12px;
  line-height: 30px;
}
.excheckbox #label-1 {
  float: right;
}
.excheckbox #label-2 {
  float: left;
}
.excheckbox #roll {
  position: absolute;
  top: 0;
  margin: auto;
  width: 50%;
  height: 100%;
  border-radius: 15px;
  background: #8bc34a;
}
.excheckbox input[type=checkbox] {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  opacity: 0;
}
.excheckbox input[type=checkbox]:checked + #roll {
  left: 50%;
}
.excheckbox input[type=checkbox]:not(:checked) + #roll {
  background: #b4b4b4;
  left: 0;
}
  </style>
</head>
<body>

  <div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white w3-center">

        <div class="w3-col m12 l12" style="margin-bottom: 20px;">
          <h3>ADMINISTRACIÓN DE USUARIOS</h3>
          <a href="{{ url('/logout') }}" class="w3-btn w3-red">LOGOUT(<?=$nombreUsuario?> <span class="blink">&#9673;</span>)</a>
          <a class="w3-btn w3-green" href="{{ url('/admin') }}">Volver a formularios</a>
          <a class="w3-btn w3-light-green" href="{{ url('/registro') }}" style="color: #fff !important;">Registrar usuario</a>
        <!-- GUÍAS PARA EL ADMINISTRADOR DE ESTADOS -->
        <div class="w3-col m12 l12" style="margin-bottom: 20px;margin-top: 20px;">
          NO VERIFICADO <span style="width: 15px;height: 15px;display: inline-block;background: #b4b4b4;"></span>
          VERIFICADO <span style="width: 15px;height: 15px;display: inline-block;" class="w3-light-green"></span>
          <br>
          <button class="w3-btn w3-khaki" id="guardarUsuarios">Guardar configuración</button>
        </div>
        <!-- FORMULARIO DE BUSQUEDA -->
        <div class="w3-col w3-container m4 l3 w3-white">
            <div class="w3-card-4">
              <div class="w3-container w3-green">
                <p><b>Búsqueda</b></p>
              </div>
              <form class="w3-container" action="" method="get">
                <input class="w3-input" type="text" name="busqueda">
                <p>
                  <button class="w3-btn" style="background-color: #0176b9;color:white !important;">Buscar usuarios</button>
                </p> 
              </form>
            </div>
            <div class="w3-container">
              <br>
              <b>La búsqueda se puede hacer por:</b>
              <div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border">
                  <ul class="w3-ul">
                  <li>Número de documento</li>
                  <li>Nombre del usuario</li>
                  <li>EMAIL</li>
                </ul>
                </div>
            </div>
            <br>
        </div>
        <!-- TABS DE FORMULARIOS SEGÚN ESTADOS -->
        <div class="w3-col w3-container m8 l9">
             <table class="w3-table w3-bordered">
                <tr class="w3-light-green">
                  <th style="color: white;">Operaciones</th>
                  <th style="color:white;">NOMBRE</th>
                  <th style="color:white;">DNI</th>
                  <th style="color:white;">EMAIL</th>
                  <th style="color:white;">Verificado</th>
                </tr>
          <?php
          for ($i=0; $i < count($usuarios); $i++) {
            $verificado = '';
          if ($usuarios[$i]->verificado == 1) {
             $verificado = 'checked';
           } 
            echo '<tr>
                  <td><a href="verUsuario/'.$usuarios[$i]->id.'">Ver info usuario</a></td>
                  <td class="nombreUsuario">'.$usuarios[$i]->nombreApellido.'</td>
                  <td>'.$usuarios[$i]->dni.'</td>
                  <td>'.$usuarios[$i]->email.'</td>
                  <td align="center">
                    <div class="excheckbox">
                      <label id="label-1">En espera</label>
                      <label id="label-2">Verificado!</label>
                      <input class="userVerificado" type="checkbox" name="'.$usuarios[$i]->dni.'" '.$verificado.'>
                      <div id="roll"></div>
                    </div>
                  </td>
                </tr>';
          }
          ?>
              </table>
            </div>
            <p><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>
    <script type="text/javascript">
    var usuarios = new Array();
    var dniArray = new Array();
    var dniNovalidado = new Array();

    $(".userVerificado").change(function() {
    var nombreUsuario = $(this).parent().parent().parent('tr').find('.nombreUsuario').text();
    if(this.checked) {
    var index = dniNovalidado.indexOf($(this).attr('name'));
            if (index != -1) {
              dniNovalidado.splice(index,1);
            } else {
              usuarios.push(Array($(this).attr('name'),nombreUsuario));
            }
            dniArray.push($(this).attr('name'));
        } else {
            index = dniArray.indexOf($(this).attr('name'));
            if (index != -1) {
              dniArray.splice(index,1);
            } else {
              usuarios.push(Array($(this).attr('name'),nombreUsuario));
            }
              dniNovalidado.push($(this).attr('name'));
        }
    });
    </script>
    <script type="text/javascript">
      $('#guardarUsuarios').click(function() {
        div = $(this).parent('div');

        divView = $('<div class="modal"></div>');
        divContent = $('<div class="modal-content"></div>');
        divHeader = $('<div class="modal-header"><span class="close">&times;</span><h2>Los usuarios modificados son: </h2></div>');
        tableUsuario = $('<table class="w3-table-all w3-centered"><tr><th>DNI</th><th>Nombre</th><th>X</th></tr></table>');

        for (var i = 0;i < usuarios.length; i++) {
          if (dniArray.indexOf(usuarios[i][0]) != -1) {
            tableUsuario.append($('<tr><td class="dniUsuario" style="color:green;">'+usuarios[i][0]+'</td><td style="color:green;">'+usuarios[i][1]+'(Verificado)</td><td class="limpiarUsuario">LIMPIAR</td></tr>'));
          } 
          if (dniNovalidado.indexOf(usuarios[i][0]) != -1) {
            tableUsuario.append($('<tr><td class="dniUsuario" style="color:#757575;">'+usuarios[i][0]+'</td><td style="color:#757575;">'+usuarios[i][1]+'(En espera)</td><td class="limpiarUsuario">LIMPIAR</td></tr>'));
          }
        }

        divFooter = $('<div class="modal-footer">\
                        <button id="siModal" class="w3-button w3-teal" type="button">SI</button>\
                        <button id="noModal" class="w3-button w3-red" type="button">NO</button>\
                    </div>');

        divContent.append(divHeader);
        divContent.append(tableUsuario);
        divContent.append(divFooter);
        divView.append(divContent);
        div.prepend(divView);

        });


      $(document).on('click','.limpiarUsuario', function () {
        dniLimpiar = $(this).parent('tr').find('.dniUsuario').text();
        var index = dniArray.indexOf(dniLimpiar);
        if (index > -1) {
           dniArray.splice(index, 1);
        }
        index = dniNovalidado.indexOf(dniLimpiar);
        if (index > -1) {
           dniNovalidado.splice(index, 1);
        }
        $(this).parent('tr').remove();
      });


      $(document).on('click','.close',function() {
        $(".modal").css('display','none');
        $(".modal").remove();
      });


      $(document).on('click','#noModal',function() {
        $(".modal").css('display','none');
        $(".modal").remove();
      });


      $(document).on('click','#siModal',function() {
        $.ajax({
            type: 'POST',
            url: "{{ url('/verificarUsuarios') }}",
            dataType: "json",
            data : {'dniVerificados' : dniArray, 'dniNoverificados' : dniNovalidado }
        }).done(function (data) {
            if (data == 1) {
              alert('Los usuarios han sido verificados!');
              window.location.reload(true);
            } else {
              alert('Ha ocurrido un error al verificar los usuarios');
              window.location.reload(true);
            }
        }).fail(function () {
            alert('Ocurrio un error. Por favor, pongase en contacto con el administrador.');
            window.location.reload(true);
        });

      });
    </script>
    <div class="w3-col m1 w3-center"><p></p></div>

</body>
</html>    