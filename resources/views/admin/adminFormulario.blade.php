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
    <span class="step" onclick="irTab(8)"></span>
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
        <input data-placeholder="Ingrese la fecha en la que fue presentado el proyecto..." name="fecPresentacionProyecto" maxlength="43" id="fecPresentacionProyecto" value="<?= Helpers::cambioFormatoFecha($formularioEnviado->fecPresentacionProyecto) ?>">
      </div>

      <div class="float-container">
        <label>Nombre y apellido<span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese nombre y apellido del solicitante ..." name="nombreSolicitante" maxlength="43" value="<?= $formularioEnviado->nombreSolicitante ?>">
      </div>

      <div class="float-container">
        <label>Localidad <span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese localidad..." name="localidadSolicitante" value="<?= $formularioEnviado->get_localidad->nombre ?>" id="localidadPortada">
      </div>

      <div class="float-container">
        <label>Agencia <span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese agencia..." name="agenciaProyecto" maxlength="43" value="<?= $formularioEnviado->agenciaProyecto ?? $datosTecnico->get_agencia->nombre ?>" id="agenciaPortada">
      </div>

      <div class="float-container">
        <label>Monto a solicitar <span style="color:red;">&#10033;</span></label>
        <input data-placeholder="Ingrese el monto solicitado por el emprendedor..." id="montoSolicitado"  name="montoSolicitado" maxlength="6" value="<?= $formularioEnviado->montoSolicitado ??
                  ($formularioEnviado->item1_cantidad * $formularioEnviado->item1_precio) +
                  ($formularioEnviado->item2_cantidad * $formularioEnviado->item2_precio) +
                  ($formularioEnviado->item3_cantidad * $formularioEnviado->item3_precio) +
                  ($formularioEnviado->item4_cantidad * $formularioEnviado->item4_precio) +
                  ($formularioEnviado->item5_cantidad * $formularioEnviado->item5_precio) +
                  ($formularioEnviado->item6_cantidad * $formularioEnviado->item6_precio) +
                  ($formularioEnviado->item7_cantidad * $formularioEnviado->item7_precio) +
                  ($formularioEnviado->item8_cantidad * $formularioEnviado->item8_precio) +
                  ($formularioEnviado->item9_cantidad * $formularioEnviado->item9_precio) +
                  ($formularioEnviado->item10_cantidad * $formularioEnviado->item10_precio) ?>">
      </div>

      <div class="float-container" style="padding: 20px;">
        <p>Proyecto con posible vinculación a:</p>
        <select style="width: 100%;" name="organismoPublico">
          <option selected disabled>Ingrese el organismo público...</option>
          @foreach($organismosPublicos as $organismo)
            @if($organismo->id == $formularioEnviado->organismoPublico)
              <option value="{{$formularioEnviado->organismoPublico}}" selected>{{$organismo->nombre}}</option>
            @else
              <option value="{{$organismo->id}}">{{$organismo->nombre}}</option>
            @endif
          @endforeach
        </select>
      </div>

      <p align="center"><b>BREVE DESCRIPCIÓN DEL EMPRENDIMIENTO Y JUSTIFICACIÓN DE LA NECESIDAD DE FINANCIAMIENTO <span style="color:red;">&#10033;</span></b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="descEmprendimiento" maxlength="254"> <?= $formularioEnviado->descEmprendimiento ?> </textarea></p>
    </div>
  <!-- FIN TAB PORTADA -->
  <!-- \\\\\\\\\\\\\\\\\\\\\\\ INFORMACION EMPRENDEDOR  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">

    @isset($observaciones[0])
      @for($i=0; $i < count($observaciones); $i++)
        @if($observaciones[$i]->hoja == 'infoEmprendedor')
        <input type="input" id="{{$observaciones[$i]->hoja}}_id" value="{{$observaciones[$i]->id}}" hidden>
        <div class="observacion"><p><b>Agregar observación para INFORMACIÓN DEL EMPRENDEDOR:</b></p><textarea name=observaciones["{{$observaciones[$i]->hoja}}"]>{{$observaciones[$i]->observacion}}</textarea></div>
        <button type="button" style="background-color: red;" id="eliminarObservacionInfoEmprendedor">Eliminar</button>
        @endif
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
      <td><?= $localidadSolicitante->nombre ?? ''; ?></td>
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
      <th>Instagram</th>
      <td><?= $formularioEnviado->instagramEmprendedor; ?></td>
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
    @isset($observaciones[0])
      @for($i=0; $i < count($observaciones); $i++)
        @if($observaciones[$i]->hoja == 'datosEmprendimiento')
        <input type="input" id="{{$observaciones[$i]->hoja}}_id" value="{{$observaciones[$i]->id}}" hidden>
        <div class="observacion"><p><b>Agregar observación para DATOS DEL EMPRENDIMIENTO:</b></p><textarea name=observaciones["{{$observaciones[$i]->hoja}}"]>{{$observaciones[$i]->observacion}}</textarea></div>
        <button type="button" style="background-color: red;" id="eliminarObservaciondatosEmprendimiento">Eliminar</button>
        @endif
      @endfor
    @endisset

    <?php Helpers::crearCheckValido('datosEmprendimiento',$pasosValidos->datosEmprendimiento) ?>
    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="portada">OBSERVACIÓN</button>
    <script type="text/javascript">
      $('#eliminarObservaciondatosEmprendimiento').on('click',function() {
        console.log('eliminar');
        console.log($('#datosEmprendimiento_id').val());
        var datos = {};
                      datos['id'] = $('#datosEmprendimiento_id').val();
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
      <td><?= $formularioEnviado->denominacion; ?></td>
    </tr>
    <tr>
      <th>Estado</th>
      <td><?= $formularioEnviado->estadoEmprendimiento; ?></td>
    </tr>
    <tr>
      <th>Actividad principal</th>
      <td><?= $formularioEnviado->actividadPrincipal->nombre ?? '' ?></td>
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
    @isset($observaciones[0])
      @for($i=0; $i < count($observaciones); $i++)
        @if($observaciones[$i]->hoja == 'mercado')
        <input type="input" id="{{$observaciones[$i]->hoja}}_id" value="{{$observaciones[$i]->id}}" hidden>
        <div class="observacion"><p><b>Agregar observación para MERCADO:</b></p><textarea name=observaciones["{{$observaciones[$i]->hoja}}"]>{{$observaciones[$i]->observacion}}</textarea></div>
        <button type="button" style="background-color: red;" id="eliminarObservacionmercado">Eliminar</button>
        @endif
      @endfor
    @endisset

    <?php Helpers::crearCheckValido('mercado',$pasosValidos->mercado) ?>
    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="portada">OBSERVACIÓN</button>
    <script type="text/javascript">
      $('#eliminarObservacionmercado').on('click',function() {
        console.log('eliminar');
        console.log($('#mercado_id').val());
        var datos = {};
                      datos['id'] = $('#mercado_id').val();
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
          <td><?php 
          if ($formularioEnviado->puntoVentaLocal) {
            echo "-Local<br>";
          } else {
            echo "";
          }
          if ($formularioEnviado->puntoVentaProvincial) {
            echo "-Provincial<br>";
          } else {
            echo "";
          }
          if ($formularioEnviado->puntoVentaNacional) {
            echo "-Nacional<br>";
          } else {
            echo "";
          }?></td>
      </tr>
    </table>
    <br> 
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ PRODUCCIÓN - COSTOS - RESULTADOS  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
    @isset($observaciones[0])
      @for($i=0; $i < count($observaciones); $i++)
        @if($observaciones[$i]->hoja == 'prodCostResultados')
        <input type="input" id="{{$observaciones[$i]->hoja}}_id" value="{{$observaciones[$i]->id}}" hidden>
        <div class="observacion"><p><b>Agregar observación para prodCostResultados:</b></p><textarea name=observaciones["{{$observaciones[$i]->hoja}}"]>{{$observaciones[$i]->observacion}}</textarea></div>
        <button type="button" style="background-color: red;" id="eliminarObservacionprodCostResultados">Eliminar</button>
        @endif
      @endfor
    @endisset

    <?php Helpers::crearCheckValido('prodCostResultados',$pasosValidos->prodCostResultados) ?>
    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="portada">OBSERVACIÓN</button>
    <script type="text/javascript">
      $('#eliminarObservacionprodCostResultados').on('click',function() {
        console.log('eliminar');
        console.log($('#prodCostResultados_id').val());
        var datos = {};
                      datos['id'] = $('#prodCostResultados_id').val();
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
      <table class="w3-table">
        <thead>
          <tr>
            <th colspan="5" style="text-align: center;">
              VENTAS ESTIMADAS
            </th>
          </tr>
          <tr>
            <th>Producto</th>
            <th>Unidad de medida</th>
            <th>Cantidad</th>
            <th>Valor por unidad</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$formularioEnviado->producto1}}</td>
            <td>{{$formularioEnviado->udMedida1}}</td>
            <td>{{$formularioEnviado->cantidad1}}</td>
            <td>{{$formularioEnviado->valor1}}</td>
            <td>{{$formularioEnviado->cantidad1 * $formularioEnviado->valor1}}</td>
          </tr>
          <tr>
            <td>{{$formularioEnviado->producto2}}</td>
            <td>{{$formularioEnviado->udMedida2}}</td>
            <td>{{$formularioEnviado->cantidad2}}</td>
            <td>{{$formularioEnviado->valor2}}</td>
            <td>{{$formularioEnviado->cantidad2 * $formularioEnviado->valor2}}</td>
          </tr>
          <tr>
            <td>{{$formularioEnviado->producto3}}</td>
            <td>{{$formularioEnviado->udMedida3}}</td>
            <td>{{$formularioEnviado->cantidad3}}</td>
            <td>{{$formularioEnviado->valor3}}</td>
            <td>{{$formularioEnviado->cantidad3 * $formularioEnviado->valor3}}</td>
          </tr>
          <tr>
            <td>{{$formularioEnviado->producto4}}</td>
            <td>{{$formularioEnviado->udMedida4}}</td>
            <td>{{$formularioEnviado->cantidad4}}</td>
            <td>{{$formularioEnviado->valor4}}</td>
            <td>{{$formularioEnviado->cantidad4 * $formularioEnviado->valor4}}</td>
          </tr>
          <tr>
            <td colspan="4">Otras ventas</td>
            <td>{{$formularioEnviado->otrosProductosVenta}}</td>
          </tr>
          <tr>
            <td colspan="4">Total</td>
            <td>{{($formularioEnviado->cantidad1 * $formularioEnviado->valor1) + ($formularioEnviado->cantidad2  * $formularioEnviado->valor2) + ($formularioEnviado->cantidad3 * $formularioEnviado->valor3) + ($formularioEnviado->cantidad4 * $formularioEnviado->valor4) + $formularioEnviado->otrosProductosVenta}}</td>
          </tr>
        </tbody>
        
      </table>
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
    <!-- INVERSION -->
    <div class="tab">
          <input type="input" name="idValidacion" id="idValidacion" value="<?=$pasosValidos->id?>" hidden>
      @isset($observaciones[0])
        @for($i=0; $i < count($observaciones); $i++)
          @if($observaciones[$i]->hoja == 'inversion')
            <input type="input" id="{{$observaciones[$i]->hoja}}_id" value="{{$observaciones[$i]->id}}" hidden>
            <div class="observacion"><p><b>Agregar observación para Inversión:</b></p><textarea name=observaciones["{{$observaciones[$i]->hoja}}"]>{{$observaciones[$i]->observacion}}</textarea></div>
            <button type="button" style="background-color: red;" id="eliminarObservacioninversion">Eliminar</button>
          @endif
        @endfor
      @endisset

      <?php Helpers::crearCheckValido('inversion',$pasosValidos->infoEmprendedor) ?>
      <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="inversion">OBSERVACIÓN</button>
      <script type="text/javascript">
        $('#eliminarObservacioninversion').on('click',function() {
          console.log('eliminar');
          console.log($('#inversion_id').val());
          var datos = {};
                        datos['id'] = $('#inversion_id').val();
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
        <p class="hoja" style="display: none;">inversion</p>
        <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">inversion</p>
      <!-- ªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªª-->
      @if (\Session::has('success'))
      <div style="padding: 10px;background-color: #8bc34a;color: white;" align="center">
          <p style="color: white;font-family: 'Roboto';font-weight: bold;">{!! \Session::get('success') !!}</p>
      </div>
      @endif

      <table class="w3-table-all">
            <thead>
            <tr class="w3-green">
              <th colspan="4" style="text-align: center;font-size: 18px;">Inversión</th>
            </tr>
            <tr>
              <th>Descripción</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$formularioEnviado->item1_descripcion}}</td>
              <td>{{$formularioEnviado->item1_cantidad}}</td>
              <td>{{$formularioEnviado->item1_precio}}</td>
              <td>{{$formularioEnviado->item1_cantidad * $formularioEnviado->item1_precio}}</td>
            </tr>
            <tr>
              <td>{{$formularioEnviado->item2_descripcion}}</td>
              <td>{{$formularioEnviado->item2_cantidad}}</td>
              <td>{{$formularioEnviado->item2_precio}}</td>
              <td>{{$formularioEnviado->item2_cantidad * $formularioEnviado->item2_precio}}</td>
            </tr>
            <tr>
              <td>{{$formularioEnviado->item3_descripcion}}</td>
              <td>{{$formularioEnviado->item3_cantidad}}</td>
              <td>{{$formularioEnviado->item3_precio}}</td>
              <td>{{$formularioEnviado->item3_cantidad * $formularioEnviado->item3_precio}}</td>
            </tr>
            <tr>
              <td>{{$formularioEnviado->item4_descripcion}}</td>
              <td>{{$formularioEnviado->item4_cantidad}}</td>
              <td>{{$formularioEnviado->item4_precio}}</td>
              <td>{{$formularioEnviado->item4_cantidad * $formularioEnviado->item4_precio}}</td>
            </tr>
            <tr>
              <td>{{$formularioEnviado->item5_descripcion}}</td>
              <td>{{$formularioEnviado->item5_cantidad}}</td>
              <td>{{$formularioEnviado->item5_precio}}</td>
              <td>{{$formularioEnviado->item5_cantidad * $formularioEnviado->item5_precio}}</td>
            </tr>
            <tr>
              <td>{{$formularioEnviado->item6_descripcion}}</td>
              <td>{{$formularioEnviado->item6_cantidad}}</td>
              <td>{{$formularioEnviado->item6_precio}}</td>
              <td>{{$formularioEnviado->item6_cantidad * $formularioEnviado->item6_precio}}</td>
            </tr>
            <tr>
              <td>{{$formularioEnviado->item7_descripcion}}</td>
              <td>{{$formularioEnviado->item7_cantidad}}</td>
              <td>{{$formularioEnviado->item7_precio}}</td>
              <td>{{$formularioEnviado->item7_cantidad * $formularioEnviado->item7_precio}}</td>
            </tr>
            <tr>
              <td>{{$formularioEnviado->item8_descripcion}}</td>
              <td>{{$formularioEnviado->item8_cantidad}}</td>
              <td>{{$formularioEnviado->item8_precio}}</td>
              <td>{{$formularioEnviado->item8_cantidad * $formularioEnviado->item8_precio}}</td>
            </tr>
            <tr>
              <td>{{$formularioEnviado->item9_descripcion}}</td>
              <td>{{$formularioEnviado->item9_cantidad}}</td>
              <td>{{$formularioEnviado->item9_precio}}</td>
              <td>{{$formularioEnviado->item9_cantidad * $formularioEnviado->item9_precio}}</td>
            </tr>
            <tr>
              <td>{{$formularioEnviado->item10_descripcion}}</td>
              <td>{{$formularioEnviado->item10_cantidad}}</td>
              <td>{{$formularioEnviado->item10_precio}}</td>
              <td>{{$formularioEnviado->item10_cantidad * $formularioEnviado->item10_precio}}</td>
            </tr>
            <tr>
                <th colspan="2">Total solicitado al crear</th>
                <th colspan="2">{{
                  ($formularioEnviado->item1_cantidad * $formularioEnviado->item1_precio) +
                  ($formularioEnviado->item2_cantidad * $formularioEnviado->item2_precio) +
                  ($formularioEnviado->item3_cantidad * $formularioEnviado->item3_precio) +
                  ($formularioEnviado->item4_cantidad * $formularioEnviado->item4_precio) +
                  ($formularioEnviado->item5_cantidad * $formularioEnviado->item5_precio) +
                  ($formularioEnviado->item6_cantidad * $formularioEnviado->item6_precio) +
                  ($formularioEnviado->item7_cantidad * $formularioEnviado->item7_precio) +
                  ($formularioEnviado->item8_cantidad * $formularioEnviado->item8_precio) +
                  ($formularioEnviado->item9_cantidad * $formularioEnviado->item9_precio) +
                  ($formularioEnviado->item10_cantidad * $formularioEnviado->item10_precio) }}
                </th>
            </tr>
          </tbody>
        </table>

    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MANIFESTACIÓN DE LOS BIENES DEL EMPRENDEDOR  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
        <div class="tab">
     @isset($observaciones[0])
      @for($i=0; $i < count($observaciones); $i++)
        @if($observaciones[$i]->hoja == 'mbe')
        <input type="input" id="{{$observaciones[$i]->hoja}}_id" value="{{$observaciones[$i]->id}}" hidden>
        <div class="observacion"><p><b>Agregar observación para mbe:</b></p><textarea name=observaciones["{{$observaciones[$i]->hoja}}"]>{{$observaciones[$i]->observacion}}</textarea></div>
        <button type="button" style="background-color: red;" id="eliminarObservacionmbe">Eliminar</button>
        @endif
      @endfor
    @endisset

    <?php Helpers::crearCheckValido('mbe',$pasosValidos->mbe) ?>
    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="portada">OBSERVACIÓN</button>
    <script type="text/javascript">
      $('#eliminarObservacionmbe').on('click',function() {
        console.log('eliminar');
        console.log($('#mbe_id').val());
        var datos = {};
                      datos['id'] = $('#mbe_id').val();
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
          <td style="text-align: center;"><?= $formularioEnviado->usuario->get_localidad->nombre ?? '' ?></td>
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
          <td style="text-align: center;"><?= $formularioEnviado->efectivoMBE + $formularioEnviado->cuentasBancariasMBE + $formularioEnviado->creditosVentasMBE + $formularioEnviado->otrosCreditosMBE + $formularioEnviado->mercaderiasMBE + $formularioEnviado->materiasPrimasMBE + $formularioEnviado->insumosMBE + $formularioEnviado->rodadosMBE + $formularioEnviado->maquinariasEquiposMBE + $formularioEnviado->instalacionesMBE ?> </td>
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
          <td style="text-align: center;"> <?= $formularioEnviado->deudaCuentasCorrientesMBE + $formularioEnviado->deudaChequesPagoDiferidoMBE + $formularioEnviado->documentadasMBE  + $formularioEnviado->otrasDeudasComercialesMBE + $formularioEnviado->deudaTarjetasCreditoMB + $formularioEnviado->deudaGarantiaPrendariaMBE + $formularioEnviado->deudaAfipMBE + $formularioEnviado->deudaRentasRnMBE + $formularioEnviado->deudaTributosMunicipalesMBE + $formularioEnviado->deudasSocialesMBE + $formularioEnviado->otrasDeudasMBE ?> </td>
        </tr>
    </table>
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MANIFESTACIÓN DE LOS BIENES DEL GARANTE  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
     @isset($observaciones[0])
      @for($i=0; $i < count($observaciones); $i++)
        @if($observaciones[$i]->hoja == 'mbg')
        <input type="input" id="{{$observaciones[$i]->hoja}}_id" value="{{$observaciones[$i]->id}}" hidden>
        <div class="observacion"><p><b>Agregar observación para mbg:</b></p><textarea name=observaciones["{{$observaciones[$i]->hoja}}"]>{{$observaciones[$i]->observacion}}</textarea></div>
        <button type="button" style="background-color: red;" id="eliminarObservacionmbg">Eliminar</button>
        @endif
      @endfor
    @endisset

    <?php Helpers::crearCheckValido('mbg',$pasosValidos->mbg) ?>
    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="portada">OBSERVACIÓN</button>
    <script type="text/javascript">
      $('#eliminarObservacionmbg').on('click',function() {
        console.log('eliminar');
        console.log($('#mbg_id').val());
        var datos = {};
                      datos['id'] = $('#mbg_id').val();
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
          <td style="text-align: center;"> <?= $formularioEnviado->efectivoMBG + $formularioEnviado->cuentasBancariasMBG + $formularioEnviado->creditosVentasMBG + $formularioEnviado->otrosCreditosMBG + $formularioEnviado->mercaderiasMBG + $formularioEnviado->materiasPrimasMBG + $formularioEnviado->insumosMBG + $formularioEnviado->rodadosMBG + $formularioEnviado->maquinariasEquiposMBG + $formularioEnviado->instalacionesMBG ?> </td>
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
          <td style="text-align: center;"> <?= $formularioEnviado->deudaCuentasCorrientesMBG + $formularioEnviado->deudaChequesPagoDiferidoMBG + $formularioEnviado->documentadasMBG  + $formularioEnviado->otrasDeudasComercialesMBG + $formularioEnviado->deudaTarjetasCreditoMB + $formularioEnviado->deudaGarantiaPrendariaMBG + $formularioEnviado->deudaAfipMBG + $formularioEnviado->deudaRentasRnMBG + $formularioEnviado->deudaTributosMunicipalesMBG + $formularioEnviado->deudasSocialesMBG + $formularioEnviado->otrasDeudasMBG ?>  </td>
        </tr>
    </table>
    </div>
   
    </div>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\ DOCUMENTACIÓN  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
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
     @isset($observaciones[0])
      @for($i=0; $i < count($observaciones); $i++)
        @if($observaciones[$i]->hoja == 'documentacion')
        <input type="input" id="{{$observaciones[$i]->hoja}}_id" value="{{$observaciones[$i]->id}}" hidden>
        <div class="observacion"><p><b>Agregar observación para documentacion:</b></p><textarea name=observaciones["{{$observaciones[$i]->hoja}}"]>{{$observaciones[$i]->observacion}}</textarea></div>
        <button type="button" style="background-color: red;" id="eliminarObservaciondocumentacion">Eliminar</button>
        @endif
      @endfor
    @endisset

    <?php Helpers::crearCheckValido('documentacion',$pasosValidos->documentacion) ?>
    <button type="button" style="background-color: #ff9800;" id="agregarObservacion" value="portada">OBSERVACIÓN</button>
    <script type="text/javascript">
      $('#eliminarObservaciondocumentacion').on('click',function() {
        console.log('eliminar');
        console.log($('#documentacion_id').val());
        var datos = {};
                      datos['id'] = $('#documentacion_id').val();
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
      <p class="hoja" style="display: none;">documentacion</p>
      <p class="nombreHoja" style="font-weight: bold;font-size: 26px;">DOCUMENTACIÓN</p>
      <div align="center">
        <table>
    <thead>
    <tr>
        <th>Archivo</th>
        <th>Descripción</th>
    </tr>
  </thead>
  <tbody>
      @foreach($formularioEnviado->documentacion as $documentacion)
      <tr>
        <td><a href="{{url('/images/'.$documentacion->id)}}">Ver archivo</a></td>
        <td>{{$documentacion->descripcion}}</td>
      </tr>
      @endforeach
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
        $('#fecPresentacionProyecto').mask('00-00-0000');
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