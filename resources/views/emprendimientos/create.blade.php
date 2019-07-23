@extends('userTest.layout')
	
	@section('title') Perfil - Emprendimientos @endsection

	@section('content')
	
	<header class="w3-container" style="padding-top:22px">
	    <h3><b><i class="fa fa-dashboard"></i> Registrar emprendimiento</b></h3>
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
						    <label>Denominación de la Sociedad</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="denominacion" placeholder="Ingrese el nombre de fantasía del emprendimiento...">
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Tipo de sociedad</label>
						    <select class="w3-select" name="tipoSociedad">
							    <option value="" disabled selected>Elegí el tipo de sociedad...</option>
							    <option value="Sociedad Anónima (S.A.)">Sociedad Anónima (S.A.)</option>
							    <option value="Sociedad de Responsabilidad Limitada (S.R.L.)">Sociedad de Responsabilidad Limitada (S.R.L.)</option>
							    <option value="Sociedad por Acciones Simplificada (S.A.S.)">Sociedad por Acciones Simplificada (S.A.S.)</option>
							 </select>
						</div>
					</div>
					<div class="w3-half">
						<div style="padding: 20px;">
						    <label>Cargo</label>
						    <select class="w3-select" name="cargo">
							    <option value="" disabled selected>Elegí el cargo...</option>
							    <option value="jefe">Jefe</option>
							    <option value="responsable">Responsable</option>
							 </select>
						</div>
					</div>
					<div class="w3-half">
					    <div style="padding: 20px;">
					    	<label>C.U.I.T.</label>
		    				<input class="w3-input w3-border w3-round-large" type="text" name="cuit" placeholder="Ingrese el cuit asociado al emprendimiento...">
					    </div>
					</div>
                </section>
                <h2>Datos de localización</h2>
                <section>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Domicilio</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="domicilio" placeholder="Ingrese el domicilio fiscal del emprendimiento...">
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Cod. Postal</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="codPostal" placeholder="Ingrese el código postal del emprendimiento...">
						</div>
					  </div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Localidad</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="localidad" placeholder="Ingrese la localidad registrada del emprendimiento...">
						</div>
					  </div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Provincia</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="provincia" placeholder="Ingrese la provincia del emprendimiento...">
						</div>
					</div>
                </section>
                <h2>Datos de contacto</h2>
                <section>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>E-mail</label>
						    <input class="w3-input w3-border" type="text" name="email" placeholder="Ingrese el email vinculado al emprendimiento...">
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Telefono</label>
						    <input class="w3-input w3-border" type="text" name="telefono" placeholder="Ingrese el telefono de contacto con el emprendimiento...">
						</div>
					</div>
                </section>
            </div>
        </form>
	@endsection