<?php 
use App\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
  <title>CREAR - Linea emprendedor - Datos del formulario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
</head>
<body>


<h2 align="center">FORMULARIO Nº <?= $formularioEnviado->numeroProyecto; ?></h2>
<div id="content">
<div class="w3-row">
  <div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white">
  <table class="w3-table-all">
    <thead>
      <tr class="w3-green">
        <th colspan="2" style="text-align: center;font-size: 18px;">Portada</th>
      </tr>
    </thead>
    <tr>
      <th>Título del proyecto</th>
      <td><?= $formularioEnviado->tituloProyecto; ?></td>
    </tr>
    <tr>
      <th>Nombre y apellido del solicitante:</th>
      <td><?= $formularioEnviado->nombreSolicitante; ?></td>
    </tr>
    <tr>
      <th>Localidad</th>
      <td><?= $formularioEnviado->localidadSolicitante; ?></td>
    </tr>
    <tr>
      <th>Agencia</th>
      <td><?= $formularioEnviado->agenciaProyecto; ?></td>
    </tr>
    <tr>
      <th>Número de proyecto</th>
      <td><?= $formularioEnviado->numeroProyecto; ?></td>
    </tr>
    <tr>
      <th>Monto solicitado</th>
      <td><?= $formularioEnviado->montoSolicitado; ?></td>
    </tr>
    <tr>
      <th>Fecha de presentación del proyecto</th>
      <td><?= $formularioEnviado->fecPresentacionProyecto; ?></td>
    </tr>
    <tr>
    	<th colspan="2" style="text-align: center;">BREVE DESCRIPCIÓN DEL EMPRENDIMIENTO Y JUSTIFICACIÓN DE LA NECESIDAD DE FINANCIAMIENTO</th>
   	</tr>
   	<tr>
   		<td><?= $formularioEnviado->descEmprendimiento; ?></td>
   	</tr>
  </table>
  <br>

  										<!-- DATOS PERSONALES DEL EMPRENDEDOR -->
  <table class="w3-table-all">
      <thead>
      <tr class="w3-green">
        <th colspan="2" style="text-align: center;font-size: 18px;">Datos personales del Emprendedor</th>
      </tr>
    </thead>
    <tr>
      <th>Nombre y apellido</th>
      <td><?= $formularioEnviado->nombreEmprendedor; ?></td>
    </tr>
    <tr>
      <th>DNI:</th>
      <td><?= $formularioEnviado->dniEmprendedor; ?></td>
    </tr>
    <tr>
      <th>Localidad</th>
      <td><?= $formularioEnviado->localidadEmprendedor; ?></td>
    </tr>
    <tr>
      <th>Domicilio</th>
      <td><?= $formularioEnviado->domicilioEmprendedor; ?></td>
    </tr>
    <tr>
      <th>Teléfono</th>
      <td><?= $formularioEnviado->telefonoEmprendedor; ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?= $formularioEnviado->emailEmprendedor; ?></td>
    </tr>
    <tr>
      <th>Facebook</th>
      <td><?= $formularioEnviado->facebookEmprendedor; ?></td>
    </tr>
    <tr>
      <th>Grado de instrucción</th>
      <td><?= $formularioEnviado->gradoInstruccion; ?></td>
    </tr>
    <tr>
      <th>Otra ocupación que desarrolle en la actualidad</th>
      <td><?= $formularioEnviado->otraOcupacion; ?></td>
    </tr>
    <tr>
      <th>Ingreso mensual</th>
      <td><?= $formularioEnviado->ingresoMensual; ?></td>
    </tr>
    <tr>
      <th>Deseo capacitación</th>
      <td><?= $formularioEnviado->deseoCapacitacion; ?></td>
    </tr>
  </table>
  <br>
  														<!--EMPRENDIMIENTO-->
  <table class="w3-table-all">
      <thead>
      <tr class="w3-green">
        <th colspan="2" style="text-align: center;font-size: 18px;">EMPRENDIMIENTO</th>
      </tr>
    </thead>
    <tr>
      <th>Actividad principal</th>
      <td><?= $formularioEnviado->actPrincipalEmprendimiento; ?></td>
    </tr>
    <tr>
      <th>Fecha de inicio a la actividad</th>
      <td><?= $formularioEnviado->fecInicioEmprendimiento; ?></td>
    </tr>
    <tr>
      <th>Antiguedad</th>
      <td><?= $formularioEnviado->antiguedadEmprendimiento; ?></td>
    </tr>
    <tr>
      <th>Número de CUIT</th>
      <td><?= $formularioEnviado->cuitEmprendimiento; ?></td>
    </tr>
    <tr>
      <th>Número de ingresos brutos</th>
      <td><?= $formularioEnviado->ingresosBrutosEmprendimiento; ?></td>
    </tr>
    <tr>
      <th>Domicilio real</th>
      <td><?= $formularioEnviado->domicilioEmprendimiento; ?></td>
    </tr>
    <tr>
      <th>Localidad</th>
      <td><?= $formularioEnviado->localidadEmprendimiento; ?></td>
    </tr>
    <tr>
      <th>El lugar donde se desarrolla es</th>
      <td><?= $formularioEnviado->lugarEmprendimiento; ?></td>
    </tr>
    <tr>
      <th colspan="2" style="text-align: center;">Detalle el-los productos o servicios que ofrecerá</th>
    </tr>
    <tr>
      <td><?= $formularioEnviado->descProdServicios; ?></td>
    </tr>
    <tr>
      <th colspan="2" style="text-align: center;">¿Ha recibido aportes o créditos de organismos públicos para el desarrollo del proyecto?</th>
    </tr>
    <tr>
      <th>Institución</th>
      <td><?= $formularioEnviado->institucionAporte; ?></td>
    </tr>
    <tr>
      <th>Fecha</th>
      <td><?= $formularioEnviado->fecAporte; ?></td>
    </tr>
    <tr>
      <th>Monto</th>
      <td><?= $formularioEnviado->montoAporte; ?></td>
    </tr>
    <tr>
      <th>Tipo</th>
      <td><?= $formularioEnviado->tipoAporte; ?></td>
    </tr>
    <tr>
      <th>Estado</th>
      <td><?= $formularioEnviado->estadoAporte; ?></td>
    </tr>
    <tr>
    	<th colspan="2" style="text-align: center;">Experiencia o formación de el/los emprendedores para el desarrollo del emprendimiento</th>
    </tr>
    <tr>
    	<td><?= $formularioEnviado->experienciaEmprendedores ?></td>
    </tr>
  </table>
  <br>
  											<!-- ASPECTOS SOCIALES -->
  <table class="w3-table-all">
      <thead>
      <tr class="w3-green">
        <th colspan="2" style="text-align: center;font-size: 18px;">Aspectos sociales</th>
      </tr>
    </thead>
    <tr>
      <th>Situación laboral actual</th>
      <td><?= $formularioEnviado->situacionLaboral; ?></td>
    </tr>
    <tr>
      <th>Aclaraciones</th>
      <td><?= $formularioEnviado->aclaracionesGenerales; ?></td>
    </tr>
    <tr>
      <th>Ingreso </th>
      <td><?= $formularioEnviado->ingresoGenerales; ?></td>
    </tr>
    <tr>
      <th>Percepciones sociales</th>
      <td><?= $formularioEnviado->percepcionesSociales; ?></td>
    </tr>
    <tr>
      <th>Monto total al mes de percepciones sociales</th>
      <td><?= $formularioEnviado->montoMesPercepciones; ?></td>
    </tr>
    <tr>
      <th>Cantidad de personas que tiene a cargo</th>
      <td><?= $formularioEnviado->cantPersonasCargo; ?></td>
    </tr>
    <tr>
      <th>El lugar donde habito es</th>
      <td><?= $formularioEnviado->lugarHabita; ?></td>
    </tr>
    <tr>
      <th colspan="2" class="w3-white" style="text-align: center;">Personas o instituciones que pueden dar referencias sobre el emprendedor</th>
    </tr>
  </table><br>
    <?php Helpers::crearRegistrosDatos("Referentes", $referentes); ?>
  <br>
  											<!-- MERCADO -->
  <table class="w3-table-all">
      <thead>
      <tr class="w3-green">
        <th colspan="5" style="text-align: center;font-size: 18px;">Mercado</th>
      </tr>
    </thead>
  </table>
      
      <?php Helpers::crearRegistrosDatos("Clientes",$clientes); ?>
    <br>
    	<?php Helpers::crearRegistrosDatos("Proveedores",$proveedores); ?>
    <br>
    	<?php Helpers::crearRegistrosDatos("Competencias",$competencias); ?>

    <br>
    <table class="w3-table-all">
	    <thead>
	      	<tr>
	        	<th style="text-align: center;">¿CUÁL SERÍA TU VENTAJA EN COMPARACIÓN CON LOS COMPETIDORES? ¿Cómo te diferencias?</th>
	      	</tr>
	    </thead>
    	<tr>
      		<td><?= $formularioEnviado->ventajaCompetidores; ?></td>
    	</tr>
  	</table>
  <br>
      <table class="w3-table-all">
	    <thead>
	      	<tr class="w3-green">
	        	<th style="text-align: center;">Comercialización</th>
	      	</tr>
	    </thead>
	    <tr>
	    	<th style="text-align: center;">ESTRATEGIAS DE PROMOCIÓN QUE UTILIZARÁ ¿Cómo vas a hacer conocer tu producto o servicio?</th>
	    </tr>
    	<tr>
      		<td><?= $formularioEnviado->estrategiasPromocion; ?></td>
    	</tr>
    	<tr>
	    	<th style="text-align: center;">PUNTOS DE VENTA ¿Dónde vas a vender?</th>
	    </tr>
    	<tr>
      		<td><?= $formularioEnviado->puntosVenta; ?></td>
    	</tr>
  	</table>
  	<br>
    <table class="w3-table-all">
      <thead>
          <tr class="w3-green">
            <th style="text-align: center;">Proceso productivo</th>
          </tr>
      </thead>
      <tr>
        <th style="text-align: center;">Materias primas o insumos que se necesitan</th>
      </tr>
      <tr>
          <td><?= $formularioEnviado->materiasPrimas; ?></td>
      </tr>
      <tr>
        <th style="text-align: center;">Herramientas o maquinarias necesarias para producir o brindar el servicio</th>
      </tr>
      <tr>
          <td><?= $formularioEnviado->descHerramientas; ?></td>
      </tr>
    </table>
    <br>
      <?php Helpers::crearDatosVentas($ventas); ?>
    <br>
    <table class="w3-table-all">
        <thead>
        <tr>
          <th class="w3-green" colspan="5" style="text-align: center;font-size: 16px;">OTROS COSTOS DEL EMPRENDIMIENTO</th>
        </tr>
        <tr>
          <th style="text-align: center">TIPO</th>
          <th>AL AÑO</th>
        </tr>
      </thead>
        <tr>
          <td>INSUMOS Y MATERIAS PRIMAS</td>
          <td style="text-align: center;"><?= $formularioEnviado->insumosCostos ?></td>
        </tr>
        <tr>
          <td>ALQUILERES</td>
          <td style="text-align: center;"><?= $formularioEnviado->alquileresCostos?></td>
        </tr>
        <tr>
          <td>SERVICIOS (LUZ-AGUA-GAS-INTERNET)</td>
          <td style="text-align: center;"><?= $formularioEnviado->serviciosCostos?></td>
        </tr>
        <tr>
          <td>MONOTRIBUTO</td>
          <td style="text-align: center;"><?= $formularioEnviado->monotributoCostos ?></td>
        </tr>
        <tr>
          <td>INGRESOS BRUTOS</td>
          <td style="text-align: center;"><?= $formularioEnviado->ingresosBrutosCostos ?></td>
        </tr>
        <tr>
          <td>SEGUROS</td>
          <td style="text-align: center;"><?= $formularioEnviado->segurosCostos ?></td>
        </tr>
        <tr>
          <td>COMBUSTIBLE</td>
          <td style="text-align: center;"><?= $formularioEnviado->combustibleCostos ?></td>
        </tr>
        <tr>
          <td>SUELDOS</td>
          <td style="text-align: center;"><?= $formularioEnviado->sueldosCostos ?></td>
        </tr>
        <tr>
          <td>COMERCIALIZACIÓN</td>
          <td style="text-align: center;"><?= $formularioEnviado->comercializacionCostos ?></td>
        </tr>
        <tr>
          <td>OTROS</td>
          <td style="text-align: center;"><?= $formularioEnviado->otrosCostos ?></td>
        </tr>
        <tr>
          <td>CUOTA MENSUAL</td>
          <td style="text-align: center;"><?= $formularioEnviado->segurosCostos ?></td>
        </tr>
        <tr>
          <th>TOTAL </th>
          <td style="text-align: center;"><?= Helpers::calcularTotalCostos($formularioEnviado); ?></td>
        </tr>
    </table>
    <br>
    <?php Helpers::crearRegistrosDatos("BIENES FINANCIAMIENTO",$itemsFinan); ?>
    <br>
    <?php Helpers::calcularBienesFinanciamiento($itemsFinan); ?>
    <br>
    <table class="w3-table-all">
        <thead>
        <tr>
          <th class="w3-green" colspan="5" style="text-align: center;font-size: 16px;">MANIFESTACIÓN DE BIENES EMPRENDEDOR</th>
        </tr>
      </thead>
        <tr>
          <th>Nombre y apellido</th>
          <td style="text-align: center;"><?= $formularioEnviado->nombreMBE ?></td>
        </tr>
        <tr>
          <th>DNI</th>
          <td style="text-align: center;"><?= $formularioEnviado->dniMBE ?></td>
        </tr>
        <tr>
          <th>CUIT</th>
          <td style="text-align: center;"><?= $formularioEnviado->cuitMBE ?></td>
        </tr>
        <tr>
          <th>Localidad</th>
          <td style="text-align: center;"><?= $formularioEnviado->localidadMBE ?></td>
        </tr>
        <tr>
          <th>Domicilio</th>
          <td style="text-align: center;"><?= $formularioEnviado->domicilioMBE ?></td>
        </tr>
    </table>
    <br>
    <h2 align="center">PATRIMONIO EMPRENDEDOR</h2>
    <?php Helpers::crearRegistrosDatos("DISPONIBILIDADES",$disponibilidades); ?>
    <?php Helpers::crearRegistrosDatos("BIENES DE CAMBIO",$bienes_cambio); ?>
    <?php Helpers::crearRegistrosDatos("BIENES DE USO",$bienes_uso); ?>
    <?php Helpers::crearRegistrosDatos("DEUDAS COMERCIALES",$deudas_comerciales); ?>
    <?php Helpers::crearRegistrosDatos("DEUDAS BANCARIAS",$deudas_bancarias); ?>
    <?php Helpers::crearRegistrosDatos("DEUDAS FISCALES",$deudas_fiscales); ?>
    <br>
    <?php 
    $bienes = array($disponibilidades,$bienes_cambio,$bienes_uso);
    $deudas = array($deudas_comerciales,$deudas_bancarias,$deudas_fiscales);
    echo Helpers::calcularTotalManifestacion($bienes,$deudas,$formularioEnviado->otrasDeudasMBE);?>
    <br>
    <table class="w3-table-all">
        <thead>
        <tr>
          <th class="w3-green" colspan="5" style="text-align: center;font-size: 16px;">MANIFESTACIÓN DE BIENES GARANTE</th>
        </tr>
      </thead>
        <tr>
          <th>Nombre y apellido</th>
          <td style="text-align: center;"><?= $formularioEnviado->nombreMBG ?></td>
        </tr>
        <tr>
          <th>DNI</th>
          <td style="text-align: center;"><?= $formularioEnviado->dniMBG ?></td>
        </tr>
        <tr>
          <th>CUIT</th>
          <td style="text-align: center;"><?= $formularioEnviado->cuitMBG ?></td>
        </tr>
        <tr>
          <th>Localidad</th>
          <td style="text-align: center;"><?= $formularioEnviado->localidadMBG ?></td>
        </tr>
        <tr>
          <th>Domicilio</th>
          <td style="text-align: center;"><?= $formularioEnviado->domicilioMBG ?></td>
        </tr>
    </table> 
    <br>
    <h2 align="center">PATRIMONIO GARANTES</h2>
    <?php Helpers::crearRegistrosDatos("DISPONIBILIDADES",$disponibilidades_g); ?>
    <?php Helpers::crearRegistrosDatos("BIENES DE CAMBIO",$bienes_cambio_g); ?>
    <?php Helpers::crearRegistrosDatos("BIENES DE USO",$bienes_uso_g); ?>
    <?php Helpers::crearRegistrosDatos("DEUDAS COMERCIALES",$deudas_comerciales_g); ?>
    <?php Helpers::crearRegistrosDatos("DEUDAS BANCARIAS",$deudas_bancarias_g); ?>
    <?php Helpers::crearRegistrosDatos("DEUDAS FISCALES",$deudas_fiscales_g); ?>
    <br>
    <?php
    $bienes_g = [$disponibilidades_g,$bienes_cambio_g,$bienes_uso_g];
    $deudas_g = array($deudas_comerciales_g,$deudas_bancarias_g,$deudas_fiscales_g);
     echo Helpers::calcularTotalManifestacion($bienes_g,$deudas_g,$formularioEnviado->otrasDeudasMBG); ?>
</div>
</div>
<div class="w3-col m1 w3-center"></div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

</body>
</html> 