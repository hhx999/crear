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

        @yield('content')    
    </div>
	
</body>
</html>