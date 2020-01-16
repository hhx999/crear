@extends('userTest.layout')
	
	@section('title') Perfil - Emprendimientos @endsection

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
	<header class="w3-container" style="padding-top:22px">
	    <h5><b><i class="fa fa-dashboard"></i> Mis emprendimientos</b></h5>
	  </header>
	  <div class="w3-container">
	  	<div class="w3-third"><p></p></div>
	  	<div class="w3-third">
	  			<ul class="nav">
	  				<li><a href="{{url('perfil')}}">Mi perfil</a>/</li>
	  				<li>Emprendimientos</li>
	  			</ul>
	  	</div>
	  	<div class="w3-panel">
	  		<div class="w3-row-padding" style="margin:0 -16px">
		      <div class="w3-third">
		      	<a href="{{url('/perfil/emprendimientos/create')}}">
		        <button class="w3-button w3-green">Registrar un nuevo emprendimiento</button>
		        </a>
		      </div>
		      <div class="w3-twothird">
			  <table class="w3-table">
			    <tr>
			      <th>id</th>
			      <th>Emprendimiento</th>
			      <th>Categoría</th>
			      <th>Acciones</th>
			    </tr>
			    @if(!empty($emprendimientos))
			    @foreach($emprendimientos as $emprendimiento)

			    <tr>
			    	<td>{{$emprendimiento->id}}</td>
			    	<td>{{$emprendimiento->denominacion}}</td>
			    	<td>{{$emprendimiento->categoria->nombre}}</td>
			    	<td>
			    		<a href="{{url('/perfil/emprendimientos_crear')}}">Ver en sitio</a><br>
				    		<a href="{{url('/perfil/emprendimientos/edit/'.$emprendimiento->id)}}">Editar</a><br>
						    <a href="{{url('/perfil/emprendimientos/eliminar/'.$emprendimiento->id)}}">Eliminar</a>
			    	</td>
			    </tr>
			    @endforeach
			    @endif
			  </table>
			 </div>
			</div>
		</div>

	@endsection