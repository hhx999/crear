@extends('userTest.layout')
	
	@section('title') Mi perfil @endsection
<style type="text/css">
	a {
		text-decoration: none !important;
	}
	a .itemPerfil {
		text-decoration: none;
		box-shadow: none;
		transition: box-shadow 0.3s;
	}
	a .itemPerfil:hover {
		box-shadow: 0 5px 15px rgba(0,0,0,0.7);
	}
</style>
	@section('content')
	<header class="w3-container" style="padding-top:22px" id="miPerfil">
	    <h3><b><i class="fa fa-dashboard"></i> Mi perfil</b></h3>
	</header>
	<style>
		.escaleraEmprendedor {
			display:block;
			height:60px;
		}
		.escaleraEmprendedor:before {
		    content: '•';
			display: block;
			width: 0px;
			height: 23px;
			position: relative;
			left: 19%;
			top: -7px;
			font-size: 3em;
		}
		.final:before {
			content: '▶';
			font-size: 25px;
			top: 5px;
		}
		.activoEscalera:before {
			content: "•";
			color: #6bc55d !important;
			font-size: 60px;
		    top: -15px;
		    left: 18.7%;
		}
		.escaleraEmprendedor .item {
			border-left: 2px solid;
			border-top: 2px solid;
			width: 20%;
			height: 30px;
			padding: 30px;
		}
		.escaleraEmprendedor .item.active{
			border-left: 4px solid #009688;
			border-top: 4px solid #009688;
			width: 20%;
			height: 30px;
			padding: 30px;
		}
		.txtEscalon {
			position: relative;
			top:-85px;
		}
		.consultaSituacion {
				z-index: 10;
				position: relative;
				top: -250px;
		}
		.graficoSituacion {
			opacity: 0.3;
		}
		</style>
	<div class="w3-col m12">
		<div class="graficoSituacion">
		<p>Situación impositiva <a href="#miPerfil" class="w3-button w3-green" id="editarSituacion" style="color: white !important;">Editar</a></p>
		<div style="margin-bottom: 50px;">
				<div style="margin-left: 80%;width: 100%;">
					<div id="5" class="escaleraEmprendedor final">
						<div class="item">
							<span class="txtEscalon">Responsable Inscripto</span>
						</div>
					</div>
				</div>
				<div style="margin-left: 60%;width: 100%;">
					<div id="4" class="escaleraEmprendedor">
						<div class="item">
							<span class="txtEscalon">Monotributista de F-K</span>
						</div>
					</div>
				</div>
				<div style="margin-left: 40%;width: 100%;">
					<div id="3" class="escaleraEmprendedor">
						<div class="item">
							<span class="txtEscalon">Monotributista de A-E</span>
						</div>
					</div>
				</div>
				<div style="margin-left: 20%;width: 100%;">
					<div id="2" class="escaleraEmprendedor">
						<div class="item">
							<span class="txtEscalon">Monotributista social</span>
						</div>
					</div>
				</div>
				<div id="1" class="escaleraEmprendedor">
					<div class="item" style="border-left: 0px;">
						<span class="txtEscalon">Informal</span>
					</div>
				</div>
			</div>
		</div>
		<div class="consultaSituacion">
			<p>Cual es tu situación impositiva?</p>
			<select name="situacionImpositiva">
				<option selected disabled>Seleccioná tú situación impositiva...</option>
				<option value="1">Informal</option>
				<option value="2">Monotributo Social</option>
				<option value="3">Monotributo(A hasta E)</option>
				<option value="4">Monotributo(F hasta K)</option>
				<option value="5">Responsable incripto</option>
			</select>
			<br>
			<a href="#miPerfil" class="w3-button w3-cyan" id="enviarSituacion" style="color: white !important;">Enviar</a>
		</div>
	</div>
	@if($situacionImpositiva)
	<input type="hidden" id="actualSituacion" value="{{$situacionImpositiva}}">
		<script type="text/javascript">
			$(window).on("load",function(){
				$(".consultaSituacion").fadeOut(1000);
				$(".graficoSituacion").css('opacity','1');
				$(".graficoSituacion").fadeIn(8000);
				$(".escaleraEmprendedor").each(function() {
					console.log($(this).attr("id"));
					$(this).toggleClass('activoEscalera')
					$(this).children('div').toggleClass('active');
					$(this).children('span').children('span').css('font-weight','bold');
				});
				$(".escaleraEmprendedor").each(function() {
					$(this).toggleClass('activoEscalera')
					$(this).children('div').toggleClass('active');
					$(this).children('span').children('span').css('font-weight','bold');
					if($('#actualSituacion').val() == $(this).attr("id"))
					{
						$(this).toggleClass('activoEscalera')
						$(this).children('div').toggleClass('active');
						$(this).children('span').children('span').css('font-weight','bold');
						return false;
					}
				});
		    });
		</script>
	@endif
	<script type="text/javascript">
		$('#enviarSituacion').click(function() {
			console.log('Ok');
			$.ajax({
	            type: 'POST',
	            url: "{{url('agregarSituacion')}}",
	            data: {
	                situacionImpositiva: $("select[name=situacionImpositiva]").val()
	            },
	            dataType: 'json',
	            success: function(data) {
	                window.location.reload();
	                console.log(data);
	            }
	        }).fail( function( jqXHR, textStatus, errorThrown ) {
	        	if (jqXHR.status == 404) {
				    alert('No se encuentran resultados. [404]');
				}
	        });
		});
		$('#editarSituacion').click(function() {
			console.log('Ok');
			$(".consultaSituacion").fadeIn(1000);
			$(".graficoSituacion").css('opacity','0.2');
		});
	</script>
	  <div class="w3-row-padding w3-margin-bottom">
	    <div class="w3-col m6">
	    	<a href="{{url('perfil/emprendimientos')}}">
		    	<div class="itemPerfil">
			      <div class="w3-container w3-teal w3-padding-16">
			        <div class="w3-left"><i class="fas fa-users w3-xxxlarge"></i></div>
			        <div class="w3-right">
			          <h3><?= $n_emprendimientos ?></h3>
			        </div>
			        <div class="w3-clear"></div>
			        <h4>Mis emprendimientos</h4>
			      </div>
		    	</div>
	      	</a>
	    </div>
	    <div class="w3-col m6">
	    	<a href="{{url('simuladorCreditos')}}">
	    		<div class="itemPerfil">
				    <div class="w3-container w3-orange w3-text-white w3-padding-16">
				        <div class="w3-left"><i class="fas fa-award w3-xxxlarge"></i></div>
				        <div class="w3-right">
				          <h3>-</h3>
				        </div>
				        <div class="w3-clear"></div>
				        <h4>Simulador de créditos</h4>
				    </div>
		      	</div>
		    </a>
	    </div>
	  </div>
	  <div class="w3-col m12">
	  	<h3><b>DATOS DE USUARIO</b></h3>
	  	<form action="{{url('perfil/actualizarDatosUsuario')}}" method="post" name="formUsuario">
	  		<div class="w3-col m12">
				<input type="submit" name="enviarFormUsuario" class="w3-button w3-blue" value="Actualizar Datos">
			</div>
			<div class="w3-third" style="padding: 20px;">
		  		<label>Domicilio:</label>
		  		<input type="text" name="domicilioUsuario" class="w3-input" style="outline: none;background:rgba(0,0,0,0.03);color: white;" value="{{$usuario->domicilio}}">
		  	</div>
		  	<div class="w3-third" style="padding: 20px;">
		  		<label>Email:</label>
		  		<input type="text" name="emailUsuario" class="w3-input" style="outline: none;background:rgba(0,0,0,0.03);color: white;" value="{{$usuario->email}}">
		  	</div>
		  	<div class="w3-third" style="padding: 20px;">
		  		<label>Teléfono:</label>
		  		<input type="text" name="telefonoUsuario" class="w3-input" style="outline: none;background:rgba(0,0,0,0.03);color: white;" value="{{$usuario->telefono}}">
		  	</div>
		  	<div class="w3-half">
				<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
					<label>Localidad</label>
						<select class="w3-select" style="padding: 4px 0px !important;" name="localidadUsuario">
							@foreach ($localidades as $localidad)
								@if($usuario->localidad == $localidad->id)
								<option selected value="{{$localidad->id}}">{{$localidad->nombre}}</option>
								@else
								<option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
								@endif
							@endforeach
						</select>
				</div>
			</div>
		  	<div class="w3-half">
				<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
					<label>Provincia</label>
						<select class="w3-select" style="padding: 4px 0px !important;" name="provinciaUsuario">
						@foreach($provincias as $provincia)
							@if($provincia == $usuario->provincia)
							<option selected value="{{$provincia}}">{{$provincia}}</option>
							@else
							<option value="{{$provincia}}">{{$provincia}}</option>
							@endif
						@endforeach
						</select>
				</div>
			</div>
		  	<div class="w3-half">
				<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
					<label>Actividad principal</label>
						<select class="w3-select" style="padding: 4px 0px !important;" name="actividadUsuario">
							@foreach($actividadesPrincipales as $actividad)
								@if($actividad->id == $usuario->actividadPrincipal)
							    <option selected value="{{$actividad->id}}">{{$actividad->nombre}}</option>
							    @else
							    <option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
							    @endif
							@endforeach
						</select>
				</div>
			</div>
			<div class="w3-half">
				<div style="margin-right: 10px;margin-left: 10px;height: 95px;">
					<label>Agencia</label>
						<select class="w3-select" style="padding: 4px 0px !important;" name="agenciaUsuario">
							@foreach ($agencias as $agencia)
								@if($usuario->agencia == $agencia->id)
								<option selected value="{{$agencia->id}}">{{$agencia->nombre}}</option>
								@else
								<option value="{{$agencia->id}}">{{$agencia->nombre}}</option>
								@endif
							@endforeach
						</select>
				</div>
			</div>
		</form>
	  </div>

	@endsection