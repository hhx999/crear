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
			<a id="guardarBorrador" class="w3-button w3-cyan" href="#" style="border-radius: 6px;color: white !important;">Guardar borrador</a>
			<br>
			<script>

			$(document).ready(function(){

			    $("#guardarBorrador").click(function(){
			    	var params = [
		               {
		                 name: "estado",
		                 value: 'borrador'
		               }
		             ];
			        $('#formLineaEmprendedor').submit(function(){ //listen for submit event
					    $.each(params, function(i,param){
					        $('<input />').attr('type', 'hidden')
					            .attr('name', param.name)
					            .attr('value', param.value)
					            .appendTo('#formLineaEmprendedor');
					    });
					    return true;
					});
					$("#formLineaEmprendedor").submit();

			    });

			});

			</script>
	            <div id="wizard">
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
	                    	<label>Domicilio real</label>
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
	                    	<label>Redes sociales:<i style="color: lightgrey;">(facebook,instagram,etc.)</i></label>
							<input class="w3-input" type="text" name="facebookEmprendedor" placeholder="Ingresar redes sociales del emprendedor...">
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
							<label>Domicilio comercial</label>
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
						<div class="w3-quarter"><p></p></div>
						<div class="w3-half">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <select class="w3-select" name="puntosVenta">
								    <option value="" disabled selected>Elegí el punto de venta...</option>
								    <option value="Local">Local</option>
								    <option value="Provincial">Provincial</option>
								    <option value="Nacional">Nacional</option>
								 </select>
							</div>
						</div>
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
								<p><b>OTROS COSTOS DEL EMPRENDIMIENTO</b><br>
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
	<script type="text/javascript" src="{{ asset('js/calculo_servicios.js') }}"></script>
	<script src="{{asset('js/financiamiento/lineaEmprendedor/rules.js')}}"></script>
	<script src="{{asset('js/financiamiento/lineaEmprendedor/steps.js')}}"></script>
	@endsection