@extends('userTest.layout')
	
	@section('title') Inicio @endsection

	@section('menu')
	    @parent
	@endsection

	@section('content')
	<!-- Primera fila de cuadros de opciones -->
	 	<div class="w3-row itemsMenuUsuario">
		  <div class="w3-container w3-quarter">
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario creditos">
				<p class="textIndexItems">
			    	Pedí tu <b><strong>CRÉDITO</strong></b>
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario tramites">
		    	<p class="textIndexItems">
			    	Consultá tus <b><strong>TRÁMITES</strong></b>
			    </p>
		    </div>
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