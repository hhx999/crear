@extends('userTest.layout')
	
	@section('title') Financiamiento - Formulario guardado con éxito! @endsection

	@section('content')

	<div class="w3-col m12">
		<h3>Formulario guardado con éxito!</h3>
		<p>El formulario fue guardado con éxito, para seguir trabajando en el puede acceder desde el apartado de <b><a href="{{route('borradores')}}" style="text-decoration: none;cursor: pointer;">BORRADORES</a></b></p>
		<p>¡Muchas gracias!</p>
	</div>

	@endsection