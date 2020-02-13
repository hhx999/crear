<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="_token" content="{{csrf_token()}}" />

  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<title>CREAR - Consultas</title>
</head>
<body>
<div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white w3-center">
    <h3>ADMINISTRACIÓN DE USUARIOS</h3>
    <fieldset style="margin-bottom: 20px;">
      <legend style="color:green;">Opciones de administración de usuarios</legend>
          <a href="{{ url('/logout') }}" class="w3-btn w3-red">LOGOUT(<?=$nombreUsuario?> <span class="blink">&#9673;</span>)</a>
          <a class="w3-btn w3-green" href="{{ url('/adminUsuarios') }}">Volver a verificación</a>
    </fieldset>
			<table class="w3-table" style="overflow:scroll;
			    height:100px;">
			    <thead>
			    	<tr>
			    		<th>Usuario</th>
			    		<th>Fecha</th>
			    		<th>Area</th>
			    		<th>Consultas</th>
			    	</tr>
			    </thead>
				<tbody>
					<tr>
						@foreach($consultas as $consulta)
							<td>$consulta->verUsuario->nombreApellido</td>
							<td>$consulta->created_at</td>
							<td>$consulta->verArea->nombre</td>
							<td>$consulta->consulta</td>
						@endforeach
					</tr>
				</tbody>
			</table>
		</div>
</body>
</html>