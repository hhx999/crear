@extends('userTest.layout')
	
	@section('title') Inicio @endsection
	<style type="text/css">
		a {
			text-decoration: none;
		}
	</style>

	@section('content')
	<!-- Primera fila de cuadros de opciones -->
	<div class="w3-container w3-quarter">
		  </div>
	<div class="w3-container w3-half">
		<p align="center"><b>Financiamiento</b></p>
		@if (\Session::has('error'))
	        <p style="color: white;font-family: 'Roboto';font-weight: bold;">{!! \Session::get('error') !!}
	        <span style="cursor: pointer;text-decoration: none;color:orange;" id="verErrorCreditos">Ver error</span>
	        </p>
	        <div style="display: none;width: 400px;text-align: left;" class="mensajeErrorCreditos">
	        	<i><span style="color: lightgray;">Si su trámite ya está completo y  su crédito todavía no se encuentra disponible, se encuentra en lista de pendientes por parte de la Agencia. <br>Por favor espere que en breve se activará.</span></i>
	        </div>
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
<script type="text/javascript">
	$('#verErrorCreditos').click(function()  {
		if($('.mensajeErrorCreditos').css('display') == 'none') {
			$('.mensajeErrorCreditos').show();
			$(this).text('Ocultar error');
			$(this).css('color','red');
		} else {
			$('.mensajeErrorCreditos').hide();
			$(this).text('Ver error');
			$(this).css('color','orange');
		}
	});
</script>
	@endsection