<label>Monto:</label>
<input type="text" id="monto" name="monto">
<br>
<label>Plazo de amortización</label>
<input type="text" id="plazo" name="plazo">
<br>
<label>Interés Mensual</label>
<input type="text" id="interes" name="interes" readonly value="0.01275">
<br>
<label>IVA</label>
<input type="text" id="iva" name="iva" readonly value="0.21">

<table>
	<tbody>
		<tr>
			<th>Nº</th>
			<th>capital</th>
			<th>interes</th>
			<th>IVA</th>
			<th>Cuota</th>
			<th>Cuota Frances</th>
			<th>Saldo K</th>
		</tr>
	</tbody>
	<tbody>
		<?php
		$n = 0;
		$capital = 0;
		$monto = 80000;
		$plazo = 30;
		$interes = floatval("0.01275");
		$iva = floatval("0.21");
		$cuotaFrancesa = 0;

			for ($i=0; $i < 6; $i++) { 
				$n =+ $i;
				echo "<tr>";
				echo "<td>".$n."</td>";
				echo "<td> </td>";
				$interesfinal = $interes*$monto;
				echo "<td>".$interesfinal."</td>";
				$ivafinal = floatval($interesfinal) * floatval($iva);
				echo "<td>".$ivafinal."</td>";
				$resultado = floatval($interesfinal) + floatval($ivafinal);
				echo "<td>".$resultado ."</td>";
				echo "<td> </td>";
				echo "<td> </td>";
				echo "</tr>";
			}/*
			for ($i=0; $i < ($plazo-6); $i++) { 
				$n =+ $i;
				echo "<td>".$n."</td>";
				echo "<td>".."</td>";
				echo "<td>".$interes*$monto."</td>";
				echo "<td>".$interes*$iva."</td>";
				echo "<td>".$interes+$iva."</td>";
				echo "<td> </td>";
				echo "<td> </td>";
			}*/
		?>
	</tbody>
</table>