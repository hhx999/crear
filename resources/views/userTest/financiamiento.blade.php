@extends('userTest.layout')
	
	@section('title') Inicio @endsection
	<style type="text/css">
		a {
			text-decoration: none;
		}
	</style>

	@section('content')
	<!-- Primera fila de cuadros de opciones -->
	<div class="w3-col m12">
		<p><b>Financiamiento</b></p>
	</div>
	 	<div class="w3-row itemsMenuUsuario">
		  <div class="w3-container w3-quarter">
		  </div>
		  <div class="w3-container w3-quarter">
		  	<a href="{{ url('/usuarioCreditos') }}">
		  		<div class="opcionMenuUsuario creditos">
					<p class="textIndexItems">
				    	Pedí tu crédito!
				    </p>
			    </div>
		  	</a>
		  </div>
		  <div class="w3-container w3-quarter">
		  	<a href="{{ url('/usuarioTramites') }}">
			    <div class="opcionMenuUsuario tramites">
			    	<p class="textIndexItems">
				    	Consultá tus TRÁMITES
				    </p>
			    </div>
		    </a>
		  </div>
		  <div class="w3-container w3-quarter">
		  </div>
		</div>
	<!-- Segunda fila de cuadros de opciones -->
		  <div class="w3-container w3-quarter">
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario borradores">
		    	<p class="textIndexItems">
			    		BORRADORES
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario documentacion">
		    	<p class="textIndexItems">
			    		DOCUMENTACIÓN
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		  </div>

	@endsection