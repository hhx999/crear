@extends('userTest.layout')
	
	@section('title') Financiamiento - Formulario enviado con éxito! @endsection

	@section('content')

	<div class="w3-col m12">
		<h3>Formulario enviado con éxito!</h3>
		<p><b>Número de seguimiento: {{$numeroSeguimiento}}</b></p>
		<p>Podés consultar el estado de tu crédito en <b><a href="{{route('tramites')}}">TRÁMITES</a></b>.</p>
		<p>El formulario fue envíado con éxito, por favor espere la respuestas de los técnicos del CREAR</p>
		<p>¡Muchas gracias!</p>
	</div>

	@endsection