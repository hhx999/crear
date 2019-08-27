 @extends('userTest.layout')

	@section('title') Simulador de créditos @endsection

	@section('content')
 <form class="w3-container" method="post" action="" name="formSimulador">
 	<div class="w3-col m12">
 		<div class="w3-col m3" style="padding: 30px;">
 			<select class="w3-select" name="tasaInteres">
 				<option value="15.3">Línea Emprendedor</option>
 				<option value="15.3">Línea MyPimes</option>
 				<option value="14">Línea Sector Turístico</option>
 				<option value="9">Línea Sector Turístico (con subsidio)</option>
 			</select>
 		</div>
	 	<div class="w3-col m3" style="padding: 30px;">
			 <label>Financiamiento en pesos</label>
			 <input class="w3-input" type="text" name="monto">
	 	</div>
	 	<div class="w3-col m3" style="padding: 30px;">
			 <label>Gracia</label>
			 <input class="w3-input" type="text" name="gracia">
		</div>
		<div class="w3-col m3" style="padding: 30px;">
			 <label>Plazo en meses</label>
			 <input class="w3-input" type="text" name="plazo">
		</div>
	</div>
	<input class="w3-button" type="submit" name="enviar" value="Calcular">
 </form>
 <br>
 @if($resultadosPrincipales)
 <div class="resultadosPrincipales"> 	
 	<div class="w3-col m12">
 		<p>CUOTA PROMEDIO:<b> ${{round($cuotaPromedio,3)}}</b>.-</p>
 	</div>
 	<div class="w3-col m6" align="center">
 		<p><b>Valores principales:</b></p>
 		<ul style="display: table;">
 			<li>Monto: ${{ $resultadosPrincipales['monto'] }}</li>
 			<li>Plazo total: {{ $resultadosPrincipales['plazoTotal'] }} meses</li>
 			<li>Deuda al inicio: ${{ $resultadosPrincipales['deudaInicioPeriodo'] }}</li>
 		</ul>
 	</div>
 	<div class="w3-col m6" align="center">
 		<p><b>Tasas e intereses:</b></p>
 		<ul style="display: table;">
 			<li>Tasa Anual: %{{ $resultadosPrincipales['tasaAnual'] }}</li>
 			<li>Tasa Mensual: %{{ $resultadosPrincipales['tasaMensual'] }}</li>
 			<li>Interés periodo de gracia: ${{ $resultadosPrincipales['interesGracia'] }}</li>
 		</ul>
 	</div>
 </div>
 @endif
@endsection