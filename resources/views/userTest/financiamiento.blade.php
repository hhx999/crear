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
		@if (\Session::has('error'))
	        <p style="color: white;font-family: 'Roboto';font-weight: bold;">{!! \Session::get('error') !!}</p>
	    @endif
	</div>
	 	<div class="w3-row itemsMenuUsuario">
		  <div class="w3-container w3-quarter">
		  </div>
		  <div class="w3-container w3-quarter">
		  	<a href="{{ url('financiamiento/informacion_creditos') }}">
		  		<div class="opcionMenuUsuario creditos">
					<p class="textIndexItems">
				    	Pedí tu crédito!
				    </p>
			    </div>
		  	</a>
		  </div>
		  <div class="w3-container w3-quarter">
		  	<a href="{{ url('/tramites') }}">
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
		  	<a href="{{ url('financiamiento/borradores') }}">
			    <div class="opcionMenuUsuario borradores">
			    	<p class="textIndexItems">
				    		BORRADORES
				    </p>
			    </div>
			</a>
		  </div>
		  <div class="w3-container w3-quarter">
		  	<a href="{{ url('financiamiento/creditos') }}">
			    <div class="opcionMenuUsuario miscreditos">
			    	<p class="textIndexItems">
				    		Mirá tus créditos
				    </p>
			    </div>
			</a>
		  </div>
		  <div class="w3-container w3-quarter">
		  </div>

	@endsection