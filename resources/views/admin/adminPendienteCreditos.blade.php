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
          <h3>Créditos pendientes de aprobación</h3>
          <a href="{{ url('/logout') }}" class="w3-btn w3-red">LOGOUT(<?=$nombreUsuario?> <span class="blink">&#9673;</span>)</a>
          <a class="w3-btn w3-green" href="{{ url('/admin') }}">Volver a formularios</a>
          <a class="w3-btn w3-light-green" href="{{ url('/registro') }}" style="color: #fff !important;">Registrar usuario</a>
        <!-- FORMULARIO DE BUSQUEDA -->
        </div>
        <div style="border-top: 2px solid #4CAF50;display: inline-block;width: 30px;"></div>
  <div style="border-top: 2px solid #0174b6;display: inline-block;width: 25px;"></div>
  <div style="border-top: 2px solid #4CAF50;display: inline-block;width: 92%;"></div>

      <div class="w3-col m12">
        <form action="{{url('/crearCredito')}}" method="post" name="crearCredito">
          <table class="w3-table w3-bordered">
                <thead>
                  <tr class="w3-light-green">
                    <th style="color: white;">ID</th>
                    <th style="color: white;">Fecha</th>
                    <th style="color: white;">Formulario_id</th>
                    <th style="color: white;">confirmado</th>
                  </tr>
                </thead>
                <tbody>
                  @if($pendientesCreditos->isNotEmpty())
                    @foreach($pendientesCreditos as $pendiente)
                      <td>
                          <input type="text" name="pendiente_id[]" value="{{$pendiente->id}}">
                      </td>
                      <td>
                        <input type="text" name="fecha[]" value="{{$pendiente->fecha}}">
                      </td>
                      <td>
                          <input type="text" name="formulario_id[]" value="{{$pendiente->formulario_id}}">
                      </td>
                      <td>
                          <select name="confirmado[]">
                            <option value="{{$pendiente->confirmado}}">No</option>
                            <option value="1">Si</option>
                          </select>
                      </td>
                    @endforeach
                  @else
                      <td colspan="4" style="text-align: center;">No existen registros.</td>
                  @endif
                </tbody>
          </table>
          @if($pendientesCreditos->isNotEmpty())
          <input class="w3-button w3-green" style="color: white;" type="submit" name="enviarPendientes" value="Crear creditos">
          @endif
        </form>
      </div>
  </div>
        <!-- TABS DE FORMULARIOS SEGÚN ESTADOS -->
    <div class="w3-col m1 w3-center"><p></p></div>
    <div class="w3-col m12" align="center">
      <p><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>
    </div>

</body>
</html>