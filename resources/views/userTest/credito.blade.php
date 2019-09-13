@extends('userTest.layout')

	@section('title') Inicio @endsection
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
        	.w3-half {
        		padding: 20px;
        	}
	</style>
	@section('content')
			<script>
                $(function ()
                {
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "section",
                        transitionEffect: "slideLeft",
                        onFinished: function (event, currentIndex) {
								$("#formCuestionarioLineas").submit();
							}
                    });
                    $("#wizard").steps("setStep",3);
                });
        </script>
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
		<div class="contenedorCuestionario">
			<div class="w3-col m12">
				@isset($lineas_principales)
				
				<div class="w3-row">
				<h3>Líneas accesibles</h3>
					<div>
						@foreach ($lineas_principales as $linea)
							<div class="w3-half">
								<div class="w3-card-4" style="background-color: #077187;">
										<header class="w3-container">
										  <h3><i style="color: lightgrey;">{{$linea->nombre}}</i></h3>
										</header>
										<div class="w3-container">
										  <p>Ver bases y condiciones</p>
										  <p>Descargar formulario de inscripción</p>
										</div>
										<a style="text-decoration: none;" href="{{ url('financiamiento/lineaEmprendedor') }}">
											<button class="w3-button w3-block w3-light-grey">+ Ingresar formulario</button>
										</a>
								</div>
							</div>
						@endforeach
					</div>
				@endisset
					
				</div>
			</div>
	        <form method="post" action="" name="formCuestionarioLineas" class="formCuestionarioLineas" id="formCuestionarioLineas">
	            <div id="wizard">
	                <h2>Estado del solicitante</h2>
	                <section>
						<div class="w3-col m12">
							<div style="margin-right: 10px;margin-left: 10px;">
							    <select class="w3-select" name="estado">
								    <option value="" disabled selected>Elegí el estado en el que te encontrás...</option>
								    <option value="1">Estado informal</option>
								    <option value="2">Monotributo social</option>
								    <option value="3">Monotributo desde A hasta E</option>
								    <option value="4">Monotributo desde E hasta K</option>
								    <option value="5">Responsable inscripto</option>
								</select>
							</div>
						</div>
	                </section>
	                <h2>Antigüedad formal</h2>
	                <section>
	                	<div class="w3-container w3-quarter">
						</div>
	                    <div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <h4><b>¿Tú antigüedad es mayor a 2 años?</b></h4>
							    <ul style="display: inline-flex;text-decoration: none;">
							    	<li style="display: inherit;margin:20px;">
								  		<input type="radio" checked="checked" name="antiguedad" value="1">
							    		<label class="container"> SI </label>
							    	</li>
							    	<li style="display: inherit;margin:20px;">
								  		<input type="radio" checked="checked" name="antiguedad" value="0">
							    		<label class="container"> NO </label>
							    	</li>
							    </ul>
							</div>
						</div>
	                </section>
	                <h2>Destino de la financiación</h2>
	                <section>
	                <div class="w3-row">
						  	<div class="w3-container w3-quarter">
						  	</div>
						  	<div class="w3-container w3-half" align="center">
						  		<h4><b>¿En dónde planeás destinar el financiamiento?</b></h4>
						  		<div style="width: 290px; height: 100px; overflow-y: scroll;">
									<ul style="display: table;text-decoration: none;">
								    	<li style="display: flex;padding: 10px;background-color: #0006061a;">
											  <input class="w3-check" type="checkbox" name="destino[]" value="a">
											  <label>Comprar productos para revender</label>
										</li>
									  	<li style="display: flex;padding: 10px;background-color: #0A0A0A0A;">
										  <input class="w3-check" type="checkbox" name="destino[]" value="b">
										  <label> Acondicionamiento del local</label>
									  	</li>
									  	<li style="display: flex;padding: 10px;background-color: #0006061a;">
										  <input class="w3-check" type="checkbox" name="destino[]" value="c">
										  <label>Compra de maquinaria y/o insumos</label>
										</li>
									</ul>
								</div>
							</div>
						<div class="w3-container w3-quarter">
						</div>
					</div>
	                </section>
	        	</form>
	        </div>
	@endsection