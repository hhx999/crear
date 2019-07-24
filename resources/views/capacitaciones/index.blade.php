@extends('userTest.layout')
	
	@section('title') Inicio @endsection
	<style type="text/css">
		a {
			text-decoration: none;
		}
	</style>

	@section('content')
	<!-- Primera fila de cuadros de opciones -->
	 	<div class="w3-row itemsMenuUsuario">
		  <div class="w3-container w3-quarter">
		  </div>
		  <div class="w3-container w3-quarter">
		  	<a href="{{ url('/usuarioCreditos') }}">
		  		<div class="opcionMenuUsuario capacitaciones">
					<p class="textIndexItems">
				    	Capacitate!
				    </p>
			    </div>
		  	</a>
		  </div>
		  <div class="w3-container w3-quarter">
		  	<a href="{{ url('/usuarioFinanciamiento') }}">
			    <div class="opcionMenuUsuario financiamiento">
			    	<p class="textIndexItems">
				    	Registrate como capacitador
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
		    <div class="opcionMenuUsuario comercioInterior">
		    	<p class="textIndexItems">
			    		Consultá tus capacitaciones
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario comercioExterior">
		    	<p class="textIndexItems">
			    		Agregá tu documentación
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		  </div>

	@endsection