@extends('userTest.layout')
	
	@section('title') Financiamiento - Formulario guardado con éxito! @endsection

	@section('content')

	<div class="w3-col m12" onload="noatras();">
		<h3>Formulario guardado con éxito!</h3>
		<p>El formulario fue guardado con éxito, para seguir trabajando en el puede acceder desde el apartado de <b><a href="{{route('borradores')}}" style="text-decoration: none;cursor: pointer;">BORRADORES</a></b></p>
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