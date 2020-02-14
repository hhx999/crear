@extends('userTest.layout')	
	@section('title') Trámites @endsection

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
	<div class="w3-row">
        	<div class="w3-third"><p></p></div>
	  		<div class="w3-third">
	  			<ul class="nav">
	  				<li><a href="{{url('financiamiento')}}">Financiamiento</a>/</li>
	  				<li>Trámites</li>
	  			</ul>
	  		</div>
	  		<div class="w3-third"><p></p></div>
    </div>
	<div class="w3-row">
	  	<div class="w3-col" style="width:10%"><p></p></div>
	  	<div class="w3-col" style="width:80%;"><h3>

	  		<!--Container-->
			<table class="w3-table">
				<thead>
					<tr style="background-color: #cdc05c;">
						<th>
							Trámite
						</th>
						<th>
							Fecha
						</th>
						<th>
							Estado
						</th>
						<th>
							Descripción
						</th>
					</tr>
				</thead>
				<tbody>
				@if($tramites->isNotEmpty())

					@foreach($tramites as $tramite)
							<tr>
								<td>
									@if($tramite->formulario_id)
										Obtención de línea de crédito
									@else
										Consulta:<br>
										<i style="color:lightgray;">({{$tramite->obtenerConsulta->consulta}})</i>
									@endif
								</td>
								<td>{{$tramite->created_at}}</td>
								<td>
									@if($tramite->formulario_id != NULL)
										{{$tramite->obtenerFormulario->obtenerEstado->nombre}}
									@else
										@if($tramite->obtenerConsulta->estado == 1)
										 Respondido
										@else
										No respondido
										@endif
									@endif
								</td>
								<td>
									@if($tramite->formulario_id != NULL)
										@if($tramite->obtenerFormulario->estado == 3)
											Observaciones:<br>
											<a href="{{url('financiamiento/editarLineaEmprendedor/'.$tramite->formulario_id)}}" style="color: #cdc05c;">EDITAR</a>
											<ul>
												@foreach($tramite->obtenerFormulario->pasosValidos->observaciones as $observacion)
													<li>{{$observacion->observacion}} | <i style="color: lightgray;">({{$observacion->created_at}})</i></li>
												@endforeach
											</ul>
										@elseif($tramite->obtenerFormulario->estado == 4)
										<span style="color:orange;">Actualizado<i style="color: lightgray;">({{$tramite->obtenerFormulario->updated_at}})</i> </span>
										@elseif($tramite->obtenerFormulario->estado == 5)
										<span style="color:lightgreen;">CRÉDITO ACEPTADO<br><a href="{{url('financiamiento/creditos')}}">(ver estado)</a></span>
										@elseif($tramite->obtenerFormulario->estado == 6 || $tramite->obtenerFormulario->estado == 7)
										<span style="color:red;">CRÉDITO RECHAZADO</span>
										<p>Motivo:<br>
										{{$tramite->obtenerFormulario->motivos->descripcion}}
										<br>
										Fecha: {{$tramite->obtenerFormulario->motivos->fecha}}
										</p>
										@else
										-
										@endif
									@elseif($tramite->obtenerConsulta->estado == 1)
										Respuesta:<br>
										<p>
											{{$tramite->obtenerConsulta->respuesta}}
										</p>
									@else
									-
									@endif
								</td>
							</tr>
					@endforeach
				@else
				<tr>
					<td colspan="4" style="text-align: center;">No existen registros.</td>
				</tr>
				@endif
				</tbody>
			</table>

			<!-- FIN Container-->
		</div>
	  	<div class="w3-col" style="width:10%"><p></p></div>
	</div>
<!-- -->	@endsection 
