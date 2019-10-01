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
	    <h5><b><i class="fa fa-dashboard"></i> Mi perfil</b></h5>
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
			left: 24%;
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
		    left: 23.7%;
		}
		.escaleraEmprendedor .item {
			border-left: 2px solid;
			border-top: 2px solid;
			width: 25%;
			height: 30px;
			padding: 30px;
		}
		.escaleraEmprendedor .item.active{
			border-left: 4px solid #009688;
			border-top: 4px solid #009688;
			width: 25%;
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
		<p>Situación impositiva</p>
		<div style="margin-bottom: 50px;">
				<div style="margin-left: 75%;width: 100%;">
					<div id="ResponsableInscripto" class="escaleraEmprendedor final">
						<div class="item">
							<span class="txtEscalon">Responsable Inscripto</span>
						</div>
					</div>
				</div>
				<div style="margin-left: 50%;width: 100%;">
					<div id="MonotributoFK" class="escaleraEmprendedor">
						<div class="item">
							<span class="txtEscalon">Monotributista de F-K</span>
						</div>
					</div>
				</div>
				<div style="margin-left: 25%;width: 100%;">
					<div id="MonotributoAE" class="escaleraEmprendedor">
						<div class="item">
							<span class="txtEscalon">Monotributista de A-E</span>
						</div>
					</div>
				</div>
				<div id="Informal" class="escaleraEmprendedor">
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
				<option value="Informal">Informal</option>
				<option value="MonotributoAE">Monotributo(A hasta E)</option>
				<option value="MonotributoFK">Monotributo(F hasta K)</option>
				<option value="ResponsableInscripto">Responsable incripto</option>
			</select>
			<br>
			<a href="#miPerfil" class="w3-button w3-cyan" id="enviarSituacion" style="color: white !important;">Enviar</a>
		</div>
	</div>
	@if($situacionImpositiva)
	<input type="hidden" id="actualSituacion" value="{{$situacionImpositiva}}">
		<script type="text/javascript">
			$(window).on("load",function(){
				$(".consultaSituacion").remove();
				$(".graficoSituacion").css('opacity','1');
				$(".graficoSituacion").fadeIn(5000);
				$(".escaleraEmprendedor").each(function() {
					console.log($(this).attr("id"));
					$(this).toggleClass('activoEscalera')
					$(this).children('div').toggleClass('active');
					$(this).children('span').children('span').css('font-weight','bold');
				});
				$(".escaleraEmprendedor").each(function() {
					console.log($(this).attr("id"));
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

	@endsection