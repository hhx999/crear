@extends('userTest.layout')	
	@section('title') Financiamiento - Líneas de Créditos @endsection

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
        	<div class="w3-col m3"><p></p></div>
	  		<div class="w3-half">
	  			<ul class="nav">
	  				<li><a href="{{url('financiamiento')}}">Financiamiento</a>/</li>
	  				<li><a href="{{url('financiamiento/informacion_creditos')}}">Pedí tu credito</a></li>
	  				<li>Líneas de creditos</li>
	  			</ul>
	  		</div>
    </div>
	<div class="w3-row">
				<h3>Líneas accesibles</h3>
					<div>
						@foreach ($lineas as $linea)
							<div class="w3-half">
								<div class="w3-card-4" style="background-color: #077187;">
										<header class="w3-container">
										  <h3><i style="color: lightgrey;">{{$linea->nombre}}</i></h3>
										</header>
										<div class="w3-container">
										  <p>Ver bases y condiciones</p>
										  <p>Descargar formulario de inscripción</p>
										</div>
										<a style="text-decoration: none;" href="{{ url('financiamiento/lineaEmprendedor') }}">
											<button class="w3-button w3-block w3-light-grey">+ Ingresar formulario</button>
										</a>
								</div>
							</div>
						@endforeach
					</div>
	</div>

	@endsection 
