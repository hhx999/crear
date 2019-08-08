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

		<form method="post" action="" name="formLineaEmprendedor" class="formLineaEmprendedor" id="formLineaEmprendedor">
	            <div id="wizard">
	                <h2>PORTADA</h2>
	                <section>
	                	<div class="w3-col l12">
	                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
							    <p>PORTADA</p>
							</div>
						</div>
						<div class="w3-col m12">
							<div class="w3-half">
								<label>Título del proyecto</label>
								<input id="tituloProyecto" class="w3-input" type="text" name="tituloProyecto" placeholder="Ingresar nombre del proyecto...">
							</div>
							<div class="w3-half">
								<label>Nombre solicitante</label>
								<input id="nombreSolicitante" class="w3-input" type="text" name="nombreSolicitante" placeholder="Ingresar nombre del solicitante...">
							</div>
							<div class="w3-half">
								<label>Localidad</label>
								<input class="w3-input" type="text" name="localidadSolicitante" placeholder="Ingresar localidad del solicitante...">
							</div>
							<div class="w3-half">
								<label>Agencia</label>
								<input class="w3-input" type="text" name="agenciaSolicitante" placeholder="Ingresar la agencia más cercana del solicitante...">
							</div>
							<div class="w3-half">
								<label>Monto a solicitar</label>
								<input class="w3-input" type="text" name="montoSolicitado" placeholder="Ingresar el monto que desea solicitar...">
							</div>
							<div class="w3-half">
								<label>Descripción del emprendimiento</label>
								<input class="w3-input" type="text" name="descEmprendimiento" placeholder="Ingresar una breve descripción del emprendimiento...">
							</div>
						</div>
	                </section>
	                <h2>INFORMACIÓN</h2>
	                <section>
	                    <div class="w3-col l12">
	                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
							    <p>INFORMACIÓN DEL EMPRENDEDOR</p>
							</div>
						</div>
						<div class="w3-col l12">
								<p><b>Datos generales</b></p>
						</div>
						<div class="w3-half">
	                    	<label>Nombre y apellido</label>
							<input class="w3-input" type="text" name="nombreEmprendedor" placeholder="Ingresar el nombre y apellido del emprendedor...">
						</div>
						<div class="w3-half">
	                    	<label>DNI</label>
							<input class="w3-input" type="text" name="dniEmprendedor" placeholder="Ingresar el dni del emprendedor...">
						</div>
						<div class="w3-half">
	                    	<label>Localidad</label>
							<input class="w3-input" type="text" name="localidadEmprendedor" placeholder="Ingresar la localidad del emprendedor...">
						</div>
						<div class="w3-half">
	                    	<label>Domicilio</label>
							<input class="w3-input" type="text" name="domicilioEmprendedor" placeholder="Ingresar el domicilio del emprendedor...">
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>Datos de contacto</b></p>
						</div>
						<div class="w3-half">
	                    	<label>Telefono</label>
							<input class="w3-input" type="text" name="telefonoEmprendedor" placeholder="Ingresar el telefono del emprendedor...">
						</div>
						<div class="w3-half">
	                    	<label>Email</label>
							<input class="w3-input" type="text" name="emailEmprendedor" placeholder="Ingresar el email del emprendedor...">
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
	                    	<label>Facebook</label>
							<input class="w3-input" type="text" name="facebookEmprendedor" placeholder="Ingresar el facebook del emprendedor...">
						</div>
						<div class="w3-quarter"></div>
						<div class="w3-col m12">
							<br>
							<p><b>Formación y ocupación</b></p>
						</div>
						<div class="w3-col m12">
							<div style="margin-right: 10px;margin-left: 10px;margin-bottom: 30px;">
							    <h4>Grado de instrucción<br><i style="color: lightgrey;">(Ingrese el último grado de instrucción finalizado por el emprendedor)</i></h4>
							    <div style="display: inline-block;">
							    	<label class="container">Ninguno
							    		<input type="radio" checked="checked" name="gradoInstruccion" value="Ninguno">
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
							<label>Otra ocupación que desarrolle en la actualidad<br><i style="color: lightgrey;">(Si no realiza ninguna dejelo la casilla en blanco)</i></label>
							<input class="w3-input" type="text" name="otraOcupación" placeholder="Ingresar otra ocupación del emprendedor...">
						</div>
						<div class="w3-half">
							<label>Ingreso mensual</label>
							<input class="w3-input" type="text" name="ingresoMensual" placeholder="Ingresar el ingreso mensual del emprendedor...">
						</div>
						<div class="w3-half">
							<label>Deseo de capacitación</label>
							<input class="w3-input" type="text" name="deseoCapacitacion" placeholder="Ingresar una capacitación deseada a futuro...">
						</div>
	                </section>
	                <h2>DATOS GENERALES</h2>
	                <section>
		                <div class="w3-col l12">
		                    	<div class="w3-panel w3-bottombar w3-border-blue w3-border" style="background-color: #2184be;">
								    <p>Datos generales o propuesta del emprendimiento</p>
								</div>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>Datos generales del emprendimiento</b></p>
						</div>
						<div class="w3-half">
							<label>Actividad principal</label>
							<input class="w3-input" type="text" name="actPrincipalEmprendimiento" placeholder="Ingrese la actividad principal del emprendimiento...">
						</div>
						<div class="w3-half">
							<label>Fecha del inicio a la actividad</label>
							<input class="w3-input" type="text" name="fecInicioEmprendimiento" readonly placeholder="No existe registro del inicio del emprendimiento...">
						</div>
						<div class="w3-half">
							<label>Antigüedad</label>
							<input class="w3-input" type="text" name="antiguedadEmprendimiento" placeholder="Ingrese la antigüedad del emprendimiento...">
						</div>
						<div class="w3-half">
							<label>Número de CUIL o CUIT</label>
							<input class="w3-input" type="text" name="cuitEmprendimiento" placeholder="Ingrese el numero de cuit o cuil vinculado al emprendimiento...">
						</div>
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<label>Número de ingresos brutos</label>
							<input class="w3-input" type="text" name="ingresosBrutosEmprendimiento" placeholder="Ingrese los ingresos brutos del emprendimiento...">
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>Localización del emprendimiento</b></p>
						</div>
						<div class="w3-half">
							<label>Domicilio real</label>
							<input class="w3-input" type="text" name="domicilioEmprendimiento" placeholder="Ingrese el domicilio del emprendimiento...">
						</div>
						<div class="w3-half">
							<label>Localidad</label>
							<input class="w3-input" type="text" name="localidadEmprendimiento" placeholder="Ingrese la localidad del emprendimiento...">
						</div>
						<div class="w3-col m12">
							<div style="margin-right: 10px;margin-left: 10px;margin-bottom: 30px;">
							    <h4>Lugar donde se desarrolla es:</h4>
							    <div style="display: inline-block;">
							    	<label class="container">Otro
									  <input type="radio" name="gradoInstruccion" value="Otro" checked="checked">
									  <span class="checkmark"></span>
									</label>
							    	<label class="container">Propio
							    		<input type="radio" name="gradoInstruccion" value="Propio">
							    		<span class="checkmark"></span>
							    	</label>
								    <label class="container">Prestado
									  <input type="radio" name="gradoInstruccion" value="Prestado">
									  <span class="checkmark"></span>
									</label>
									<label class="container">Alquilado
									  <input type="radio" name="gradoInstruccion" value="Alquilado">
									  <span class="checkmark"></span>
									</label>
							    </div>
							</div>
						</div>
						<div class="w3-col m12">
							<br>
							<p><b>DETALLE EL-LOS PRODUCTOS O SERVICIOS QUE OFRECE /RÁ</b></p>
						</div>
						<div class="w3-col m12" style="padding: 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="descProdServicios" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>EXPERIENCIA O FORMACIÓN DE EL/LOS EMPRENDEDORES PARA EL DESARROLLO DEL EMPRENDIMIENTO</b></p>
						</div>
						<div class="w3-col m12" style="padding: 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="experienciaEmprendedores" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>OPORTUNIDAD DE MERCADO O  PROBLEMA QUE  RESUELVE</b></p>
						</div>
						<div class="w3-col m12" style="padding: 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="oportunidadMercado" maxlength="254" style="resize:none"></textarea></p>
						</div>
						<div class="w3-col m12">
							<p><b>DESCRIPCIÓN DEL DESTINO DEL FINANCIAMIENTO</b></p>
						</div>
						<div class="w3-col m12" style="padding: 20px;">
							<p><textarea class="w3-input w3-border"  placeholder="Ingrese texto aquí..." name="destinoFinanciamiento" maxlength="254" style="resize:none"></textarea></p>
						</div>
	                </section>
	                <h2>MERCADO</h2>
	                <section>
	                	<div class="w3-container w3-quarter">
						</div>
	                    <div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Monto</label>
							    <input class="w3-input w3-border" type="text" name="monto" placeholder="Ingrese el monto solicitado...">
							</div>
						</div>
	                </section>
	                <h2>PROD. COSTOS Y RESULTADOS</h2>
	                <section>
	                	<div class="w3-container w3-quarter">
						</div>
	                    <div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Monto</label>
							    <input class="w3-input w3-border" type="text" name="monto" placeholder="Ingrese el monto solicitado...">
							</div>
						</div>
	                </section>
	                <h2>MANIFESTACIÓN DE BIENES DEL EMPRENDEDOR</h2>
	                <section>
	                	<div class="w3-container w3-quarter">
						</div>
	                    <div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Monto</label>
							    <input class="w3-input w3-border" type="text" name="monto" placeholder="Ingrese el monto solicitado...">
							</div>
						</div>
	                </section>
	                <h2>MANIFESTACIÓN DE LOS BIENES DEL GARANTE</h2>
	                <section>
	                	<div class="w3-container w3-quarter">
						</div>
	                    <div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Monto</label>
							    <input class="w3-input w3-border" type="text" name="monto" placeholder="Ingrese el monto solicitado...">
							</div>
						</div>
	                </section>
	                <h2>DOCUMENTACIÓN</h2>
	                <section>
	                	<div class="w3-container w3-quarter">
						</div>
	                    <div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Monto</label>
							    <input class="w3-input w3-border" type="text" name="monto" placeholder="Ingrese el monto solicitado...">
							</div>
						</div>
	                </section>
	   </div>
	</form>
	<script src="{{asset('js/financiamiento/lineaEmprendedor/rules.js')}}"></script>
	<script src="{{asset('js/financiamiento/lineaEmprendedor/steps.js')}}"></script>
	@endsection