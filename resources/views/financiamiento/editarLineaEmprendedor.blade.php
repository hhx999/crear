@extends('userTest.layout')

	@section('title') Inicio @endsection

	@section('content')
	<style type="text/css">
	#wizard {
			background-color: #435f95;
			border-radius: 1%;
			padding: 30px;
		}
input, textarea, select {
			display: block;
			border: 0px !important;
			background-color: #384e77;
			color: white;
			border-radius: 10px 10px 10px 10px;
		}
		.w3-border {
			border: 0px !important;
		}
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
 
		<form method="post" action="{{route('editarLineaEmprendedor')}}" name="formLineaEmprendedor" class="formLineaEmprendedor" id="formLineaEmprendedor" enctype="multipart/form-data">
			<input type="hidden" name="formulario_id" value="{{$datosFormulario->id}}">
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
							<input class="w3-input" type="text" name="nombreEmprendedor" placeholder="Ingresar el nombre y apellido del emprendedor..." value="{{$datosFormulario->nombreEmprendedor}}" readonly="on">
						</div>
						<div class="w3-half">
	                    	<label>DNI</label>
							<input class="w3-input" type="text" name="dniEmprendedor" placeholder="Ingresar el dni del emprendedor..." value="{{$datosFormulario->dniEmprendedor}}" readonly="on">
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
							<input class="w3-input datosEmprendedor" type="text" name="domicilioEmprendedor" placeholder="Ingresar el domicilio del emprendedor..." value="{{$datosFormulario->domicilioEmprendedor}}">
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>Datos de contacto</b></p>
						</div>
						<div class="w3-half">
	                    	<label>Teléfono</label>
							<input class="w3-input datosEmprendedor" type="text" name="telefonoEmprendedor" placeholder="Ingresar el telefono del emprendedor..." value="{{$datosFormulario->telefonoEmprendedor}}">
						</div>
						<div class="w3-half">
	                    	<label>Email</label>
							<input class="w3-input datosEmprendedor" type="text" name="emailEmprendedor" placeholder="Ingresar el email del emprendedor..." value="{{$datosFormulario->emailEmprendedor}}">
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
							<input class="w3-input" type="text" name="facebookEmprendedor" placeholder="Ingresar nombre de facebook del emprendedor..." value="{{$datosFormulario->facebookEmprendedor ?? ''}}">
						</div>
						<div class="w3-half">
	                    	<label>Instagram</label>
							<input class="w3-input" type="text" name="instagramEmprendedor" placeholder="Ingresar usuario de instagram del emprendedor..." value="{{$datosFormulario->instagramEmprendedor ?? ''}}">
						</div>
						<div class="w3-quarter"></div>
						<div class="w3-col m12">
							<br>
							<p><b>Formación y ocupación</b></p>
						</div>
						<div class="w3-col m12">
							<div style="margin-right: 10px;margin-left: 10px;margin-bottom: 30px;">
							    <h4>Grado de instrucción<br><i style="color: lightgrey;">(Ingrese el último grado de instrucción finalizado por el/la emprendedor/ra)</i></h4>
							    <div style="margin-right: 10px;margin-left: 10px;height: 60px;">
									<select class="w3-select datosEmprendimiento" name="gradoInstruccion">
										@if(!empty($datosFormulario->gradoInstruccion))
											@foreach($grados as $grado)
												@if($datosFormulario->gradoInstruccion == $grado)
												<option selected value="{{$grado}}">{{$grado}}</option>
												@else
									    		<option value="{{$grado}}">{{$grado}}</option>
									    		@endif
									    	@endforeach
									   	@else
									   	<option selected disabled value="">Seleccioná tu grado de instrucción...</option>
									   	@foreach($grados as $grado)
									    		<option value="{{$grado}}">{{$grado}}</option>
									    @endforeach
								    	@endif
									</select>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							$(document).ready(function(){
							        $("#divGrados").change(function(){
							            selected_value = $("input[name='grado']:checked").val();
							            $("#gradoInstruccion").val(selected_value);
							            console.log(selected_value);
							        });
							    });
						</script>
						<div class="w3-col m12">
							<label>Otra ocupación que desarrolle en la actualidad<br><i style="color: lightgrey;">(Si no realiza ninguna deje la casilla en blanco)</i></label>
						</div>
						<div class="w3-half">
							<label>Nombre de la ocupación</label>
							<input class="w3-input" type="text" name="otraOcupacion" placeholder="Ingresar otra ocupación del emprendedor..." value="{{$datosFormulario->otraOcupacion ?? ''}}">
						</div>
						<div class="w3-half">
							<label>Ingreso mensual de la ocupación</label>
							<input class="w3-input" type="text" name="ingresoMensual" placeholder="Ingresar el ingreso mensual del emprendedor..." value="{{$datosFormulario->ingresoMensual ?? ''}}">
						</div>
						<div class="w3-col m12">
							<div class="w3-third"><p></p></div>
							<div class="w3-third">
								<label>Deseo de capacitación</label>
								<input class="w3-input" type="text" name="deseoCapacitacion" placeholder="Ingresar una capacitación deseada a futuro..." value="{{$datosFormulario->deseoCapacitacion ?? ''}}">
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

						<div class="w3-col m12" style="border: 2px white solid;">
						@if($emprendimientosUsuario)
							<div class="w3-half">
								<select class="w3-select" id="idEmprendimiento" name="emprendimiento_id">
									<option selected disabled value="">Seleccioná tú emprendimiento...</option>
									@foreach($emprendimientosUsuario as $emprendimiento)
										<option value="{{$emprendimiento->id}}">{{$emprendimiento->denominacion}}</option>
									@endforeach
								</select>
							</div>
							@endif
							<div class="w3-half">
								<select class="w3-select" id="estadoEmprendimiento" name="estadoEmprendimiento">
									<?php
									$estadosEmprendimiento = ['nuevo','en funcionamiento'];
									if (!isset($datosFormulario->estadoEmprendimiento)) {
										print '<option value="" disabled selected>Elegí el estado del emprendimiento...</option>';
									}
									foreach ($estadosEmprendimiento as $estado) {
										if ($estado == $datosFormulario->estadoEmprendimiento) {
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
								<input class="w3-input w3-border w3-round-large" type="text" name="denominacion" placeholder="Ingrese el nombre de fantasía del emprendimiento..." value="{{$datosFormulario->denominacion ?? ''}}">
							</div>
							<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
								    <label>Tipo de sociedad</label>
								    
								    <select id="tipoSociedad" class="w3-select" name="tipoSociedad">
								    	<?php
									    $tiposSociedad = App\TipoSociedad::get()->all();

									    App\Helpers::crearOptionLEObjetos($tiposSociedad,$datosFormulario->tipoSociedad);
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
	      						<input class="w3-input datosEmprendimiento" placeholder="dd-mm-AAAA" name="fecInicioEmprendimiento" id="inicio_emprendimiento" value="{{App\Helpers::cambioFormatoFecha($datosFormulario->fecInicioEmprendimiento)}}">
							</div>
						</div>
						<script type="text/javascript">
							$(document).ready(function(){
								$('#inicio_emprendimiento').mask('00-00-0000');
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
						</script>
						<div class="enfuncionamientoEmprendimiento">
							<div class="w3-half">
								<label>Antigüedad</label>
								<input class="w3-input datosEmprendimiento" type="text" name="antiguedadEmprendimiento" placeholder="Ingrese la antigüedad del emprendimiento..." value="{{$datosFormulario->antiguedadEmprendimiento}}">
							</div>
						</div>
						<div class="w3-half">
							<label>Número de CUIL o CUIT</label>
							<input class="w3-input datosEmprendimiento" type="text" name="cuitEmprendimiento" placeholder="Ingrese el numero de cuit o cuil vinculado al emprendimiento..." value="{{$datosFormulario->cuitEmprendimiento}}">
						</div>
						<div class="nuevoEmprendimiento">
							<div class="w3-half">
								<div style="padding: 20px;">
								    <select class="w3-select" id="cargoEmprendimiento" name="cargo">
								    	<?php
									    $cargos = ['Propietario','Representante legal','Socio de sociedad de hecho'];
									    App\Helpers::crearOptionLE($cargos,$datosFormulario->cargo);
										 ?>
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
								    <input class="w3-input w3-border" type="text" name="emailEmprendimiento" placeholder="Ingrese el email vinculado al emprendimiento..." value="{{$datosFormulario->emailEmprendimiento}}">
								</div>
							</div>
							<div class="w3-half">
								<div style="margin-right: 10px;margin-left: 10px;">
								    <label>Teléfono</label>
								    <input class="w3-input w3-border" type="text" name="telefonoEmprendimiento" placeholder="Ingrese el telefono de contacto con el emprendimiento..." value="{{$datosFormulario->telefonoEmprendimiento}}">
								</div>
							</div>
						</div>
						<div class="enfuncionamientoEmprendimiento">
							<div class="w3-half">
								<label>Número de ingresos brutos</label>
								<input class="w3-input datosEmprendimiento" type="text" name="ingresosBrutosEmprendimiento" placeholder="Ingrese los ingresos brutos del emprendimiento..." value="{{$datosFormulario->ingresosBrutosEmprendimiento}}">
							</div>
							<div class="w3-col m12">
								<br>
								<p><b>Localización del emprendimiento</b></p>
							</div>
							<div class="w3-half">
								<label>Domicilio comercial</label>
								<input class="w3-input datosEmprendimiento" type="text" name="domicilioEmprendimiento" placeholder="Ingrese el domicilio del emprendimiento..." value="{{$datosFormulario->domicilioEmprendimiento}}">
							</div>
							<div class="w3-half">
								<label>Localidad</label>
								<input class="w3-input datosEmprendimiento" type="text" name="localidadEmprendimiento" placeholder="Ingrese la localidad del emprendimiento..." value="{{$datosFormulario->localidadEmprendimiento}}">
							</div>
							<div class="w3-col m12">
								<div style="margin-right: 10px;margin-left: 10px;margin-bottom: 30px;">
								    <h4>El lugar donde se desarrolla el emprendimiento es:</h4>
								    <div style="display: inline-block;">

								   		<?php 
								   			$lugarDesarrolla = ["Ninguno", "Otro", "Propio", "Prestado", "Alquilado"];

								   			for($i = 0; $i < count($lugarDesarrolla);$i++)
								   			{
								   				if($datosFormulario->lugarEmprendimiento == $lugarDesarrolla[$i])
								   				{
								   					print_r('<label class="container">'.$lugarDesarrolla[$i].'
														  <input type="radio" name="lugarEmprendimiento" value="'.$lugarDesarrolla[$i].'" checked="checked">
														  <span class="checkmark"></span>
														</label>');
								   				} else {
								   					print_r('<label class="container">'.$lugarDesarrolla[$i].'
														  <input type="radio" name="lugarEmprendimiento" value="'.$lugarDesarrolla[$i].'">
														  <span class="checkmark"></span>
														</label>');
								   				}
								   			}
								   		 ?>
								    </div>
								</div>
							</div>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>DETALLE EL-LOS PRODUCTOS O SERVICIOS QUE OFRECE /RÁ</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descProdServicios" maxlength="254" style="resize:none">{{$datosFormulario->descProdServicios}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>EXPERIENCIA O FORMACIÓN DE EL/LOS EMPRENDEDORES PARA EL DESARROLLO DEL EMPRENDIMIENTO</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="experienciaEmprendedores" maxlength="254" style="resize:none">{{$datosFormulario->experienciaEmprendedores}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>OPORTUNIDAD DE MERCADO O  PROBLEMA QUE  RESUELVE</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="oportunidadMercado" maxlength="254" style="resize:none">{{$datosFormulario->oportunidadMercado}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>DESCRIPCIÓN DEL DESTINO DEL FINANCIAMIENTO</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descFinanciamiento" maxlength="254" style="resize:none">{{$datosFormulario->descFinanciamiento}}</textarea></p>
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descripcionClientes" maxlength="254" style="resize:none">{{$datosFormulario->descripcionClientes}}</textarea></p>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Ubicación de los principales clientes</label>
							    <select class="w3-select" name="ubicacionClientes">
							    	<?php
									    $puntosVenta = ['Local','Provincial','Nacional'];

									    App\Helpers::crearOptionLE($puntosVenta,$datosFormulario->ubicacionClientes);
									?>
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descripcionProveedores" maxlength="254" style="resize:none">{{$datosFormulario->descripcionProveedores}}</textarea></p>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Ubicación de los principales proveedores</label>
							    <select class="w3-select" name="ubicacionProveedores">
								   <?php
									    $puntosVenta = ['Local','Provincial','Nacional'];

									    App\Helpers::crearOptionLE($puntosVenta,$datosFormulario->ubicacionProveedores);
									?>
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descripcionCompetencia" maxlength="254" style="resize:none">{{$datosFormulario->descripcionCompetencia}}</textarea></p>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Ubicación de las principales competencias</label>
							    <select class="w3-select" name="ubicacionCompetencia">
								    <?php
									    $puntosVenta = ['Local','Provincial','Nacional'];

									    App\Helpers::crearOptionLE($puntosVenta,$datosFormulario->ubicacionCompetencia);
									?>
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="ventajaCompetidores" maxlength="254" style="resize:none">{{$datosFormulario->ventajaCompetidores}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>ESTRATEGIAS DE PROMOCIÓN QUE UTILIZARÁ</b><br>
								<i style="color: lightgrey;">¿Cómo vas a hacer conocer tu producto o servicio?</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="estrategiasPromocion" maxlength="254" style="resize:none">{{$datosFormulario->estrategiasPromocion}}</textarea></p>
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
							@if($datosFormulario->puntoVentaLocal == 'seleccionado')
							<div class="w3-third puntoVenta activoPuntoVenta">
								<input id="puntoVentaLocal" type="checkbox" name="puntoVentaLocal" value="seleccionado" checked>
								<label>Local<i style="color: #b3b3b3;">(
									@foreach($localidades as $localidad)
												@if($localidad->id == $dataUsuario->localidad)
												{{$localidad->nombre}}
												@endif
									@endforeach
								)
								</i></label>
							</div>
							@else
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
							@endif

							@if($datosFormulario->puntoVentaProvincial == 'seleccionado')
							<div class="w3-third puntoVenta activoPuntoVenta">
								<input id="puntoVentaProvincial" type="checkbox" name="puntoVentaProvincial" value="seleccionado" checked>
								<label>Provincial
									<i style="color: #b3b3b3;">(Río Negro)</i>
								</label>
							</div>
							@else
							<div class="w3-third puntoVenta">
								<input id="puntoVentaProvincial" type="checkbox" name="puntoVentaProvincial" value="seleccionado">
								<label>Provincial
									<i style="color: #b3b3b3;">(Río Negro)</i>
								</label>
							</div>
							@endif
							
							@if($datosFormulario->puntoVentaNacional == 'seleccionado')
							<div class="w3-third puntoVenta activoPuntoVenta">
								<input id="puntoVentaNacional" class="activoPuntoVenta" type="checkbox" name="puntoVentaNacional" value="seleccionado" checked>
								<label>Nacional<i style="color: #b3b3b3;">(Argentina)</i></label>
							</div>
							@else
							<div class="w3-third puntoVenta">
								<input id="puntoVentaNacional" type="checkbox" name="puntoVentaNacional" value="seleccionado">
								<label>Nacional<i style="color: #b3b3b3;">(Argentina)</i></label>
							</div>
							@endif
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="materiasPrimas" maxlength="254" style="resize:none">{{$datosFormulario->materiasPrimas}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<br>
								<p><b>PROCESO PRODUCTIVO</b><br>
								<i style="color: lightgrey;">HERRAMIENTAS O MAQUINARIAS NECESARIAS PARA PRODUCIR O BRINDAR EL SERVICIO</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descHerramientas" maxlength="254" style="resize:none">{{$datosFormulario->descHerramientas}}</textarea></p>
						</div>
						<!-- Ventas -->
						<div class="w3-col m12">
							<div style="width: 100%;border-top: 2px white solid;margin-top: 10px;margin-bottom: 10px;"></div>
						</div>
						<style type="text/css">
							.inputventas {
								background-color: #00f0;
								color: white;
							}
							.inputvalores_ventas{
								color: white;
								background-color: #00f0;
								border:0px !important;
								margin-left: 5px;
								padding-top: 5px;
							}
							.ventas th {
								text-align: center;
							}
						</style>
						<div class="w3-col m12">
							<br>
							<div>
							<p><b>VENTAS</b><br>
								<i style="color: lightgrey;">VOLUMEN ESTIMADO DE VENTAS FUTURAS</i>
							</p>
							</div>
						</div>
						<div class="w3-col m12" id="ventas_financiamiento">
							<table class="w3-table ventas">
								<thead>
									<th>Producto</th>
									<th>Unidad de medida</th>
									<th>Cantidad por año</th>
									<th>Valor por unidad</th>
									<th>Total</th>
								</thead>
								<tbody>
									<td><input placeholder="Ej:empanadas" type="text" name="producto1" class="w3-input inputventas" value="{{$datosFormulario->producto1}}"></td>
									<td><input placeholder="Ej:docenas" type="text" name="udMedida1" class="w3-input inputventas" value="{{$datosFormulario->udMedida1}}"></td>
									<td><input placeholder="xx" type="text" name="cantidad1" class="w3-input inputventas"  value="{{$datosFormulario->cantidad1}}"></td>
									<td><span style="position: absolute;">$</span><input placeholder="xxx.xx"  type="text" name="valor1" class="w3-input inputvalores_ventas"  value="{{$datosFormulario->valor1}}"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="total1" class = "w3-input inputvalores_ventas" value="{{$datosFormulario->cantidad1 * $datosFormulario->valor1}}"></td>
								</tbody>
								<tbody>
									<td><input placeholder="Ej:empanadas" type="text" name="producto2" class="w3-input inputventas" value="{{$datosFormulario->producto2}}"></td>
									<td><input placeholder="Ej:docenas" type="text" name="udMedida2" class="w3-input inputventas"  value="{{$datosFormulario->udMedida2}}"></td>
									<td><input placeholder="xx" type="text" name="cantidad2" class="w3-input inputventas"  value="{{$datosFormulario->cantidad2}}"></td>
									<td><span style="position: absolute;">$</span><input placeholder="xxx.xx"  type="text" name="valor2" class="w3-input inputvalores_ventas" value="{{$datosFormulario->valor2}}"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="total2" class="w3-input inputvalores_ventas" value="{{$datosFormulario->cantidad2 * $datosFormulario->valor2}}"></td>
								</tbody>
								<tbody>
									<td><input placeholder="Ej:empanadas" type="text" name="producto3" class="w3-input inputventas" value="{{$datosFormulario->producto3}}"></td>
									<td><input placeholder="Ej:docenas" type="text" name="udMedida3" class="w3-input inputventas" value="{{$datosFormulario->udMedida3}}"></td>
									<td><input placeholder="xx" type="text" name="cantidad3" class="w3-input inputventas" value="{{$datosFormulario->cantidad3}}"></td>
									<td><span style="position: absolute;">$</span><input placeholder="xxx.xx"  type="text" name="valor3" class="w3-input inputvalores_ventas" value="{{$datosFormulario->valor3}}"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="total3" class="w3-input inputvalores_ventas" value="{{$datosFormulario->cantidad3 * $datosFormulario->valor3}}"></td>
								</tbody>
								<tbody>
									<td><input placeholder="Ej:empanadas" type="text" name="producto4" class="w3-input inputventas" value="{{$datosFormulario->producto4}}"></td>
									<td><input placeholder="Ej:docenas" type="text" name="udMedida4" class="w3-input inputventas" value="{{$datosFormulario->udMedida4}}"></td>
									<td><input placeholder="xx" type="text" name="cantidad4" class="w3-input inputventas" value="{{$datosFormulario->cantidad4}}"></td>
									<td><span style="position: absolute;">$</span><input placeholder="xxx.xx"  type="text" name="valor4" class="w3-input inputvalores_ventas" value="{{$datosFormulario->valor4}}"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="total4" class="w3-input inputvalores_ventas" value="{{$datosFormulario->cantidad4 * $datosFormulario->valor4}}"></td>
								</tbody>
								<tbody>
									<td colspan="2" style="text-align: center">Otros</td>
									<td colspan="2"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="otrosProductosVenta" class="w3-input inputvalores_ventas" value="{{$datosFormulario->otrosProductosVenta}}"></td>
								</tbody>
								<tbody>
									<td colspan="2" style="text-align: center">Total</td>
									<td colspan="1"></td>
									<td align="center"><a href="#ventas_financiamiento" id="calcularTotalVentas" class="w3-button w3-blue-gray">Calcular totales</a></td>
									<td style="border: 1px solid white;"><span style="position: absolute;">$</span><input name="totalVentas" class="inputvalores_ventas" type="text" readonly>
									</td>
								</tbody>
							</table>
						</div>
						<script type="text/javascript">
							$('#calcularTotalVentas').on('click', function() {
								var totales = [];
								var totalVentas = parseFloat('0');

								totales.push(parseFloat($("input[name=cantidad1]").val()) * parseFloat($("input[name=valor1]").val()));
								totales.push(parseFloat($("input[name=cantidad2]").val()) * parseFloat($("input[name=valor2]").val()));
								totales.push(parseFloat($("input[name=cantidad3]").val()) * parseFloat($("input[name=valor3]").val()));
								totales.push(parseFloat($("input[name=cantidad4]").val()) * parseFloat($("input[name=valor4]").val()));
								totales.push(parseFloat($("input[name=otrosProductosVenta").val()));

								for(var i=0;i < totales.length; i++) {
									if (isNaN(totales[i])) {
										totales[i] = parseFloat('0');
									}
									totalVentas += totales[i];
								}

								$("input[name=total1]").val(totales[0]);
								$("input[name=total2]").val(totales[1]);
								$("input[name=total3]").val(totales[2]);
								$("input[name=total4]").val(totales[3]);
								$("input[name=totalVentas]").val(totalVentas);
							})
						</script>
						<!-- FIN VENTAS -->
						<!-- Otros costos emprendimiento -->
						<style type="text/css">
							.otrosCostos th{
								text-align: center;
								align-content: center;
							}
							.otrosCostos input{
								background-color: #00f0;
								color: white;
								border: 0px !important;
								margin-left: 20px;
								margin-top: 3px;
							}
							.otrosCostos td{
								padding: 10px;
							}
							.sumable {
								width: 100px;
							}
						</style>
						<div class="w3-col m12">
							<div style="width: 100%;border-top: 2px white solid;margin-top: 10px;margin-bottom: 10px;"></div>
						</div>
						<div id="costos_emprendimiento" class="costosEmprendimiento" align="center">
							<div class="w3-col m12">
								<table class="w3-table otrosCostos" style="width: 100%;">
									<thead>
										<tr>
											<th colspan="2">OTROS COSTOS DEL EMPRENDIMIENTO ANUALES</th>
										</tr>
										<tr>
											<th>TIPO</th>
											<th>AL AÑO</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td align="center">Insumos y materias primas</td>
											<td><span style="position: absolute;">$</span><input placeholder="Insumos y materias primas..." maxlength="10" name="insumosCostos" class="sumable" id="insumos_materias" value="{{$datosFormulario->insumosCostos ?? 0}}"></td>
										</tr>
										<tr>
											<td align="center">
												Alquileres
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Alquileres..." class="sumable" maxlength="10" name="alquileresCostos" id="alquileres" value="{{$datosFormulario->alquileresCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Servicios(luz-agua-gas-internet)
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Servicios(luz-agua-gas-internet)..." class="sumable" maxlength="10" name="serviciosCostos" id="servicios_otros" value="{{$datosFormulario->serviciosCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Monotributo
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Monotributo..." class="sumable" maxlength="10" name="monotributoCostos" id="monotributo_otros" value="{{$datosFormulario->monotributoCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Seguros
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Seguros..." class="sumable" maxlength="10" name="segurosCostos" id="seguros_otros" value="{{$datosFormulario->segurosCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Combustible
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Combustible..." class="sumable" maxlength="10" name="combustibleCostos" id="combustible_otros" value="{{$datosFormulario->combustibleCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Sueldos
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Sueldos..." class="sumable" maxlength="10" name="sueldosCostos" id="sueldos_otros" value="{{$datosFormulario->sueldosCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Comercialización
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Comercializacion..." class="sumable" maxlength="10" name="comercializacionCostos" id="comercializacion" value="{{$datosFormulario->comercializacionCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Otros
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Otros..." class="sumable" maxlength="10" name="otrosCostos" id="otros" value="{{$datosFormulario->otrosCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Cuota anual de amortización de crédito
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Cuota mensual..." class="sumable" maxlength="10" name="cuotaMensualCostos" id="cuotamensual_otros" value="{{$datosFormulario->cuotaMensualCostos ?? 0}}">
											</td>
										</tr>
									</tbody>
								</table>
					          <div class="w3-col m12">
					            <p align="center">TOTAL</p>
					            <p><input type="text" id="total_costos" value="{{$datosFormulario->insumosCostos + $datosFormulario->alquileresCostos + $datosFormulario->serviciosCostos + $datosFormulario->monotributoCostos + $datosFormulario->ingresosBrutosCostos + $datosFormulario->segurosCostos + $datosFormulario->combustibleCostos + $datosFormulario->sueldosCostos + $datosFormulario->comercializacionCostos + $datosFormulario->otrosCostos + $datosFormulario->cuotaMensualCostos ?? 0}}"></p>
					          </div>
      					</div>
					<script type="text/javascript" src="{{ asset('js/calculo_servicios.js') }}"></script>
      				<!-- FIN COSTOS EMPRENDIMIENTO -->
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
							<table class="w3-table bienes_financiamiento">
								<thead>
									<tr>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Precio Unitario</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
                                            <td>
                                                <input type="text" name="item1_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item1_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item1_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item1_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item1_precio" placeholder="xxx.xx" value="{{$datosFormulario->item1_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item1_total" placeholder="xxx.xx" value="{{$datosFormulario->item1_cantidad * $datosFormulario->item1_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item2_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item2_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item2_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item2_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item2_precio" placeholder="xxx.xx" value="{{$datosFormulario->item2_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item2_total" placeholder="xxx.xx" value="{{$datosFormulario->item2_cantidad * $datosFormulario->item2_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item3_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item3_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item3_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item3_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item3_precio" placeholder="xxx.xx" value="{{$datosFormulario->item3_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item3_total" placeholder="xxx.xx" value="{{$datosFormulario->item3_cantidad * $datosFormulario->item3_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item4_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item4_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item4_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item4_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item4_precio" placeholder="xxx.xx" value="{{$datosFormulario->item4_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item4_total" placeholder="xxx.xx" value="{{$datosFormulario->item4_cantidad * $datosFormulario->item4_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item5_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item5_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item5_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item5_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item5_precio" placeholder="xxx.xx" value="{{$datosFormulario->item5_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item5_total" placeholder="xxx.xx" value="{{$datosFormulario->item5_cantidad * $datosFormulario->item5_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item6_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item6_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item6_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item6_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item6_precio" placeholder="xxx.xx" value="{{$datosFormulario->item6_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item6_total" placeholder="xxx.xx" value="{{$datosFormulario->item6_cantidad * $datosFormulario->item6_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item7_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item7_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item7_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item7_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item7_precio" placeholder="xxx.xx" value="{{$datosFormulario->item7_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item7_total" placeholder="xxx.xx" value="{{$datosFormulario->item7_cantidad * $datosFormulario->item7_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item8_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item8_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item8_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item8_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item8_precio" placeholder="xxx.xx" value="{{$datosFormulario->item8_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item8_total" placeholder="xxx.xx" value="{{$datosFormulario->item8_cantidad * $datosFormulario->item8_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item9_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item9_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item9_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item9_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item9_precio" placeholder="xxx.xx" value="{{$datosFormulario->item9_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item9_total" placeholder="xxx.xx" value="{{$datosFormulario->item9_cantidad * $datosFormulario->item9_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item10_descripcion" placeholder="xxx.xx" value="{{$datosFormulario->item10_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item10_cantidad" placeholder="xxx.xx" value="{{$datosFormulario->item10_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item10_precio" placeholder="xxx.xx" value="{{$datosFormulario->item10_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item10_total" placeholder="xxx.xx" value="{{$datosFormulario->item10_cantidad * $datosFormulario->item10_precio}}">
                                            </td>
                                    </tr>
									<tr>
										<th colspan="2" style="text-align: center;">Total solicitado al crear</th>
										<td colspan="2"><input style="text-align: center;" type="text" id="totalsolicitado_crear" readonly placeholder="xxx.xx"></td>
									</tr>
								</tbody>
							</table>
							</div>
						</div>
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
							    <input class="w3-input w3-border" type="text" name="efectivoMBE" placeholder="Ingrese el efectivo..." value="{{$datosFormulario->efectivoMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cuentas bancarias</label>
							    <input class="w3-input w3-border" type="text" name="cuentasBancariasMBE" placeholder="Ingrese el monto de cuentas bancarias..." value="{{$datosFormulario->cuentasBancariasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Créditos por ventas</label>
							    <input class="w3-input w3-border" type="text" name="creditosVentasMBE" placeholder="Ingrese el monto de créditos por ventas..." value="{{$datosFormulario->creditosVentasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otros créditos</label>
							    <input class="w3-input w3-border" type="text" name="otrosCreditosMBE" placeholder="Ingrese el monto de otros créditos..." value="{{$datosFormulario->otrosCreditosMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE CAMBIO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Mercaderías</label>
							    <input class="w3-input w3-border" type="text" name="mercaderiasMBE" placeholder="Ingrese el monto de las mercaderías..." value="{{$datosFormulario->mercaderiasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Materias primas</label>
							    <input class="w3-input w3-border" type="text" name="materiasPrimasMBE" placeholder="Ingrese el monto de las materias primas..." value="{{$datosFormulario->materiasPrimasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Insumos</label>
							    <input class="w3-input w3-border" type="text" name="insumosMBE" placeholder="Ingrese el monto de los insumos..." value="{{$datosFormulario->insumosMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE USO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Inmuebles</label>
							    <input class="w3-input w3-border" type="text" name="inmueblesMBE" placeholder="Ingrese el monto de los inmuebles..." value="{{$datosFormulario->inmueblesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rodados</label>
							    <input class="w3-input w3-border" type="text" name="rodadosMBE" placeholder="Ingrese el monto de los rodados..." value="{{$datosFormulario->rodadosMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Maquinarias y equipos</label>
							    <input class="w3-input w3-border" type="text" name="maquinariasEquiposMBE" placeholder="Ingrese el monto de las maquinarias y equipos..." value="{{$datosFormulario->maquinariasEquiposMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Instalaciones</label>
							    <input class="w3-input w3-border" type="text" name="instalacionesMBE" placeholder="Ingrese el monto de las instalaciones..." value="{{$datosFormulario->instalacionesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS COMERCIALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>En cuentas corrientes</label>
							    <input class="w3-input w3-border" type="text" name="deudaCuentasCorrientesMBE" placeholder="Ingrese la deuda en cuentas corrientes..." value="{{$datosFormulario->deudaCuentasCorrientesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cheques de pago diferido</label>
							    <input class="w3-input w3-border" type="text" name="deudaChequesPagoDiferidoMBE" placeholder="Ingrese la deuda de cheques de pago diferido..." value="{{$datosFormulario->deudaChequesPagoDiferidoMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Documentadas</label>
							    <input class="w3-input w3-border" type="text" name="documentadasMBE" placeholder="Ingrese las deudas documentadas..." value="{{$datosFormulario->documentadasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasComercialesMBE" placeholder="Ingrese otras deudas comerciales..." value="{{$datosFormulario->otrasDeudasComercialesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS BANCARIAS</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tarjetas de crédito</label>
							    <input class="w3-input w3-border" type="text" name="deudaTarjetasCreditoMBE" placeholder="Ingrese las deudas de tarjetas de crédito..." value="{{$datosFormulario->deudaTarjetasCreditoMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía hipotecaria(Inmuebles)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaHipotecariaMBE" placeholder="Ingrese las deudas con garantía hipotecaria..." value="{{$datosFormulario->deudaGarantiaHipotecariaMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía prendaria(Rodados)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaPrendariaMBE" placeholder="Ingrese las deudas con garantia prendaria..." value="{{$datosFormulario->deudaGarantiaPrendariaMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS FISCALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>AFIP</label>
							    <input class="w3-input w3-border" type="text" name="deudaAfipMBE" placeholder="Ingrese la deuda con AFIP..." value="{{$datosFormulario->deudaAfipMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rentas Río Negro</label>
							    <input class="w3-input w3-border" type="text" name="deudaRentasRnMBE" placeholder="Ingrese la deuda con Rentas Río Negro..." value="{{$datosFormulario->deudaRentasRnMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tributos municipales</label>
							    <input class="w3-input w3-border" type="text" name="deudaTributosMunicipalesMBE" placeholder="Ingrese la deuda con tributos municipales..." value="{{$datosFormulario->deudaTributosMunicipalesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Deudas sociales</label>
							    <input class="w3-input w3-border" type="text" name="deudasSocialesMBE" placeholder="Ingrese las deudas de aportes, contribuciones, salarios, etc..." value="{{$datosFormulario->deudasSocialesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras Deudas</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasMBE" placeholder="Ingrese otras deudas..." value="{{$datosFormulario->otrasDeudasMBE ?? ''}}">
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
							    <input class="w3-input w3-border" type="text" name="nombreMBG" placeholder="Ingrese el nombre del garante..." value="{{$datosFormulario->nombreMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>DNI</label>
							    <input class="w3-input w3-border" type="text" name="dniMBG" placeholder="Ingrese el dni del garante..." value="{{$datosFormulario->dniMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>CUIT</label>
							    <input class="w3-input w3-border" type="text" name="cuitMBG" placeholder="Ingrese el cuit del garante..." value="{{$datosFormulario->cuitMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Domicilio</label>
							    <input class="w3-input w3-border" type="text" name="domicilioMBG" placeholder="Ingrese el domicilio del garante..." value="{{$datosFormulario->domicilioMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Localidad</label>
							    <input class="w3-input w3-border" type="text" name="localidadMBG" placeholder="Ingrese la localidad del garante..." value="{{$datosFormulario->localidadMBG ?? ''}}">
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
							    <input class="w3-input w3-border" type="text" name="efectivoMBG" placeholder="Ingrese el efectivo..." value="{{$datosFormulario->efectivoMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cuentas bancarias</label>
							    <input class="w3-input w3-border" type="text" name="cuentasBancariasMBG" placeholder="Ingrese el monto de cuentas bancarias..." value="{{$datosFormulario->cuentasBancariasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Créditos por ventas</label>
							    <input class="w3-input w3-border" type="text" name="creditosVentasMBG" placeholder="Ingrese el monto de créditos por ventas..." value="{{$datosFormulario->creditosVentasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otros créditos</label>
							    <input class="w3-input w3-border" type="text" name="otrosCreditosMBG" placeholder="Ingrese el monto de otros créditos..." value="{{$datosFormulario->otrosCreditosMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE CAMBIO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Mercaderías</label>
							    <input class="w3-input w3-border" type="text" name="mercaderiasMBG" placeholder="Ingrese el monto de las mercaderías..." value="{{$datosFormulario->mercaderiasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Materias primas</label>
							    <input class="w3-input w3-border" type="text" name="materiasPrimasMBG" placeholder="Ingrese el monto de las materias primas..." value="{{$datosFormulario->materiasPrimasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Insumos</label>
							    <input class="w3-input w3-border" type="text" name="insumosMBG" placeholder="Ingrese el monto de los insumos..." value="{{$datosFormulario->insumosMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE USO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Inmuebles</label>
							    <input class="w3-input w3-border" type="text" name="inmueblesMBG" placeholder="Ingrese el monto de los inmuebles..." value="{{$datosFormulario->inmueblesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rodados</label>
							    <input class="w3-input w3-border" type="text" name="rodadosMBG" placeholder="Ingrese el monto de los rodados..." value="{{$datosFormulario->rodadosMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Maquinarias y equipos</label>
							    <input class="w3-input w3-border" type="text" name="maquinariasEquiposMBG" placeholder="Ingrese el monto de las maquinarias y equipos..." value="{{$datosFormulario->maquinariasEquiposMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Instalaciones</label>
							    <input class="w3-input w3-border" type="text" name="instalacionesMBG" placeholder="Ingrese el monto de las instalaciones..." value="{{$datosFormulario->instalacionesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS COMERCIALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>En cuentas corrientes</label>
							    <input class="w3-input w3-border" type="text" name="deudaCuentasCorrientesMBG" placeholder="Ingrese la deuda en cuentas corrientes..." value="{{$datosFormulario->deudaCuentasCorrientesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cheques de pago diferido</label>
							    <input class="w3-input w3-border" type="text" name="deudaChequesPagoDiferidoMBG" placeholder="Ingrese la deuda de cheques de pago diferido..." value="{{$datosFormulario->deudaChequesPagoDiferidoMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Documentadas</label>
							    <input class="w3-input w3-border" type="text" name="documentadasMBG" placeholder="Ingrese las deudas documentadas..." value="{{$datosFormulario->documentadasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasComercialesMBG" placeholder="Ingrese otras deudas comerciales..." value="{{$datosFormulario->otrasDeudasComercialesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS BANCARIAS</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tarjetas de crédito</label>
							    <input class="w3-input w3-border" type="text" name="deudaTarjetasCreditoMBG" placeholder="Ingrese las deudas de tarjetas de crédito..." value="{{$datosFormulario->deudaTarjetasCreditoMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía hipotecaria(Inmuebles)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaHipotecariaMBG" placeholder="Ingrese las deudas con garantía hipotecaria..." value="{{$datosFormulario->deudaGarantiaHipotecariaMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía prendaria(Rodados)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaPrendariaMBG" placeholder="Ingrese las deudas con garantia prendaria..." value="{{$datosFormulario->deudaGarantiaPrendariaMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS FISCALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>AFIP</label>
							    <input class="w3-input w3-border" type="text" name="deudaAfipMBG" placeholder="Ingrese la deuda con AFIP..." value="{{$datosFormulario->deudaAfipMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rentas Río Negro</label>
							    <input class="w3-input w3-border" type="text" name="deudaRentasRnMBG" placeholder="Ingrese la deuda con Rentas Río Negro..." value="{{$datosFormulario->deudaRentasRnMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tributos municipales</label>
							    <input class="w3-input w3-border" type="text" name="deudaTributosMunicipalesMBG" placeholder="Ingrese la deuda con tributos municipales..." value="{{$datosFormulario->deudaTributosMunicipalesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Deudas sociales</label>
							    <input class="w3-input w3-border" type="text" name="deudasSocialesMBG" placeholder="Ingrese las deudas de aportes, contribuciones, salarios, etc..." value="{{$datosFormulario->deudasSocialesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras Deudas</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasMBG" placeholder="Ingrese otras deudas..." value="{{$datosFormulario->otrasDeudasMBG ?? ''}}">
							</div>
						</div>
	                </section>
	                <h2>DOCUMENTACIÓN</h2>
	                <section>
	                		<div class="w3-col m12">
	                		<h3>Documentación del Solicitante</h3>
	                	</div>
								@foreach($documentacionUsuario as $documento)
									<div class="w3-half">
										<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
					                    	<label for="{{$documento}}">{{$documento}}</label><br>
					                    	<p>DOCUMENTO CARGADO</p>
					                    	<input class="w3-input" style="color: white;" type="file" name="{{$documento}}">
					                    </div>
									</div>
								@endforeach
								@foreach($documentacionFaltante as $faltante)
									<div class="w3-half">
										<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
					                    	<label for="{{$faltante}}">{{$faltante}}</label><br>
					                    	<input class="w3-input" style="color: white;" type="file" name="{{$faltante}}">
					                    </div>
									</div>
								@endforeach
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