@extends('userTest.layout')
	
	@section('title') Inicio @endsection
	<style type="text/css">
		a {
			text-decoration: none;
		}
		a small {
			-webkit-transition: color 0.5s; /* Safari prior 6.1 */
			transition: color 0.5s;
		}
		a small:hover {
			color: #97db4f;
		}
		.formLogin {
			background-color: rgb(69, 92, 135);
			border: 1px white solid;
			border-radius: 10px;
			padding: 10px;
			margin-top: 30px;
			margin-bottom: 30px;
			color: white;
		}
		.formLogin ul {
			margin-left: -40px;
		}
		.formLogin ul li {
			display: block;
		}
		.formLogin input {
			color: white;
			text-align: center;
			background-color: #fff0;
			border:0px;
		}
		.formLogin span {
			color:white;
		}
		input.ingreso{
                position: relative;
				left: -50px;
				padding: 5px;
                cursor:pointer;
                border: none;
            }
	</style>

	@section('content')
	<div class="w3-row">
		<div class="w3-container w3-quarter">
		</div>
		<div class="w3-container w3-half">
			<div class="formLogin">
				<h2>¡Bienvenido!</h2>
			@if ($msgError)
				<strong>Whoops!</strong> <span>{{ $msgError }}</span>
			@endif
				<form method="post" action="{{url('/usuarioLogin')}}" name="login" >
					<ul>
						<li>
							<input type="text" name="dni" placeholder="DNI">
						</li>
						<li>
							<input type="Password" name="password" placeholder="Contraseña">
						</li>
						<li style="margin-top: 10px;">
							<i class='fas fa-sign-in-alt' style='font-size:36px;position: relative;left: 30px;'><input type="submit" name="Enviar" value="      " class="ingreso"></i>
						</li>
						<br>
						<li>
							<a href="{{url('/usuarioRegistro')}}"><small>No tenés cuenta? Registrate acá!</small></a>
						</li>
					</ul>
				</form>
			</div>
		</div>
		<div class="w3-container w3-quarter">
		</div>
	</div>

	@endsection