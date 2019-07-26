@extends('userTest.layout')
	
	@section('title') Inicio @endsection
	<style type="text/css">
		a {
			text-decoration: none;
		}
	</style>

	@section('content')

	<h4>Inscribite como capacitador!</h4>

		<script>
                $(function ()
                {
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "section",
                        transitionEffect: "slideLeft",
                        onFinished: function (event, currentIndex) {
								$("#formInscripcionCapacitador").submit();
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
        <form method="post" action="" name="formInscripcionCapacitador" class="formInscripcionCapacitador" id="formInscripcionCapacitador">
            <div id="wizard">
                <h2>Datos principales</h2>
                <section>
					<div class="w3-half">
					    <div style="padding: 20px;">
					    	<label>C.U.I.T.</label>
		    				<input class="w3-input w3-border w3-round-large" type="text" name="cuit" placeholder="Ingrese el cuit asociado al emprendimiento...">
					    </div>
					</div>
					<div class="w3-half">
						<div style="padding: 20px;">
						    <label>Título/Especialización</label>
						    <input class="w3-input w3-border w3-round-large" type="text" name="rubro" placeholder="Ingrese su rubro de trabajo...">
						</div>
					</div>
                </section>
                <h2>Referencias</h2>
                <section>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Referencias</label>
						     <textarea name="referencias" rows="4" cols="40" placeholder="Ingrese sus referencias..."></textarea> 
						</div>
					</div>
					<div class="w3-half">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Observaciones</label>
						     <textarea name="observaciones" rows="4" cols="40" placeholder="Ingrese las observaciones de su trabajo..."></textarea> 
						</div>
					  </div>
                </section>
                <h2>Documentación</h2>
                <section>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Ingrese adjunto</label>
						    <input class="w3-input w3-border" type="text" name="documentacion" placeholder="pdf,jpg,png...">
						</div>
					</div>
                </section>
            </div>
        </form>

	@endsection