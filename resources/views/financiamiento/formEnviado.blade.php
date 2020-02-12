@extends('userTest.layout')
	
	@section('title') Financiamiento - Formulario enviado con éxito! @endsection

	@section('content')

	<div class="w3-col m12" onload="noatras();">
		<h3>Formulario enviado con éxito!</h3>
		<p>Podés consultar el estado de tu crédito en <b><a href="{{route('tramites')}}">TRÁMITES</a></b>.</p>
		<p>El formulario fue envíado con éxito, por favor espere la respuestas de los técnicos del CREAR</p>
		<p>¡Muchas gracias!</p>
	</div>
<script type="text/javascript">
        function noatras(){
          window.location.hash="no-back-button";
          window.location.hash="Again-No-back-button"
          window.onhashchange=function(){
                              window.location.hash="no-back-button";
                              }
          }
      </script>
	@endsection