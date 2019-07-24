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
		  		<div class="opcionMenuUsuario capacitate">
					<p class="textIndexItems">
				    	Capacitate!
				    </p>
			    </div>
		  	</a>
		  </div>
		  <div class="w3-container w3-quarter">
		  	<a href="{{ url('/usuarioFinanciamiento') }}">
			    <div class="opcionMenuUsuario capacitador">
			    	<p class="textIndexItems">
				    	Inscribite<br>como capacitador
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
		    <div class="opcionMenuUsuario consultaCapacitacion">
		    	<p class="textIndexItems">
			    		Consultá<br>tus capacitaciones
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario documentacionCapacitacion">
		    	<p class="textIndexItems">
			    		Agregá<br>tu documentación
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		  </div>

	@endsection