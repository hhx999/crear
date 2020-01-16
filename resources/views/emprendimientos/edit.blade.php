@extends('userTest.layout')
	
	@section('title') Registro - Emprendimientos @endsection

	@section('content')
	<style type="text/css">
		.nav{
		    list-style:none;
		    margin:0;
		    padding:0;
		    text-align:center;
		    -webkit-border-radius: 100px;
			-moz-border-radius: 100px;
			border-radius: 100px;
			background-color: #8080801a;
			width: 100%;
			margin-bottom: 20px;
		}
		.nav li{
		    display:inline;
		}
		.nav a{
		    display:inline-block;
		    padding:10px;
		}
	</style>
<div class="w3-third"><p></p></div>
	  	<div class="w3-third">
	  			<ul class="nav">
	  				<li><a href="{{url('perfil')}}">Mi perfil</a>/</li>
	  				<li><a href="{{url('perfil/emprendimientos')}}">Emprendimientos</a>/</li>
	  				<li>Editar</li>
	  			</ul>
	  	</div>
	<header class="w3-container" style="padding-top:22px">
	    <h3><b><i class="fa fa-dashboard"></i> Editar emprendimiento</b></h3>
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
					<div style="padding: 21px;">
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Teléfono</label>
							    <input class="w3-input" type="text" name="telefono" placeholder="Ingrese un teléfono para contactar con el emprendimiento..." value="{{$datosEmprendimiento->telefono}}">
							</div>
						</div>
						<div class="w3-half">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Email</label>
							    <input class="w3-input" type="text" name="mail" placeholder="Ingrese el correo electrónico..." value="{{$datosEmprendimiento->mail}}">
							</div>
						</div>
					</div>
                </section>
                <h2>Datos de localización</h2>
                <section>
                    <div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Facebook</label>
						    <input class="w3-input" type="text" name="facebook_nombre" placeholder="Ingrese el nombre con el que se visualiza su facebook..." value="{{$datosEmprendimiento->facebook_nombre}}"><br>
						    <input class="w3-input" type="text" name="facebook_enlace" placeholder="Ingrese el enlace a su facebook..." value="{{$datosEmprendimiento->facebook_enlace}}">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Instagram</label>
						    <input class="w3-input" type="text" name="instagram_nombre" placeholder="Ingrese el nombre con el que se visualiza su instagram..." value="{{$datosEmprendimiento->instagram_nombre}}"><br>
						    <input class="w3-input" type="text" name="instagram_enlace" placeholder="Ingrese el enlace a su instagram..." value="{{$datosEmprendimiento->instagram_enlace}}">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Twitter</label>
						    <input class="w3-input" type="text" name="twitter_nombre" placeholder="Ingrese el nombre con el que se visualiza su twitter..." value="{{$datosEmprendimiento->twitter_nombre}}"><br>
						    <input class="w3-input" type="text" name="twitter_enlace" placeholder="Ingrese el enlace a su twitter..." value="{{$datosEmprendimiento->twitter_enlace}}">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Youtube</label>
						    <input class="w3-input" type="text" name="youtube_nombre" placeholder="Ingrese el nombre con el que se visualiza su canal de youtube..." value="{{$datosEmprendimiento->youtube_nombre}}"><br>
						    <input class="w3-input" type="text" name="youtube_enlace" placeholder="Ingrese el enlace a su youtube..." value="{{$datosEmprendimiento->youtube_enlace}}">
						</div>
					</div>
					<div class="w3-half">
                    	<div style="margin-right: 10px;margin-left: 10px;">
						    <label>Sitio WEB</label>
						    <input class="w3-input" type="text" name="web_nombre" placeholder="Ingrese el nombre con el que se visualiza su web..." value="{{$datosEmprendimiento->web_nombre}}"><br>
						    <input class="w3-input" type="text" name="web_enlace" placeholder="Ingrese el enlace a su web..." value="{{$datosEmprendimiento->web_enlace}}">
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
                			<label>Reemplazar imagen<i style="color: lightgrey;">(Si desea conservar la imagen omita este paso)</i></label><br>
                			<input type="file" name="imagen_emprendimiento" style="color: white;width: 100%;">
                		</div>
                		<div class="barraCol1"></div>
						<div class="barraCol2"></div>
						<div class="barraCol3"></div>
						<div class="w3-col m12">
	                    	<div style="margin-right: 10px;margin-left: 10px;">
							    <label>Descripción:</label><br>
							    <textarea style="width: 100%;" name="descripcion" placeholder="Ingrese una breve descripción de su emprendimiento..." value="{{$datosEmprendimiento->descripcion}}"></textarea>
							</div>
						</div>
                </section>
            </div>
        </form>
	@endsection