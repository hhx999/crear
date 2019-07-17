@extends('userTest.layout')
	
	@section('title') Perfil - Emprendimientos @endsection

	@section('content')

	<header class="w3-container" style="padding-top:22px">
	    <h5><b><i class="fa fa-dashboard"></i> Registrar emprendimiento</b></h5>
	  </header>
	  <!--
$emprendimiento->denominacion = $request->denominacion;
            $emprendimiento->tipoSociedad = $request->tipoSociedad;
            $emprendimiento->cuit = $request->cuit;
            $emprendimiento->domicilio = $request->domicilio;
            $emprendimiento->localidad = $request->localidad;
            $emprendimiento->provincia = $request->provincia;
            $emprendimiento->codPostal = $request->codPostal;
            $emprendimiento->email = $request->email;
            $emprendimiento->telefono = $request->telefono;
            $emprendimiento->usuario_id = $usuario_id;
        -->
        <style type="text/css">
        	.formRegistroEmprendimiento input{
        		color: black;
        	}
        </style>
	<div class="w3-row-padding">
	    <form method="post" action="" name="formRegistroEmprendimiento" class="formRegistroEmprendimiento">
	     <div class="w3-half">
		    <label>Denominación de la Sociedad</label>
		    <input class="w3-input w3-border" type="text" name="denominacion" placeholder="Ingrese el nombre de fantasía del emprendimiento...">
		  </div>
		  <div class="w3-half">
		    <label>Tipo de sociedad</label>
		    <input class="w3-input w3-border" type="text" name="tipoSociedad" placeholder="Ingrese el tipo de sociedad...">
		  </div>
		  <div class="w3-half">
		    <label>C.U.I.T.</label>
		    <input class="w3-input w3-border" type="text" name="cuit" placeholder="Ingrese el cuit asociado al emprendimiento...">
		  </div>
		  <div class="w3-half">
		    <label>Domicilio</label>
		    <input class="w3-input w3-border" type="text" name="domicilio" placeholder="Ingrese el domicilio fiscal del emprendimiento...">
		  </div>
		  <div class="w3-half">
		    <label>Cod. Postal</label>
		    <input class="w3-input w3-border" type="text" name="codPostal" placeholder="Ingrese el código postal del emprendimiento...">
		  </div>
		  <div class="w3-half">
		    <label>Localidad</label>
		    <input class="w3-input w3-border" type="text" name="localidad" placeholder="Ingrese la localidad registrada del emprendimiento...">
		  </div>
		  <div class="w3-half">
		    <label>Provincia</label>
		    <input class="w3-input w3-border" type="text" name="provincia" placeholder="Ingrese la provincia del emprendimiento...">
		  </div>
		  <div class="w3-half">
		    <label>E-mail</label>
		    <input class="w3-input w3-border" type="text" name="email" placeholder="Ingrese el email vinculado al emprendimiento...">
		  </div>
		  <div class="w3-half">
		    <label>Telefono</label>
		    <input class="w3-input w3-border" type="text" name="telefono" placeholder="Ingrese el telefono de contacto con el emprendimiento...">
		  </div>
		  <div class="w3-half">
		  	<br>
		    <input class="w3-btn w3-green" type="submit" value="Enviar" name="enviar">
		  </div>
	    </form>
	</div>


	@endsection