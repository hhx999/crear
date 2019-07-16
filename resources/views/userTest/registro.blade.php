@extends('userTest.layout')
	
	@section('title') Registro @endsection
	<style type="text/css">
		a {
			text-decoration: none;
		}
		.formRegistro {
			background-color: rgb(69, 92, 135);
			border: 1px white solid;
			border-radius: 10px;
			padding: 10px;
			margin-top: 30px;
			margin-bottom: 30px;
			color: black;
		}
		.formRegistro input,select {
			color: black;
		}
		select {
			width: 100%;
		}
	</style>

	@section('content')
	<div class="formRegistro">
		<p>{{$msg}}</p>
	<h4>Registrate y empezá a emprender!</h4>
		<form name="registroUsuario" action="" method="post">
			<h4>Datos principales</h4>
			<label>
				DNI:
			</label>
			<input type="text" name="dni">
			<label>
				Password:
			</label>
			<input type="password" name="password">
			<hr>
			<h4>Datos personales</h4>
			<label>
				Nombre y apellido:
			</label>
			<input type="text" name="nombreApellido">
			<label>
				Fecha de nacimiento:
			</label>
			<input type="text" name="fecNacimiento"><br>
			<!--
A- AGRICULTURA, GANADERÍA, CAZA Y SILVICULTURA
B- PESCA Y SERVICIOS CONEXOS
C- EXPLOTACIÓN DE MINAS Y CANTERAS
D- INDUSTRIA MANUFACTURERA
E- ELECTRICIDAD, GAS Y AGUA
F- CONSTRUCCIÓN
G- COMERCIO AL POR MAYOR Y AL POR MENOR, REPARACIÓN DE VEHÍCULOS, AUTOMOTORES, MOTOCICLETAS, EFECTOS PERSONALES Y ENSERES DOMÉSTICOS
H- SERIVICIOS DE HOTELERÍA Y RESTAURANTES
I- SERVICIO DE TRANSPORTE DE ALMACENAMIENTO Y DE COMUNICACIONES
J- INTERMEDIACIÓN FINANCIERA Y OTROS SERVICIOS FINANCIEROS
K- SERIVICIOS INMOBILIARIOS, EMPRESARIALES Y DE ALQUILER
L- ADMINISTRACIÓN PÚBLICA, DEFENSA Y SEGURIDAD SOCIAL OBLIGATORIA
M- ENSEÑANZA
N- SERVICIOS SOCIALES Y DE SALUD
O- SERVICIOS COMUNITARIOS, SOCIALES Y PERSONALES N.C.P.
P- SERVICIOS DE HOGARES PRIVADOS QUE CONTRATAN SERVICIO DOMESTICO
Q- SERVICIOS DE ORGANIZACIONES Y ORGANOS EXTRATERRITORIALES
			 -->
			<div align="center">
				<div style="border:2px solid #97db4f;padding 20px; width: 33%; margin-top: 10px;margin-bottom: 10px;">
				<label>Actividad principal</label>
					<select id="actividadPrincipal" name="actividadPrincipal">
						<option value="a">A- AGRICULTURA, GANADERÍA, CAZA Y SILVICULTURA</option>
						<option value="b">B- PESCA Y SERVICIOS CONEXOS</option>
						<option value="c">C- EXPLOTACIÓN DE MINAS Y CANTERAS</option>
						<option value="d">D- INDUSTRIA MANUFACTURERA</option>
						<option value="e">E- ELECTRICIDAD, GAS Y AGUA</option>
						<option value="f">F- CONSTRUCCIÓN</option>
						<option value="g">G- COMERCIO AL POR MAYOR Y AL POR MENOR, REPARACIÓN DE VEHÍCULOS, AUTOMOTORES, MOTOCICLETAS, EFECTOS PERSONALES Y ENSERES DOMÉSTICOS</option>
						<option value="h">H- SERIVICIOS DE HOTELERÍA Y RESTAURANTES</option>
						<option value="i">I- SERVICIO DE TRANSPORTE DE ALMACENAMIENTO Y DE COMUNICACIONES</option>
						<option value="j">J- INTERMEDIACIÓN FINANCIERA Y OTROS SERVICIOS FINANCIEROS</option>
						<option value="k">K- SERVICIOS INMOBILIARIOS, EMPRESARIALES Y DE ALQUILER</option>
						<option value="l">L- ADMINISTRACIÓN PÚBLICA, DEFENSA Y SEGURIDAD SOCIAL OBLIGATORIA</option>
						<option value="m">M- ENSEÑANZA</option>
						<option value="n">N- SERVICIOS SOCIALES Y DE SALUD</option>
						<option value="o">O- SERVICIOS COMUNITARIOS, SOCIALES Y PERSONALES N.C.P.</option>
						<option value="p">P- SERVICIOS DE HOGARES PRIVADOS QUE CONTRATAN SERVICIO DOMESTICO</option>
						<option value="q">Q- SERVICIOS DE ORGANIZACIONES Y ORGANOS EXTRATERRITORIALES</option>
					</select>
				</div>
			</div>
			<label>
				Domicilio:
			</label>
			<input type="text" name="domicilio">
			<label>
				Localidad:
			</label>
			<input type="text" name="localidad"><br>
			<label>
				Provincia:
			</label>
			<input type="text" name="provincia">
			<label>
				Agencia:
			</label>
			<input type="text" name="agencia">
			<hr>
			<h4>Datos de contacto:</h4>
			<label>
				EMAIL:
			</label>
			<input type="text" name="email"><br>
			<label>
				Telefono:
			</label>
			<input type="text" name="telefono">
			<br><br>
			<input type="submit" name="enviar" value="Registrarse">
		</form>
	</div>

	@endsection