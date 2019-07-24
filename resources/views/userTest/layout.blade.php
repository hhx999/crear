<!DOCTYPE html>
<html>
<head>
<title>@yield('title')- PLATAFORMA CREAR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="{{ asset('img/logos/logocrearfirma.png') }}" sizes="32x32">

  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <link rel="stylesheet" href="{{ asset('css/userItemsIndex.css') }}">

  <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
 <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.steps.css')}}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
  <script src="{{asset('js/jquery.steps.js')}}"></script>

  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
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
        @if(null !== Session::get('usuario'))
        <div class="w3-col m12" style="margin-top: 20px;margin-bottom: 20px;">
          <hr>
          <div class="w3-bar">
            <a href="{{url('/usuarioIndex')}}" class="w3-bar-item w3-button">Inicio</a>
            <div class="w3-dropdown-hover">
              <button class="w3-button">Áreas</button>
              <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="{{ url('/capacitaciones') }}" class="w3-bar-item w3-button">Capacitaciones</a>
                <a href="{{url('/usuarioFinanciamiento')}}" class="w3-bar-item w3-button">Financiamiento</a>
                <a href="#" class="w3-bar-item w3-button">Comercio Interior</a>
                <a href="#" class="w3-bar-item w3-button">Comercio Exterior</a>
              </div>
            </div>
            <a href="{{url('/perfil')}}" class="w3-bar-item w3-button w3-hide-small">Perfil</a>
            <a href="{{url('/usuarioLogout')}}" class="w3-bar-item w3-red w3-button w3-hide-small">Salir</a>
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
        <p><small>Versión <b>TEST</b> de la plataforma para la <a target="_blank" href="//crear.rionegro.gov.ar">Agencia de Desarrollo Rionegrino CREAR</a>.</small></p>
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