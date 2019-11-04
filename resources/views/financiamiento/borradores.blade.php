@extends('userTest.layout')	
	@section('title') Borradores @endsection

	@section('content')
	
	<style type="text/css">
		.w3-table table,th,td {
			border: 1px solid #cdc05c;
			border-collapse: collapse;
		}
		.w3-table th {
			color: #314759;
			text-align: center;
		}
		.w3-table td {
			text-align: center;
		}
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
	<div class="w3-row">
	  	<div class="w3-col m12">
	  		<div class="w3-third"><p></p></div>
	  		<div class="w3-third">
	  			<ul class="nav">
	  				<li><a href="{{url('financiamiento')}}">Financiamiento</a>/</li>
	  				<li>Borradores</li>
	  			</ul>
	  		</div>
	  		<div class="w3-third"><p></p></div>
	  		<table class="w3-table">
			    <tr style="background-color: #cdc05c;">
			      <th>ID</th>
			      <th>Fecha</th>
			      <th>Línea</th>
			      <th>Asunto</th>
			      <th>Acciones</th>
			    </tr>
			@if($borradores->isEmpty())
				<tr><td colspan="5">No existen borradores.</td></tr>
			@endif
	  		@foreach($borradores as $borrador)
	  			<tr>
	  				<td>{{$borrador->id}}</td>
	  				<td><b>{{$borrador->created_at}}</b></td>
	  				<td>{{array_search($borrador->form_tipo_id, $lineasCreditos) ?? 'Línea no asignada'}}</td>
	  				<td>{{$borrador->asuntoBorrador ?? 'Asunto vacío'}}</td>
	  				<td align="center">
	  					<a class="w3-button w3-teal" href="{{url('financiamiento/borradores/'.$borrador->id)}}">Abrir</a>
	  					<a class="w3-button w3-red" href="#">Eliminar</a>
	  				</td>
	  			</tr>
	  		@endforeach
	  		</table>
	  	</div>
	</div>

	@endsection
<!-- --> 
