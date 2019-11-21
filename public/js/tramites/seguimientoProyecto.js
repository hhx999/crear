$(document).ready(function() {
    $("#buscarSeguimientoProyecto").click(function() {
    	$('#proyectos').children('table').remove();
        $.ajax({
            type: 'POST',
            url: $('#rutaGenerada').val(),
            data: {
                numeroSeguimiento: $("input[name=numeroSeguimiento]").val()
            },
            dataType: 'json',
            success: function(data) {
            	var estado;
            	var observaciones = data.pasosValidos.observaciones;
            	var pasosValidos = data.pasosValidos;
                var formulario_id = data.formulario_id;
                console.log(formulario_id);

            	var tableProyectos = $('<table></table>');
            	tableProyectos.addClass('w3-table');
            	var trProyectos = $('<tr></tr>'); 
            	trProyectos.append($('<th>Número del proyecto</th>'));
            	trProyectos.append($('<th>Nombre del emprendedor</th>'));
            	trProyectos.append($('<th>Estado</th>'));
                if (observaciones) {
                    trProyectos.append($('<th>Acciones</th>'));
                }
            	tableProyectos.append(trProyectos);
            	trProyectos = $('<tr></tr>');

            	delete pasosValidos.created_at;
            	delete pasosValidos.formulario_id;
            	delete pasosValidos.id;
            	delete pasosValidos.updated_at;
            	delete pasosValidos.observaciones;

            	var estadoForm = data.estado;
                if (estadoForm == 0) {
                    var estado = '<span style="color:red;">Eliminado desde administración</span>';
                }
            	else if (estadoForm == 2) {
            		var estado = '<span style="color:white">En espera</span>';
            	} else if (estadoForm == 3) {
            		var estado = '<span style="color:#ff9800;">Observación</span>';
            	} else if (estadoForm == 4) {
            		var estado = '<span style="color:#f0e68c;">Actualizado</span>';
            	} else if (estadoForm == 5) {
            		var estado = '<span style="color:#8bc34a;">Completo</span>'
            	}
				trProyectos.append($('<td>'+data.numeroSeguimiento+'</td>'));
				trProyectos.append($('<td>'+data.nombreEmprendedor+'</td>'));
                if(observaciones && observaciones.length && estadoForm != 0)
                {
                    var agregadoObservaciones = '';   
                    for (var i = 0;i < observaciones.length;i++ ) {
                        if (observaciones[i].observacion) {
                            agregadoObservaciones += '<ul><li><b>'+observaciones[i].hoja+'</b>:</li><li style="list-style-type: none;">'+observaciones[i].observacion+'</li></ul>';
                        }
                    }
                    trProyectos.append($('<td align="center">'+estado+agregadoObservaciones+'</td>'));
                    trProyectos.append($('<td align="center"><a class="w3-button w3-cyan" href="financiamiento/editarLineaEmprendedor/'+formulario_id+'">Editar</a></td>'));
                } else {
                    trProyectos.append($('<td align="center">'+estado+'</td>'));
                     trProyectos.append($('<td align="center">No hay acciones disponibles.</td>'));
                }
				tableProyectos.append(trProyectos);
				$('#proyectos').append(tableProyectos);
				/*trProyectos.append($('@get'));
				$*/
                //window.location.reload();
            }
        }).fail( function( jqXHR, textStatus, errorThrown ) {
        	if (jqXHR.status == 404) {
			    alert('No se encuentran resultados. [404]');
			}
        });
    });
});	