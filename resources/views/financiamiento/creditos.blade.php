@extends('userTest.layout')
	
	@section('title') Mis créditos - Financiamiento @endsection

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
	
	<div class="w3-col m12">
	  		<div class="w3-third"><p></p></div>
	  		<div class="w3-third">
	  			<ul class="nav">
	  				<li><a href="{{url('financiamiento')}}">Financiamiento</a>/</li>
	  				<li>Mis créditos</li>
	  			</ul>
	  		</div>
	  		<div class="w3-third"><p></p>
	  		</div>
	</div>
		<table class="w3-table">
			<thead>
				<tr style="background-color: #cdc05c;">
					<th>
						Emprendimiento
					</th>
					<th>
						Fecha
					</th>
					<th>
						Estado
					</th>
					<th>
						Activo
					</th>
				</tr>
			</thead>
			<tbody>

		@foreach($creditos as $credito)

				<tr>
					<td>{{ $credito->verEmprendimiento->denominacion }}</td>
					<td>{{$credito->fechaOtorgado}}</td>
					<td>{{$credito->verEstado->nombre}}</td>
					<td>
						@if($credito->activo == 1 )
							Si
						@else
							No
						@endif
					</td>
				</tr>

		@endforeach

			</tbody>
		</table>
	@endsection