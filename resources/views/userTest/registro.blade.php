@extends('userTest.layout')
	
	@section('title') Registro de usuario @endsection

	@section('content')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<header class="w3-container" style="padding-top:22px">
	    <h3><b><i class="fa fa-dashboard"></i> Registráte para poder acceder a la plataforma!</b></h3>
	</header>
		<script>
                $(function ()
                {
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "section",
                        transitionEffect: "slideLeft",
                        enableAllSteps: true,
                        onStepChanging: function (event, currentIndex, newIndex)
		                  {
		                    return $("#formRegistroUsuario").valid();
		                  },
                        onFinished: function (event, currentIndex) {
                        	if (grecaptcha.getResponse()) {
                        		$("#formRegistroUsuario").submit();
			                } else {
			                    alert('Por favor, confirme el CAPTCHA antes de proceder.')
			                }
							}
                    });
                    $("#wizard").steps("setStep",3);
                });
        </script>
        <style type="text/css">
        	.wizard > .steps {
        		width: 130% !important;
        	}
        	.wizard > .content {
        		height: 30em !important;
        	} 
        	.errores {
        		display: table; 
        		list-style-type: disc; 
        		align-items: left;
        		font-size: 16px;
        	}
        	.errores li {
        		color: black;
        	}
        	.wizard > .content > .body label.error {
        		color: #ffb6ac !important;
        	}
        </style>
        @if ($msg)
			<div class="w3-panel w3-teal w3-display-container">
			  <span onclick="this.parentElement.style.display='none'"
			  class="w3-button w3-large w3-display-topright">&times;</span>
			  <h4><b>{{$msg}}</b></h4>
			</div>
		@endif
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
		<div id="notificacion" style="padding: 20px;">
		</div>
        <form method="post" action="" name="formRegistroUsuario" class="formRegistroUsuario" id="formRegistroUsuario">
            <div id="wizard">
                <h2>Datos principales</h2>
                <section>
                    <div class="w3-half">
                    	<div id="dniBlur" style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>DNI</label>
						    <input id="dni" class="w3-input w3-border w3-round-large" type="text" name="dni" placeholder="Ingrese su DNI...">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>Contraseña</label>
						    <input id="password" class="w3-input w3-border w3-round-large" type="password" name="password" placeholder="Ingrese una contraseña...">
						</div>
					</div>
					<script type="text/javascript">
					$('#dniBlur').on('blur','input',function(event) {
					    var datos = {};
					        datos['dni'] = $('#dni').val();
					    $.ajax({
					        type: 'POST',
					        url: "{{ url('/comprobarDNI') }}",
					        data : datos
					    }).done(function (data) {
					    	//crea array para respuestas
					    	var datos = ['DNI válido','DNI duplicado'];
					    	var colores = ['#3ed67d','#d9486c'];
					    	//mostrar respuestas indexadas
					    	$('#notificacion').css('color',colores[data]);
					    	$('#notificacion').text(datos[data]);
					    }).fail(function () {
					        console.log('Error contacte con el administrador de la aplicación.');
					    });
					  }); 
					</script>
                </section>
                <h2>Datos personales</h2>
                <section>
                	<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>Nombre y apellido</label>
						    <input id="nombreApellido" class="w3-input w3-border w3-round-large" type="text" name="nombreApellido" placeholder="Ingrese su nombre y apellido...">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;height: 95px;" align="center">
						    <label>Fecha de nacimiento</label>
						    <input id="fecNacimiento" style="width: 50%;" class="w3-input w3-border w3-round-large" type="text" name="fecNacimiento" id="datepicker" placeholder="Ingrese su fecha de nacimiento...">
						</div>
					</div>
					<script type="text/javascript">
						$('#fecNacimiento').mask('00-00-0000');
					</script>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>Actividad principal</label>
						    <select id="actividad" class="w3-select" style="padding: 4px 0px !important;" name="actividad">
						    	<option value="" disabled selected>Seleccioná la actividad que realizás...</option>
						    	@foreach($actPrincipales as $actividad)
						    		<option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
						    	@endforeach
							 </select>
						</div>
					</div>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>Domicilio</label>
						    <input id="domicilio" class="w3-input w3-border w3-round-large" type="text" name="domicilio" placeholder="Ingrese su domicilio real...">
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>Localidad</label>
						    <select id="localidad" class="w3-select" style="padding: 4px 0px !important;" name="localidad">
						    	<option value="" disabled selected>Seleccioná tu localidad de residencia...</option>
						    	@foreach ($localidades as $localidad)
								    <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
								@endforeach
							 </select>
						</div>
					  </div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>Provincia</label>
						    <select id="provincia" class="w3-select" style="padding: 4px 0px !important;" name="provincia">
						    	<option value="" disabled selected>Seleccioná la provincia real...</option>
							    <option value="Buenos Aires">Buenos Aires</option>
								<option value="Buenos Aires-GBA">Buenos Aires-GBA</option>
								<option value="Capital Federal">Capital Federal</option>
								<option value="Catamarca">Catamarca</option>
								<option value="Chaco">Chaco</option>
								<option value="Chubut">Chubut</option>
								<option value="Córdoba">Córdoba</option>
								<option value="Corrientes">Corrientes</option>
								<option value="Entre Ríos">Entre Ríos</option>
								<option value="Formosa">Formosa</option>
								<option value="Jujuy">Jujuy</option>
								<option value="La Pampa">La Pampa</option>
								<option value="La Rioja">La Rioja</option>
								<option value="Mendoza">Mendoza</option>
								<option value="Misiones">Misiones</option>
								<option value="Neuquén">Neuquén</option>
								<option value="Río Negro">Río Negro</option>
								<option value="Salta">Salta</option>
								<option value="San Juan">San Juan</option>
								<option value="San Luis">San Luis</option>
								<option value="Santa Cruz">Santa Cruz</option>
								<option value="Santa Fe">Santa Fe</option>
								<option value="Santiago del Estero">Santiago del Estero</option>
								<option value="Tierra del Fuego">Tierra del Fuego</option>
								<option value="Tucumán">Tucumán</option>
							 </select>
						</div>
					</div>
					<div class="w3-col m12">
						<hr>
						<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>Agencia</label>
						    <select id="agencia" class="w3-select" style="padding: 4px 0px !important;" name="agencia">
						    	<option value="" disabled selected>Seleccioná la agencia más cercana a tu localidad...</option>
						    	@foreach ($agencias as $agencia)
								    <option value="{{$agencia->id}}">{{$agencia->nombre}}</option>
								@endforeach
							 </select>
						</div>
					</div>
                </section>
                <h2>Datos de contacto</h2>
                <section>

                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>E-mail</label>
						    <input id="email" class="w3-input w3-border" type="text" name="email" placeholder="Ingrese un email para poder contactarnos con usted...">
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
						    <label>Telefono</label>
						    <input class="w3-input w3-border" type="text" name="telefono" placeholder="Ingrese su telefono de contacto...">
						</div>
					</div>
					<div class="w3-col m12" align="center">
							<div class="g-recaptcha" data-sitekey="<?php echo config('constantes.google_key.site'); ?>"></div>
					</div>
                </section>
            </div>
        </form>
		<script type="text/javascript">
			    $( "#formRegistroUsuario" ).validate({
			           rules: {
			                  dni: {
			                           required: true,
			                           maxlength: 8
			                   },
			                   password: {
			                           required: true,
			                           minlength: 6,
			                           maxlength: 25
			                   },
			                   nombreApellido: {
			                           required: true,
			                           maxlength: 44
			                   },
			                   actividad: {
			                           required: true
			                   },
			                   domicilio: {
			                           required: true,
			                           maxlength: 100
			                   },
			                   localidad: {
			                           required: true
			                   },
			                   provincia: {
			                           required: true
			                   },
			                   agencia: {
			                           required: true
			                   },
			                   email: {
			                           required: true,
			                           maxlength: 100
			                   }
			           },
			           messages: {
			                  dni: {
			                           required: "Campo obligatorio",
			                           maxlength: $.format("{0} carácteres son demasiados!")
			                   },
			                   password: {
			                           required: "Campo obligatorio",
			                           minlength: $.format("Necesitamos por lo menos {0} carácteres"),
			                           maxlength: $.format("{0} carácteres son demasiados!")
			                   },
			                   nombreApellido: {
			                           required: "Campo obligatorio",
			                           maxlength: $.format("{0} carácteres son demasiados!")
			                   },
			                   actividad: {
			                           required: "Campo obligatorio"
			                   },
			                   domicilio: {
			                           required: "Campo obligatorio",
			                           maxlength: $.format("{0} carácteres son demasiados!")
			                   },
			                   localidad: {
			                           required: "Campo obligatorio"
			                   },
			                   provincia: {
			                           required: "Campo obligatorio"
			                   },
			                   agencia: {
			                           required: "Campo obligatorio"
			                   },
			                   email: {
			                           required: "Campo obligatorio",
			                           maxlength: $.format("{0} carácteres son demasiados!")
			                   }
			           }
			   	});
		</script>
@endsection