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
	</style>
	<div class="w3-row">
	  	<div class="w3-col m12">
	  		<h3>Borradores</h3>
	  		<table class="w3-table">
			    <tr style="background-color: #cdc05c;">
			      <th>ID</th>
			      <th>Fecha</th>
			      <th>Línea</th>
			      <th>Asunto</th>
			      <th>Acciones</th>
			    </tr>
	  		@foreach($borradores as $borrador)
	  			<tr>
	  				<td>{{$borrador->id}}</td>
	  				<td>{{$borrador->created_at}}</td>
	  				<td>{{array_search($borrador->form_tipo_id, $lineasCreditos) ?? 'Línea no asignada'}}</td>
	  				<td>Asunto vacío</td>
	  				<td align="center">
	  					<a class="w3-button w3-teal" href="#">Abrir</a>
	  					<a class="w3-button w3-red" href="#">Eliminar</a>
	  				</td>
	  			</tr>
	  		@endforeach
	  		</table>
	  	</div>
	</div>

	@endsection
<!-- --> 
