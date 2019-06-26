$(document).ready(function() {
    $("#buscarSeguimientoProyecto").click(function() {
    	$('#proyectos').children('table').remove();
        $.ajax({
            type: 'POST',
            url: "http://localhost/crear/public/datosSeguimiento",
            data: {
                numeroProyecto: $("input[name=numeroProyecto]").val()
            },
            dataType: 'json',
            success: function(data) {
            	var estado;
            	var observaciones = data.pasosValidos.observaciones;
            	var pasosValidos = data.pasosValidos;

            	var tableProyectos = $('<table></table>');
            	tableProyectos.addClass('w3-table');
            	var trProyectos = $('<tr></tr>'); 
            	trProyectos.append($('<th>Número del proyecto</th>'));
            	trProyectos.append($('<th>Nombre del solicitante</th>'));
            	trProyectos.append($('<th>Estado</th>'));
            	tableProyectos.append(trProyectos);
            	trProyectos = $('<tr></tr>');

            	delete pasosValidos.created_at;
            	delete pasosValidos.formulario_id;
            	delete pasosValidos.id;
            	delete pasosValidos.updated_at;
            	delete pasosValidos.observaciones;

            	$.each( pasosValidos, function( key, value ) {
				  if (value != 0) {
				  	estado = "<span style='color:light-green;'>Completo</span>";
				  } else if ($.isEmptyObject(observaciones)) {
				  	estado = "En espera";
				  } else {
				  	estado = "<span style='color:orange;'>Contiene observaciones</span><br><a href='{{ url('/editar') }}'>Ver formulario</a>";
				  }
				});
				trProyectos.append($('<td>'+data.numeroProyecto+'</td>'));
				trProyectos.append($('<td>'+data.nombreSolicitante+'</td>'));
				trProyectos.append($('<td align="center">'+estado+'</td>'));
				tableProyectos.append(trProyectos);
				$('#proyectos').append(tableProyectos);
                //window.location.reload();
            }
        }).fail( function( jqXHR, textStatus, errorThrown ) {
        	if (jqXHR.status == 404) {
			    alert('No se encuentran resultados. [404]');
			}
        });
    });
});	