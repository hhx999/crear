<?php 
use App\Libraries\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon.ico" type="image/x-icon"/>
  <link rel="shortcut icon" href="../../resources/assets/img/logo.svg" type="image/x-icon"/>
  <link rel='stylesheet' href="<?=$GLOBALS['raiz'].'resources/assets/css/fuente.css'?>">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../resources/assets/css/style.css">
  
  <script src="<?=$GLOBALS['raiz'].'resources/assets/js/jquery.min.js'?>" type="text/javascript"></script>
  <script src="<?=$GLOBALS['raiz'].'resources/assets/js/jquery.mask.min.js'?>" type="text/javascript"></script>
  <script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
  <style type="text/css">
    input {
      text-transform: uppercase;
    }
    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
      text-transform: capitalize;
    }
    ::-moz-placeholder { /* Firefox 19+ */
      text-transform: capitalize;
    }
    :-ms-input-placeholder { /* IE 10+ */
      text-transform: capitalize;
    }
    :-moz-placeholder { /* Firefox 18- */
      text-transform: capitalize;
    }
</style>
  <title>CREAR - FORMULARIO LÍNEA EMPRENDEDOR</title>
</head>

<body>
  <div align="center">
    <a href="<?= $GLOBALS['urlRaiz'] ?>"><img src="<?=$GLOBALS['raiz'].'resources/assets/img/logo.svg'?>" style="width: 20%;"></a>
  </div>
