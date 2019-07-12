@extends('userTest.layout')
	
	@section('title') Inicio @endsection
	<style type="text/css">
		a {
			text-decoration: none;
		}
		.formLogin {
			background-color: rgb(69, 92, 135);
			border: 1px white solid;
			border-radius: 10px;
			padding: 10px;
			margin-top: 30px;
			margin-bottom: 30px;
			color: black;
		}
		.formLogin ul {
			margin-left: -40px;
		}
		.formLogin ul li {
			display: block;
		}
		.formLogin input {
			color: black;
			text-align: center;
		}
		.formLogin span {
			color:white;
		}
	</style>

	@section('content')
	<div class="w3-row">
		<div class="w3-container w3-quarter">
		</div>
		<div class="w3-container w3-half">
			<div class="formLogin">
			@if ($msgError)
				<strong>Whoops!</strong> <span>{{ $msgError }}</span>
			@endif
				<form method="post" action="" name="login" >
					<ul>
						<li>
							<label>DNI</label>
						</li>
						<li>
							<input type="text" name="dni">
						</li>
						<li>
							<label>Contraseña</label>
						</li>
						<li>
							<input type="Password" name="password">
						</li>
						<li style="margin-top: 10px;">
							<input type="submit" name="Enviar" value="Ingresar" class="w3-btn w3-blue">
						</li>
						<br>
						<li>
							<small>No tenés cuenta? Registrate acá!</small>
						</li>
					</ul>
				</form>
			</div>
		</div>
		<div class="w3-container w3-quarter">
		</div>
	</div>

	@endsection