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
								$("#formRegistroEmprendimiento").submit();
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
                <h2>Estado del solicitante</h2>
                <section>
					<div class="w3-col m12">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <select class="w3-select" name="tipoSociedad">
							    <option value="" disabled selected>Elegí el estado en el que se encuentra...</option>
							    <option value="Sociedad Anónima (S.A.)">Estado informal</option>
							    <option value="Sociedad de Responsabilidad Limitada (S.R.L.)">Monotributista</option>
							    <option value="Sociedad por Acciones Simplificada (S.A.S.)">Responsable inscripto</option>
							 </select>
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
							<form class="w3-container w3-card-4" name=preguntas>
							  <input class="w3-check" type="checkbox" checked="checked">
							  <label>Comprar productos para revender</label></p>
							  <p>
							  <input class="w3-check" type="checkbox">
							  <label> Acondicionamiento del local</label></p>
							  <p>
							  <input class="w3-check" type="checkbox">
							  <label>Compra de maquinaria</label></p>
							</form>
						</div>
					</div>
					<div class="w3-container w3-quarter">
					</div>
				</div>
                </section>
                <h2>Antigüedad</h2>
                <section>
                	<div class="w3-container w3-quarter">
					</div>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Antigüedad formal:</label>
						    <input class="w3-input w3-border" type="text" name="email" placeholder="Ingrese su antigüedad...">
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
						    <input class="w3-input w3-border" type="text" name="email" placeholder="Ingrese el monto solicitado...">
						</div>
					</div>
                </section>
            </div>
        </form>
	@endsection
<!--

4- Que antiguedad formal tiene?

5- Que monto necesita?
-->