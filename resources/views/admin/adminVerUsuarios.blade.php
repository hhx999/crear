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
<title>CREAR - Ver usuario - {{$usuario->nombreApellido}} </title>
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
				<tbody>
					<tr>
						<th>DNI</th>
						<td>{{$usuario->dni}}</td>
					</tr>
					<tr>
						<th>Nombre y Apellido</th>
						<td>{{$usuario->nombreApellido}}</td>
					</tr>
					<tr>
						<th>Situación impositiva</th>
						<td>{{$usuario->situacionImpositiva}}</td>
					</tr>
					<tr>
						<th>Fecha de nacimiento</th>
						<td>{{$usuario->fecNacimiento}}</td>
					</tr>
					<tr>
						<th>Domicilio</th>
						<td>{{$usuario->domicilio}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{{$usuario->email}}</td>
					</tr>
					<tr>
						<th>Localidad</th>
						<td>{{$usuario->get_localidad->nombre ?? ''}}</td>
					</tr>
					<tr>
						<th>Provincia</th>
						<td>{{$usuario->provincia}}</td>
					</tr>
					<tr>
						<th>Telefono</th>
						<td>{{$usuario->telefono}}</td>
					</tr>
					<tr>
						<th>Actividad principal</th>
						<td>{{$usuario->get_actividadPrincipal->nombre ?? ''}}</td>
					</tr>
				</tbody>
			</table>
		</div>
</body>
</html>