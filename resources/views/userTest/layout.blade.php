<!DOCTYPE html>
<html>
<head>
<title>@yield('title')- PLATAFORMA CREAR</title>
  <style type="text/css">
    .loader {
        /*background: url('img/logos/logocrearfirma.png') 50% 50% no-repeat rgb(249,249,249);*/
        background-color: #384e77;
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        opacity: 1;
    }
    #animation-rotate {
    animation: rotate 3s infinite;
    animation-name: rotate;
    animation-duration: 3s;
    animation-timing-function: ease;
    animation-delay: 0s;
    animation-iteration-count: infinite;
    animation-direction: normal;
    animation-fill-mode: none;
    animation-play-state: running;
    }
    @keyframes rotate {
    0%, 100% {
    transform: rotate(10deg);
    }
    50% {
    transform: rotate(-10deg);
    }
    }
  </style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="{{ asset('img/logos/logocrearfirma.png') }}" sizes="32x32">

  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <link rel="stylesheet" href="{{ asset('css/userItemsIndex.css') }}">

  <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
 <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.steps.css')}}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript">
    $(window).on("load",function(){
      $(".loader").fadeOut("slow");
    });
</script>

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
  <div class="loader" align="center" style="padding-top: 250px;">
    <img id="animation-rotate" src="{{ asset('img/logos/logocrearfirma.png') }}" alt="Cargando..."><br>
  </div>
  	<div class="w3-col m1 w3-center"><p></p></div>
    	<div class="w3-col m10 w3-white w3-center contenedor">
          @section('menu')
          @if(date("n") == '12')
          <span><img src="{{asset('img/navidad/gorronavidad_crear.png')}}" style="width: 47px;
z-index: 2;
position: absolute;
margin-top: 10px;
margin-left: 225px;"></span>
          <a href="{{ url('/usuarioIndex') }}">
            <img src="{{ asset('img/logos/CREARlogo-navidad.png') }}" class="logoCrear">
          </a>
          @else
          <a href="{{ url('/usuarioIndex') }}">
          	<img src="{{ asset('img/logos/CREARlogo-blanco.png') }}" class="logoCrear">
          </a>
          @endif
          @show
          @if(null !== Session::get('usuario'))
          <div class="w3-col m12" style="margin-top: 20px;margin-bottom: 20px;">
            <hr>
            <div class="w3-bar">
              <a href="{{url('/usuarioIndex')}}" class="w3-bar-item w3-button">Inicio</a>
              <a href="{{url('/perfil')}}" class="w3-bar-item w3-button w3-hide-small">Mi Perfil</a>
              <a href="{{url('/usuarioLogout')}}" class="w3-bar-item w3-red w3-button w3-hide-small">Cerrar sesión</a>
              <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
            </div>
            <div id="demo" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium">
              <a href="{{url('/usuarioIndex')}}" class="w3-bar-item w3-button">Inicio</a>
              <a href="{{url('/perfil')}}" class="w3-bar-item w3-button">Mi Perfil</a>
              <a href="{{url('/usuarioLogout')}}" class="w3-bar-item w3-button">Cerrar sesión</a>
            </div>
          </div>
          @endif
          @yield('content')
      <div class="w3-col m12">
          <p><small><b>CREAR © <?=date('Y');?></b> - <a target="_blank" href="//crear.rionegro.gov.ar">Agencia Provincial de Desarrollo Económico Rionegrino</a>.</small></p>
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