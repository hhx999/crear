<!DOCTYPE html>
<html>
<head>
<title>INICIO - PLATAFORMA CREAR</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
</head>
<style type="text/css">
	.bodyUI {
		background-color: #384e77;
	}
	.contenedor {
		background-color: rgba(0,0,0,0) !important;
	}
	.logoCrear {
		width: 250px;
		margin-top: 20px;
	}
	.itemsMenuUsuario {
		margin-top: 30px;
	}
	.opcionMenuUsuario {
		width: 100%;
		height: 250px;
		margin: 0px 10px 10px 0px;
		-webkit-border-radius: 40px;
		border-radius: 40px;
		background-color: #97db4f;
		border: 4px solid #2f4550;
		background-repeat:no-repeat;
		background-position: center 20px;
		background-size: 150px 150px;
		transition:all 0.3s ease;
		opacity:0.75;
	}
	.opcionMenuUsuario:hover {
		opacity:1;
	}
	.creditos {
		background-image: url("{{ asset('img/opcionesMenuUsuario/credito.png') }}");
	}
	.tramites {
		background-image: url("{{ asset('img/opcionesMenuUsuario/tramites.png') }}");
	}
	.borradores {
		background-image: url("{{ asset('img/opcionesMenuUsuario/borradores.png') }}");
	}
	.documentacion {
		background-image: url("{{ asset('img/opcionesMenuUsuario/documentacion.png') }}");
	}
	p {
		color: #2f4550;
		text-align: center;
		font-size: 20px;
		font-weight: 140;
		font-family: 'Arial';
		padding-top: 155px;
		opacity:1 !important;
	}
</style>
<body class="bodyUI">
	<div class="w3-col m1 w3-center"><p></p></div>
  	<div class="w3-col m10 w3-white w3-center contenedor">
	<img src="{{ asset('img/logos/CREARlogo-blanco.png') }}" class="logoCrear">
	<!-- Primera fila de cuadros de opciones -->
	 	<div class="w3-row itemsMenuUsuario">
		  <div class="w3-container w3-quarter">
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario creditos">
				<p>
			    	Pedí tu <b><strong>CRÉDITO</strong></b>
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario tramites">
		    	<p>
			    	Consultá tus <b><strong>TRÁMITES</strong></b>
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		  </div>
		</div>
	<!-- Segunda fila de cuadros de opciones -->
		  <div class="w3-container w3-quarter">
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario borradores">
		    	<p>
		    		<b>
			    		BORRADORES
			    	</b>
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		    <div class="opcionMenuUsuario documentacion">
		    	<p>
		    		<b>
			    		DOCUMENTACIÓN
			    	</b>
			    </p>
		    </div>
		  </div>
		  <div class="w3-container w3-quarter">
		  </div>
	</div>
	
</body>
</html>