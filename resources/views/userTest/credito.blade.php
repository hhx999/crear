@extends('userTest.layout')

	@section('title') Inicio @endsection
<style type="text/css">
	.formPreguntasUsuario {
		background-color: rgb(69, 92, 135);
		border: 1px white solid;
		border-radius: 10px;
		padding: 10px;
		margin-top: 30px;
		margin-bottom: 30px;
		display: flex;
	}
	.formPreguntasUsuario p {
		margin:10px;
	}
	.preguntas div {
		animation: animateElement linear .6s;
  		animation-iteration-count: 1;
		border:1px white solid;
		border-left: 4px white solid !important;
		border:1px white solid;border-left: 4px white solid !important;
		border-radius: 10px;
	}
	@keyframes animateElement{
	  0% {
	    opacity:0;
	    transform:  translate(0px,10px);
	  }
	  100% {
	    opacity:1;
	    transform:  translate(0px,0px);
	  }
	}
	.respuestas {
		margin-top: 20px;
		padding: 10px;
		-webkit-box-shadow: -4px 3px 20px -7px rgba(0,0,0,0.75);
		-moz-box-shadow: -4px 3px 20px -7px rgba(0,0,0,0.75);
		box-shadow: -4px 3px 20px -7px rgba(0,0,0,0.75);
		background-color: #75e078;
		color: black !important;
		border-radius: 10px;
	}
/* Radio button */
.radiobtn {
  display: none;
}
.buttons {
  margin-left: -40px;
}
.buttons li {
  display: block;
}
.buttons li label{
  padding-left: 30px;
  position: relative;
  left: -25px;
}
.buttons li label:hover {
  cursor: pointer;
}
.buttons li span {
  display: inline-block;
  position: relative;
  top: 5px;
  border: 2px solid #ccc;
  width: 18px;
  height: 18px;
  background: #fff;
}
.radiobtn:checked + span::before{
  content: '';
  border: 2px solid #fff;
  position: absolute;
  width: 14px;
  height: 14px;
  background-color: #c3e3fc;
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
        <style type="text/css">
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
/* The container */
.container {
  display: flex !important;
  margin-left: 42%;
  position: relative;
  padding-left: 35px;
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
							@if ($linea['numero'] == 1)
							<div class="w3-half">
								 <div class="w3-card-4" style="background-color: #077187;">

									<header class="w3-container">
									  <h3>Línea emprendedor <i style="color: lightgrey;">({{$linea['monto']}})</i></h3>
									</header>
									<div class="w3-container">
									  <p>Ver bases y condiciones</p>
									  <p>Descargar formulario de inscripción</p>
									</div>

									<button class="w3-button w3-block w3-light-grey">+ Ingresar formulario</button>

								</div>
							</div>
							@endif

							@if ($linea['numero'] == 5)
							<div class="w3-half">
								<div class="w3-card-4" style="background-color: #077187;">

									<header class="w3-container">
									  <h3>Línea Stock <i style="color: lightgrey;">({{$linea['monto']}})</i></h3>
									</header>
									<div class="w3-container">
									  <p>Ver bases y condiciones</p>
									  <p>Descargar formulario de inscripción</p>
									</div>

									<button class="w3-button w3-block w3-light-grey">+ Ingresar formulario</button>

								</div>
							</div>
							@endif

							@if ($linea['numero'] == 4)
							<div class="w3-half">
								<div class="w3-card-4" style="background-color: #077187;">

									<header class="w3-container">
									  <h3>Línea Tasa Subsidiada <i style="color: lightgrey;">({{$linea['monto']}})</i></h3>
									</header>
									<div class="w3-container">
									  <p>Ver bases y condiciones</p>
									  <p>Descargar formulario de inscripción</p>
									</div>

									<button class="w3-button w3-block w3-light-grey">+ Ingresar formulario</button>

								</div>
							</div>
							@endif
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
								    <option value="" disabled selected>Elegí el estado en el que se encuentra...</option>
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
	                <h2>Destino de la financiación</h2>
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
	                <h2>Monto</h2>
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
	        	</form>
	        </div>
        <script type="text/javascript">
        	$("input#enviar").click(function(){
		  	var divFinal = $("<div class='respuestas'></div>");
		  	divFinal.append('<b>Datos enviados</b><br>');
		    var preguntasForm = $('form').serializeArray();
			var preguntasFormObject = {};
			$.each(preguntasForm,
			    function(i, v) {
			        preguntasFormObject[v.name] = v.value;
			        divFinal.append("<b>"+v.name+"</b>: "+v.value+"<br>");
			    });
			$('.w3-half').prepend(divFinal);
		  });
        </script>
	@endsection
<!--

4- Que antiguedad formal tiene?

5- Que monto necesita?
-->