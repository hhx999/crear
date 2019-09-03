@extends('userTest.layout')
	
	@section('title') Perfil @endsection
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

	  <div class="w3-row-padding w3-margin-bottom">
	  	<!--
	    <div class="w3-quarter">
	      <div class="w3-container w3-red w3-padding-16">
	        <div class="w3-left"><i class="fas fa-graduation-cap w3-xxxlarge"></i></div>
	        <div class="w3-right">
	          <h3>3</h3>
	        </div>
	        <div class="w3-clear"></div>
	        <h4>Mis capacitaciones</h4>
	      </div>
	    </div>
	    <div class="w3-quarter">
	      <div class="w3-container w3-blue w3-padding-16">
	        <div class="w3-left"><i class="fas fa-landmark w3-xxxlarge"></i></div>
	        <div class="w3-right">
	          <h3>1</h3>
	        </div>
	        <div class="w3-clear"></div>
	        <h4>Mis créditos</h4>
	      </div>
	    </div>
	-->
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