@extends('userTest.layout')	
	@section('title') Inicio @endsection

	@section('content')
	<div class="w3-row">
	  	<div class="w3-col" style="width:20%"><p></p></div>
	  	<div class="w3-col" style="width:60%"><h3>
				Ingresá el número del proyecto:
			</h3>
			<form method="post" name="buscarSeguimientoProyecto">
				<input class="w3-input w3-border" name="numeroProyecto" type="text" placeholder="Por favor ingrese el número de proyecto habilitado por el sistema" style="color:black !important;text-align: center;">
				<input class="w3-button w3-blue" id="buscarSeguimientoProyecto" value="Buscar proyecto" title="Buscar">				
			</form>

		</div>
	  	<div class="w3-col" style="width:20%"><p></p></div>
	</div>
	<div id="add-error-bag">
		<div id="add-task-errors"></div>
	</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#buscarSeguimientoProyecto").click(function() {
        $.ajax({
            type: 'POST',
            url: "{{ url('/datosSeguimiento') }}",
            data: {
                numeroProyecto: $("input[name=numeroProyecto]").val()
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                //window.location.reload();
            }
        }).fail( function( jqXHR, textStatus, errorThrown ) {
        	if (jqXHR.status == 404) {
			    alert('No se encuentran resultados. [404]');
			}
        });
    });
});	
</script>
	@endsection
