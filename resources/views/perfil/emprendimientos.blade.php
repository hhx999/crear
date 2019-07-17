@extends('userTest.layout')
	
	@section('title') Perfil - Emprendimientos @endsection

	@section('content')

	<header class="w3-container" style="padding-top:22px">
	    <h5><b><i class="fa fa-dashboard"></i> Mis emprendimientos</b></h5>
	  </header>
	  <div class="w3-container">
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
			      <th>CUIT</th>
			      <th>Nombre del emprendimiento</th>
			      <th>Nombre del encargado</th>
			      <th>Acciones</th>
			    </tr>
			    <?php for ($i=0; $i < count($emprendimientos); $i++) { 
			    	echo "<tr>";
			    	echo "<td>".$emprendimientos[$i]->cuit."</td>";
			    	echo "<td>".$emprendimientos[$i]->denominacion."</td>";
			    	echo "<td>".$nombreApellido."</td>";
			    	print_r("<td>
					      	<select style='color: black;'>
					      		<option>-</option>
					      		<option>Editar</option>
					      		<option>Eliminar</option>
					      	</select>
					      </td>");
			    	echo "</tr>";
			    } ?>
			  </table>
			 </div>
			</div>
		</div>

	@endsection