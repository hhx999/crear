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

	//Valores ingresados por usuario
	$valor = $_GET['monto'];
	$plazo = $_GET['plazo'];
	$gracia = $_GET['gracia'];

	//Valores ingresados por administración
	$tasa = $_GET['tasaInteres'];
	$iva = 1.21;

	//tasa anual
	$anual = $tasa/100;
	//tasa mensual
	$mes = round(($anual/12), 6);
	//interés
	$vp = $valor * $mes;

	//interés gracia
	$interesGracia = $vp * $gracia / $plazo;
	//cuota francesa
	$cuota = $valor / ((pow((1+$mes), $plazo)-1)/($mes*pow((1+$mes), $plazo)));

	//Cuota FINAL promedio de todos los meses sin gracia
	$cuotaPromedio = 0;

	//Resultados del sistema funcionando
	$resultadosSistema = [];

	//monto del financiamiento para tratar en el sistema
	$f_monto = $valor;
	//calculo de iva para tratar en el sistema
	$f_iva = ($vp*$iva)-$vp;
	//amortización para tratar en sistema
	$f_tamor = 0;

	for ($i=0; $i <= ($plazo+$gracia); $i++) {
		if ($i <= $gracia) {
			$cuotaFinal = $vp + $f_iva;
			$resultadosSistema[$i]['periodo'] = $i;
			$resultadosSistema[$i]['deudaPeriodo'] = $f_monto;
			$resultadosSistema[$i]['capital'] = 0;
			$resultadosSistema[$i]['interes'] = $vp;
			$resultadosSistema[$i]['iva'] = $f_iva;
			$resultadosSistema[$i]['cuotaTotal'] = $cuotaFinal;

		} else {
			//calculos sistema
			$f_vp = $f_monto * $mes;
			$amortizacion = $cuota - $f_vp;
			$f_monto = $f_monto - $amortizacion;
			$f_iva = ($f_vp*$iva)-$f_vp;
			$f_tamor = $f_tamor + $amortizacion;
			$cuotaFinal = $amortizacion + $f_vp + $f_iva;
			$cuotaPromedio += $cuotaFinal;
			$resultadosSistema[$i]['periodo'] = $i;
			$resultadosSistema[$i]['deudaPeriodo'] = $f_monto;
			$resultadosSistema[$i]['capital'] = $amortizacion;
			$resultadosSistema[$i]['interes'] = $f_vp;
			$resultadosSistema[$i]['iva'] = $f_iva;
			$resultadosSistema[$i]['cuotaTotal'] = $cuotaFinal;
		}
	}
	$cuotaPromedio = $cuotaPromedio/30;
	echo "<pre>";
	print_r($resultadosSistema);
	echo "</pre>";
}

?> 

@endsection