<form id="regForm" action="crearFormulario" method="POST">
  <h1>Línea Emprendedor</h1>
  <H3 align="center">Línea de créditos para emprendedores</H3>


  <a href="<?=$GLOBALS['urlRaiz'].'user'?>"><button type="button">Volver a FORMULARIOS</button></a><br>
  <div class="barraCol1"></div>
  <div class="barraCol2"></div>
  <div class="barraCol3"></div>
      <button type="button" onclick="enviarForm()">Actualizar</button>
  <p> Los campos con <span style="color:red;">&#10033;</span> son requeridos.</p>
  <!-- One "tab" for each step in the form: -->
    <div style="text-align:center;margin-top:40px;">
    <span class="step" onclick="irTab(0)"></span>
    <span class="step" onclick="irTab(1)"></span>
    <span class="step" onclick="irTab(2)"></span>
    <span class="step" onclick="irTab(3)"></span>
    <span class="step" onclick="irTab(4)"></span>
    <span class="step" onclick="irTab(5)"></span>
    <span class="step" onclick="irTab(6)"></span>
    <span class="step" onclick="irTab(7)"></span>
  </div>
  <div class="tab">
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'portada') {
              print_r('<div class="observacion"><b><p>Observación para PORTADA:</p></b><textarea readonly>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>
      <B><H2>PORTADA</H2></B>
    <!-- ªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªª-->
    <!-- hidden inputs -->
    <p><input type="hidden" name="idFormulario" id="idFormulario" value="<?=$id ?>"></p>
    <p><input type="hidden" name="form_tipo_id" value="<?=$formTipo ?>"></p>
    <p><input type="hidden" name="numeroProyecto" value="<?=$formularioEnviado->numeroProyecto ?>"></p>
    <p><input type="hidden" name="fecPresentacionProyecto" value="<?=$formularioEnviado->fecPresentacionProyecto ?>"></p>
    <p><input type="hidden" name="idUsuario" value="<?=$formularioEnviado->idUsuario ?>"></p>
    <!-- fin hidden inputs -->
       <div class="float-container">
      <label>Título del proyecto <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese título del proyecto..." name="tituloProyecto" maxlength="43" id="tituloProyecto" value="<?= $formularioEnviado->tituloProyecto ?>">
    </div>

    <div class="float-container">
      <label>Nombre y apellido <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese nombre y apellido del solicitante ..." name="nombreSolicitante" maxlength="43" value="<?= $formularioEnviado->nombreSolicitante ?>">
    </div>

    <div class="float-container">
      <label>Localidad <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese localidad..." name="localidadSolicitante" maxlength="43" value="<?= $formularioEnviado->localidadSolicitante ?>">
    </div>

    <div class="float-container">
      <label>Agencia <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese agencia..." name="agenciaProyecto" maxlength="43" value="<?= $formularioEnviado->agenciaProyecto ?>">
    </div>

    <div class="float-container">
      <label>Monto a solicitar <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese el monto solicitado..." id="montoSolicitado"  name="montoSolicitado" maxlength="6" value="<?= $formularioEnviado->montoSolicitado ?>">
    </div>

    <p align="center"><b>BREVE DESCRIPCIÓN DEL EMPRENDIMIENTO Y JUSTIFICACIÓN DE LA NECESIDAD DE FINANCIAMIENTO <span style="color:red;">&#10033;</span></b></p>
    <p><textarea placeholder="Ingrese texto aquí..." name="descEmprendimiento" maxlength="254"> <?= $formularioEnviado->descEmprendimiento ?> </textarea></p>

  </div>
  <!-- FIN TAB PORTADA -->
  <!-- \\\\\\\\\\\\\\\\\\\\\\\ INFORMACION EMPRENDEDOR  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
          <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'infoEmprendedor') {
              print_r('<div class="observacion"><b><p>Observación para INFORMACIÓN DEL EMPRENDEDOR: </p></b><textarea readonly>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>
    <B><H2>INFORMACIÓN DEL EMPRENDEDOR</H2></B>
    <p align="center"><b>Datos personales:</b></p>
<div class="float-container">
      <label>Nombre y apellido <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese nombre y apellido del emprendedor..."  name="nombreEmprendedor" id="nombreEmprendedor" maxlength="43" value="<?= $formularioEnviado->nombreEmprendedor ?>">
    </div>

    <div class="float-container">
      <label>DNI <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese el número de documento..." name="dniEmprendedor" id="dni_emprendedor" maxlength="11" value="<?= $formularioEnviado->dniEmprendedor ?>">
    </div>

    <div class="float-container">
      <label>Localidad <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese la localidad en donde reside..." name="localidadEmprendedor" maxlength="43" value="<?= $formularioEnviado->localidadEmprendedor ?>">
    </div>

    <div class="float-container">
      <label>Domicilio <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese el domicilio real del emprendedor..." name="domicilioEmprendedor" maxlength="43" value="<?= $formularioEnviado->domicilioEmprendedor ?>">
    </div>

    <p align="center"><b>Datos de contacto:</b></p>

    <div class="float-container">
      <label>Teléfono <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese el número de teléfono..."  name="telefonoEmprendedor" maxlength="12" value="<?= $formularioEnviado->telefonoEmprendedor ?>">
    </div>

    <div class="float-container">
      <label>Email <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese su correo electrónico..."  name="emailEmprendedor" maxlength="43" value="<?= $formularioEnviado->emailEmprendedor ?>">
    </div>

    <div class="float-container">
      <label>Facebook</label>
      <input data-placeholder="Ingrese su cuenta en facebook..."  name="facebookEmprendedor" maxlength="43" value="<?= $formularioEnviado->facebookEmprendedor ?>">
    </div>
    <div style="border-top: 2px solid #4CAF50;display: inline-block;width: 100%;"></div>


    <p align="center"><b>Formación y ocupación</b></p>
    <p align="center">Grado de instrucción: </p>
    <p align="center"><em>Ingrese el último grado de instrucción finalizado por el emprendedor.</em></p>
    <div class="lista_grados" align="center">
    	<?php Helpers::crearRadio('gradoInstruccion',$formularioEnviado->gradoInstruccion); ?>
    </div>

    
    <div class="float-container">
      <label>Otra aplicación</label>
      <input data-placeholder="Ingrese otra aplicación que desarrolle en la actualidad..." maxlength="43" name="otraOcupacion" value="<?= $formularioEnviado->otraOcupacion ?>">
    </div>

    <div class="float-container">
      <label>Ingreso mensual</label>
      <input data-placeholder="Ingresar el salario mensual..." id="ingresoMensual" maxlength="10" name="ingresoMensual" value="<?= $formularioEnviado->ingresoMensual ?>">
    </div>

    <div class="float-container">
      <label>Deseo de capacitación</label>
      <input data-placeholder="Deseo de capacitación..." maxlength="43" name="deseoCapacitacion" value="<?= $formularioEnviado->deseoCapacitacion ?>">
    </div>

  </div>

  <!-- \\\\\\\\\\\\\\\\\\\\\\\ DATOS GENERALES EMPRENDIMIENTO  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
  <div class="tab">
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'datosEmprendimiento') {
              print_r('<div class="observacion"><p>Observación para DATOS DEL EMPRENDIMIENTO: </p><textarea readonly>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>
    <B><H2>DATOS GENERALES EMPRENDIMIENTO</H2></B>
    
    <div class="float-container">
      <label>Actividad principal</label>
      <input data-placeholder="Ingrese la actividad principal del emprendimiento..." name="actPrincipalEmprendimiento" maxlength="119" value="<?= $formularioEnviado->actPrincipalEmprendimiento ?>">
    </div>

    <div class="float-container">
      <label>Fecha de inicio(dd-mm-AAAA)</label>
      <input data-placeholder="Ingrese la fecha de inicio del emprendimiento" name="fecInicioEmprendimiento" id="inicio_emprendimiento" value="<?= $formularioEnviado->fecInicioEmprendimiento ?>">
    </div>
    
    <div class="float-container">
      <label>Antigüedad</label>
      <input data-placeholder="Ingrese la antigüedad del emprendimiento..." maxlength="43" name="antiguedadEmprendimiento" value="<?= $formularioEnviado->antiguedadEmprendimiento ?>">
    </div>

    <div class="float-container">
      <label>CUIT</label>
      <input data-placeholder="Ingrese el número de CUIT..." maxlength="19" name="cuitEmprendimiento" id="cuit_emprendimiento" value="<?= $formularioEnviado->cuitEmprendimiento ?>">
    </div>

    <div class="float-container">
      <label>Ingresos brutos</label>
      <input data-placeholder="Ingrese el número de ingresos brutos del emprendimiento..." maxlength="10" name="ingresosBrutosEmprendimiento" id="ingresosBrutos" value="<?= $formularioEnviado->ingresosBrutosEmprendimiento ?>">
    </div>
    <div style="border-top: 2px solid #4CAF50;display: inline-block;width: 100%;"></div>

    <p align="center"><b>Localización del emprendimiento</b></p>

    <div class="float-container">
      <label>Domicilio real</label>
      <input data-placeholder="Ingrese el domicilio real del emprendimiento..." maxlength="43" name="domicilioEmprendimiento" value="<?= $formularioEnviado->domicilioEmprendimiento ?>">
    </div>

    <div class="float-container">
      <label>Localidad</label>
      <input data-placeholder="Ingrese la localidad del emprendimiento..." maxlength="43" name="localidadEmprendimiento" id="localidad_emprendimiento" autocomplete="off" value="<?= $formularioEnviado->localidadEmprendimiento ?>">
    </div>


    <p align="center"><b>El lugar donde se desarrolla es:</b></p>
    <div class="lista_grados" align="center">
    	<?php Helpers::crearRadio('lugarEmprendimiento',$formularioEnviado->lugarEmprendimiento); ?>
    </div>

    <p align="center">DETALLE EL-LOS PRODUCTOS O SERVICIOS QUE OFRECERÁ:</p>
    <p><textarea placeholder="Ingrese texto aquí..." maxlength="254" name="descProdServicios">
    	<?= $formularioEnviado->descProdServicios ?>
    </textarea></p>
    <p align="center"><b>¿HA RECIBIDO APORTES O CRÉDITOS DE ORGANISMOS PÚBLICOS PARA EL DESARROLLO DEL PROYECTO?</b></p>
    <p align="center"><em>En caso de no haber recibido aportes, deje vacíos los campos.</em></p>


    <div class="float-container">
      <label>Institución</label>
      <input data-placeholder="Ingrese la institución de la cual ha recibido el aporte..." maxlength="43" name="institucionAporte" value="<?= $formularioEnviado->institucionAporte ?>">
    </div>

    <div class="float-container">
      <label>Fecha</label>
      <input data-placeholder="Ingrese la fecha en la que ha recibido el aporte..." name="fecAporte" id="fecha_institucion" value="<?= $formularioEnviado->fecAporte ?>">
    </div>

    <div class="float-container">
      <label>Monto</label>
      <input data-placeholder="Ingrese el monto del aporte" maxlength="10" name="montoAporte" id="montoAporte" value="<?= $formularioEnviado->montoAporte ?>">
    </div>


    <div class="lista_grados" align="center">
    	<?php Helpers::crearRadio('tipoAporte',$formularioEnviado->tipoAporte); ?>
    </div>
    <p align="center">
      <b>ESTADO DE DEVOLUCIÓN/RENDICIÓN:</b>
    </p>
    <div class="lista_grados" align="center">
    	<?php Helpers::crearRadio('estadoAporte',$formularioEnviado->estadoAporte); ?>
    </div>
    <br><div style="border-top: 2px solid #4CAF50;display: inline-block;width: 100%;"></div>
    <p align="center"><b>EXPERIENCIA O FORMACIÓN DE EL/LOS EMPRENDEDORES PARA EL DESARROLLO DEL EMPRENDIMIENTO:</b></p>
    <p><textarea placeholder="Ingrese texto aquí..." maxlength="254" name="experienciaEmprendedores"> <?= $formularioEnviado->experienciaEmprendedores ?></textarea></p>
    <p align="center"><b>OPORTUNIDAD DE MERCADO O  PROBLEMA QUE  RESUELVE:</b></p>
    <p><textarea placeholder="Ingrese texto aquí..." maxlength="254" name="oportunidadMercado">
    	<?= $formularioEnviado->oportunidadMercado ?>
    </textarea></p>
    <p align="center"><b>DESCRIPCIÓN DEL DESTINO DEL FINANCIAMIENTO:</b></p>
    <p><textarea placeholder="Ingrese texto aquí..." maxlength="254" name="descFinanciamiento">
    	<?= $formularioEnviado->descFinanciamiento ?>
    </textarea></p>
  </div>
  <!-- \\\\\\\\\\\\\\\\\\\\\\\ ASPECTOS SOCIALES  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
  <div class="tab">
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'aspectosSociales') {
              print_r('<div class="observacion"><b><p>Observación para ASPECTOS SOCIALES:</p></b><textarea readonly>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>
    <B><H2>ASPECTOS SOCIALES</H2></B>
    <p align="center">
     <b> Situación laboral actual:</b>
    </p>
    <div class="lista_grados" align="center">
    <?php Helpers::crearRadio('situacionLaboral',$formularioEnviado->situacionLaboral); ?>
    </div>

    <div class="float-container">
      <label>Aclaraciones</label>
      <input data-placeholder="Ingrese aclaraciones..." maxlength="79" name="aclaracionesGenerales" value="<?= $formularioEnviado->aclaracionesGenerales ?>">
    </div>

    <div class="float-container">
      <label>Ingreso</label>
      <input data-placeholder="Ingrese el salario general..." maxlength="10" name="ingresoGenerales" id="ingresoGenerales" value="<?= $formularioEnviado->ingresoGenerales ?>">
    </div>

    <p align="center">
     <b> Percepciones sociales: </b>
    </p>
    <div class="lista_grados" align="center">
       	<?php Helpers::crearRadio('percepcionesSociales', $formularioEnviado->percepcionesSociales); ?>
    </div>

    <div class="float-container">
      <label>Monto al mes</label>
      <input data-placeholder="Ingrese el monto al mes de las percepciones sociales..." maxlength="10" name="montoMesPercepciones" id="montoMes" value="<?= $formularioEnviado->montoMesPercepciones ?>">
    </div>

    <div class="float-container">
      <label>Personas a cargo</label>
      <input data-placeholder="Ingrese la cantidad de personas que tiene a cargo..." maxlength="2" name="cantPersonasCargo" value="<?= $formularioEnviado->cantPersonasCargo ?>">
    </div>

    <p align="center">
     <b> Lugar donde vivo es: </b>
    </p>
    <div class="lista_grados" align="center">
      <?php Helpers::crearRadio('lugarHabita',$formularioEnviado->lugarHabita); ?>
    </div>
    <p align="center"><b>Personas o instituciones que pueden dar referencias sobre el emprendedor</b></p>
    <input type="button" id="add_field" value="adicionar">
    <br>
    <div id="listas">
    </div>
    <?php 

    if ($referentes) {
    	$x = 0;
    	for ($i=0; $i < count($referentes); $i++) { 
    		if ($x == 0) {
    			print_r('
				        <div>
				            <input placeholder="Nombre y apellido/Institución"  name="nombre_ref[]" value="'.$referentes[$i]->nombre.'">
				            <input placeholder="Localidad..."  name="localidad_ref[]" value="'.$referentes[$i]->localidad.'">
				            <input placeholder="Telefono..."  name="telefono_ref[]" value="'.$referentes[$i]->telefono.'">
				        </div>
    				');
    		$x++;	
    		} else {
    			print_r('
				        <div>
				         <hr>
				            <input placeholder="Nombre y apellido/Institución"  name="nombre_ref[]" value="'.$referentes[$i]->nombre.'">
				            <input placeholder="Localidad..."  name="localidad_ref[]" value="'.$referentes[$i]->localidad.'">
				            <input placeholder="Telefono..."  name="telefono_ref[]" value="'.$referentes[$i]->telefono.'">
				            <a href="#" class="remover_campo">Remover</a>
				        </div>
    				');
    		}
    	}
    }
    ?>
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MERCADO  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">

    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'mercado') {
              print_r('<div class="observacion"><b><p>Observación para MERCADO:</p></b><textarea readonly>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>
      <B><H2>MERCADO</H2></B>
      <div id="clientes_mercado">
        <p align="center"><b>PRINCIPALES CLIENTES - ¿Quién te compra?</b></p>
        <input type="button" id="add_cliente" value="adicionar">
        <br>
       <?php
	       if ($clientes) {
	       		$x = 0;
	       		for ($i=0; $i < count($clientes); $i++) {
	       			if ($x == 0) {
	       				print_r('<div>
					          <input placeholder="Nombre y apellido..." type="text" name="nombre_cliente[]" value="'.$clientes[$i]->nombre.'">
					          <input placeholder="Edad..." type="text" name="edad_cliente[]" value="'.$clientes[$i]->edad.'">
					          <input placeholder="Ubicación..." type="text" name="ubicacion_cliente[]" value="'.$clientes[$i]->ubicacion.'">
					          <input placeholder="Nivel socio-económico..." type="text" name="nivel_cliente[]" value="'.$clientes[$i]->nivelSocEconomico.'">
					          <input placeholder="Intereses..." type="text" name="intereses_cliente[]" value="'.$clientes[$i]->intereses.'">
					        </div>');
	       			 } else {
	       			 	print_r('<div>
	       			 		<hr>
					          <input placeholder="Nombre y apellido..." type="text" name="nombre_cliente[]" value="'.$clientes[$i]->nombre.'">
					          <input placeholder="Edad..." type="text" name="edad_cliente[]" value="'.$clientes[$i]->edad.'">
					          <input placeholder="Ubicación..." type="text" name="ubicacion_cliente[]" value="'.$clientes[$i]->ubicacion.'">
					          <input placeholder="Nivel socio-económico..." type="text" name="nivel_cliente[]" value="'.$clientes[$i]->nivelSocEconomico.'">
					          <input placeholder="Intereses..." type="text" name="intereses_cliente[]" value="'.$clientes[$i]->intereses.'">
					          <a href="#" class="remover_campo">Remover</a>
					        </div>');
	       			 }
	       			 $x++;
	       		}
	       }
	      ?>      
  		</div>
      <div id="proveedores_mercado">
        <p align="center"><b>PROVEEDORES ¿A quién le comprás tus materias primas o insumos?</b></p>
        <input type="button" id="add_proveedor" value="adicionar">
        <br>
        <?php 
        if ($proveedores) {
        	$x = 0;
        	for ($i=0; $i < count($proveedores); $i++) { 
        		if ($x == 0) {
        			print_r('<div>
					          <input placeholder="Nombre o razón social..." type="text" name="nombre_proveedor[]" value="'.$proveedores[$i]->nombre.'">
					          <input placeholder="Ubicación..." type="text" name="ubicacion_proveedor[]" value="'.$proveedores[$i]->ubicacion.'">
					          <input placeholder="Compra..." type="text" name="compra_proveedor[]" value="'.$proveedores[$i]->compra.'">
					        </div>');
        		} else {
        			print_r('<div>
        					<hr>
					          <input placeholder="Nombre o razón social..." type="text" name="nombre_proveedor[]" value="'.$proveedores[$i]->nombre.'">
					          <input placeholder="Ubicación..." type="text" name="ubicacion_proveedor[]" value="'.$proveedores[$i]->ubicacion.'">
					          <input placeholder="Compra..." type="text" name="compra_proveedor[]" value="'.$proveedores[$i]->compra.'">
					          <a href="#" class="remover_campo">Remover</a>
					        </div>');
	       		}
	       		$x++;
        	}
        }
        ?>
      </div>
      <div id="competencia_mercado">
        <p align="center"><b>COMPETENCIA ¿Quién vende lo mismo que vos o algo parecido?</b></p>
        <input type="button" id="add_competencia" value="adicionar">
        <br>
        <?php 
        if ($competencias) {
        	$x = 0;
        	for ($i=0; $i < count($competencias); $i++) { 
        		if ($x == 0) {
        			print_r('<div>
					          <input placeholder="Nombre o razón social..." type="text" name="nombre_competencia[]" value="'.$competencias[$i]->nombre.'">
					          <input placeholder="Ubicación..." type="text" name="ubicacion_competencia[]" value="'.$competencias[$i]->ubicacion.'">
					          <input placeholder="Qué ofrece..." type="text" name="ofrece_competencia[]" value="'.$competencias[$i]->ofrece.'">
					        </div>');
        		} else {
        			print_r('<div>
        					<hr>
					          <input placeholder="Nombre o razón social..." type="text" name="nombre_competencia[]" value="'.$competencias[$i]->nombre.'">
					          <input placeholder="Ubicación..." type="text" name="ubicacion_competencia[]" value="'.$competencias[$i]->ubicacion.'">
					          <input placeholder="Qué ofrece..." type="text" name="ofrece_competencia[]" value="'.$competencias[$i]->ofrece.'">
					          <a href="#" class="remover_campo">Remover</a>
					        </div>');
	       		}
	       		$x++;
        	}
        }
        ?>
      </div>
      <p align="center"><b>¿CUÁL SERÍA TU VENTAJA EN COMPARACIÓN CON LOS COMPETIDORES? ¿Cómo te diferencias?</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="ventajaCompetidores" maxlength="254"><?= $formularioEnviado->ventajaCompetidores ?></textarea></p>
      <p align="center"><b>ESTRATEGIAS DE PROMOCIÓN QUE UTILIZARÁ ¿Cómo vas a hacer conocer tu producto o servicio?</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="estrategiasPromocion" maxlength="254"><?= $formularioEnviado->estrategiasPromocion ?></textarea></p>
      <p align="center"><b>PUNTOS DE VENTA ¿Dónde vas a vender?</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="puntosVenta" maxlength="254"><?= $formularioEnviado->puntosVenta ?></textarea></p> 
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ PRODUCCIÓN - COSTOS - RESULTADOS  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">

    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'prodCostResultados') {
              print_r('<div class="observacion"><b><p>Observación para PRODUCCIÓN - COSTOS - RESULTADOS:</p></b><textarea readonly>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>
      <h2><b>PRODUCCIÓN - COSTOS - RESULTADOS</b></h2>
      <p align="center"><b>MATERIAS PRIMAS O INSUMOS QUE SE NECESITAN</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="materiasPrimas" maxlength="254"><?= $formularioEnviado->materiasPrimas ?></textarea></p>
      <p align="center"><b>HERRAMIENTAS O MAQUINARIAS NECESARIAS PARA PRODUCIR O BRINDAR EL SERVICIO</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="descHerramientas" maxlength="254"><?= $formularioEnviado->descHerramientas ?></textarea></p>
      <!-- ITEM DINAMICO VENTAS -->
        <div id="ventas_financiamiento">
          <p align="center"><b>VOLUMEN ESTIMADO DE VENTAS AL MES DE EJECUTAR EL FINANCIAMIENTO</b></p>
          <input type="button" id="add_venta" value="adicionar">
          <br>
         <?php 
	     $totalVentas = 0;
	        if ($ventas) {
	        	$x = 0;
	        	for ($i=0; $i < count($ventas); $i++) { 
	        		if ($x == 0) {
	        			print_r('<div id="ventas">
					              <input placeholder="Producto o servicio..." type="text" name="nombre_producto[]" value="'.$ventas[$i]->producto.'" >
					              <input placeholder="Unidad de medida..." id="ud_medida" type="text" name="unidad_medida[]" value="'.$ventas[$i]->udMedida.'">
					                  <div align="center">
					                    <input placeholder="Cantidad por año" type="text" name="cant_anio[]" id="cant_anio" class="ventas_grande" value="'.$ventas[$i]->cantAnio.'">
					                    <input placeholder="Precio..." type="text" name="precio[]" id="precio" class="ventas_grande" value="'.$ventas[$i]->precio.'">
					                    <input placeholder= "Total" type="text" name="total[]" id="total" class="ventas_total" readonly value="'.$ventas[$i]->cantAnio * $ventas[$i]->precio.'">
					                  </div>
					            </div>');
	        			$totalVentas += $ventas[$i]->cantAnio * $ventas[$i]->precio;
	        		} else {
	        			print_r('<div id="ventas">
	        				<hr>
					              <input placeholder="Producto o servicio..." type="text" name="nombre_producto[]" value="'.$ventas[$i]->producto.'" >
					              <input placeholder="Unidad de medida..." id="ud_medida" type="text" name="unidad_medida[]" value="'.$ventas[$i]->udMedida.'">
					                  <div align="center">
					                    <input placeholder="Cantidad por año" type="text" name="cant_anio[]" id="cant_anio" class="ventas_grande" value="'.$ventas[$i]->cantAnio.'">
					                    <input placeholder="Precio..." type="text" name="precio[]" id="precio" class="ventas_grande" value="'.$ventas[$i]->precio.'">
					                    <input placeholder= "Total" type="text" name="total[]" id="total" class="ventas_total" readonly value="'.$ventas[$i]->cantAnio * $ventas[$i]->precio.'">
					                  </div>
					                <a href="#" class="remover_campo">Remover</a>
					            </div>');
	        			$totalVentas += $ventas[$i]->cantAnio * $ventas[$i]->precio;
		       		}
		       		$x++;
	        	}
	        }
	        ?>
        </div>
      <!-- FIN ITEM DINAMICO VENTAS -->
      <p align="center">TOTAL:</p>
      <p><input placeholder= "Total" type="text" name="total_completo" id="total_completo" value="<?= $totalVentas ?>" readonly></p>
      <div style="border-top: 2px solid #4CAF50;display: inline-block;width: 100%;"></div>
      <div id="costos_emprendimiento" class="costosEmprendimiento" align="center">
          <p><b>OTROS COSTOS DEL EMPRENDIMIENTO</b></p>
          <div>
            <p><label>Insumos y materias primas:</label></p>
            <input placeholder="Insumos y materias primas..." class="sumable" maxlength="10" name="insumosCostos" id="insumos_materias" value="<?= $formularioEnviado->insumosCostos ?>">
          </div>

          <div>
            <p><label >Alquileres:</label></p>
            <input placeholder="Alquileres..." class="sumable" maxlength="10" name="alquileresCostos" id="alquileres" value="<?= $formularioEnviado->alquileresCostos ?>">
          </div>

          <div>
            <p><label>Servicios(luz-agua-gas-internet)</label></p>
            <input placeholder="Servicios(luz-agua-gas-internet)..." class="sumable" maxlength="10" name="serviciosCostos" id="servicios_otros" value="<?= $formularioEnviado->serviciosCostos ?>">
          </div>
          <div>
            <p><label>Monotributo</label></p>
            <input placeholder="Monotributo..." class="sumable" maxlength="10" name="monotributoCostos" id="monotributo_otros" value="<?= $formularioEnviado->monotributoCostos ?>">
          </div>
          <div>
            <p><label>Ingresos brutos</label></p>
            <p><input placeholder="Ingresos brutos..." class="sumable" maxlength="10" name="ingresosBrutosCostos" id="ingresos_brutos" value="<?= $formularioEnviado->ingresosBrutosCostos ?>"></p>
          </div>
          <div>
            <p><label>Seguros</label></p>
            <p><input placeholder="Seguros..." class="sumable" maxlength="10" name="segurosCostos" id="seguros_otros" value="<?= $formularioEnviado->segurosCostos ?>"></p>
          </div>
          <div>
            <p><label>Combustible</label></p>
            <p><input placeholder="Combustible..." class="sumable" maxlength="10" name="combustibleCostos" id="combustible_otros" value="<?= $formularioEnviado->combustibleCostos ?>"></p>
          </div>
          <div>
            <p><label>Sueldos</label></p>
            <p><input placeholder="Sueldos..." class="sumable" maxlength="10" name="sueldosCostos" id="sueldos_otros" value="<?= $formularioEnviado->sueldosCostos ?>"></p>
          </div>
          <div>
            <p><label>Comercialización</label></p>
            <p><input placeholder="Comercializacion..." class="sumable" maxlength="10" name="comercializacionCostos" id="comercializacion" value="<?= $formularioEnviado->comercializacionCostos ?>"></p>
          </div>
          <div>
            <p><label>Otros</label></p>
            <p><input placeholder="Otros..." class="sumable" maxlength="10" name="otrosCostos" id="otros" value="<?= $formularioEnviado->otrosCostos ?>"></p>
          </div>
          <div>
            <p><label>Cuota Mensual</label></p>
            <p><input placeholder="Cuota mensual..." class="sumable" maxlength="10" name="cuotaMensualCostos" id="cuotamensual_otros" value="<?= $formularioEnviado->cuotaMensualCostos ?>"></p>
          </div>
            <p align="center">TOTAL</p>
            <p><input type="text" id="total_costos" name="total_costos" value="<?= Helpers::calcularTotalCostos($formularioEnviado); ?>"></p>
      </div>
      <!-- ITEM DINAMICO BIENES FINANCIAMIENTO -->
<div style="border-top: 2px solid #4CAF50;display: inline-block;width: 100%;"></div>
        <div id="financiamiento">
          <p align="center"><b>BIENES A FINANCIAR</b></p>
          <input type="button" id="add_itemFinan" value="adicionar">
          <div id="item_financiamiento">
         	<?php
	        if ($items) {
	        	$x = 0;
	        	for ($i=0; $i < count($items); $i++) { 
	        		echo '<div class="item_bien">';
	        		if ($x == 0) {
	        			echo '<p>'.Helpers::opcionSelectItems($items[$i]->nombreItem).'</p>';
	        			print_r('
              <p class="monto_bienes">
                <input placeholder="Descripcion" type="text" name="descItemFinan[]" value="'.$items[$i]->descripcion.'">
              </p>
              <div align="center">
                      <input placeholder="Cantidad por año" class="multiplo" type="text" name="cantAnioItemFinan[]" id="cant_anio" class="ventas_grande" value="'.$items[$i]->cantidad.'">
                      <input placeholder="Precio..." class="multiplo" type="text" name="precioItemFinan[]" id="precio" value="'.$items[$i]->precioUnitario.'">
                      <input placeholder= "Total" type="text" id="totalItems" class="ventas_total" value="'.$items[$i]->cantidad*$items[$i]->precioUnitario.'" readonly>
              </div><br></div>');
	        		} else {
	        			echo '<p>'.Helpers::opcionSelectItems($items[$i]->nombreItem).'</p>';
	        			print_r('
			              <p class="monto_bienes">
			              <input type="hidden" name="idItemFinan[]" value="'.$items[$i]->id.'" >
			                <input placeholder="Descripcion" type="text" name="descItemFinan[]" value="'.$items[$i]->descripcion.'">
			              </p>
			              <div align="center">
			                      <input placeholder="Cantidad por año" class="multiplo" type="text" name="cantAnioItemFinan[]" id="cant_anio" class="ventas_grande" value="'.$items[$i]->cantidad.'">
			                      <input placeholder="Precio..." class="multiplo" type="text" name="precioItemFinan[]" id="precio" value="'.$items[$i]->precioUnitario.'">
			                      <input placeholder= "Total" type="text" id="totalItems" class="ventas_total" value="'.$items[$i]->cantidad*$items[$i]->precioUnitario.'" readonly>
			              </div><br><a href="#" class="remover_campo">Remover</a></div>');
		       		}
		       		$x++;
	        	}
	        }
	        ?>
          </div>
        </div>
         <!-- FIN ITEM DINAMICO BIENES FINANCIAMIENTO -->
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MANIFESTACIÓN DE LOS BIENES DEL EMPRENDEDOR  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
        <div class="tab">

    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'mbe') {
              print_r('<div class="observacion"><b><p>Observación para MANIFESTACIÓN DE LOS BIENES DEL EMPRENDEDOR:</p></b><textarea readonly>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>
    <b><h2>MANIFESTACIÓN DE LOS BIENES DEL EMPRENDEDOR</h2></b>

    <div class="float-container">
      <label>Nombre y apellido</label>
      <input type="text" data-placeholder="Ingresar nombre y Apellido..." maxlength="43" name="nombreMBE" id="nombre_mbe" value="<?= $formularioEnviado->nombreMBE ?>">
    </div>
    <div class="float-container">
      <label>DNI</label>
      <input type="text" data-placeholder="Ingresar DNI..." maxlength="11" name="dniMBE" value="<?= $formularioEnviado->dniMBE ?>">
    </div>
    <div class="float-container">
      <label>CUIT</label>
      <input type="text" data-placeholder="Ingresar CUIT..." maxlength="20" name="cuitMBE" value="<?= $formularioEnviado->cuitMBE ?>">
    </div>
    <div class="float-container">
      <label>Localidad</label>
      <input type="text" data-placeholder="Ingresar Localidad..." maxlength="43" name="localidadMBE" value="<?= $formularioEnviado->localidadMBE ?>">
    </div>
    <div class="float-container">
      <label>Domicilio</label>
      <input type="text" data-placeholder="Ingresar Domicilio..." maxlength="43" name="domicilioMBE" value="<?= $formularioEnviado->domicilioMBE ?>">
    </div>

    <div id="bienes_emprendedor">

      <div id="disponibilidades">
          <p align="center">DISPONIBILIDADES</p>
          <input type="button" id="add_disponibilidad" value="adicionar">
          <?php
          if (!empty($disponibilidades)) {
            Helpers::crearPatrimonioEmprendedor('DISPONIBILIDADES',$disponibilidades);
           }
          ?>      
      </div>
      <div id="bienes_cambio">
          <p align="center">BIENES DE CAMBIO</p>
          <input type="button" id="add_bien" value="adicionar">
          <?php
          if (!empty($bienes_cambio)) {
            Helpers::crearPatrimonioEmprendedor('BIENES DE CAMBIO',$bienes_cambio);
           }
          ?>      
      </div>
      <div id="bienes_uso">
          <p align="center">BIENES DE USO</p>
          <input type="button" id="add_bienuso" value="adicionar">
          <?php
          if (!empty($bienes_uso)) {
            Helpers::crearPatrimonioEmprendedor('BIENES DE USO',$bienes_uso);
           }
          ?>      
      </div>
      <hr>
      <div id="deudas_comerciales">
          <p align="center">DEUDAS COMERCIALES</p>
          <input type="button" id="add_deudacomercial" value="adicionar">
          <?php
          if (!empty($deudas_comerciales)) {
            Helpers::crearPatrimonioEmprendedor('DEUDAS COMERCIALES',$deudas_comerciales);
           }
          ?>      
      </div>
      <div id="deudas_bancarias">
          <p align="center">DEUDAS BANCARIAS</p>
          <input type="button" id="add_deudabancaria" value="adicionar">
          <?php
          if (!empty($deudas_bancarias)) {
            Helpers::crearPatrimonioEmprendedor('DEUDAS BANCARIAS',$deudas_bancarias);
           }
          ?>      
      </div>
      <div id="deudas_fiscales">
          <p align="center">DEUDAS FISCALES</p>
          <input type="button" id="add_deudafiscal" value="adicionar">
          <?php
          if (!empty($deudas_fiscales)) {
            Helpers::crearPatrimonioEmprendedor('DEUDAS FISCALES',$deudas_fiscales);
           }
          ?>      
      </div>

    </div>
        
        <p><input placeholder="Otras deudas..." maxlength="10" type="text" name="otras_deudas" value="<?=$formularioEnviado->otrasDeudasMBE?>"></p>
    </div>
   
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MANIFESTACIÓN DE LOS BIENES DEL GARANTE  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">

    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'mbg') {
              print_r('<div class="observacion"><b><p>Observación para MANIFESTACIÓN DE LOS BIENES DEL GARANTE:</p></b><textarea readonly>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>

    <h2><b>MANIFESTACIÓN DE LOS BIENES DEL GARANTE</b></h2>

    <div class="float-container">
      <label>Nombre y apellido</label>
      <input type="text" data-placeholder="Ingresar nombre y Apellido..." maxlength="43" name="nombreMBG" value="<?= $formularioEnviado->nombreMBG ?>">
    </div>
    <div class="float-container">
      <label>DNI</label>
      <input type="text" data-placeholder="Ingresar DNI..." maxlength="11" name="dniMBG" value="<?= $formularioEnviado->dniMBG ?>">
    </div>
    <div class="float-container">
      <label>CUIT</label>
      <input type="text" data-placeholder="Ingresar CUIT..." maxlength="20" name="cuitMBG" value="<?= $formularioEnviado->cuitMBG ?>">
    </div>
    <div class="float-container">
      <label>Localidad</label>
      <input type="text" data-placeholder="Ingresar Localidad..." maxlength="43" name="localidadMBG" value="<?= $formularioEnviado->localidadMBG ?>">
    </div>
    <div class="float-container">
      <label>Domicilio</label>
      <input type="text" data-placeholder="Ingresar Domicilio..." maxlength="43" name="domicilioMBG">
    </div>

    <div id="bienes_garante">

       <div id="disponibilidades_g">
          <p align="center">DISPONIBILIDADES</p>
          <input type="button" id="add_disponibilidad_g" value="adicionar">
          <?php
          if (!empty($disponibilidades)) {
            Helpers::crearPatrimonioGarante('DISPONIBILIDADES',$disponibilidades);
           }
          ?>      
      </div>
      <div id="bienes_cambio_g">
          <p align="center">BIENES DE CAMBIO</p>
          <input type="button" id="add_bien_g" value="adicionar">
          <?php
          if (!empty($bienes_cambio)) {
            Helpers::crearPatrimonioGarante('BIENES DE CAMBIO',$bienes_cambio);
           }
          ?>      
      </div>
      <div id="bienes_uso_g">
          <p align="center">BIENES DE USO</p>
          <input type="button" id="add_bienuso_g" value="adicionar">
          <?php
          if (!empty($bienes_uso)) {
            Helpers::crearPatrimonioGarante('BIENES DE USO',$bienes_uso);
           }
          ?>      
      </div>
      <hr>
      <div id="deudas_comerciales_g">
          <p align="center">DEUDAS COMERCIALES</p>
          <input type="button" id="add_deudacomercial_g" value="adicionar">
          <?php
          if (!empty($deudas_comerciales)) {
            Helpers::crearPatrimonioGarante('DEUDAS COMERCIALES',$deudas_comerciales);
           }
          ?>      
      </div>
      <div id="deudas_bancarias_g">
          <p align="center">DEUDAS BANCARIAS</p>
          <input type="button" id="add_deudabancaria_g" value="adicionar">
          <?php
          if (!empty($deudas_bancarias)) {
            Helpers::crearPatrimonioGarante('DEUDAS BANCARIAS',$deudas_bancarias);
           }
          ?>      
      </div>
      <div id="deudas_fiscales_g">
          <p align="center">DEUDAS FISCALES</p>
          <input type="button" id="add_deudafiscal_g" value="adicionar">
          <?php
          if (!empty($deudas_fiscales)) {
            Helpers::crearPatrimonioGarante('DEUDAS FISCALES',$deudas_fiscales);
           }
          ?>      
      </div>
        
        <p><input placeholder="Otras deudas..." type="text" name="otras_deudas_g" value="<?=$formularioEnviado->otrasDeudasMBG?>"></p>
    </div>
   
    </div>

    <!-- FIN-->

      <div style="overflow:auto;">
        <div style="float:right;">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
        </div>
      </div>
    </div>
            <p align="center"><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>

  <!-- Circles which indicates the steps of the form: -->
</form>
<script type="text/javascript" src="../../resources/assets/js/autocomplete.js"></script>
  <script type="text/javascript">
    $(function() {
    $('input').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
});
  </script>
      <script type="text/javascript">
      $(".validar").change(function() {
     $(this).val(this.checked ? "1" : "0");
     console.log(this.value);
    });

    </script>
 <script>
autocomplete(document.getElementById("localidadSolicitante"), countries);
</script> 
<script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/add_campos_ref.js'?>"></script>
<script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/add_campos_clientes.js'?>"></script>
<script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/add_campos_proveedores.js'?>"></script>
<script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/add_campos_competencia.js'?>"></script>
<script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/add_campos_ventas.js'?>"></script>
<script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/calculo_ventas.js'?>"></script>
<script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/calculo_servicios.js'?>"></script>
<script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/items.js'?>"></script>
 <script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/bienes_emprendedor.js'?>"></script>
 <script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/bienes_garante.js'?>"></script>
 <script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/rules_validation.js'?>"></script>
 
    <script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/calculo_items.js'?>"></script>
    <script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/add_campos_items.js'?>"></script>
     <script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/nombreInputsStyle.js'?>"></script>

<script type="text/javascript">
  $(document).ready(function(){
        //FORMATO DE MASCARAS
        $('#cuit_emprendimiento').mask('00-00000000-0');
        $('#dni_emprendedor').mask('00000000'); //placeholder
        $('#inicio_emprendimiento').mask('00-00-0000');
        $('#fecha_institucion').mask('00-00-0000');
        $('#monto').mask("0000000");
        $('#ingresoMensual').mask("0000000");
        $('#ingresosBrutos').mask("0000000");
        $('#montoMes').mask("0000000");
        $('#ingresoGenerales').mask("0000000");
        $('#montoAporte').mask("0000000");
      });
</script>
<script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/tabScript.js'?>"></script>

</body>
</html>