 @extends('userTest.layout')

	@section('title') Simulador de créditos @endsection

	@section('content')
 <form class="w3-container" method="post" action="" name="formSimulador">
 	<div class="w3-col m12">
 		<div class="w3-col m3" style="padding: 30px;">
 			<select class="w3-select" name="tasaInteres">
 				<option value=""  disabled selected>Seleccioná la línea de crédito...</option>
 				<option value="15.3">Línea Emprendedor</option>
 				<option value="15.3">Línea MyPimes</option>
 				<option value="14">Línea Sector Turístico</option>
 				<option value="9">Línea Sector Turístico (con subsidio)</option>
 			</select>
 		</div>
	 	<div class="w3-col m3" style="padding: 10px;">
			 <label>Financiamiento en pesos</label>
			 <input width="80%;" class="w3-input" type="text" name="monto">
	 	</div>
	 	<div class="w3-col m3" style="padding: 30px;">
 			<select class="w3-select" name="gracia">
 				<option value=""  disabled selected>Seleccioná los meses de gracia...</option>
 				<option value="1">1 mes</option>
 				<option value="2">2 meses</option>
 				<option value="3">3 meses</option>
 				<option value="4">4 meses</option>
 				<option value="5">5 meses</option>
 				<option value="6">6 meses</option>
 			</select>
 		</div>
		<div class="w3-col m3" style="padding: 30px;">
 			<select class="w3-select" name="plazo">
 				<option value=""  disabled selected>Seleccioná el plazo...</option>
 				<?php 
 				for ($i=12; $i <= 36; $i++) { 
 					print '<option value="'.$i.'">'.$i.' meses</option>';
 				}
 				?>
 			</select>
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
	<br>
 @endif
 @if($resultadosSistema)
 	<div class="resultadosSistema" align="center">
 		<table class="w3-table">
		    <thead>
		      	<tr class="w3-blue-gray">
		        	<th style="text-align: center;">Periodo</th>
		        	<th style="text-align: center;">Deuda Periodo</th>
		        	<th style="text-align: center;">Capital</th>
		        	<th style="text-align: center;">Interés</th>
		        	<th style="text-align: center;">IVA</th>
		        	<th style="text-align: center;">CUOTA TOTAL</th>
		      	</tr>
		    </thead>
 			@for($i = 1;$i < count($resultadosSistema); $i++)
		    	<tr>
		    		<td style="text-align: center;">{{ round($resultadosSistema[$i]['periodo'],2) }}</td>
		    		<td style="text-align: center;">$ {{ round($resultadosSistema[$i]['deudaPeriodo'],2) }}</td>
		    		<td style="text-align: center;">$ {{ round($resultadosSistema[$i]['capital'],2) }}</td>
		    		<td style="text-align: center;">$ {{ round($resultadosSistema[$i]['interes'],2) }}</td>
		    		<td style="text-align: center;">$ {{ round($resultadosSistema[$i]['iva'],2) }}</td>
		    		<td style="text-align: center;"><b>$ {{ round($resultadosSistema[$i]['cuotaTotal'],2) }} </b></td>
		    	</tr>
			@endfor
		</table>
 	</div>
 @endif
@endsection