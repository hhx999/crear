@extends('userTest.layout')	
	@section('title') Inicio @endsection

	@section('content')
	<div class="w3-row">
		<div class="w3-col l12">
			<h2>
				Ingresá el número del proyecto:
			</h2>
			<input type="text" name="numeroProyecto" class="inputTramite"><input class="inputTramite" type="submit" value="Buscar" title="Buscar">
		</div>
	</div>

	@endsection