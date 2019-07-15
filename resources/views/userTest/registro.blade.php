@extends('userTest.layout')
	
	@section('title') Inicio @endsection
	<style type="text/css">
		a {
			text-decoration: none;
		}
		.formRegistro {
			background-color: rgb(69, 92, 135);
			border: 1px white solid;
			border-radius: 10px;
			padding: 10px;
			margin-top: 30px;
			margin-bottom: 30px;
			color: black;
		}
		.formRegistro input {
			color: black;
		}
	</style>

	@section('content')
	<div class="formRegistro">
		<p>{{$msg}}</p>
	<h4>Registrate y empezá a emprender!</h4>
		<form name="registroUsuario" action="" method="post">
			<h4>Datos principales</h4>
			<label>
				DNI:
			</label>
			<input type="text" name="dni">
			<label>
				Password:
			</label>
			<input type="password" name="password">
			<hr>
			<h4>Datos personales</h4>
			<label>
				Nombre y apellido:
			</label>
			<input type="text" name="nombreApellido">
			<label>
				Fecha de nacimiento:
			</label>
			<input type="text" name="fecNacimiento"><br>
			<label>
				Domicilio:
			</label>
			<input type="text" name="domicilio">
			<label>
				Localidad:
			</label>
			<input type="text" name="localidad"><br>
			<label>
				Provincia:
			</label>
			<input type="text" name="provincia">
			<label>
				Agencia:
			</label>
			<input type="text" name="agencia">
			<hr>
			<h4>Datos de contacto:</h4>
			<label>
				EMAIL:
			</label>
			<input type="text" name="email"><br>
			<label>
				Telefono:
			</label>
			<input type="text" name="Telefono">
			<br><br>
			<input type="submit" name="enviar" value="Registrarse">
		</form>
	</div>

	@endsection