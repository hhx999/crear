@extends('userTest.layout')
	
	@section('title') Perfil - Emprendimientos @endsection

	@section('content')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{asset('js/jquery.ui.datepicker-es.js')}}"></script>
	
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
                        onFinished: function (event, currentIndex) {
								$("#formRegistroEmprendimiento").submit();
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
        		height: 20em !important;
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
        </style>
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
        <form method="post" action="" name="formRegistroEmprendimiento" class="formRegistroEmprendimiento" id="formRegistroEmprendimiento">
            <div id="wizard">
                <h2>Datos principales</h2>
                <section>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>DNI</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="dni" placeholder="Ingrese su DNI...">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Contraseña</label>
						    <input class="w3-input w3-border w3-round-large" type="password" name="password" placeholder="Ingrese una contraseña...">
						</div>
					</div>
                </section>
                <h2>Datos personales</h2>
                <section>
                	<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Nombre y apellido</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="nombreApellido" placeholder="Ingrese su nombre y apellido...">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Fecha de nacimiento</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="fecNacimiento" id="datepicker" placeholder="Ingrese su fecha de nacimiento...">
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Tipo de sociedad</label>
						    <select class="w3-select" style="padding: 4px 0px !important;" name="tipoSociedad">
							    <option value="a">A- AGRICULTURA, GANADERÍA, CAZA Y SILVICULTURA</option>
								<option value="b">B- PESCA Y SERVICIOS CONEXOS</option>
								<option value="c">C- EXPLOTACIÓN DE MINAS Y CANTERAS</option>
								<option value="d">D- INDUSTRIA MANUFACTURERA</option>
								<option value="e">E- ELECTRICIDAD, GAS Y AGUA</option>
								<option value="f">F- CONSTRUCCIÓN</option>
								<option value="g">G- COMERCIO AL POR MAYOR Y AL POR MENOR, REPARACIÓN DE VEHÍCULOS, AUTOMOTORES, MOTOCICLETAS, EFECTOS PERSONALES Y ENSERES DOMÉSTICOS</option>
								<option value="h">H- SERIVICIOS DE HOTELERÍA Y RESTAURANTES</option>
								<option value="i">I- SERVICIO DE TRANSPORTE DE ALMACENAMIENTO Y DE COMUNICACIONES</option>
								<option value="j">J- INTERMEDIACIÓN FINANCIERA Y OTROS SERVICIOS FINANCIEROS</option>
								<option value="k">K- SERVICIOS INMOBILIARIOS, EMPRESARIALES Y DE ALQUILER</option>
								<option value="l">L- ADMINISTRACIÓN PÚBLICA, DEFENSA Y SEGURIDAD SOCIAL OBLIGATORIA</option>
								<option value="m">M- ENSEÑANZA</option>
								<option value="n">N- SERVICIOS SOCIALES Y DE SALUD</option>
								<option value="o">O- SERVICIOS COMUNITARIOS, SOCIALES Y PERSONALES N.C.P.</option>
								<option value="p">P- SERVICIOS DE HOGARES PRIVADOS QUE CONTRATAN SERVICIO DOMESTICO</option>
								<option value="q">Q- SERVICIOS DE ORGANIZACIONES Y ORGANOS EXTRATERRITORIALES</option>
							 </select>
						</div>
					</div>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Domicilio</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="domicilio" placeholder="Ingrese su domicilio real...">
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Localidad</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="localidad" placeholder="Ingrese su localidad...">
						</div>
					  </div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Provincia</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="provincia" placeholder="Ingrese su provincia de residencia...">
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Agencia</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="agencia" placeholder="Ingrese la agencia más cercana a su localidad...">
						</div>
					</div>
                </section>
                <h2>Datos de contacto</h2>
                <section>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>E-mail</label>
						    <input class="w3-input w3-border" type="text" name="email" placeholder="Ingrese un email para poder contactarnos con usted...">
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Telefono</label>
						    <input class="w3-input w3-border" type="text" name="telefono" placeholder="Ingrese su telefono de contacto...">
						</div>
					</div>
                </section>
            </div>
        </form>
        <script type="text/javascript">
			$(function(){
				$.datepicker.setDefaults($.datepicker.regional["es"]);
			    $("#datepicker").datepicker({
			    	dateFormat: "dd-mm-yy",
			        changeMonth: true,
			        changeYear: true
			    });
			});
		</script>
	@endsection