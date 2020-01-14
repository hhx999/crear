@extends('userTest.layout')

	@section('title') Inicio @endsection

	@section('content')
	<?php use app\Helpers; ?>
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
		<div id="modalBorrador" class="w3-modal">
			<div class="w3-modal-content">
				<div class="w3-container">
					<span onclick="document.getElementById('modalBorrador').style.display='none'" class="w3-button w3-display-topright" style="color: black;">&times;</span>
					<br>
					<label style="color: black;">Guardar borrador <i style="color: gray;">({{date("d-m-Y")}})</i></label>
					<input placeholder="Escribir asunto del formulario..." type="text" name="asuntoBorrador" id="asuntoBorrador" class="w3-input"><br>
					<a href="#" id="enviarBorrador" class="w3-button w3-cyan" style="color: white !important;">Enviar</a>
				</div>
			</div>
		</div>
		<form method="post" action="{{route('ingresarLineaEmprendedor')}}" name="formLineaEmprendedor" class="formLineaEmprendedor" id="formLineaEmprendedor">
			<a id="guardarBorrador" class="w3-button w3-cyan" href="#" style="border-radius: 6px;color: white !important;">Guardar borrador</a>
			<br><br>
			<script>
			    $("#guardarBorrador").click(function() {
			    	var formBorrador = new FormData();
			    	var asuntoBorrador = $('#asuntoBorrador').val();
			    	console.log()
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
					        if(input.attr('type') == 'checkbox' && input.prop('checked'))
					        {
					        	formBorrador.append(input.attr('name') , input.val());
					        }
					        if (input.attr('type') != 'checkbox') {
					        	formBorrador.append(input.attr('name') , input.val());
					        }
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
			            		$('#borradorGuardadoOk').css('display','block');
			            		console.log('Borrador Guardatisss');
							    setTimeout(function(){
							        location.reload(true);
							    }, 60000);
			            	}
			            }
				        }).fail( function( jqXHR, textStatus, errorThrown ) {
				        	if (jqXHR.status == 404) {
							    alert('No se encuentran resultados. [404]');
							}
				        });			    
				    });
			</script>
			<div id="borradorGuardadoOk" class="w3-panel w3-green w3-display-container" style="display: none;">
			  <span onclick="this.parentElement.style.display='none'"
			  class="w3-button w3-large w3-display-topright">&times;</span>
			  <h3>Borrador guardado!</h3>
			  <p>El borrador ha sido guardado con éxito.</p>
			</div>
			<input type="hidden" name="borrador_id" value="{{$datosBorrador->id}}">
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
							<input class="w3-input" type="text" name="nombreEmprendedor" placeholder="Ingresar el nombre y apellido del emprendedor..." value="{{$datosBorrador->nombreEmprendedor}}" readonly="on">
						</div>
						<div class="w3-half">
	                    	<label>DNI</label>
							<input class="w3-input" type="text" name="dniEmprendedor" placeholder="Ingresar el dni del emprendedor..." value="{{$datosBorrador->dniEmprendedor}}" readonly="on">
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
							<input class="w3-input datosEmprendedor" type="text" name="domicilioEmprendedor" placeholder="Ingresar el domicilio del emprendedor..." value="{{$datosBorrador->domicilioEmprendedor}}">
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>Datos de contacto</b></p>
						</div>
						<div class="w3-half">
	                    	<label>Teléfono</label>
							<input class="w3-input datosEmprendedor" type="text" name="telefonoEmprendedor" placeholder="Ingresar el telefono del emprendedor..." value="{{$datosBorrador->telefonoEmprendedor}}">
						</div>
						<div class="w3-half">
	                    	<label>Email</label>
							<input class="w3-input datosEmprendedor" type="text" name="emailEmprendedor" placeholder="Ingresar el email del emprendedor..." value="{{$datosBorrador->emailEmprendedor}}">
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
							<input class="w3-input" type="text" name="facebookEmprendedor" placeholder="Ingresar nombre de facebook del emprendedor..." value="{{$datosBorrador->facebookEmprendedor ?? ''}}">
						</div>
						<div class="w3-half">
	                    	<label>Instagram</label>
							<input class="w3-input" type="text" name="instagramEmprendedor" placeholder="Ingresar usuario de instagram del emprendedor..." value="{{$datosBorrador->instagramEmprendedor ?? ''}}">
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
										@if(!empty($datosBorrador->gradoInstruccion))
											@foreach($grados as $grado)
												@if($datosBorrador->gradoInstruccion == $grado)
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
							<input class="w3-input" type="text" name="otraOcupacion" placeholder="Ingresar otra ocupación del emprendedor..." value="{{$datosBorrador->otraOcupacion ?? ''}}">
						</div>
						<div class="w3-half">
							<label>Ingreso mensual de la ocupación</label>
							<input class="w3-input" type="text" name="ingresoMensual" placeholder="Ingresar el ingreso mensual del emprendedor..." value="{{$datosBorrador->ingresoMensual ?? ''}}">
						</div>
						<div class="w3-col m12">
							<div class="w3-third"><p></p></div>
							<div class="w3-third">
								<label>Deseo de capacitación</label>
								<input class="w3-input" type="text" name="deseoCapacitacion" placeholder="Ingresar una capacitación deseada a futuro..." value="{{$datosBorrador->deseoCapacitacion ?? ''}}">
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
									if (!isset($datosBorrador->estadoEmprendimiento)) {
										print '<option value="" disabled selected>Elegí el estado del emprendimiento...</option>';
									}
									foreach ($estadosEmprendimiento as $estado) {
										if ($estado == $datosBorrador->estadoEmprendimiento) {
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
								<input class="w3-input w3-border w3-round-large" type="text" name="denominacion" placeholder="Ingrese el nombre de fantasía del emprendimiento..." value="{{$datosBorrador->denominacion ?? ''}}">
							</div>
							<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
								    <label>Tipo de sociedad</label>
								    
								    <select id="tipoSociedad" class="w3-select" name="tipoSociedad">
								    	<?php
									    $tiposSociedad = App\TipoSociedad::get()->all();

									    App\Helpers::crearOptionLEObjetos($tiposSociedad,$datosBorrador->tipoSociedad);
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
	      						<input class="w3-input datosEmprendimiento" placeholder="dd-mm-AAAA" name="fecInicioEmprendimiento" id="inicio_emprendimiento" value="{{Helpers::cambioFormatoFecha($datosBorrador->fecInicioEmprendimiento)}}">
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
								<input class="w3-input datosEmprendimiento" type="text" name="antiguedadEmprendimiento" placeholder="Ingrese la antigüedad del emprendimiento..." value="{{$datosBorrador->antiguedadEmprendimiento}}">
							</div>
						</div>
						<div class="w3-half">
							<label>Número de CUIL o CUIT</label>
							<input class="w3-input datosEmprendimiento" type="text" name="cuitEmprendimiento" placeholder="Ingrese el numero de cuit o cuil vinculado al emprendimiento..." value="{{$datosBorrador->cuitEmprendimiento}}">
						</div>
						<div class="nuevoEmprendimiento">
							<div class="w3-half">
								<div style="padding: 20px;">
								    <select class="w3-select" id="cargoEmprendimiento" name="cargo">
								    	<?php
									    $cargos = ['Propietario','Representante legal','Socio de sociedad de hecho'];
									    App\Helpers::crearOptionLE($cargos,$datosBorrador->cargo);
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
								    <input class="w3-input w3-border" type="text" name="emailEmprendimiento" placeholder="Ingrese el email vinculado al emprendimiento..." value="{{$datosBorrador->emailEmprendimiento}}">
								</div>
							</div>
							<div class="w3-half">
								<div style="margin-right: 10px;margin-left: 10px;">
								    <label>Teléfono</label>
								    <input class="w3-input w3-border" type="text" name="telefonoEmprendimiento" placeholder="Ingrese el telefono de contacto con el emprendimiento..." value="{{$datosBorrador->telefonoEmprendimiento}}">
								</div>
							</div>
						</div>
						<div class="enfuncionamientoEmprendimiento">
							<div class="w3-half">
								<label>Número de ingresos brutos</label>
								<input class="w3-input datosEmprendimiento" type="text" name="ingresosBrutosEmprendimiento" placeholder="Ingrese los ingresos brutos del emprendimiento..." value="{{$datosBorrador->ingresosBrutosEmprendimiento}}">
							</div>
							<div class="w3-col m12">
								<br>
								<p><b>Localización del emprendimiento</b></p>
							</div>
							<div class="w3-half">
								<label>Domicilio comercial</label>
								<input class="w3-input datosEmprendimiento" type="text" name="domicilioEmprendimiento" placeholder="Ingrese el domicilio del emprendimiento..." value="{{$datosBorrador->domicilioEmprendimiento}}">
							</div>
							<div class="w3-half">
								<label>Localidad</label>
								<input class="w3-input datosEmprendimiento" type="text" name="localidadEmprendimiento" placeholder="Ingrese la localidad del emprendimiento..." value="{{$datosBorrador->localidadEmprendimiento}}">
							</div>
							<div class="w3-col m12">
								<div style="margin-right: 10px;margin-left: 10px;margin-bottom: 30px;">
								    <h4>El lugar donde se desarrolla el emprendimiento es:</h4>
								    <div style="display: inline-block;">
								    	<label class="container">
								    	<select class="w3-select" name="lugarEmprendimiento">
								   		<?php 
								   			$lugarDesarrolla = ["Ninguno", "Otro", "Propio", "Prestado", "Alquilado"];

								   			for($i = 0; $i < count($lugarDesarrolla);$i++)
								   			{
								   				if($datosBorrador->lugarEmprendimiento == $lugarDesarrolla[$i])
								   				{
								   					print_r('<option selected value="'.$lugarDesarrolla[$i].'">'.$lugarDesarrolla[$i].'</option>');
								   				} else {
								   					print_r('<option value="'.$lugarDesarrolla[$i].'">'.$lugarDesarrolla[$i].'</option>');
								   				}
								   			}
								   		 ?>
								    	</select>
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descProdServicios" maxlength="254" style="resize:none">{{$datosBorrador->descProdServicios}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>EXPERIENCIA O FORMACIÓN DE EL/LOS EMPRENDEDORES PARA EL DESARROLLO DEL EMPRENDIMIENTO</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="experienciaEmprendedores" maxlength="254" style="resize:none">{{$datosBorrador->experienciaEmprendedores}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>OPORTUNIDAD DE MERCADO O  PROBLEMA QUE  RESUELVE</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="oportunidadMercado" maxlength="254" style="resize:none">{{$datosBorrador->oportunidadMercado}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>DESCRIPCIÓN DEL DESTINO DEL FINANCIAMIENTO</b></p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descFinanciamiento" maxlength="254" style="resize:none">{{$datosBorrador->descFinanciamiento}}</textarea></p>
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descripcionClientes" maxlength="254" style="resize:none">{{$datosBorrador->descripcionClientes}}</textarea></p>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Ubicación de los principales clientes</label>
							    <select class="w3-select" name="ubicacionClientes">
							    	<?php
									    $puntosVenta = ['Local','Provincial','Nacional'];

									    App\Helpers::crearOptionLE($puntosVenta,$datosBorrador->ubicacionClientes);
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descripcionProveedores" maxlength="254" style="resize:none">{{$datosBorrador->descripcionProveedores}}</textarea></p>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Ubicación de los principales proveedores</label>
							    <select class="w3-select" name="ubicacionProveedores">
								   <?php
									    $puntosVenta = ['Local','Provincial','Nacional'];

									    App\Helpers::crearOptionLE($puntosVenta,$datosBorrador->ubicacionProveedores);
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descripcionCompetencia" maxlength="254" style="resize:none">{{$datosBorrador->descripcionCompetencia}}</textarea></p>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Ubicación de las principales competencias</label>
							    <select class="w3-select" name="ubicacionCompetencia">
								    <?php
									    $puntosVenta = ['Local','Provincial','Nacional'];

									    App\Helpers::crearOptionLE($puntosVenta,$datosBorrador->ubicacionCompetencia);
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="ventajaCompetidores" maxlength="254" style="resize:none">{{$datosBorrador->ventajaCompetidores}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>ESTRATEGIAS DE PROMOCIÓN QUE UTILIZARÁ</b><br>
								<i style="color: lightgrey;">¿Cómo vas a hacer conocer tu producto o servicio?</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="estrategiasPromocion" maxlength="254" style="resize:none">{{$datosBorrador->estrategiasPromocion}}</textarea></p>
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
							@if($datosBorrador->puntoVentaLocal == 'seleccionado')
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

							@if($datosBorrador->puntoVentaProvincial == 'seleccionado')
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
							
							@if($datosBorrador->puntoVentaNacional == 'seleccionado')
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
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="materiasPrimas" maxlength="254" style="resize:none">{{$datosBorrador->materiasPrimas}}</textarea></p>
						</div>
						<div class="w3-col m12">
							<br>
								<p><b>PROCESO PRODUCTIVO</b><br>
								<i style="color: lightgrey;">HERRAMIENTAS O MAQUINARIAS NECESARIAS PARA PRODUCIR O BRINDAR EL SERVICIO</i>
							</p>
						</div>
						<div class="w3-col m12" style="padding: 0px 20px 20px 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descHerramientas" maxlength="254" style="resize:none">{{$datosBorrador->descHerramientas}}</textarea></p>
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
									<td><input placeholder="Ej:empanadas" type="text" name="producto1" class="w3-input inputventas" value="{{$datosBorrador->producto1}}"></td>
									<td><input placeholder="Ej:docenas" type="text" name="udMedida1" class="w3-input inputventas" value="{{$datosBorrador->udMedida1}}"></td>
									<td><input placeholder="xx" type="text" name="cantidad1" class="w3-input inputventas"  value="{{$datosBorrador->cantidad1}}"></td>
									<td><span style="position: absolute;">$</span><input placeholder="xxx.xx"  type="text" name="valor1" class="w3-input inputvalores_ventas"  value="{{$datosBorrador->valor1}}"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="total1" class = "w3-input inputvalores_ventas" value="{{$datosBorrador->cantidad1 * $datosBorrador->valor1}}"></td>
								</tbody>
								<tbody>
									<td><input placeholder="Ej:empanadas" type="text" name="producto2" class="w3-input inputventas" value="{{$datosBorrador->producto2}}"></td>
									<td><input placeholder="Ej:docenas" type="text" name="udMedida2" class="w3-input inputventas"  value="{{$datosBorrador->udMedida2}}"></td>
									<td><input placeholder="xx" type="text" name="cantidad2" class="w3-input inputventas"  value="{{$datosBorrador->cantidad2}}"></td>
									<td><span style="position: absolute;">$</span><input placeholder="xxx.xx"  type="text" name="valor2" class="w3-input inputvalores_ventas" value="{{$datosBorrador->valor2}}"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="total2" class="w3-input inputvalores_ventas" value="{{$datosBorrador->cantidad2 * $datosBorrador->valor2}}"></td>
								</tbody>
								<tbody>
									<td><input placeholder="Ej:empanadas" type="text" name="producto3" class="w3-input inputventas" value="{{$datosBorrador->producto3}}"></td>
									<td><input placeholder="Ej:docenas" type="text" name="udMedida3" class="w3-input inputventas" value="{{$datosBorrador->udMedida3}}"></td>
									<td><input placeholder="xx" type="text" name="cantidad3" class="w3-input inputventas" value="{{$datosBorrador->cantidad3}}"></td>
									<td><span style="position: absolute;">$</span><input placeholder="xxx.xx"  type="text" name="valor3" class="w3-input inputvalores_ventas" value="{{$datosBorrador->valor3}}"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="total3" class="w3-input inputvalores_ventas" value="{{$datosBorrador->cantidad3 * $datosBorrador->valor3}}"></td>
								</tbody>
								<tbody>
									<td><input placeholder="Ej:empanadas" type="text" name="producto4" class="w3-input inputventas" value="{{$datosBorrador->producto4}}"></td>
									<td><input placeholder="Ej:docenas" type="text" name="udMedida4" class="w3-input inputventas" value="{{$datosBorrador->udMedida4}}"></td>
									<td><input placeholder="xx" type="text" name="cantidad4" class="w3-input inputventas" value="{{$datosBorrador->cantidad4}}"></td>
									<td><span style="position: absolute;">$</span><input placeholder="xxx.xx"  type="text" name="valor4" class="w3-input inputvalores_ventas" value="{{$datosBorrador->valor4}}"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="total4" class="w3-input inputvalores_ventas" value="{{$datosBorrador->cantidad4 * $datosBorrador->valor4}}"></td>
								</tbody>
								<tbody>
									<td colspan="2" style="text-align: center">Otros</td>
									<td colspan="2"></td>
									<td><span style="position: absolute;">$</span><input type="text" name="otrosProductosVenta" class="w3-input inputvalores_ventas" value="{{$datosBorrador->otrosProductosVenta}}"></td>
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
											<td><span style="position: absolute;">$</span><input placeholder="Insumos y materias primas..." maxlength="10" name="insumosCostos" class="sumable" id="insumos_materias" value="{{$datosBorrador->insumosCostos ?? 0}}"></td>
										</tr>
										<tr>
											<td align="center">
												Alquileres
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Alquileres..." class="sumable" maxlength="10" name="alquileresCostos" id="alquileres" value="{{$datosBorrador->alquileresCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Servicios(luz-agua-gas-internet)
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Servicios(luz-agua-gas-internet)..." class="sumable" maxlength="10" name="serviciosCostos" id="servicios_otros" value="{{$datosBorrador->serviciosCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Monotributo
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Monotributo..." class="sumable" maxlength="10" name="monotributoCostos" id="monotributo_otros" value="{{$datosBorrador->monotributoCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">Ingresos brutos</td>
											<td><span style="position: absolute;">$</span><input placeholder="Ingresos brutos..." maxlength="10" name="ingresosBrutosCostos" class="sumable" value="{{$datosBorrador->ingresosBrutosCostos ?? 0}}"></td>
										</tr>
										<tr>
											<td align="center">
												Seguros
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Seguros..." class="sumable" maxlength="10" name="segurosCostos" id="seguros_otros" value="{{$datosBorrador->segurosCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Combustible
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Combustible..." class="sumable" maxlength="10" name="combustibleCostos" id="combustible_otros" value="{{$datosBorrador->combustibleCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Sueldos
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Sueldos..." class="sumable" maxlength="10" name="sueldosCostos" id="sueldos_otros" value="{{$datosBorrador->sueldosCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Comercialización
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Comercializacion..." class="sumable" maxlength="10" name="comercializacionCostos" id="comercializacion" value="{{$datosBorrador->comercializacionCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Otros
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Otros..." class="sumable" maxlength="10" name="otrosCostos" id="otros" value="{{$datosBorrador->otrosCostos ?? 0}}">
											</td>
										</tr>
										<tr>
											<td align="center">
												Cuota anual de amortización de crédito
											</td>
											<td>
												<span style="position: absolute;">$</span>
												<input placeholder="Cuota mensual..." class="sumable" maxlength="10" name="cuotaMensualCostos" id="cuotamensual_otros" value="{{$datosBorrador->cuotaMensualCostos ?? 0}}">
											</td>
										</tr>
									</tbody>
								</table>
					          <div class="w3-col m12">
					            <p align="center">TOTAL</p>
					            <p><input type="text" id="total_costos" value="{{$datosBorrador->insumosCostos + $datosBorrador->alquileresCostos + $datosBorrador->serviciosCostos + $datosBorrador->monotributoCostos + $datosBorrador->ingresosBrutosCostos + $datosBorrador->segurosCostos + $datosBorrador->combustibleCostos + $datosBorrador->sueldosCostos + $datosBorrador->comercializacionCostos + $datosBorrador->otrosCostos + $datosBorrador->cuotaMensualCostos ?? 0}}"></p>
					          </div>
      					</div>
					<script type="text/javascript" src="{{ asset('js/calculo_servicios.js') }}"></script>
      				<!-- FIN COSTOS EMPRENDIMIENTO -->
      				</div>
	                </section>
	                <h2>INVERSIÓN</h2>
	                <section>
	                	<style type="text/css">
							.bienes_financiamiento input {
								background-color: #00f0;
								color: white;
								border: 0px !important;
							}
						</style>
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
                                                <input type="text" name="item1_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item1_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item1_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item1_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item1_precio" placeholder="xxx.xx" value="{{$datosBorrador->item1_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item1_total" placeholder="xxx.xx" value="{{$datosBorrador->item1_cantidad * $datosBorrador->item1_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item2_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item2_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item2_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item2_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item2_precio" placeholder="xxx.xx" value="{{$datosBorrador->item2_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item2_total" placeholder="xxx.xx" value="{{$datosBorrador->item2_cantidad * $datosBorrador->item2_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item3_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item3_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item3_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item3_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item3_precio" placeholder="xxx.xx" value="{{$datosBorrador->item3_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item3_total" placeholder="xxx.xx" value="{{$datosBorrador->item3_cantidad * $datosBorrador->item3_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item4_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item4_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item4_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item4_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item4_precio" placeholder="xxx.xx" value="{{$datosBorrador->item4_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item4_total" placeholder="xxx.xx" value="{{$datosBorrador->item4_cantidad * $datosBorrador->item4_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item5_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item5_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item5_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item5_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item5_precio" placeholder="xxx.xx" value="{{$datosBorrador->item5_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item5_total" placeholder="xxx.xx" value="{{$datosBorrador->item5_cantidad * $datosBorrador->item5_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item6_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item6_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item6_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item6_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item6_precio" placeholder="xxx.xx" value="{{$datosBorrador->item6_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item6_total" placeholder="xxx.xx" value="{{$datosBorrador->item6_cantidad * $datosBorrador->item6_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item7_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item7_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item7_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item7_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item7_precio" placeholder="xxx.xx" value="{{$datosBorrador->item7_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item7_total" placeholder="xxx.xx" value="{{$datosBorrador->item7_cantidad * $datosBorrador->item7_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item8_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item8_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item8_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item8_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item8_precio" placeholder="xxx.xx" value="{{$datosBorrador->item8_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item8_total" placeholder="xxx.xx" value="{{$datosBorrador->item8_cantidad * $datosBorrador->item8_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item9_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item9_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item9_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item9_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item9_precio" placeholder="xxx.xx" value="{{$datosBorrador->item9_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item9_total" placeholder="xxx.xx" value="{{$datosBorrador->item9_cantidad * $datosBorrador->item9_precio}}">
                                            </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                <input type="text" name="item10_descripcion" placeholder="xxx.xx" value="{{$datosBorrador->item10_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item10_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item10_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item10_precio" placeholder="xxx.xx" value="{{$datosBorrador->item10_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item10_total" placeholder="xxx.xx" value="{{$datosBorrador->item10_cantidad * $datosBorrador->item10_precio}}">
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
							    <input class="w3-input w3-border" type="text" name="efectivoMBE" placeholder="Ingrese el efectivo..." value="{{$datosBorrador->efectivoMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cuentas bancarias</label>
							    <input class="w3-input w3-border" type="text" name="cuentasBancariasMBE" placeholder="Ingrese el monto de cuentas bancarias..." value="{{$datosBorrador->cuentasBancariasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Créditos por ventas</label>
							    <input class="w3-input w3-border" type="text" name="creditosVentasMBE" placeholder="Ingrese el monto de créditos por ventas..." value="{{$datosBorrador->creditosVentasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otros créditos</label>
							    <input class="w3-input w3-border" type="text" name="otrosCreditosMBE" placeholder="Ingrese el monto de otros créditos..." value="{{$datosBorrador->otrosCreditosMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE CAMBIO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Mercaderías</label>
							    <input class="w3-input w3-border" type="text" name="mercaderiasMBE" placeholder="Ingrese el monto de las mercaderías..." value="{{$datosBorrador->mercaderiasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Materias primas</label>
							    <input class="w3-input w3-border" type="text" name="materiasPrimasMBE" placeholder="Ingrese el monto de las materias primas..." value="{{$datosBorrador->materiasPrimasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Insumos</label>
							    <input class="w3-input w3-border" type="text" name="insumosMBE" placeholder="Ingrese el monto de los insumos..." value="{{$datosBorrador->insumosMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE USO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Inmuebles</label>
							    <input class="w3-input w3-border" type="text" name="inmueblesMBE" placeholder="Ingrese el monto de los inmuebles..." value="{{$datosBorrador->inmueblesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rodados</label>
							    <input class="w3-input w3-border" type="text" name="rodadosMBE" placeholder="Ingrese el monto de los rodados..." value="{{$datosBorrador->rodadosMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Maquinarias y equipos</label>
							    <input class="w3-input w3-border" type="text" name="maquinariasEquiposMBE" placeholder="Ingrese el monto de las maquinarias y equipos..." value="{{$datosBorrador->maquinariasEquiposMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Instalaciones</label>
							    <input class="w3-input w3-border" type="text" name="instalacionesMBE" placeholder="Ingrese el monto de las instalaciones..." value="{{$datosBorrador->instalacionesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS COMERCIALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>En cuentas corrientes</label>
							    <input class="w3-input w3-border" type="text" name="deudaCuentasCorrientesMBE" placeholder="Ingrese la deuda en cuentas corrientes..." value="{{$datosBorrador->deudaCuentasCorrientesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cheques de pago diferido</label>
							    <input class="w3-input w3-border" type="text" name="deudaChequesPagoDiferidoMBE" placeholder="Ingrese la deuda de cheques de pago diferido..." value="{{$datosBorrador->deudaChequesPagoDiferidoMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Documentadas</label>
							    <input class="w3-input w3-border" type="text" name="documentadasMBE" placeholder="Ingrese las deudas documentadas..." value="{{$datosBorrador->documentadasMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasComercialesMBE" placeholder="Ingrese otras deudas comerciales..." value="{{$datosBorrador->otrasDeudasComercialesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS BANCARIAS</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tarjetas de crédito</label>
							    <input class="w3-input w3-border" type="text" name="deudaTarjetasCreditoMBE" placeholder="Ingrese las deudas de tarjetas de crédito..." value="{{$datosBorrador->deudaTarjetasCreditoMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía hipotecaria(Inmuebles)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaHipotecariaMBE" placeholder="Ingrese las deudas con garantía hipotecaria..." value="{{$datosBorrador->deudaGarantiaHipotecariaMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía prendaria(Rodados)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaPrendariaMBE" placeholder="Ingrese las deudas con garantia prendaria..." value="{{$datosBorrador->deudaGarantiaPrendariaMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS FISCALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>AFIP</label>
							    <input class="w3-input w3-border" type="text" name="deudaAfipMBE" placeholder="Ingrese la deuda con AFIP..." value="{{$datosBorrador->deudaAfipMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rentas Río Negro</label>
							    <input class="w3-input w3-border" type="text" name="deudaRentasRnMBE" placeholder="Ingrese la deuda con Rentas Río Negro..." value="{{$datosBorrador->deudaRentasRnMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tributos municipales</label>
							    <input class="w3-input w3-border" type="text" name="deudaTributosMunicipalesMBE" placeholder="Ingrese la deuda con tributos municipales..." value="{{$datosBorrador->deudaTributosMunicipalesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Deudas sociales</label>
							    <input class="w3-input w3-border" type="text" name="deudasSocialesMBE" placeholder="Ingrese las deudas de aportes, contribuciones, salarios, etc..." value="{{$datosBorrador->deudasSocialesMBE ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras Deudas</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasMBE" placeholder="Ingrese otras deudas..." value="{{$datosBorrador->otrasDeudasMBE ?? ''}}">
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
							    <input class="w3-input w3-border" type="text" name="nombreMBG" placeholder="Ingrese el nombre del garante..." value="{{$datosBorrador->nombreMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>DNI</label>
							    <input class="w3-input w3-border" type="text" name="dniMBG" placeholder="Ingrese el dni del garante..." value="{{$datosBorrador->dniMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>CUIT</label>
							    <input class="w3-input w3-border" type="text" name="cuitMBG" placeholder="Ingrese el cuit del garante..." value="{{$datosBorrador->cuitMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Domicilio</label>
							    <input class="w3-input w3-border" type="text" name="domicilioMBG" placeholder="Ingrese el domicilio del garante..." value="{{$datosBorrador->domicilioMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Localidad</label>
							    <input class="w3-input w3-border" type="text" name="localidadMBG" placeholder="Ingrese la localidad del garante..." value="{{$datosBorrador->localidadMBG ?? ''}}">
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
							    <input class="w3-input w3-border" type="text" name="efectivoMBG" placeholder="Ingrese el efectivo..." value="{{$datosBorrador->efectivoMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cuentas bancarias</label>
							    <input class="w3-input w3-border" type="text" name="cuentasBancariasMBG" placeholder="Ingrese el monto de cuentas bancarias..." value="{{$datosBorrador->cuentasBancariasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Créditos por ventas</label>
							    <input class="w3-input w3-border" type="text" name="creditosVentasMBG" placeholder="Ingrese el monto de créditos por ventas..." value="{{$datosBorrador->creditosVentasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otros créditos</label>
							    <input class="w3-input w3-border" type="text" name="otrosCreditosMBG" placeholder="Ingrese el monto de otros créditos..." value="{{$datosBorrador->otrosCreditosMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE CAMBIO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Mercaderías</label>
							    <input class="w3-input w3-border" type="text" name="mercaderiasMBG" placeholder="Ingrese el monto de las mercaderías..." value="{{$datosBorrador->mercaderiasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Materias primas</label>
							    <input class="w3-input w3-border" type="text" name="materiasPrimasMBG" placeholder="Ingrese el monto de las materias primas..." value="{{$datosBorrador->materiasPrimasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Insumos</label>
							    <input class="w3-input w3-border" type="text" name="insumosMBG" placeholder="Ingrese el monto de los insumos..." value="{{$datosBorrador->insumosMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12" align="center">
							<b>BIENES DE USO</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Inmuebles</label>
							    <input class="w3-input w3-border" type="text" name="inmueblesMBG" placeholder="Ingrese el monto de los inmuebles..." value="{{$datosBorrador->inmueblesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rodados</label>
							    <input class="w3-input w3-border" type="text" name="rodadosMBG" placeholder="Ingrese el monto de los rodados..." value="{{$datosBorrador->rodadosMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Maquinarias y equipos</label>
							    <input class="w3-input w3-border" type="text" name="maquinariasEquiposMBG" placeholder="Ingrese el monto de las maquinarias y equipos..." value="{{$datosBorrador->maquinariasEquiposMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Instalaciones</label>
							    <input class="w3-input w3-border" type="text" name="instalacionesMBG" placeholder="Ingrese el monto de las instalaciones..." value="{{$datosBorrador->instalacionesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS COMERCIALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>En cuentas corrientes</label>
							    <input class="w3-input w3-border" type="text" name="deudaCuentasCorrientesMBG" placeholder="Ingrese la deuda en cuentas corrientes..." value="{{$datosBorrador->deudaCuentasCorrientesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Cheques de pago diferido</label>
							    <input class="w3-input w3-border" type="text" name="deudaChequesPagoDiferidoMBG" placeholder="Ingrese la deuda de cheques de pago diferido..." value="{{$datosBorrador->deudaChequesPagoDiferidoMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Documentadas</label>
							    <input class="w3-input w3-border" type="text" name="documentadasMBG" placeholder="Ingrese las deudas documentadas..." value="{{$datosBorrador->documentadasMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasComercialesMBG" placeholder="Ingrese otras deudas comerciales..." value="{{$datosBorrador->otrasDeudasComercialesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS BANCARIAS</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tarjetas de crédito</label>
							    <input class="w3-input w3-border" type="text" name="deudaTarjetasCreditoMBG" placeholder="Ingrese las deudas de tarjetas de crédito..." value="{{$datosBorrador->deudaTarjetasCreditoMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía hipotecaria(Inmuebles)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaHipotecariaMBG" placeholder="Ingrese las deudas con garantía hipotecaria..." value="{{$datosBorrador->deudaGarantiaHipotecariaMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Con garantía prendaria(Rodados)</label>
							    <input class="w3-input w3-border" type="text" name="deudaGarantiaPrendariaMBG" placeholder="Ingrese las deudas con garantia prendaria..." value="{{$datosBorrador->deudaGarantiaPrendariaMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
							<b>DEUDAS FISCALES</b>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>AFIP</label>
							    <input class="w3-input w3-border" type="text" name="deudaAfipMBG" placeholder="Ingrese la deuda con AFIP..." value="{{$datosBorrador->deudaAfipMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Rentas Río Negro</label>
							    <input class="w3-input w3-border" type="text" name="deudaRentasRnMBG" placeholder="Ingrese la deuda con Rentas Río Negro..." value="{{$datosBorrador->deudaRentasRnMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Tributos municipales</label>
							    <input class="w3-input w3-border" type="text" name="deudaTributosMunicipalesMBG" placeholder="Ingrese la deuda con tributos municipales..." value="{{$datosBorrador->deudaTributosMunicipalesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Deudas sociales</label>
							    <input class="w3-input w3-border" type="text" name="deudasSocialesMBG" placeholder="Ingrese las deudas de aportes, contribuciones, salarios, etc..." value="{{$datosBorrador->deudasSocialesMBG ?? ''}}">
							</div>
						</div>
						<div class="w3-col m12">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Otras Deudas</label>
							    <input class="w3-input w3-border" type="text" name="otrasDeudasMBG" placeholder="Ingrese otras deudas..." value="{{$datosBorrador->otrasDeudasMBG ?? ''}}">
							</div>
						</div>
	                </section>
	                <h2>DOCUMENTACIÓN</h2>
	                <section>
	                	<div class="w3-col m12">
	                		<h3>Documentación del Solicitante</h3>
	                	</div>
	                    <div class="w3-half">
	                    	<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
		                    	<label for="documentacion_dni_solicitante">DNI</label>
		                    	<input class="w3-input" style="color: white;" type="file" name="documentacion_dni_solicitante">
	                    	</div>
						</div>
						<div class="w3-half">
							<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
		                    	<label for="documentacion_cdomicilio_solicitante">Certificado de Domicilio</label>
		                    	<input class="w3-input" style="color: white;" type="file" name="documentacion_cdomicilio_solicitante">
		                    </div>
						</div>
						<div class="w3-half">
							<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
		                    	<label for="documentacion_recibosueldo_solicitante">Recibo de sueldo del Solicitante</label>
		                    	<input class="w3-input" style="color: white;" type="file" name="documentacion_recibosueldo_solicitante">
		                    </div>
						</div>
						<!--
						<div class="w3-half">
							<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
		                    	<label for="documentacion_libredeuda_solicitante">Certificado de libre de deuda</label>
		                    	<input class="w3-input" style="color: white;" type="file" name="documentacion_libredeuda_solicitante">
							</div>
						</div>-->
						<div class="w3-half">
							<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
		                    	<label for="documentacion_afip_solicitante">Constancia de Inscripción en AFIP</label><br>
		                    	<a class="w3-button w3-cyan" href="https://seti.afip.gob.ar/padron-puc-constancia-internet/ConsultaConstanciaAction.do" target="_blank" style="color: white !important;">Generar Constancia</a>
		                    	<input class="w3-input" style="color: white;" type="file" name="documentacion_afip_solicitante">
		                    </div>
						</div>
						<!--
						<div class="w3-half">
							<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
		                    	<label for="documentacion_iibb_solicitante">Constancia de Inscripción en IIBB - ART Río Negro</label><br>
		                    	<a class="w3-button w3-cyan" href="http://www.agencia.rionegro.gov.ar/InscripcionesContribuyente/index.jsp" target="_blank" style="color: white !important;">Generar Constancia</a>
		                    	<input class="w3-input" style="color: white;" type="file" name="documentacion_iibb_solicitante">
							</div>
						</div>
						<div class="w3-col m12">
							<div style="width: 100%;border-top: 2px white solid;margin-top: 10px;margin-bottom: 10px;"></div>
	                		<h3>Documentación del Garante</h3>
						</div>
						<div class="w3-half">
							<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
		                    	<label for="documentacion_dni_garante">Fotocopia DNI Garante</label>
		                    	<input class="w3-input" style="color: white;" type="file" name="documentacion_dni_garante">
							</div>
						</div>
						<div class="w3-half">
							<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
		                    	<label for="documentacion_recibosueldo_garante">Recibo de Sueldo - DDJJ IIBB S/corresponda</label>
		                    	<input class="w3-input" style="color: white;" type="file" name="documentacion_recibosueldo_garante">
							</div>
						</div>
						<div class="w3-half">
							<div style="padding: 20px;background-color: #00ffff1a;border-radius: 20px;">
		                    	<label for="documentacion_cdomicilio_garante">Certificado de Domicilio del Garante</label><br>
		                    	<input class="w3-input" style="color: white;" type="file" name="documentacion_cdomicilio_garante">
							</div>
						</div>
						<div class="w3-col m12">
							<div style="width: 100%;border-top: 2px white solid;margin-top: 10px;margin-bottom: 10px;"></div>
	                		<h3>Presupuestos</h3>
						</div>-->
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