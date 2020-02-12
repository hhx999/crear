@extends('userTest.layout')	
	@section('title') Trámites @endsection

	@section('content')
	<style type="text/css">
		.nav{
		    list-style:none;
		    margin:0;
		    padding:0;
		    text-align:center;
		    -webkit-border-radius: 100px;
			-moz-border-radius: 100px;
			border-radius: 100px;
			background-color: #8080801a;
			width: 100%;
			margin-bottom: 20px;
		}
		.nav li{
		    display:inline;
		}
		.nav a{
		    display:inline-block;
		    padding:10px;
		}
	</style>
	<div class="w3-row">
        	<div class="w3-third"><p></p></div>
	  		<div class="w3-third">
	  			<ul class="nav">
	  				<li><a href="{{url('perfil')}}">Perfil</a>/</li>
	  				<li>Enviar Consulta</li>
	  			</ul>
	  		</div>
	  		<div class="w3-third"><p></p></div>
    </div>
	<div class="w3-row">
	  	<div class="w3-col" style="width:20%"><p></p></div>
	  	<div class="w3-col" style="width:60%;"><h3>
				Envianos tu consulta o pedido:
			</h3>
			@if($mensaje != NULL)
				<p> <span style="color: lightgreen;">Consulta enviada con éxito!</span><br> Puede ver el estado en <a href="{{url('tramites')}}">"Mis trámites"</a>. <br>Muchas gracias!</p>
			@endif
			<form action="{{url('perfil/enviarConsulta')}}" method="post" name="formConsulta">
				<label>Seleccione el área implicada:</label>
				<select name="area">
					@foreach($areas as $area)
						<option value="{{$area->id}}">{{$area->nombre}}</option>
					@endforeach
				</select>
				<br>
				<textarea name="consulta" placeholder="Escriba su consulta aquí..."></textarea>
				<br><br>
				<input type="submit" name="enviar" class="w3-button w3-cyan">
			</form>
			<hr>
		</div>
	  	<div class="w3-col" style="width:20%"><p></p></div>
	</div>
<!-- -->
	@endsection 
