@extends('userTest.layout')

	@section('title') Inicio @endsection

	@section('content')
	<style type="text/css">
		.w3-half {
			padding: 10px !important;
		}
		.wizard .content {
		    min-height: 100px;
		}
		.wizard .content > .body {
		    width: 100%;
		    height: auto;
		    padding: 15px;
		    position: relative;
		}
		label.error 
		{
			color: #ff9183 !important;
		}
		/* The container */
		.container {
		  display: table-cell !important;
		  margin-left: 42%;
		  position: relative;
		  padding-left: 30px;
		  padding-right: 20px;
		  margin-bottom: 12px;
		  cursor: pointer;
		  font-size: 16px;
		  -webkit-user-select: none;
		  -moz-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		}

		/* Hide the browser's default radio button */
		.container input {
		  position: absolute;
		  opacity: 0;
		  cursor: pointer;
		}

		/* Create a custom radio button */
		.checkmark {
		  position: absolute;
		  top: 0;
		  left: 0;
		  height: 25px;
		  width: 25px;
		  background-color: #eee;
		  border-radius: 50%;
		}

		/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
		  background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.container input:checked ~ .checkmark {
		  background-color: #2196F3;
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark:after {
		  content: "";
		  position: absolute;
		  display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.container input:checked ~ .checkmark:after {
		  display: block;
		}

		/* Style the indicator (dot/circle) */
		.container .checkmark:after {
		 	top: 9px;
			left: 9px;
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: white;
		}
	</style>
	<script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
		@if ($errors->any())
			<div class="w3-panel w3-amber w3-display-container">
			  <span onclick="this.parentElement.style.display='none'"
			  class="w3-button w3-large w3-display-topright">&times;</span>
			  <h4><b style="color: black;">No se completaron los campos necesarios</b></h4>
			  <div align="center">
			   	<ul class="errores">
			        @foreach ($errors->all() as $error)
			            <li>{{ $error }}</li>
			        @endforeach
			  	</ul>
			  </div>
			</div>
		@endif
		<style type="text/css">
/**
 * Extracted from: SweetAlert
 * Modified by: Istiak Tridip
 */
.success-checkmark {
  width: 80px;
  height: 115px;
  margin: auto;
  display:none;
  margin-top: 20px;
  margin-bottom: -30px;
}
.success-checkmark .check-icon {
  width: 80px;
  height: 80px;
  position: relative;
  border-radius: 50%;
  box-sizing: content-box;
  border: 4px solid #4CAF50;
}
.success-checkmark .check-icon::before {
  top: 3px;
  left: -2px;
  width: 30px;
  transform-origin: 100% 50%;
  border-radius: 100px 0 0 100px;
}
.success-checkmark .check-icon::after {
  top: 0;
  left: 30px;
  width: 60px;
  transform-origin: 0 50%;
  border-radius: 0 100px 100px 0;
  animation: rotate-circle 4.25s ease-in;
}
.success-checkmark .check-icon::before, .success-checkmark .check-icon::after {
  content: '';
  height: 100px;
  position: absolute;
  background: #FFFFFF;
  transform: rotate(-45deg);
}
.success-checkmark .check-icon .icon-line {
  height: 5px;
  background-color: #4CAF50;
  display: block;
  border-radius: 2px;
  position: absolute;
  z-index: 10;
}
.success-checkmark .check-icon .icon-line.line-tip {
  top: 46px;
  left: 14px;
  width: 25px;
  transform: rotate(45deg);
  animation: icon-line-tip 0.75s;
}
.success-checkmark .check-icon .icon-line.line-long {
  top: 38px;
  right: 8px;
  width: 47px;
  transform: rotate(-45deg);
  animation: icon-line-long 0.75s;
}
.success-checkmark .check-icon .icon-circle {
  top: -4px;
  left: -4px;
  z-index: 10;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  position: absolute;
  box-sizing: content-box;
  border: 4px solid rgba(76, 175, 80, 0.5);
}
.success-checkmark .check-icon .icon-fix {
  top: 8px;
  width: 5px;
  left: 26px;
  z-index: 1;
  height: 85px;
  position: absolute;
  transform: rotate(-45deg);
  background-color: #FFFFFF;
}
@keyframes rotate-circle {
  0% {
    transform: rotate(-45deg);
  }
  5% {
    transform: rotate(-45deg);
  }
  12% {
    transform: rotate(-405deg);
  }
  100% {
    transform: rotate(-405deg);
  }
}
@keyframes icon-line-tip {
  0% {
    width: 0;
    left: 1px;
    top: 19px;
  }
  54% {
    width: 0;
    left: 1px;
    top: 19px;
  }
  70% {
    width: 50px;
    left: -8px;
    top: 37px;
  }
  84% {
    width: 17px;
    left: 21px;
    top: 48px;
  }
  100% {
    width: 25px;
    left: 14px;
    top: 45px;
  }
}
@keyframes icon-line-long {
  0% {
    width: 0;
    right: 46px;
    top: 54px;
  }
  65% {
    width: 0;
    right: 46px;
    top: 54px;
  }
  84% {
    width: 55px;
    right: 0px;
    top: 35px;
  }
  100% {
    width: 47px;
    right: 8px;
    top: 38px;
  }
}

		</style>
		<div id="modalBorrador" class="w3-modal">
			<div class="w3-modal-content">
				<div class="w3-container">
					<span onclick="document.getElementById('modalBorrador').style.display='none'" class="w3-button w3-display-topright" style="color: black;">&times;</span>
					<br>
					<label style="color: black;">Guardar borrador <i style="color: gray;">({{date("d-m-Y")}})</i></label>
					<div class="success-checkmark">
					  <div class="check-icon">
					    <span class="icon-line line-tip"></span>
					    <span class="icon-line line-long"></span>
					    <div class="icon-circle"></div>
					    <div class="icon-fix"></div>
					  </div>
					</div>
					<input placeholder="Escribir asunto del formulario..." type="text" name="asuntoBorrador" id="asuntoBorrador" class="w3-input"><br>
					<a href="#" id="enviarBorrador" class="w3-button w3-cyan" style="color: white !important;">Enviar</a>
					<br>
					<br>
				</div>
			</div>
		</div>
 
		<form method="post" action="" name="formLineaEmprendedor" class="formLineaEmprendedor" id="formLineaEmprendedor">
			<span id="notificacionBorrador" style="display:none;color: lightgreen;">¡Borrador Guardado!<br> <i style="color: lightgrey;"><a href="{{route('borradores')}}">Ir a borradores</a></i></span><br>
			<a id="guardarBorrador" class="w3-button w3-cyan" href="#" style="border-radius: 6px;color: white !important;">Guardar borrador</a>
			<br><br>
			<script>
			$(document).ready(function(){
			    $("#guardarBorrador").click(function(){
			    	document.getElementById('modalBorrador').style.display='block';
			    });
			    $("#enviarBorrador").click(function() {
			    	var formBorrador = new FormData();
			    	var asuntoBorrador = $('#asuntoBorrador').val();
			    	var params = [
		               {
		                 name: "estado",
		                 value: 'borrador'
		               },
		               {
		               	 name: "asuntoBorrador",
		               	 value: asuntoBorrador
		               }
		             ];
					$.each(params, function(i,param){
					    $('<input />').attr('type', 'hidden')
					        .attr('name', param.name)
					        .attr('value', param.value)
					        .appendTo('#formLineaEmprendedor');
					    });
					$('input, select, textarea').each(
					    function(index){  
					        var input = $(this);
					        formBorrador.append(input.attr('name') , input.val());
					    }
					);
					$.ajax({
			            type: 'POST',
			            url: "{{route('guardarBorrador')}}",
			            contentType: false,
						data: formBorrador,  // mandamos el objeto formdata que se igualo a la variable data
						processData: false,
						cache: false,
			            success: function(data) {
			            	if (data == 1) {
			            		$('#notificacionBorrador').css('display','block');
			            		$('.success-checkmark').css('display','block');
			            		$(".check-icon").hide();
								setTimeout(function () {
								    $(".check-icon").show();
								  }, 10);
								setTimeout(function(){
				                $('#modalBorrador').hide();    
				                }, 1000);
			            	}
			            }
				        }).fail( function( jqXHR, textStatus, errorThrown ) {
				        	if (jqXHR.status == 404) {
							    alert('No se encuentran resultados. [404]');
							}
				        });			    
				    });
			    });
			</script>
	            <div id="wizard">
	                <h2>INFORMACIÓN</h2>
	                <section>
	                    <div class="w3-col l12">
	                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
							    <p id="datosEmprendedor">INFORMACIÓN DEL EMPRENDEDOR</p>
							</div>
						</div>
						  <div id="id01" class="w3-modal">
						    <div class="w3-modal-content">
						      <div class="w3-container">
						        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright" style="color: black;">&times;</span>
						        <br>
						        <p style="color: black;"> Los cambios generados en este formulario quedarán registrados en la base de datos del sistema, desea continuar?</p>
						        <a href="#datosEmprendedor" class="w3-button w3-green" id="aceptaCambiosDatosEmprendedor">Si</a><a id="noAceptaCambiosDatosEmprendedor" href="#datosEmprendedor" class="w3-button w3-red">No</a>
						      </div>
						    </div>
						  </div>
						<div class="w3-col l12">
								<p><b>Datos generales</b></p>
						</div>
						<div class="w3-half">
	                    	<label>Nombre y apellido</label>
							<input class="w3-input" type="text" name="nombreEmprendedor" placeholder="Ingresar el nombre y apellido del emprendedor..." value="{{$dataUsuario->nombreApellido}}" readonly="on">
						</div>
						<div class="w3-half">
	                    	<label>DNI</label>
							<input class="w3-input" type="text" name="dniEmprendedor" placeholder="Ingresar el dni del emprendedor..." value="{{$dataUsuario->dni}}" readonly="on">
						</div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;height: 60px;">
								<label>Localidad</label>
								<select class="w3-select datosEmprendimiento" name="localidadEmprendedor">
									@if(!empty($dataUsuario->get_localidad))
										@foreach($localidades as $localidad)
											@if($localidad->id == $dataUsuario->get_localidad->id)
											<option selected value="{{$localidad->id}}">{{$localidad->nombre}}</option>
											@else
								    		<option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
								    		@endif
								    	@endforeach
								   	@else
								   	<option selected disabled value="">Seleccioná tu localidad...</option>
								   	@foreach($localidades as $localidad)
								    		<option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
								    @endforeach
							    	@endif
								</select>
							</div>
						</div>

						<div class="w3-half">
	                    	<label>Domicilio real</label>
							<input class="w3-input datosEmprendedor" type="text" name="domicilioEmprendedor" placeholder="Ingresar el domicilio del emprendedor..." value="{{$dataUsuario->domicilio}}">
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>Datos de contacto</b></p>
						</div>
						<div class="w3-half">
	                    	<label>Teléfono</label>
							<input class="w3-input datosEmprendedor" type="text" name="telefonoEmprendedor" placeholder="Ingresar el telefono del emprendedor..." value="{{$dataUsuario->telefono}}">
						</div>
						<div class="w3-half">
	                    	<label>Email</label>
							<input class="w3-input datosEmprendedor" type="text" name="emailEmprendedor" placeholder="Ingresar el email del emprendedor..." value="{{$dataUsuario->email}}">
						</div>
						<script type="text/javascript">
							var read = "on";
							$('.datosEmprendedor').click(function(){
								if (read != "off") {
									document.getElementById('id01').style.display='block';
								}
							});
							$('#aceptaCambiosDatosEmprendedor').click(function() {
								console.log('Aceptó los cambios en los datos del emprendedor!');
								$('.datosEmprendedor').each(function (index, value) {
									$(this).prop('readonly', false);
								});
								document.getElementById('id01').style.display='none';
								read = "off";
							});
							$('#noAceptaCambiosDatosEmprendedor').click(function() {
								console.log('No aceptó los cambios en los datos del emprendedor');
								document.getElementById('id01').style.display='none';
							})
						</script>
						<div class="w3-half">
	                    	<label>Facebook</label>
							<input class="w3-input" type="text" name="facebookEmprendedor" placeholder="Ingresar nombre de facebook del emprendedor..." >
						</div>
						<div class="w3-half">
	                    	<label>Instagram</label>
							<input class="w3-input" type="text" name="instagramEmprendedor" placeholder="Ingresar usuario de instagram del emprendedor..." >
						</div>
						<div class="w3-quarter"></div>
						<div class="w3-col m12">
							<br>
							<p><b>Formación y ocupación</b></p>
						</div>
						<div class="w3-col m12">
							<div style="margin-right: 10px;margin-left: 10px;margin-bottom: 30px;">
							    <h4>Grado de instrucción<br><i style="color: lightgrey;">(Ingrese el último grado de instrucción finalizado por el/la emprendedor/ra)</i></h4>
							    <div style="display: inline-block;">
							    	<label class="container">Ninguno
							    		<input type="radio" checked name="gradoInstruccion" value="Ninguno">
							    		<span class="checkmark"></span>
							    	</label>
							    	<label class="container">Primario
							    		<input type="radio" name="gradoInstruccion" value="Primario">
							    		<span class="checkmark"></span>
							    	</label>
							    	<label class="container">Secundario
							    		<input type="radio" name="gradoInstruccion" value="Secundario">
							    		<span class="checkmark"></span>
							    	</label>
							    	<label class="container">Terceario
							    		<input type="radio" name="gradoInstruccion" value="Terceario">
							    		<span class="checkmark"></span>
							    	</label>
							    	<label class="container">Universitario
							    		<input type="radio" name="gradoInstruccion" value="Universitario">
							    		<span class="checkmark"></span>
							    	</label>
							    </div>
							</div>
						</div>
						<div class="w3-col m12">
							<label>Otra ocupación que desarrolle en la actualidad<br><i style="color: lightgrey;">(Si no realiza ninguna deje la casilla en blanco)</i></label>
						</div>
						<div class="w3-half">
							<label>Nombre de la ocupación</label>
							<input class="w3-input" type="text" name="otraOcupacion" placeholder="Ingresar otra ocupación del emprendedor..." >
						</div>
						<div class="w3-half">
							<label>Ingreso mensual de la ocupación</label>
							<input class="w3-input" type="text" name="ingresoMensual" placeholder="Ingresar el ingreso mensual del emprendedor..." >
						</div>
						<div class="w3-col m12">
							<div class="w3-third"><p></p></div>
							<div class="w3-third">
								<label>Deseo de capacitación</label>
								<input class="w3-input" type="text" name="deseoCapacitacion" placeholder="Ingresar una capacitación deseada a futuro..." >
							</div>
						</div>
	                </section>
	                <!--
															DATOS EMPRENDIMIENTO
	
	                -->
	                <h2>DATOS GENERALES</h2>
	                <section>
		                <div class="w3-col l12">
		                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
								    <p>Datos generales o propuesta del emprendimiento</p>
								</div>
						</div>
						<div class="w3-col m12">
							<br>
							<p id="datosEmprendimiento"><b>Datos generales del emprendimiento</b></p>
						</div>
						<!-- Inicio del modal para el ingreso de datos del emprendedor -->
						<div id="id02" class="w3-modal">
						    <div class="w3-modal-content">
						      <div class="w3-container">
						        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright" style="color: black;">&times;</span>
						        <br>
						        <p style="color: black;"> Los cambios generados en este formulario quedarán registrados en la base de datos del sistema, desea continuar?</p>
						        <a href="#datosEmprendimiento" class="w3-button w3-green" id="aceptaCambiosDatosEmprendimiento">Si</a><a id="noAceptaCambiosDatosEmprendimiento" href="#datosEmprendimiento" class="w3-button w3-red">No</a>
						      </div>
						    </div>
						  </div>
						<!-- Fin del modal datos de emprendedor -->

						<div class="w3-col m12" style="border: 2px white solid;">
						@if($emprendimientosUsuario)
							<div class="w3-half">
								<select class="w3-select" id="idEmprendimiento" name="emprendimiento_id">
									<option selected disabled value="">Seleccioná tú emprendimiento...</option>
									@foreach($emprendimientosUsuario as $emprendimiento)
										<option value="{{$emprendimiento->id}}">{{$emprendimiento->denominacion}}</option>
									@endforeach
								</select>
								<a href="{{route('crearEmprendimiento')}}" style="text-decoration: none;cursor: pointer;">Registrá tu emprendimiento!</a>
							</div>
						@endif
							<div class="w3-half">
								<select class="w3-select" id="estadoEmprendimiento" name="estadoEmprendimiento">
									<?php
									$estadosEmprendimiento = ['nuevo','en funcionamiento'];
									if (!isset($dataUsuario->estadoEmprendimiento)) {
										print '<option value="" disabled selected>Elegí el estado del emprendimiento...</option>';
									}
									foreach ($estadosEmprendimiento as $estado) {
										if ($estado == $dataUsuario->estadoEmprendimiento) {
											$selected = 'selected';
										} else {
											$selected = '';
										}
										print '<option '.$selected.' value="'.$estado.'">'.$estado.'</option>';
									}
									 ?>
								</select>
							</div>
						</div>
						<div class="nuevoEmprendimiento">
							<div class="w3-half">
								<label>Denominación de la Sociedad</label>
								<input class="w3-input w3-border w3-round-large" type="text" name="denominacion" placeholder="Ingrese el nombre de fantasía del emprendimiento...">
							</div>
							<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
								    <label>Tipo de sociedad</label>
								    
								    <select id="tipoSociedad" class="w3-select" name="tipoSociedad">
									    <?php
									    $tiposSociedad = ['Sociedad Anónima (S.A.)','Sociedad de Responsabilidad Limitada (S.R.L.)','Sociedad por Acciones Simplificada (S.A.S.)'];

									    App\Helpers::crearOptionLE($tiposSociedad,NULL);
										 ?>
									 </select>
								</div>
							</div>
						</div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;height: 60px;" class="datosEmprendimiento">
								<label>Actividad principal</label>
								<select id="actPrincipalEmprendimiento" class="w3-select" name="actPrincipalEmprendimiento">
									@if(!empty($dataUsuario->get_actividadPrincipal))
										@foreach($actPrincipales as $actividad)
											@if($actividad->id == $dataUsuario->get_actividadPrincipal->id)
											<option selected value="{{$actividad->id}}">{{$actividad->nombre}}</option>
											@else
								    		<option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
								    		@endif
								    	@endforeach
								   	@else
								   	<option selected disabled value="">Seleccioná la actividad principal...</option>
								   	@foreach($actPrincipales as $actividad)
								    		<option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
								    @endforeach
							    	@endif
								</select>
							</div>
						</div>
						<div class="enfuncionamientoEmprendimiento">
							<div class="w3-half">
								<label>Fecha de inicio(dd-mm-AAAA)</label>
	      						<input class="w3-input datosEmprendimiento" placeholder="dd-mm-AAAA" name="fecInicioEmprendimiento" id="inicio_emprendimiento">
							</div>
						</div>
						<script type="text/javascript">
							$(document).ready(function(){
								$('#inicio_emprendimiento').mask('00-00-0000');
								$('.datosEmprendimiento').each(function (index, value) {
									$(this).prop('readonly', true);
									$(this).prop('hidden', false);
								});
							});
							$('#idEmprendimiento').change(function () {
								var datos = {};
							        datos['idEmprendimiento'] = $(this).val();
							    $.ajax({
							        type: 'POST',
							        url: "{{ url('/obtenerDatosEmprendimiento') }}",
							        data : datos
							    }).done(function (data) {
							    	//crea array para respuestas
							    	//console.log(data.estadoEmprendimiento);
							    	$('#estadoEmprendimiento option[value="'+data.estadoEmprendimiento+'"]').attr('selected', 'selected');
							    	if (data.estadoEmprendimiento == 'en funcionamiento') {
							    		$('#estadoEmprendimiento option:not(:selected)').attr('disabled', true);
							    	}
							    	 $('input[name="denominacion"]').val(data.denominacion);
							    	 $('input[name="tipoSociedad"]').val(data.tipoSociedad);
							    	 $('#tipoSociedad option[value="'+data.tipoSociedad+'"]').attr('selected', 'selected');
							    	 $('input[name="cuitEmprendimiento"]').val(data.cuit);
							    	 $('#cargoEmprendimiento option[value="'+data.cargo+'"]').attr('selected', 'selected');
							    	$('#cargoEmprendimiento option:not(:selected)').attr('disabled', true);
							    	 $('input[name="domicilioEmprendimiento"]').val(data.domicilio);
							    	 $('input[name="localidadEmprendimiento"]').val(data.localidad);
							    	 $('input[name="emailEmprendimiento"]').val(data.email);
							    	 $('input[name="telefonoEmprendimiento"]').val(data.telefono);
							    	console.log('OK 202!');
							    }).fail(function () {
							        console.log('Error contacte con el administrador de la aplicación.');
							    });
							})
							$('#estadoEmprendimiento').change(function(){ 
							    var value = $(this).val();
							    if (value == 'nuevo') {
							    	$('.nuevoEmprendimiento').each(function (index, value) {
										$(this).prop('hidden', false);
									});
									$('.enfuncionamientoEmprendimiento').each(function (index, value) {
										$(this).prop('hidden', true);
									});
							    } else if (value == 'en funcionamiento') {
									$('.enfuncionamientoEmprendimiento').each(function (index, value) {
										$(this).prop('hidden', false);
									});
							    }
							});
							var readEmprendimiento = "on";
							$('.datosEmprendimiento').click(function(){
								if (readEmprendimiento != "off") {
									document.getElementById('id02').style.display='block';
								}
							});
							$('#aceptaCambiosDatosEmprendimiento').click(function() {
								console.log('Aceptó los cambios en los datos del emprendedor!');
								$('.datosEmprendimiento').each(function (index, value) {
									$(this).prop('readonly', false);
								});
								document.getElementById('id02').style.display='none';
								readEmprendimiento = "off";
							});
							$('#noAceptaCambiosDatosEmprendimiento').click(function() {
								console.log('No aceptó los cambios en los datos del emprendedor');
								$('#actPrincipalEmprendimiento').attr("disabled", true); 
								document.getElementById('id02').style.display='none';
							});
						</script>
						<div class="enfuncionamientoEmprendimiento">
							<div class="w3-half">
								<label>Antigüedad</label>
								<input class="w3-input datosEmprendimiento" type="text" name="antiguedadEmprendimiento" placeholder="Ingrese la antigüedad del emprendimiento...">
							</div>
						</div>
						<div class="w3-half">
							<label>Número de CUIL o CUIT</label>
							<input class="w3-input datosEmprendimiento" type="text" name="cuitEmprendimiento" placeholder="Ingrese el numero de cuit o cuil vinculado al emprendimiento...">
						</div>
						<div class="nuevoEmprendimiento">
							<div class="w3-half">
								<div style="padding: 20px;">
								    <select class="w3-select" id="cargoEmprendimiento" name="cargo">
									    <option value="" disabled selected>Elegí el cargo del solicitante...</option>
									    <option value="1">Propietario</option>
									    <option value="2">Representante legal</option>
									    <option value="3">Socio de sociedad de hecho</option>
									 </select>
								</div>
							</div>
							<div class="w3-col m12">
								<br>
								<p><b>Contacto del emprendimiento</b></p>
							</div>
							<div class="w3-half">
		                    	<div style="margin-right: 10px;margin-left: 10px;">
								    <label>E-mail</label>
								    <input class="w3-input w3-border" type="text" name="emailEmprendimiento" placeholder="Ingrese el email vinculado al emprendimiento...">
								</div>
							</div>
							<div class="w3-half">
								<div style="margin-right: 10px;margin-left: 10px;">
								    <label>Teléfono</label>
								    <input class="w3-input w3-border" type="text" name="telefonoEmprendimiento" placeholder="Ingrese el telefono de contacto con el emprendimiento...">
								</div>
							</div>
						</div>
						<div class="enfuncionamientoEmprendimiento">
							<div class="w3-half">
								<label>Número de ingresos brutos</label>
								<input class="w3-input datosEmprendimiento" type="text" name="ingresosBrutosEmprendimiento" placeholder="Ingrese los ingresos brutos del emprendimiento...">
							</div>
							<div class="w3-col m12">
								<br>
								<p><b>Localización del emprendimiento</b></p>
							</div>
							<div class="w3-half">
								<label>Domicilio comercial</label>
								<input class="w3-input datosEmprendimiento" type="text" name="domicilioEmprendimiento" placeholder="Ingrese el domicilio del emprendimiento...">
							</div>
							<div class="w3-half">
								<label>Localidad</label>
								<input class="w3-input datosEmprendimiento" type="text" name="localidadEmprendimiento" placeholder="Ingrese la localidad del emprendimiento...">
							</div>
							<div class="w3-col m12">
								<div style="margin-right: 10px;margin-left: 10px;margin-bottom: 30px;">
								    <h4>El lugar donde se desarrolla el emprendimiento es:</h4>
								    <div style="display: inline-block;">
								    	<label class="container">Otro
										  <input type="radio" name="lugarEmprendimiento" value="Otro" checked="checked">
										  <span class="checkmark"></span>
										</label>
								    	<label class="container">Propio
								    		<input type="radio" name="lugarEmprendimiento" value="Propio">
								    		<span class="checkmark"></span>
								    	</label>
									    <label class="container">Prestado
										  <input type="radio" name="lugarEmprendimiento" value="Prestado">
										  <span class="checkmark"></span>
										</label>
										<label class="container">Alquilado
										  <input type="radio" name="lugarEmprendimiento" value="Alquilado">
										  <span class="checkmark"></span>
										</label>
								    </div>
								</div>
							</div>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>DETALLE EL-LOS PRODUCTOS O SERVICIOS QUE OFRECE /RÁ</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descProdServicios" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>EXPERIENCIA O FORMACIÓN DE EL/LOS EMPRENDEDORES PARA EL DESARROLLO DEL EMPRENDIMIENTO</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="experienciaEmprendedores" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>OPORTUNIDAD DE MERCADO O  PROBLEMA QUE  RESUELVE</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="oportunidadMercado" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>DESCRIPCIÓN DEL DESTINO DEL FINANCIAMIENTO</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descFinanciamiento" maxlength="254" style="resize:none"></textarea></p>
						</div>
	                </section>
	                <h2>MERCADO</h2>
	                <section>
	                	<div class="w3-col l12">
		                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
								    <p>MERCADO Y COMERCIALIZACIÓN</p>
								</div>
						</div>
	                	<div class="w3-col m12">
							<p><b>PRINCIPALES CLIENTES - ¿Quién te compra? </b><br>
								<i style="color: lightgrey;">(Describir perfil de cliente actual: edad, nivel socio-económico - intereses)</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descripcionClientes" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Ubicación de los principales clientes</label>
							    <select class="w3-select" name="ubicacionClientes">
								    <option value="" disabled selected>Elegí la ubicación de tus clientes...</option>
								    <option value="Local">Local</option>
								    <option value="Provincial">Provincial</option>
								    <option value="Nacional">Nacional</option>
								 </select>
							</div>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>PROVEEDORES ¿A quién le comprás tus materias primas o insumos? </b><br>
								<i style="color: lightgrey;">(Describir perfil de tus proveedores: nombre o razón social, productos o servicios adquiridos, volumén de compra)</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descripcionProveedores" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Ubicación de los principales proveedores</label>
							    <select class="w3-select" name="ubicacionProveedores">
								    <option value="" disabled selected>Elegí la ubicación de tus proveedores...</option>
								    <option value="Local">Local</option>
								    <option value="Provincial">Provincial</option>
								    <option value="Nacional">Nacional</option>
								 </select>
							</div>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>COMPETENCIA ¿Quién vende lo mismo que vos o algo parecido? </b><br>
								<i style="color: lightgrey;">(Describir perfil de tus proveedores: nombre o razón social, productos o servicios que ofrece)</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descripcionCompetencia" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Ubicación de las principales competencias</label>
							    <select class="w3-select" name="ubicacionCompetencia">
								    <option value="" disabled selected>Elegí la ubicación tu competencia...</option>
								    <option value="Local">Local</option>
								    <option value="Provincial">Provincial</option>
								    <option value="Nacional">Nacional</option>
								 </select>
							</div>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>¿CUÁL SERÍA TU VENTAJA EN COMPARACIÓN CON LOS COMPETIDORES?</b><br>
								<i style="color: lightgrey;">¿Cómo te diferencias?</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="ventajaCompetidores" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>ESTRATEGIAS DE PROMOCIÓN QUE UTILIZARÁ</b><br>
								<i style="color: lightgrey;">¿Cómo vas a hacer conocer tu producto o servicio?</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="estrategiasPromocion" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>PUNTOS DE VENTA</b><br>
								<i style="color: lightgrey;">¿Dónde vas a vender?</i>
							</p>
						</div>
						<style type="text/css">
							.puntoVenta {
								padding:20px;
							}
							.activoPuntoVenta {
								background-color: #4d699c;
							}
						</style>
						<div class="w3-col m12" style="border: 2px solid white;">
							<div class="w3-third puntoVenta">
								<input id="puntoVentaLocal" type="checkbox" name="puntoVentaLocal" value="seleccionado">
								<label>Local<i style="color: #b3b3b3;">(
								@foreach($localidades as $localidad)
											@if($localidad->id == $dataUsuario->localidad)
											{{$localidad->nombre}}
											@endif
								@endforeach
								)
								</i></label>
							</div>
							<div class="w3-third puntoVenta">
								<input id="puntoVentaProvincial" type="checkbox" name="puntoVentaProvincial" value="seleccionado">
								<label>Provincial
									<i style="color: #b3b3b3;">(Río Negro)</i>
								</label>
							</div>
							<div class="w3-third puntoVenta">
								<input id="puntoVentaNacional" type="checkbox" name="puntoVentaNacional" value="seleccionado">
								<label>Nacional<i style="color: #b3b3b3;">(Argentina)</i></label>
							</div>
						</div>
						<script type="text/javascript">
							$('#puntoVentaLocal').change(function() {
								$(this).parent('div').toggleClass('activoPuntoVenta');
							});
							$('#puntoVentaProvincial').change(function() {
								$(this).parent('div').toggleClass('activoPuntoVenta');
							});
							$('#puntoVentaNacional').change(function() {
								$(this).parent('div').toggleClass('activoPuntoVenta');
							});
						</script>
	                </section>
	                <h2>PROD. COSTOS Y RESULTADOS</h2>
	                <section>
	                	<div class="w3-col l12">
		                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
								    <p>PRODUCCIÓN, COSTOS Y RESULTADOS</p>
								</div>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>PROCESO PRODUCTIVO</b><br>
								<i style="color: lightgrey;">MATERIAS PRIMAS O INSUMOS QUE SE NECESITAN</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="materiasPrimas" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<br>
								<p><b>PROCESO PRODUCTIVO</b><br>
								<i style="color: lightgrey;">HERRAMIENTAS O MAQUINARIAS NECESARIAS PARA PRODUCIR O BRINDAR EL SERVICIO</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descHerramientas" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<br>
							<div>
							<p><b>VENTAS</b><br>
								<i style="color: lightgrey;">VOLUMEN ESTIMADO DE VENTAS FUTURAS</i>
							</p>
							<p id="crearVenta" style="color: #3ae93a;cursor: pointer;">Agregar nueva venta</p>
							</div>
						</div>
						<div class="w3-col m12" id="ventas_financiamiento">
						</div>
						<div id="costos_emprendimiento" class="costosEmprendimiento" align="center">
	          				<div class="w3-col m12">
								<br>
								<p><b>OTROS COSTOS DEL EMPRENDIMIENTO ANUALES</b><br>
								</p>
							</div>
					          <div class="w3-col m3">
					            <p><label>Insumos y materias primas:</label></p>
					            <input placeholder="Insumos y materias primas..." class="sumable" maxlength="10" name="insumosCostos" id="insumos_materias" value="0">
					          </div>

					          <div class="w3-col m3">
					            <p><label >Alquileres:</label></p>
					            <input placeholder="Alquileres..." class="sumable" maxlength="10" name="alquileresCostos" id="alquileres" value="0">
					          </div>

					          <div class="w3-col m3">
					            <p><label>Servicios(luz-agua-gas-internet):</label></p>
					            <input placeholder="Servicios(luz-agua-gas-internet)..." class="sumable" maxlength="10" name="serviciosCostos" id="servicios_otros" value="0">
					          </div>
					          <div class="w3-col m3">
					            <p><label>Monotributo:</label></p>
					            <input placeholder="Monotributo..." class="sumable" maxlength="10" name="monotributoCostos" id="monotributo_otros" value="0">
					          </div>
					          <div class="w3-col m3">
					            <p><label>Ingresos brutos:</label></p>
					            <p><input placeholder="Ingresos brutos..." class="sumable" maxlength="10" name="ingresosBrutosCostos" id="ingresos_brutos" value="0"></p>
					          </div>
					          <div class="w3-col m3">
					            <p><label>Seguros:</label></p>
					            <p><input placeholder="Seguros..." class="sumable" maxlength="10" name="segurosCostos" id="seguros_otros" value="0"></p>
					          </div>
					          <div class="w3-col m3">
					            <p><label>Combustible:</label></p>
					            <p><input placeholder="Combustible..." class="sumable" maxlength="10" name="combustibleCostos" id="combustible_otros" value="0"></p>
					          </div>
					          <div class="w3-col m3">
					            <p><label>Sueldos:</label></p>
					            <p><input placeholder="Sueldos..." class="sumable" maxlength="10" name="sueldosCostos" id="sueldos_otros" value="0"></p>
					          </div>
					          <div class="w3-col m3" style="height: 90px;"></div>
					          <div class="w3-col m3">
					            <p><label>Comercialización:</label></p>
					            <p><input placeholder="Comercializacion..." class="sumable" maxlength="10" name="comercializacionCostos" id="comercializacion" value="0"></p>
					          </div>
					          <div class="w3-col m3">
					            <p><label>Otros:</label></p>
					            <p><input placeholder="Otros..." class="sumable" maxlength="10" name="otrosCostos" id="otros" value="0"></p>
					          </div>
					          <div class="w3-col m12">
					            <p><label>Cuota anual de amortización de crédito:</label></p>
					            <p><input placeholder="Cuota mensual..." class="sumable" maxlength="10" name="cuotaMensualCostos" id="cuotamensual_otros" value="0"></p>
					          </div>
					          <hr>
					          <div class="w3-col m12">
					            <p align="center">TOTAL</p>
					            <p><input type="text" id="total_costos"></p>
					          </div>
      					</div>
						<style type="text/css">
							#eliminarVenta {
								float: right;
								border: 1px solid;
								padding: 1px 7px;
								cursor: pointer;
								float:right;
							}
						</style>
						<script type="text/javascript">
			$('#crearVenta').click(function(){
					$('#ventas_financiamiento').append('<div class="w3-half" align="center" style="padding: 10px;border: 2px solid;">\
						<div class="w3-col m12" >\
							<div onClick="remove(this);">\
								<span style="float:right;cursor:pointer;">x</span>\
							</div>\
						</div>\
						<div class="w3-col m6">\
							<label>Producto o Servicio</label>\
							<input type="text" name="producto[]" style="border: 2px solid black;">\
						</div>\
						<div class="w3-col m6" style="height: 65px;">\
							<label>Unidad de medida</label>\
							<input type="text" name="udMedida[]" style="border: 2px solid black;">\
						</div>\
						<div class="w3-col m4" align="center">\
							<label>Cant. Año</label>\
							<input type="text" class="operacionVenta" id="cantAnio" name="cantAnio[]" style="border: 2px solid black;">\
						</div>\
						<div class="w3-col m4" align="center">\
							<label>Precio</label>\
							<input type="text" class="operacionVenta" id="precio" name="precio[]" style="border: 2px solid black;">\
						</div>\
						<div class="w3-col m4">\
							<label>Total</label>\
							<input type="text" class="operacionVenta" id="totalVenta" style="border: 2px solid black;width: -moz-available;">\
						</div>\
					</div>');
			});
		</script>
		<script type="text/javascript">
			function remove(e)
			{
				$(e).parent('div').parent('div').remove();
			}
			(function() {
			      var cant_anio = 0;
			      var precio = 0;
			      var total = 0;
			      var total_final = 0;

			      $("#ventas_financiamiento").on("blur", 'input', function(event){
			        
			        if ($(this).attr('id') == 'cantAnio') {
			          cant_anio = $(this).val();
			          console.log(cant_anio);
			          total = calculo(cant_anio,precio);
			        }
			        if ($(this).attr('id') == 'precio') {
			          precio = $(this).val();
			          console.log(precio);
			          total = calculo(cant_anio,precio);
			        }
			        total = calculo(cant_anio,precio);
			        if ($(this).attr('id') == 'totalVenta') {
			          $(this).val(total);
			        }
			        }).trigger('blur');

			        function calculo(x,y) {
			          if (isNaN(x)) {
			            x = 0;
			          }
			          if (isNaN(y)) {
			            y = 0;
			          }
			          total = parseFloat(x) * parseFloat(y);
			          return total;
			        }
			})();
		</script>
		<script type="text/javascript" src="{{ asset('js/calculo_servicios.js') }}"></script>
	                </section>
	                <h2>INVERSIÓN</h2>
	                <section>
	                	<div class="w3-col l12">
		                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
								    <p>INVERSIÓN</p>
								</div>
						</div>
	                	<div class="w3-col m12">
							<br>
							<div>
							<p><b>BIENES A FINANCIAR</b><br>
								<i style="color: lightgrey;">DESCRIPCIÓN DE LOS BIENES A FINANCIAR</i>
							</p>
							<p id="crearItemFinanciamiento" style="color: #3ae93a;cursor: pointer;">Agregar bien a financiar</p>
							</div>
						</div>
						<div class="w3-col m12" id="bienes_financiamiento">
						</div>
							<script type="text/javascript">
			$('#crearItemFinanciamiento').click(function(){
					$('#bienes_financiamiento').append('<div class="w3-half" align="center" style="padding: 10px;border: 2px solid;">\
						<div class="w3-col m12" >\
							<div onClick="remove(this);">\
								<span style="float:right;cursor:pointer;">x</span>\
							</div>\
						</div>\
						<div class="w3-col m6">\
							<label>Item</label><br>\
							<select class="w3-select" name="nombreItem[]">\
								    <option value="" disabled selected>Elegí el item a financiar...</option>\
								    <option value="Bien de capital">Bien de capital</option>\
								    <option value="Capital de trabajo">Capital de trabajo</option>\
								    <option value="Instalaciones">Instalaciones</option>\
								    <option value="Obra Civil">Obra Civil</option>\
								 </select>\
						</div>\
						<div class="w3-col m6" style="height: 65px;">\
							<label>Descripción</label>\
							<input class="w3-input" type="text" name="descripcion[]" style="border: 2px solid black;">\
						</div>\
						<div class="w3-col m12>">\
						<div class="w3-col m4" align="center">\
							<label>Cantidad</label>\
							<input type="text" id="cantAnio" name="cantidad[]" style="border: 2px solid black;width:100%;">\
						</div>\
						<div class="w3-col m4" align="center">\
							<label>Precio</label>\
							<input type="text" id="precio" name="precioUnitario[]" style="border: 2px solid black;width:100%;">\
						</div>\
						<div class="w3-col m4">\
							<label>Total</label>\
							<input type="text" id="totalVenta" style="border: 2px solid black;width:100%;">\
						</div>\
						</div>\
					</div>');
			});
			(function() {
			      var cant_anio = 0;
			      var precio = 0;
			      var total = 0;
			      var total_final = 0;

			      $("#bienes_financiamiento").on("blur", 'input', function(event){
			        
			        if ($(this).attr('id') == 'cantAnio') {
			          cant_anio = $(this).val();
			          console.log(cant_anio);
			          total = calculo(cant_anio,precio);
			        }
			        if ($(this).attr('id') == 'precio') {
			          precio = $(this).val();
			          console.log(precio);
			          total = calculo(cant_anio,precio);
			        }
			        total = calculo(cant_anio,precio);
			        if ($(this).attr('id') == 'totalVenta') {
			          $(this).val(total);
			        }
			        }).trigger('blur');

			        function calculo(x,y) {
			          if (isNaN(x)) {
			            x = 0;
			          }
			          if (isNaN(y)) {
			            y = 0;
			          }
			          total = parseFloat(x) * parseFloat(y);
			          return total;
			        }
			})();
		</script>
	                </section>
	                <h2>MANIFESTACIÓN DE BIENES DEL EMPRENDEDOR</h2>
	                <section>
	                	<div class="w3-col l12">
		                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
								    <p>MANIFESTACIÓN DE BIENES DEL EMPRENDEDOR</p>
								</div>
						</div>
	                	<div class="w3-col m12" align="center">
	                		<b>DISPONIBILIDADES</b>
	                	</div>
	                    <div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Efectivo</label>
							    <input class="w3-input w3-border" type="text" name="efectivoMBE" placeholder="Ingrese el efectivo...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cuentas bancarias</label>
							    <input class="w3-input w3-border" type="text" name="cuentasBancariasMBE" placeholder="Ingrese el monto de cuentas bancarias...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Créditos por ventas</label>
							    <input class="w3-input w3-border" type="text" name="creditosVentasMBE" placeholder="Ingrese el monto de créditos por ventas...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otros créditos</label>
							    <input class="w3-input w3-border" type="text" name="otrosCreditosMBE" placeholder="Ingrese el monto de otros créditos...">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE CAMBIO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Mercaderías</label>
							    <input class="w3-input w3-border" type="text" name="mercaderiasMBE" placeholder="Ingrese el monto de las mercaderías...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Materias primas</label>
							    <input class="w3-input w3-border" type="text" name="materiasPrimasMBE" placeholder="Ingrese el monto de las materias primas...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Insumos</label>
							    <input class="w3-input w3-border" type="text" name="insumosMBE" placeholder="Ingrese el monto de los insumos...">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE USO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Inmuebles</label>
							    <input class="w3-input w3-border" type="text" name="inmueblesMBE" placeholder="Ingrese el monto de los inmuebles...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rodados</label>
							    <input class="w3-input w3-border" type="text" name="rodadosMBE" placeholder="Ingrese el monto de los rodados...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Maquinarias y equipos</label>
							    <input class="w3-input w3-border" type="text" name="maquinariasEquiposMBE" placeholder="Ingrese el monto de las maquinarias y equipos...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Instalaciones</label>
							    <input class="w3-input w3-border" type="text" name="instalacionesMBE" placeholder="Ingrese el monto de las instalaciones...">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS COMERCIALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>En cuentas corrientes</label>
							    <input class="w3-input w3-border" type="text" name="deudaCuentasCorrientesMBE" placeholder="Ingrese la deuda en cuentas corrientes...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cheques de pago diferido</label>
							    <input class="w3-input w3-border" type="text" name="deudaChequesPagoDiferidoMBE" placeholder="Ingrese la deuda de cheques de pago diferido...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Documentadas</label>
							    <input class="w3-input w3-border" type="text" name="documentadasMBE" placeholder="Ingrese las deudas documentadas...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasComercialesMBE" placeholder="Ingrese otras deudas comerciales...">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS BANCARIAS</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tarjetas de crédito</label>
							    <input class="w3-input w3-border" type="text" name="deudaTarjetasCreditoMBE" placeholder="Ingrese las deudas de tarjetas de crédito...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía hipotecaria(Inmuebles)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaHipotecariaMBE" placeholder="Ingrese las deudas con garantía hipotecaria...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía prendaria(Rodados)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaPrendariaMBE" placeholder="Ingrese las deudas con garantia prendaria...">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS FISCALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>AFIP</label>
							    <input class="w3-input w3-border" type="text" name="deudaAfipMBE" placeholder="Ingrese la deuda con AFIP...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rentas Río Negro</label>
							    <input class="w3-input w3-border" type="text" name="deudaRentasRnMBE" placeholder="Ingrese la deuda con Rentas Río Negro...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tributos municipales</label>
							    <input class="w3-input w3-border" type="text" name="deudaTributosMunicipalesMBE" placeholder="Ingrese la deuda con tributos municipales...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Deudas sociales</label>
							    <input class="w3-input w3-border" type="text" name="deudasSocialesMBE" placeholder="Ingrese las deudas de aportes, contribuciones, salarios, etc...">
							</div>
						</div>
						<div class="w3-col m12">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras Deudas</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasMBE" placeholder="Ingrese otras deudas...">
							</div>
						</div>
	                </section>
	                <h2>MANIFESTACIÓN DE LOS BIENES DEL GARANTE</h2>
	                <section>
	                	<div class="w3-col l12">
		                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
								    <p>MANIFESTACIÓN DE LOS BIENES DEL GARANTE</p>
								</div>
						</div>
	                	<div class="w3-col m12" align="center">
	                		<b>DATOS PERSONALES DEL GARANTE</b>
	                	</div>
	                	<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Nombre del garante</label>
							    <input class="w3-input w3-border" type="text" name="nombreMBG" placeholder="Ingrese el nombre del garante...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>DNI</label>
							    <input class="w3-input w3-border" type="text" name="dniMBG" placeholder="Ingrese el dni del garante...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>CUIT</label>
							    <input class="w3-input w3-border" type="text" name="cuitMBG" placeholder="Ingrese el cuit del garante...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Domicilio</label>
							    <input class="w3-input w3-border" type="text" name="domicilioMBG" placeholder="Ingrese el domicilio del garante...">
							</div>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Localidad</label>
							    <input class="w3-input w3-border" type="text" name="localidadMBG" placeholder="Ingrese la localidad del garante...">
							</div>
						</div>
						<div class="w3-col m12" style="border-top: 2px solid white;margin-top: 20px;margin-bottom: 20px;">
							
						</div>
						<div class="w3-col m12" align="center">
	                		<b>DISPONIBILIDADES</b>
	                	</div>
	                    <div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Efectivo</label>
							    <input class="w3-input w3-border" type="text" name="efectivoMBG" placeholder="Ingrese el efectivo...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cuentas bancarias</label>
							    <input class="w3-input w3-border" type="text" name="cuentasBancariasMBG" placeholder="Ingrese el monto de cuentas bancarias...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Créditos por ventas</label>
							    <input class="w3-input w3-border" type="text" name="creditosVentasMBG" placeholder="Ingrese el monto de créditos por ventas...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otros créditos</label>
							    <input class="w3-input w3-border" type="text" name="otrosCreditosMBG" placeholder="Ingrese el monto de otros créditos...">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE CAMBIO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Mercaderías</label>
							    <input class="w3-input w3-border" type="text" name="mercaderiasMBG" placeholder="Ingrese el monto de las mercaderías...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Materias primas</label>
							    <input class="w3-input w3-border" type="text" name="materiasPrimasMBG" placeholder="Ingrese el monto de las materias primas...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Insumos</label>
							    <input class="w3-input w3-border" type="text" name="insumosMBG" placeholder="Ingrese el monto de los insumos...">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE USO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Inmuebles</label>
							    <input class="w3-input w3-border" type="text" name="inmueblesMBG" placeholder="Ingrese el monto de los inmuebles...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rodados</label>
							    <input class="w3-input w3-border" type="text" name="rodadosMBG" placeholder="Ingrese el monto de los rodados...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Maquinarias y equipos</label>
							    <input class="w3-input w3-border" type="text" name="maquinariasEquiposMBG" placeholder="Ingrese el monto de las maquinarias y equipos...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Instalaciones</label>
							    <input class="w3-input w3-border" type="text" name="instalacionesMBG" placeholder="Ingrese el monto de las instalaciones...">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS COMERCIALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>En cuentas corrientes</label>
							    <input class="w3-input w3-border" type="text" name="deudaCuentasCorrientesMBG" placeholder="Ingrese la deuda en cuentas corrientes...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cheques de pago diferido</label>
							    <input class="w3-input w3-border" type="text" name="deudaChequesPagoDiferidoMBG" placeholder="Ingrese la deuda de cheques de pago diferido...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Documentadas</label>
							    <input class="w3-input w3-border" type="text" name="documentadasMBG" placeholder="Ingrese las deudas documentadas...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasComercialesMBG" placeholder="Ingrese otras deudas comerciales...">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS BANCARIAS</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tarjetas de crédito</label>
							    <input class="w3-input w3-border" type="text" name="deudaTarjetasCreditoMBG" placeholder="Ingrese las deudas de tarjetas de crédito...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía hipotecaria(Inmuebles)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaHipotecariaMBG" placeholder="Ingrese las deudas con garantía hipotecaria...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía prendaria(Rodados)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaPrendariaMBG" placeholder="Ingrese las deudas con garantia prendaria...">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS FISCALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>AFIP</label>
							    <input class="w3-input w3-border" type="text" name="deudaAfipMBG" placeholder="Ingrese la deuda con AFIP...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rentas Río Negro</label>
							    <input class="w3-input w3-border" type="text" name="deudaRentasRnMBG" placeholder="Ingrese la deuda con Rentas Río Negro...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tributos municipales</label>
							    <input class="w3-input w3-border" type="text" name="deudaTributosMunicipalesMBG" placeholder="Ingrese la deuda con tributos municipales...">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Deudas sociales</label>
							    <input class="w3-input w3-border" type="text" name="deudasSocialesMBG" placeholder="Ingrese las deudas de aportes, contribuciones, salarios, etc...">
							</div>
						</div>
						<div class="w3-col m12">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras Deudas</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasMBG" placeholder="Ingrese otras deudas...">
							</div>
						</div>
	                </section>
	                <h2>DOCUMENTACIÓN</h2>
	                <section>
	                	<div class="w3-container w3-quarter">
						</div>
	                    <div class="w3-half">
	                    	<p>En construcción...</p>
						</div>
	                </section>
	   </div>
	</form>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#inicio_emprendimiento').mask('00-00-0000');
		});
	</script>
	<script type="text/javascript" src="{{ asset('js/calculo_servicios.js') }}"></script>
	<script src="{{asset('js/financiamiento/lineaEmprendedor/rules.js')}}"></script>
	<script src="{{asset('js/financiamiento/lineaEmprendedor/steps.js')}}"></script>
	@endsection