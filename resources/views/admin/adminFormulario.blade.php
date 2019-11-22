<?php 
use App\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="_token" content="{{csrf_token()}}" />

  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <title>CREAR - FORMULARIO LÍNEA EMPRENDEDOR</title>
</head>
<body>
  <br>
  <h1>Línea Emprendedor</h1>
  <H3 align="center">Línea de créditos para emprendedores</H3>

<form id="regForm" action="{{route('agregarPortada')}}" method="POST">
  <a href="{{ url('/admin') }}"><button type="button">Volver a FORMULARIOS</button></a><br>
  <div class="barraCol1"></div>
  <div class="barraCol2"></div>
  <div class="barraCol3"></div>
  <div align="right">
      <button type="button" id="validar" style="background-color: #8bc34a;">Agregar revisión</button>
  </div>
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

<!-- Modal de REVISIÓN -->
<div id="verificacionModal" class="modal">

  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Verificar datos del formulario</h2>
    </div>
    <div style="overflow-x:auto;">
      <table id="tabla_verificacion" align="center">
        <tbody>
          
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <h3 align="center">
        <button  type="button" style="background-color:  #fff;color: green;" id="enviarValidacion"><b>CONFIRMAR</b></button></h3>
    </div>
  </div>

</div>
<!-- FIN DE Modal de REVISIÓN -->
  <div class="tab">
    <input type="input" name="idValidacion" id="idValidacion" value="<?=$pasosValidos->id?>" hidden>
    
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'portada') {
          print_r('<input type="input" id="'.$observaciones[$i]->hoja.'_id" value="'.$observaciones[$i]->id.'" hidden>'); 
              print_r('<div class="observacion"><p><b>Agregar observación para PORTADA:</b></p><textarea name=observaciones["'.$observaciones[$i]->hoja.'"]>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>


      <?php Helpers::crearCheckValido('portada',$pasosValidos->portada) ?>
    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="portada">OBSERVACIÓN</button>
      <p class="hoja" style="display: none;">portada</p>
      <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">PORTADA</p>
    <!-- ªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªª-->
    @if (\Session::has('success'))
    <div style="padding: 10px;background-color: #8bc34a;color: white;" align="center">
        <p style="color: white;font-family: 'Roboto';font-weight: bold;">{!! \Session::get('success') !!}</p>
    </div>
    @endif
      <input type="submit" name="agregarPortada" value="Agregar portada">
      <!-- hidden inputs -->
      <p><input type="hidden" name="idFormulario" id="idFormulario" value="<?=$id ?>"></p>
      <p><input type="hidden" name="idUsuario" value="<?=$formularioEnviado->idUsuario ?>"></p>
      <!-- fin hidden -->

      <div class="float-container">
        <label>Título del proyecto<span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese título del proyecto..." name="tituloProyecto" maxlength="43" id="tituloProyecto" value="<?= $formularioEnviado->tituloProyecto ?>">
      </div>

      <div class="float-container">
        <label>Número de proyecto<span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese el número del proyecto..." name="numeroProyecto" maxlength="43" id="numeroProyecto" value="<?= $formularioEnviado->numeroProyecto ?>">
      </div>

      <div class="float-container">
        <label>Fecha de presentación del proyecto<span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese la fecha en la que fue presentado el proyecto..." name="fecPresentacionProyecto" maxlength="43" id="fecPresentacionProyecto" value="<?= $formularioEnviado->fecPresentacionProyecto ?>">
      </div>

      <div class="float-container">
        <label>Nombre y apellido<span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese nombre y apellido del solicitante ..." name="nombreSolicitante" maxlength="43" value="<?= $formularioEnviado->nombreSolicitante ?>">
      </div>

      <div class="float-container">
        <label>Localidad <span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese localidad..." name="localidadSolicitante" maxlength="43" value="<?= $formularioEnviado->localidadSolicitante ?>" id="localidadPortada">
      </div>

      <div class="float-container">
        <label>Agencia <span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese agencia..." name="agenciaProyecto" maxlength="43" value="<?= $formularioEnviado->agenciaProyecto ?>" id="agenciaPortada">
      </div>

      <div class="float-container">
        <label>Monto a solicitar <span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese el monto solicitado por el emprendedor..." id="montoSolicitado"  name="montoSolicitado" maxlength="6" value="<?= $formularioEnviado->montoSolicitado ?>">
      </div>

      <p align="center"><b>BREVE DESCRIPCIÓN DEL EMPRENDIMIENTO Y JUSTIFICACIÓN DE LA NECESIDAD DE FINANCIAMIENTO <span style="color:red;">&#10033;</span></b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="descEmprendimiento" maxlength="254"> <?= $formularioEnviado->descEmprendimiento ?> </textarea></p>
    </div>
  <!-- FIN TAB PORTADA -->
  <!-- \\\\\\\\\\\\\\\\\\\\\\\ INFORMACION EMPRENDEDOR  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">

    @isset($observaciones[0])
      @for($i=0; $i < count($observaciones); $i++)
      <input type="input" id="{{$observaciones[$i]->hoja}}_id" value="{{$observaciones[$i]->id}}" hidden>
      <div class="observacion"><p><b>Agregar observación para INFORMACIÓN DEL EMPRENDEDOR:</b></p><textarea name=observaciones["{{$observaciones[$i]->hoja}}"]>{{$observaciones[$i]->observacion}}</textarea></div>
      <button type="button" style="background-color: red;" id="eliminarObservacionInfoEmprendedor">Eliminar</button>
      @endfor
    @endisset

    <?php Helpers::crearCheckValido('infoEmprendedor',$pasosValidos->infoEmprendedor) ?>
    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="portada">OBSERVACIÓN</button>
    <script type="text/javascript">
      $('#eliminarObservacionInfoEmprendedor').on('click',function() {
        console.log('eliminar');
        console.log($('#infoEmprendedor_id').val());
        var datos = {};
                      datos['id'] = $('#infoEmprendedor_id').val();
                  $.ajax({
                      type: 'POST',
                      url: "{{ route('eliminarObservacion') }}",
                      data : datos
                  }).done(function (data) {
                    alert('Observacion eliminada!');
                    console.log('OK 202!');
                  }).fail(function () {
                      console.log('Error contacte con el administrador de la aplicación.');
                  });
      });
    </script>
      <p class="hoja" style="display: none;">infoEmprendedor</p>
    <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">INFORMACIÓN DEL EMPRENDEDOR</p>
 
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
</div>
  <!-- \\\\\\\\\\\\\\\\\\\\\\\ DATOS GENERALES EMPRENDIMIENTO  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
  <div class="tab">
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) { 
          if ($observaciones[$i]->hoja == 'datosEmprendimiento') {
            print_r('<input type="input" id="'.$observaciones[$i]->hoja.'_id" value="'.$observaciones[$i]->id.'" hidden>');
              print_r('<div class="observacion"><p><b>Agregar observación para DATOS DEL EMPRENDIMIENTO:</b></p><textarea name=observaciones["'.$observaciones[$i]->hoja.'"]>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>
    <?php Helpers::crearCheckValido('datosEmprendimiento',$pasosValidos->datosEmprendimiento) ?>

    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="portada">OBSERVACIÓN</button>
      <p class="hoja" style="display: none;">datosEmprendimiento</p>
      <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">DATOS GENERALES EMPRENDIMIENTO</p>
                              <!--EMPRENDIMIENTO-->
  <table class="w3-table-all">
      <thead>
      <tr class="w3-green">
        <th colspan="2" style="text-align: center;font-size: 18px;">EMPRENDIMIENTO</th>
      </tr>
    </thead>
    <tr>
      <th>Denominación del emprendimiento</th>
      <td><?= $formularioEnviado->emprendimiento->denominacion; ?></td>
    </tr>
    <tr>
      <th>Estado</th>
      <td><?= $formularioEnviado->emprendimiento->estadoEmprendimiento; ?></td>
    </tr>
    <tr>
      <th>Actividad principal</th>
      <td><?= $formularioEnviado->actividadPrincipal->nombre; ?></td>
    </tr>
    @isset($formularioEnviado->fecInicioEmprendimiento)
    <tr>
      <th>Fecha de inicio a la actividad</th>
      <td>{{$formularioEnviado->fecInicioEmprendimiento}}</td>
    </tr>
    @endisset
    @isset($formularioEnviado->antiguedadEmprendimiento)
    <tr>
      <th>Antiguedad</th>
      <td><?= $formularioEnviado->antiguedadEmprendimiento; ?></td>
    </tr>
    @endisset
    <tr>
      <th>Número de CUIL/CUIT</th>
      <td><?= $formularioEnviado->cuitEmprendimiento; ?></td>
    </tr>
    @isset($formularioEnviado->ingresosBrutosEmprendimiento)
    <tr>
      <th>Número de ingresos brutos</th>
      <td><?= $formularioEnviado->ingresosBrutosEmprendimiento; ?></td>
    </tr>
    @endisset
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
      <th colspan="2" style="text-align: center;">Experiencia o formación de el/los emprendedores para el desarrollo del emprendimiento</th>
    </tr>
    <tr>
      <td><?= $formularioEnviado->experienciaEmprendedores ?></td>
    </tr>
    <tr>
      <th colspan="2" style="text-align: center;">Oportunidad mercado</th>
    </tr>
    <tr>
      <td><?= $formularioEnviado->oportunidadMercado ?></td>
    </tr>
    <tr>
      <th colspan="2" style="text-align: center;">Descripción del financiamiento</th>
    </tr>
    <tr>
      <td><?= $formularioEnviado->descFinanciamiento ?></td>
    </tr>
  </table>
  <br>
  </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MERCADO  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'mercado') {
          print_r('<input type="input" id="'.$observaciones[$i]->hoja.'_id" value="'.$observaciones[$i]->id.'" hidden>'); 
              print_r('<div class="observacion"><p><b>Agregar observación para MERCADO:</b></p><textarea name=observaciones["'.$observaciones[$i]->hoja.'"]>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>


      <?php Helpers::crearCheckValido('mercado',$pasosValidos->mercado) ?>
      <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="mercado">OBSERVACIÓN</button>
      <p class="hoja" style="display: none;">mercado</p>
      <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">MERCADO</p>

     <table class="w3-table-all">
      <thead>
      <tr class="w3-green">
        <th colspan="5" style="text-align: center;font-size: 18px;">Mercado</th>
      </tr>
    </thead>
  </table>
 <table class="w3-table-all">
      <thead>
      <tr class="w3-green">
        <th colspan="2" style="text-align: center;font-size: 18px;">CLIENTES</th>
      </tr>
    </thead>
    <tr>
      <th>Descripción</th>
      <td><?= $formularioEnviado->descripcionClientes; ?></td>
    </tr>
    <tr>
      <th>Ubicación</th>
      <td><?= $formularioEnviado->ubicacionClientes; ?></td>
    </tr>
</table>
<table class="w3-table-all">
      <thead>
      <tr class="w3-green">
        <th colspan="2" style="text-align: center;font-size: 18px;">PROVEEDORES</th>
      </tr>
    </thead>
    <tr>
      <th>Descripción</th>
      <td><?= $formularioEnviado->descripcionProveedores; ?></td>
    </tr>
    <tr>
      <th>Ubicación</th>
      <td><?= $formularioEnviado->ubicacionProveedores; ?></td>
    </tr>
</table>
<table class="w3-table-all">
      <thead>
      <tr class="w3-green">
        <th colspan="2" style="text-align: center;font-size: 18px;">COMPETENCIA</th>
      </tr>
    </thead>
    <tr>
      <th>Descripción</th>
      <td><?= $formularioEnviado->descripcionCompetencia; ?></td>
    </tr>
    <tr>
      <th>Ubicación</th>
      <td><?= $formularioEnviado->ubicacionCompetencia; ?></td>
    </tr>
</table>

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
          <td><?= $formularioEnviado->puntoVentaLocal ?? $formularioEnviado->puntoVentaProvincial ?? $formularioEnviado->puntoVentaNacional ?? 'No hay registro.'; ?></td>
      </tr>
    </table>
    <br> 
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ PRODUCCIÓN - COSTOS - RESULTADOS  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'prodCostResultados') {
          print_r('<input type="input" id="'.$observaciones[$i]->hoja.'_id" value="'.$observaciones[$i]->id.'" hidden>'); 
              print_r('<div class="observacion"><p><b>Agregar observación para PRODUCCIÓN - COSTOS - RESULTADOS:</b></p><textarea name=observaciones["'.$observaciones[$i]->hoja.'"]>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>



    <?php Helpers::crearCheckValido('prodCostResultados',$pasosValidos->prodCostResultados) ?>
      <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="prodCostResultados">OBSERVACIÓN</button>
      <p class="hoja" style="display: none;">prodCostResultados</p>
      <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">PRODUCCIÓN - COSTOS - RESULTADOS</p>

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
      <?php //Helpers::crearDatosVentas($ventas); ?>
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

    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MANIFESTACIÓN DE LOS BIENES DEL EMPRENDEDOR  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
        <div class="tab">
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'mbe') {
          print_r('<input type="input" id="'.$observaciones[$i]->hoja.'_id" value="'.$observaciones[$i]->id.'" hidden>'); 
              print_r('<div class="observacion"><p><b>Agregar observación para MANIFESTACIÓN DE LOS BIENES DEL EMPRENDEDOR:</b></p><textarea name=observaciones["'.$observaciones[$i]->hoja.'"]>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>



    <?php Helpers::crearCheckValido('mbe',$pasosValidos->mbe) ?>

    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="mbe">OBSERVACIÓN</button>
      <p class="hoja" style="display: none;">mbe</p>
      <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">MANIFESTACIÓN DE LOS BIENES DEL EMPRENDEDOR</p>

     <table class="w3-table-all">
        <thead>
        <tr>
          <th class="w3-green" colspan="5" style="text-align: center;font-size: 16px;">MANIFESTACIÓN DE BIENES EMPRENDEDOR</th>
        </tr>
      </thead>
        <tr>
          <th>Nombre y apellido</th>
          <td style="text-align: center;"><?= $formularioEnviado->nombreEmprendedor ?></td>
        </tr>
        <tr>
          <th>DNI</th>
          <td style="text-align: center;"><?= $formularioEnviado->dniEmprendedor ?></td>
        </tr>
        <tr>
          <th>CUIT</th>
          <td style="text-align: center;"><?= $formularioEnviado->cuitEmprendimiento ?></td>
        </tr>
        <tr>
          <th>Localidad</th>
          <td style="text-align: center;"><?= $formularioEnviado->localidadEmprendedor ?></td>
        </tr>
        <tr>
          <th>Domicilio</th>
          <td style="text-align: center;"><?= $formularioEnviado->domicilioEmprendedor ?></td>
        </tr>
    </table>
    <br>
     <table class="w3-table-all">
        <thead>
        <tr>
          <th class="w3-green" colspan="5" style="text-align: center;font-size: 16px;">BIENES</th>
        </tr>
        <tr>
          <th style="text-align: center">TIPO</th>
          <th>MONTO</th>
        </tr>
      </thead>
        <tr>
          <td>Efectivo</td>
          <td style="text-align: center;"><?= $formularioEnviado->efectivoMBE ?></td>
        </tr>
        <tr>
          <td>Cuentas bancarias</td>
          <td style="text-align: center;"><?= $formularioEnviado->cuentasBancariasMBE ?></td>
        </tr>
        <tr>
          <td>Créditos por ventas</td>
          <td style="text-align: center;"><?= $formularioEnviado->creditosVentasMBE ?></td>
        </tr>
        <tr>
          <td>Otros créditos</td>
          <td style="text-align: center;"><?= $formularioEnviado->otrosCreditosMBE ?></td>
        </tr>
        <tr>
          <td>Mercaderias</td>
          <td style="text-align: center;"><?= $formularioEnviado->mercaderiasMBE ?></td>
        </tr>
        <tr>
          <td>Materias primas</td>
          <td style="text-align: center;"><?= $formularioEnviado->materiasPrimasMBE ?></td>
        </tr>
        <tr>
          <td>Insumos</td>
          <td style="text-align: center;"><?= $formularioEnviado->insumosMBE ?></td>
        </tr>
        <tr>
          <td>Rodados</td>
          <td style="text-align: center;"><?= $formularioEnviado->rodadosMBE ?></td>
        </tr>
        <tr>
          <td>Maquinarias y equipos</td>
          <td style="text-align: center;"><?= $formularioEnviado->maquinariasEquiposMBE ?></td>
        </tr>
        <tr>
          <td>Instalaciones</td>
          <td style="text-align: center;"><?= $formularioEnviado->instalacionesMBE ?></td>
        </tr>
        <tr>
          <th>TOTAL ACTIVO</th>
          <td style="text-align: center;"> </td>
        </tr>
    </table>
    <br>
<table class="w3-table-all">
        <thead>
        <tr>
          <th class="w3-green" colspan="5" style="text-align: center;font-size: 16px;">DEUDAS</th>
        </tr>
        <tr>
          <th style="text-align: center">TIPO</th>
          <th>MONTO</th>
        </tr>
      </thead>
        <tr>
          <td>En cuentas corrientes</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaCuentasCorrientesMBE ?></td>
        </tr>
        <tr>
          <td>De cheques de pago diferido</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaChequesPagoDiferidoMBE ?></td>
        </tr>
        <tr>
          <td>Documentadas</td>
          <td style="text-align: center;"><?= $formularioEnviado->documentadasMBE ?></td>
        </tr>
        <tr>
          <td>Otras deudas comerciales</td>
          <td style="text-align: center;"><?= $formularioEnviado->otrasDeudasComercialesMBE ?></td>
        </tr>
        <tr>
          <td>Tarjetas de crédito</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaTarjetasCreditoMBE ?></td>
        </tr>
        <tr>
          <td>Garantía prendaria</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaGarantiaPrendariaMBE ?></td>
        </tr>
        <tr>
          <td>AFIP</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaAfipMBE ?></td>
        </tr>
        <tr>
          <td>Rentas Río Negro</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaRentasRnMBE ?></td>
        </tr>
        <tr>
          <td>Tributos municipales</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaTributosMunicipalesMBE ?></td>
        </tr>
        <tr>
          <td>Sociales</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudasSocialesMBE ?></td>
        </tr>
        <tr>
          <td>Otras deudas</td>
          <td style="text-align: center;"><?= $formularioEnviado->otrasDeudasMBE ?></td>
        </tr>
        <tr>
          <th>TOTAL PASIVO</th>
          <td style="text-align: center;"> </td>
        </tr>
    </table>
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MANIFESTACIÓN DE LOS BIENES DEL GARANTE  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'mbg') {
          print_r('<input type="input" id="'.$observaciones[$i]->hoja.'_id" value="'.$observaciones[$i]->id.'" hidden>'); 
              print_r('<div class="observacion"><p><b>Agregar observación para MANIFESTACIÓN DE LOS BIENES DEL GARANTE:</b></p><textarea name=observaciones["'.$observaciones[$i]->hoja.'"]>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>



    <?php Helpers::crearCheckValido('mbg',$pasosValidos->mbg) ?>

      <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="mbg">OBSERVACIÓN</button>
      <p class="hoja" style="display: none;">mbg</p>
      <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">MANIFESTACIÓN DE LOS BIENES DEL GARANTE</p>

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
     <table class="w3-table-all">
        <thead>
        <tr>
          <th class="w3-green" colspan="5" style="text-align: center;font-size: 16px;">BIENES</th>
        </tr>
        <tr>
          <th style="text-align: center">TIPO</th>
          <th>MONTO</th>
        </tr>
      </thead>
        <tr>
          <td>Efectivo</td>
          <td style="text-align: center;"><?= $formularioEnviado->efectivoMBG ?></td>
        </tr>
        <tr>
          <td>Cuentas bancarias</td>
          <td style="text-align: center;"><?= $formularioEnviado->cuentasBancariasMBG ?></td>
        </tr>
        <tr>
          <td>Créditos por ventas</td>
          <td style="text-align: center;"><?= $formularioEnviado->creditosVentasMBG ?></td>
        </tr>
        <tr>
          <td>Otros créditos</td>
          <td style="text-align: center;"><?= $formularioEnviado->otrosCreditosMBG ?></td>
        </tr>
        <tr>
          <td>Mercaderias</td>
          <td style="text-align: center;"><?= $formularioEnviado->mercaderiasMBG ?></td>
        </tr>
        <tr>
          <td>Materias primas</td>
          <td style="text-align: center;"><?= $formularioEnviado->materiasPrimasMBG ?></td>
        </tr>
        <tr>
          <td>Insumos</td>
          <td style="text-align: center;"><?= $formularioEnviado->insumosMBG ?></td>
        </tr>
        <tr>
          <td>Rodados</td>
          <td style="text-align: center;"><?= $formularioEnviado->rodadosMBG ?></td>
        </tr>
        <tr>
          <td>Maquinarias y equipos</td>
          <td style="text-align: center;"><?= $formularioEnviado->maquinariasEquiposMBG ?></td>
        </tr>
        <tr>
          <td>Instalaciones</td>
          <td style="text-align: center;"><?= $formularioEnviado->instalacionesMBG ?></td>
        </tr>
        <tr>
          <th>TOTAL ACTIVO</th>
          <td style="text-align: center;"> </td>
        </tr>
    </table>
    <br>
<table class="w3-table-all">
        <thead>
        <tr>
          <th class="w3-green" colspan="5" style="text-align: center;font-size: 16px;">DEUDAS</th>
        </tr>
        <tr>
          <th style="text-align: center">TIPO</th>
          <th>MONTO</th>
        </tr>
      </thead>
        <tr>
          <td>En cuentas corrientes</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaCuentasCorrientesMBG ?></td>
        </tr>
        <tr>
          <td>De cheques de pago diferido</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaChequesPagoDiferidoMBG ?></td>
        </tr>
        <tr>
          <td>Documentadas</td>
          <td style="text-align: center;"><?= $formularioEnviado->documentadasMBG ?></td>
        </tr>
        <tr>
          <td>Otras deudas comerciales</td>
          <td style="text-align: center;"><?= $formularioEnviado->otrasDeudasComercialesMBG ?></td>
        </tr>
        <tr>
          <td>Tarjetas de crédito</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaTarjetasCreditoMBG ?></td>
        </tr>
        <tr>
          <td>Garantía prendaria</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaGarantiaPrendariaMBG ?></td>
        </tr>
        <tr>
          <td>AFIP</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaAfipMBG ?></td>
        </tr>
        <tr>
          <td>Rentas Río Negro</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaRentasRnMBG ?></td>
        </tr>
        <tr>
          <td>Tributos municipales</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudaTributosMunicipalesMBG ?></td>
        </tr>
        <tr>
          <td>Sociales</td>
          <td style="text-align: center;"><?= $formularioEnviado->deudasSocialesMBG ?></td>
        </tr>
        <tr>
          <td>Otras deudas</td>
          <td style="text-align: center;"><?= $formularioEnviado->otrasDeudasMBG ?></td>
        </tr>
        <tr>
          <th>TOTAL PASIVO</th>
          <td style="text-align: center;"> </td>
        </tr>
    </table>
    </div>
   
    </div>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\ DOCUMENTACIÓN  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
    <?php
      if (isset($observaciones[0])) {
        for ($i=0; $i < count($observaciones); $i++) {
          if ($observaciones[$i]->hoja == 'documentacion') {
          print_r('<input type="input" id="'.$observaciones[$i]->hoja.'_id" value="'.$observaciones[$i]->id.'" hidden>'); 
              print_r('<div class="observacion"><p><b>Agregar observación para DOCUMENTACIÓN:</b></p><textarea name=observaciones["'.$observaciones[$i]->hoja.'"]>'.$observaciones[$i]->observacion.' </textarea></div>');
          }
        }
      }
    ?>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  width: 50%;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>

      <?php Helpers::crearCheckValido('documentacion',$pasosValidos->documentacion) ?>
      <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="mercado">OBSERVACIÓN</button>
      <p class="hoja" style="display: none;">documentacion</p>
      <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">DOCUMENTACIÓN</p>
      <div align="center">
        <table>
    <thead>
    <tr>
        <th>Vista previa</th>
        <th>Descripción</th>
    </tr>
  </thead>
  <tbody> 
  <?php 
  use App\Multimedia;
  if (!$documentacion->isEmpty()) {
      for ($i=0; $i < count($documentacion); $i++) {
      switch ($documentacion[$i]->descripcion) {
        case 'DNI':
          $descripcion = "Documento Nacional de Identidad";
          break;
        case 'DOMICILIO':
          $descripcion = "Certificado de domicilio";
          break;
        case 'RECIBO_SUELDO':
          $descripcion = "Recibo de sueldo";
          break;
        default:
          $descripcion = "Descripción no válida";
          break;
      }
      if ($documentacion[$i]->descripcion == 'DNI') {
        $descripcion = "Documento Nacional de Identidad";
      } 
      $multimedia = Multimedia::find($documentacion[$i]->multimedia_id);
      print_r(' <tr>
            <td>
                <img align="center" style="width:85px" src="/var/www/html/crear/public/images/'.$multimedia->id.'">
              </td>
              <td>
              '.$descripcion.'
            </td>
              </tr>');
    }
  } else {
    echo '<tr><td rowspan="2">El usuario aún no ha cargado documentación.</td><tr>';
  } 
?>
  </tbody>
</table>
<br><br>
      </div>
    <!-- FIN-->

    </div>
      <div style="overflow:auto;">
        <div style="float:right;">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
        </div>
      </div>

  <!-- Circles which indicates the steps of the form: -->
</form>

  <script type="text/javascript">
    $(function() {
    $('input').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
});
  </script>
<script type="text/javascript" src="{{ asset('js/autocomplete.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/add_campos_ref.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/add_campos_clientes.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/add_campos_proveedores.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/add_campos_competencia.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/add_campos_ventas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/calculo_ventas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/calculo_servicios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/add_campos_items.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/items.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/bienes_emprendedor.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bienes_garante.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/calculo_items.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nombreInputsStyle.js') }}"></script>
<!--<script type="text/javascript" src="{{ asset('js/rules_validation.js') }}"></script>-->

<input type="hidden" id="urlRevision" value="{{ url('/agregarRevision') }}">

<script type="text/javascript" src="{{ asset('js/verificacionForm.js') }}"></script>

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
<script type="text/javascript" src="{{ asset('js/tabScript.js') }}"></script>

</body>
</html>