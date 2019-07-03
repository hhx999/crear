@extends('userTest.layout')

	@section('title') Inicio @endsection
<style type="text/css">
	.formPreguntasUsuario {
		background-color: rgb(69, 92, 135);
		border: 1px white solid;
		border-radius: 10px;
		padding: 10px;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.preguntas div {
		animation: animateElement linear .6s;
  		animation-iteration-count: 1;
		border:1px white solid;
		border-left: 4px white solid !important;
		border:1px white solid;border-left: 4px white solid !important;
		border-radius: 10px;
	}
	@keyframes animateElement{
	  0% {
	    opacity:0;
	    transform:  translate(0px,10px);
	  }
	  100% {
	    opacity:1;
	    transform:  translate(0px,0px);
	  }
	}
	.respuestas {
		margin-top: 20px;
		padding: 10px;
		-webkit-box-shadow: -4px 3px 20px -7px rgba(0,0,0,0.75);
		-moz-box-shadow: -4px 3px 20px -7px rgba(0,0,0,0.75);
		box-shadow: -4px 3px 20px -7px rgba(0,0,0,0.75);
		background-color: #75e078;
		color: black !important;
		border-radius: 10px;
	}
/* Radio button */
.radiobtn {
  display: none;
}
.buttons {
  margin-left: -40px;
}
.buttons li {
  display: block;
}
.buttons li label{
  padding-left: 30px;
  position: relative;
  left: -25px;
}
.buttons li label:hover {
  cursor: pointer;
}
.buttons li span {
  display: inline-block;
  position: relative;
  top: 5px;
  border: 2px solid #ccc;
  width: 18px;
  height: 18px;
  background: #fff;
}
.radiobtn:checked + span::before{
  content: '';
  border: 2px solid #fff;
  position: absolute;
  width: 14px;
  height: 14px;
  background-color: #c3e3fc;
}
	</style>
	@section('content')
	<div class="w3-row">
		  <div class="w3-container w3-quarter">
		  </div>
		  <div class="w3-container w3-half">
			<div class="formPreguntasUsuario">
				<form method="post" name="preguntas" >
					<br>
					<label><b>¿Qué actividad realiza?</b></label><br>
					<input type="text" name="actividad" style="color: black;">
					<hr>
					<p><b>Elija el rubro de la actividad que realiza...</b></p>
					<div style="text-align: left;margin-left: 20%;">
						<ul class="buttons">
							<li><input type="radio" id="radiobtn_1" class="radiobtn" name="rubro" value="procesosValor"><span></span>
								<label for="radiobtn_1">Procesos agregados de valor</label></li>
							<li>
								<input type="radio" id="radiobtn_2" class="radiobtn" name="rubro" value="serviciosProfesionales"><span></span>
								<label for="radiobtn_2">Prestación de servicios profesionales</label></li>
							<li>
								<input type="radio" id="radiobtn_3" class="radiobtn" name="rubro" value="Comercio"><span></span>
								<label for="radiobtn_3">Comercio</label>
							</li>
						</ul>
					</div>
					<div class="preguntas Comercio"></div>
					<hr>
					<p><b>Actualmente se encuentra en...</b></p>
					<label>Estado informal</label><input type="radio" name="estadoSolicitante" value="Informal"><br>
					<label>Responsable inscripto</label><input type="radio" name="estadoSolicitante" value="Inscripto"><br>
					<div class="preguntas Inscripto"></div>
					<label>Monotributista</label><input type="radio" name="estadoSolicitante" value="Monotributista"><br>
					<div class="preguntas Monotributo"></div>
					<label>Otro</label><input type="radio" name="estadoSolicitante" value="otro">
					<div class="preguntas Otro"></div>
					<hr>
					<label><b>¿Qué antigüedad formal tiene?</b></label><br>
					<input type="text" name="antiguedad" style="color: black !important;"><br>
					<hr>
					<label><b>Ingrese el monto solicitado:</b></label><br>
					<input type="text" name="monto" style="color: black !important;"><br>
					<br>
				<input class="w3-button w3-gray" type="reset" value="Limpiar Campos" />
				<input id="enviar" type="button" class="w3-button w3-green" value="Enviar Respuestas"></input>
				</form>
			</div>
		</div>
		<div class="w3-container w3-quarter">
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		if ($(this).prop( "checked", false )) {
				$('.Comercio div:first').remove();
			}
		$('input[type="radio"]').click(function() {
			if ($(this).is(':checked') && $(this).val() == 'Comercio') {
				$('.Comercio div:first').remove();
				$('.Comercio').append('<div>\
						<p><b>Cuál es el destino del financiamiento?</b></p>\
						<label>Comprar productos para revender.</label><input type="radio" name="destino" value="Reventa"><br>\
						<label>Acondicionamiento del local</label><input type="radio" name="destino" value="Acondicionamiento"><br>\
						<label>Compra de maquinaria</label><input type="radio" name="destino" value="Maquinaria"><br><br>\
					</div>');
			} else if ($(this).val() == 'procesosValor' || $(this).val() == 'serviciosProfesionales' ){
				$('.Comercio div:first').remove();
			}
			if ($(this).val() == 'Informal') {
				$('.Monotributo div:first').remove();
				$('.Otro div:first').remove();
				$('.Inscripto div:first').remove();
			}

			if ($(this).val() == 'Inscripto') {
				$('.Monotributo div:first').remove();
				$('.Otro div:first').remove();
				$('.Inscripto div:first').remove();
				divFactura = '<div>\
								<label><b>Cuanto es el monto que actualmente está facturando?</b></label><br>\
										<input type="text" name="facturaInscripto"><br>\
								</div>';
				$('.Inscripto').append(divFactura);
			} else if ($(this).val() == 'Monotributista') {
				$('.Inscripto div:first').remove();
				$('.Otro div:first').remove();
				$('.Monotributo div:first').remove();
				divCategoria = '<div>\
									<label><b>Que categoría de Monotributo es?</b></label><br>\
									<input type="text" name="categoriaMonotributo" style="color:black !important;"><br>\
								</div>';
				$('.Monotributo').append(divCategoria);
			}
			else if ($(this).val() == 'otro') {
				$('.Inscripto div:first').remove();
				$('.Monotributo div:first').remove();
				$('.Otro div:first').remove();
				divOtro = '<div>\
									<input type="text" name="otroEstado"><br>\
								</div>';
				$('.Otro').append(divOtro);
			}
		}); 

		  $("input#enviar").click(function(){
		  	var divFinal = $("<div class='respuestas'></div>");
		  	divFinal.append('<b>Datos enviados</b><br>');
		    var preguntasForm = $('form').serializeArray();
			var preguntasFormObject = {};
			$.each(preguntasForm,
			    function(i, v) {
			        preguntasFormObject[v.name] = v.value;
			        divFinal.append("<b>"+v.name+"</b>: "+v.value+"<br>");
			    });
			$('.w3-half').prepend(divFinal);
		  });
		});
	</script>
	@endsection
<!--

4- Que antiguedad formal tiene?

5- Que monto necesita?
-->