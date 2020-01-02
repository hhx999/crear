@extends('userTest.layout')
	
	@section('title') Registro - Emprendimientos @endsection

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
        		height: 130% !important;
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
        	.wizard > .content {
        		min-height: 27em !important;
        	}
        </style>
        @if($success)
        	<div class="w3-col m12">
        		<p style="color: lightgreen;">{{$success}}</p>
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
        <form method="post" action="" name="formRegistroEmprendimiento" class="formRegistroEmprendimiento" id="formRegistroEmprendimiento" enctype="multipart/form-data">
            <div id="wizard">
                <h2>Datos principales</h2>
                <section>
                	<select class="w3-select" id="emprendimiento_id" name="emprendimiento_id">
							<option selected disabled value="">Seleccioná tú emprendimiento vinculado</option>
							@if($emprendimientos)
							@foreach($emprendimientos as $emprendimiento)
							<option value="{{$emprendimiento->id}}">{{$emprendimiento->denominacion}}</option>
							@endforeach
							@endif
					</select>
					<div style="padding: 20px;">
	                    <div class="w3-third">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Denominación de la Sociedad</label>
							    <input class="w3-input" type="text" name="denominacion" placeholder="Ingrese el nombre de fantasía del emprendimiento...">
							</div>
						</div>
						<div class="w3-third">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Localidad</label>
							    <select class="w3-select" id="localidad_id" name="localidad_id">
										<option selected disabled value="">Seleccioná la localidad de tu emprendimiento</option>
										@foreach($localidades as $localidad)
										<option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
										@endforeach
								</select>
							</div>
						</div>
						<div class="w3-third">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Direccion</label>
							    <input class="w3-input" type="text" name="domicilio" placeholder="Ingrese la direccion del emprendimiento...">
							</div>
						</div>
					</div>
					<div style="padding: 21px;">
						<div class="w3-third">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Teléfono</label>
							    <input class="w3-input" type="text" name="telefono" placeholder="Ingrese un teléfono para contactar con el emprendimiento...">
							</div>
						</div>
						<div class="w3-third">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Email</label>
							    <input class="w3-input" type="text" name="mail" placeholder="Ingrese el correo electrónico...">
							</div>
						</div>
					</div>
					<div class="w3-col m12">
						<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Categoría</label>
						    <select class="w3-select" name="categoria_id">
									<option selected disabled value="">Seleccioná la categoría a la que pertenece tu emprendimiento</option>
									@foreach($categorias as $categoria)
									<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
									@endforeach
							</select>
						</div>
					</div>
                </section>
                <h2>Datos de localización</h2>
                <section>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Facebook</label>
						    <input class="w3-input" type="text" name="facebook_nombre" placeholder="Ingrese el nombre con el que se visualiza su facebook..."><br>
						    <input class="w3-input" type="text" name="facebook_enlace" placeholder="Ingrese el enlace a su facebook...">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Instagram</label>
						    <input class="w3-input" type="text" name="instagram_nombre" placeholder="Ingrese el nombre con el que se visualiza su instagram..."><br>
						    <input class="w3-input" type="text" name="instagram_enlace" placeholder="Ingrese el enlace a su instagram...">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Twitter</label>
						    <input class="w3-input" type="text" name="twitter_nombre" placeholder="Ingrese el nombre con el que se visualiza su twitter..."><br>
						    <input class="w3-input" type="text" name="twitter_enlace" placeholder="Ingrese el enlace a su twitter...">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Youtube</label>
						    <input class="w3-input" type="text" name="youtube_nombre" placeholder="Ingrese el nombre con el que se visualiza su canal de youtube..."><br>
						    <input class="w3-input" type="text" name="youtube_enlace" placeholder="Ingrese el enlace a su youtube...">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Sitio WEB</label>
						    <input class="w3-input" type="text" name="web_nombre" placeholder="Ingrese el nombre con el que se visualiza su web..."><br>
						    <input class="w3-input" type="text" name="web_enlace" placeholder="Ingrese el enlace a su web...">
						</div>
					</div>
                </section>
                <style type="text/css">
                	.barraCol1 {
					  border-top: 2px solid #4CAF50;display: inline-block;width: 30px;
					}
					.barraCol2 {
					  border-top: 2px solid #0174b6;display: inline-block;width: 25px;
					}
					.barraCol3 {
					  border-top: 2px solid #4CAF50;display: inline-block;width: 92%;
					}
                </style>
                <h2>Imagen del emprendimiento</h2>
                <section>
                		<div class="w3-col m12">
                			<label>Ingrese una imagen representativa del emprendimiento</label><br>
                			<input type="file" name="imagen_emprendimiento" style="color: white;width: 100%;">
                		</div>
                		<div class="barraCol1"></div>
						<div class="barraCol2"></div>
						<div class="barraCol3"></div>
						<div class="w3-col m12">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Descripción:</label><br>
							    <textarea style="width: 100%;" name="descripcion" placeholder="Ingrese una breve descripción de su emprendimiento...">
							    </textarea>
							</div>
						</div>
                </section>
            </div>
        </form>
	@endsection