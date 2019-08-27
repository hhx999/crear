 @extends('userTest.layout')

	@section('title') Simulador de créditos @endsection

	@section('content')
 <form class="w3-container" method="get" action="" name="formSimulador">
 	<div class="w3-col m12">
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
		<div class="w3-col m3" style="padding: 30px;">
			 <label>Tasa de interes anual</label>
			 <input class="w3-input" type="text" name="tasaInteres" style="color: grey;" value="15.30" readonly>
		</div>
	</div>
	<input class="w3-button" type="submit" name="enviar" value="Calcular">
 </form>
 <br>

 <?php
/**
* Simulador de Credito 
* Sistema Frances o de Amortización Progresiva
* Cuota de valor fijo
*/
 //Variables que deben ser ingresadas por el usuario desde un formulario
if (!empty($_GET)) {
	$valor = $_GET['monto'];
	$plazo = $_GET['plazo'];

	//Valor de la tasa de interes, debe ser ingresada por el administrador
	$tasa = $_GET['tasaInteres'];
	$iva = 1.21;

	$anual = $tasa/100;
	$mes = round(($anual/12), 6);
	$vp = $valor * $mes;

	$a = ((pow((1+$mes), $plazo)-1)/($mes*pow((1+$mes), $plazo)));

	$gracia = $_GET['gracia'];

	$interesGracia = $vp * $gracia / $plazo;

	$cuota = $valor / ((pow((1+$mes), $plazo)-1)/($mes*pow((1+$mes), $plazo))); 

	$cpm = ($cuota/($valor/1000000));

	$cuotaPromedio = 0;
	print '
	<div class="w3-col m6" style="border: 2px solid #8fc53f;padding:10px;">
	<b>Valor:</b> $' .$valor. '<br/>
	<b>Cuota:</b> $'.round($cuota,2). '<br />
	<b>Deuda al inicio del periodo:</b> $'.$vp.'<br />
	</div>
	<div class="w3-col m6" style="border: 2px solid #8fc53f;padding:10px;">
	<b>Tasa Anual:</b> ' .$tasa. '%<br/>
	<b>Tasa Mensual:</b> ' .round(($tasa/12), 2). '%<br/>
	<b>Interés periodo gracia:</b> $'.$interesGracia.'<br />
	</div>
	<div class="w3-col m12" style="border: 2px solid #8fc53f;padding: 20px;">
	<b>Valor CUOTA Promedio: '.round($cuotaPromedio, 2).'</b><br /></div><br>';
	print '
	<table class="w3-table" style="margin-top:20px;">
		<tbody>
				<th>Periodo</th>
				<th>Deuda periodo</th>
				<th>Capital</th>
				<th>Interes</th>
				<th>IVA</th>
				<th>CUOTA TOTAL</th>
			<tr>
		</tbody>
		<tbody>
	';

	$f_cuotaFrances = $cuota;
	$f_monto = $valor;
	$f_iva = ($vp*$iva)-$vp;
	$f_tamor = 0;
	for ($i=0; $i <= ($plazo+$gracia); $i++) {
		if ($i <= $gracia) {
			echo "<tr>";
			print '<td>'.$i.'</td>
			<td>'.round($f_monto,2).'</td>
			<td> 0 </td><td> '.round($vp,2).'</td><td>'.round($f_iva,2).'</td>
			<td>'.round($vp + $f_iva, 2).'</td>
			</tr>';

		} else {
			$f_vp = $f_monto * $mes;
			$amortizacion = $cuota - $f_vp;
			$f_monto = $f_monto - $amortizacion;
			$f_iva = ($f_vp*$iva)-$f_vp;
			$f_tamor = $f_tamor + $amortizacion;
			$cuotaFinal = $amortizacion + $f_vp + $f_iva;
			$cuotaPromedio += $cuotaFinal;
			echo "<tr>";
			print '
			<td>'.$i.'</td>
			<td>'.round($f_monto,2).'</td>
			<td> '.round($amortizacion,2).' </td><td> '.round($f_vp,2).'</td><td>'.round($f_iva,2).'</td>
			<td><b>'.round($cuotaFinal,2).'</b></td></tr>';
		}
	}
	$cuotaPromedio = $cuotaPromedio/30;
	print '
		</tbody>
	</table>
	<b>'.round($cuotaPromedio, 2).'</b>
	';
}

?> 

@endsection