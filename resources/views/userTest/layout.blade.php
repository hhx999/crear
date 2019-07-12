<!DOCTYPE html>
<html>
<head>
<title>@yield('title')- PLATAFORMA CREAR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <link rel="stylesheet" href="{{ asset('css/userItemsIndex.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<style type="text/css">
	.menuPrincipal {
		display: none;
		margin-top: 30px;
	}
</style>
<body class="bodyUI">
	<div class="w3-col m1 w3-center"><p></p></div>
  	<div class="w3-col m10 w3-white w3-center contenedor">
        @section('menu')
        <a href="{{ url('/usuarioIndex') }}">
        	<img src="{{ asset('img/logos/CREARlogo-blanco.png') }}" class="logoCrear">
        </a>
        @show
        @if(isset($estado))
        <div class="w3-col m12" style="margin-top: 20px;margin-bottom: 20px;">
          <hr>
          <div class="w3-bar w3-darkblue">
            <a href="{{url('/usuarioIndex')}}" class="w3-bar-item w3-button">Inicio</a>
            <a href="{{url('/usuarioDatos')}}" class="w3-bar-item w3-button w3-hide-small">Perfil</a>
            <a href="{{url('/usuarioDatos')}}" class="w3-bar-item w3-button w3-hide-small">Configuración</a>
            <a href="{{url('/usuarioLogout')}}" class="w3-bar-item w3-button w3-hide-small">Salir</a>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
          </div>
          <div id="demo" class="w3-bar-block w3-red w3-hide w3-hide-large w3-hide-medium">
            <a href="#" class="w3-bar-item w3-button">Link 1</a>
            <a href="#" class="w3-bar-item w3-button">Link 2</a>
            <a href="#" class="w3-bar-item w3-button">Link 3</a>
          </div>
        </div>
        @endif
        @yield('content')
        <div class="w3-col m12">
          <hr>
        </div>    
    </div>
  <div class="w3-col m1 w3-center"><p></p></div>
<script>
function myFunction() {
  var x = document.getElementById("demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
</body>
</html>