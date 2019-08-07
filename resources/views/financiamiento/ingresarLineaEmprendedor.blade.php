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
	                	<div class="w3-container w3-quarter">
						</div>
	                    <div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <h4>Antigüedad mayor a 2 años?</h4>
							    <label class="container">SI
								  <input type="radio" checked="checked" name="antiguedad" value="1">
								  <span class="checkmark"></span>
								</label>
								<br>
								<label class="container">NO
								  <input type="radio" checked="checked" name="antiguedad" value="0">
								  <span class="checkmark"></span>
								</label>
							</div>
						</div>
	                </section>
	                <h2>DATOS GENERALES</h2>
	                <section>
	                   	<div class="w3-row">
						  <div class="w3-container w3-quarter">
						  </div>
						  <div class="w3-container w3-half">
							<div class="formPreguntasUsuario">
								<p>
								  <input class="w3-check" type="checkbox" name="destino[]" value="a">
								  <label>Comprar productos para revender</label></p>
								  <p>
								  <input class="w3-check" type="checkbox" name="destino[]" value="b">
								  <label> Acondicionamiento del local</label></p>
								  <p>
								  <input class="w3-check" type="checkbox" name="destino[]" value="c">
								  <label>Compra de maquinaria y/o insumos</label></p>
								</form>
							</div>
						</div>
						<div class="w3-container w3-quarter">
						</div>
					</div>
	                </section>
	                <h2>ASPECTOS SOCIALES</h2>
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
	   </div>
	</form>
	<script src="{{asset('js/financiamiento/lineaEmprendedor/rules.js')}}"></script>
	<script src="{{asset('js/financiamiento/lineaEmprendedor/steps.js')}}"></script>
	@endsection