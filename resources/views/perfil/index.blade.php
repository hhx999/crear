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
	<header class="w3-container" style="padding-top:22px">
	    <h5><b><i class="fa fa-dashboard"></i> Mi perfil</b></h5>
	</header>
	<style>
		.escaleraEmprendedor {
			display:block;
			height:60px;
		}
		.escaleraEmprendedor:before {
		    content: '\25CF';
			display: block;
			width: 0px;
			height: 23px;
			position: relative;
			left: 260px;
			top: 0px;
			font-size: 30px;
		}
		.final:before {
			content: '▶';
		}
		.activoEscalera:before {
			content: "•";
			color: #6bc55d !important;
			font-size: 60px;
		    top: -20px;
		    left: 255px;
		}
		.escaleraEmprendedor .item {
			border-left: 2px solid;
			border-top: 2px solid;
			width: 270px;
			height: 30px;
			padding: 30px;
		}
		.escaleraEmprendedor .item.active{
			border-left: 4px solid #009688;
			border-top: 4px solid #009688;
			width: 270px;
			height: 30px;
			padding: 30px;
		}
		.txtEscalon {
			position: relative;
			top:-70px;
		}
		</style>
	<div>
	<div class="w3-col m12">
		<div style="margin-bottom: 50px;">
			<div class="escaleraEmprendedor final" style="margin-left:830px;">
				<div class="item">
					<span class="txtEscalon">Responsable Inscripto</span>
				</div>
			</div>
			<div class="escaleraEmprendedor" style="margin-left:560px;">
				<div class="item">
					<span class="txtEscalon">Monotributista de F-K</span>
				</div>
			</div>
			<div class="escaleraEmprendedor" style="margin-left:290px;">
				<div class="item">
					<span class="txtEscalon">Monotributista de A-E</span>
				</div>
			</div>
			<div class="escaleraEmprendedor activoEscalera" style="margin-left: 20px;">
				<div class="item active" style="border-left: 0px !important;">
					<span class="txtEscalon">Informal</span>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script type="text/javascript">
		$('.escaleraEmprendedor .item').click( function() {
			$(this).toggleClass('active');
			$(this).parent('div').toggleClass('activoEscalera');
			$(this).children('span').css('font-weight','bold');
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