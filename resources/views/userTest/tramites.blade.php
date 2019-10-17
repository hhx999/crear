@extends('userTest.layout')	
	@section('title') Inicio @endsection

	@section('content')
	<div class="w3-row">
	  	<div class="w3-col" style="width:20%"><p></p></div>
	  	<div class="w3-col" style="width:60%;"><h3>
				Ingresá el número del proyecto:
			</h3>

				<input class="w3-input w3-border" name="numeroSeguimiento" type="text" placeholder="Por favor ingrese el número de proyecto habilitado por el sistema" style="color:black !important;text-align: center;">
				<br>
				<a class="w3-button w3-blue" id="buscarSeguimientoProyecto" style="text-decoration: none;">Buscar proyecto</a>
			<hr>
			<div id="proyectos"></div>
		</div>
		<input type="text" id="rutaGenerada" name="rutaGenerada" value="{{ url('/datosSeguimiento') }}" hidden>
	  	<div class="w3-col" style="width:20%"><p></p></div>
	</div>
<!-- -->
<script type="text/javascript" src="{{ asset('js/tramites/seguimientoProyecto.js') }}"></script>
	@endsection 
