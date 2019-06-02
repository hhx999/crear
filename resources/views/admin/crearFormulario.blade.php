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
<form id="regForm" action="crearFormulario" method="POST">

  <!-- hidden inputs -->
    <p><input type="hidden" name="form_tipo_id" value="<?=$tipoForm ?>"></p>
    <!-- fin hidden -->

  <h1>Línea Emprendedor</h1>
  <H3 align="center">Línea de créditos para emprendedores</H3>

  <a href="ingresarForm"><button type="button">Volver</button></a><br>
  <div style="border-top: 2px solid #4CAF50;display: inline-block;width: 30px;"></div>
  <div style="border-top: 2px solid #0174b6;display: inline-block;width: 25px;"></div>
  <div style="border-top: 2px solid #4CAF50;display: inline-block;width: 92%;"></div>
      <button type="button" id="incompletoBtn" onclick="enviarForm()">Enviar Formulario Incompleto</button>
<p> Los campos con <span style="color:red;">&#10033;</span> son requeridos.</p>
  <div class="tab">
    <B><H2>PORTADA</H2></B>
    <!-- ªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªªª-->
    <div>
    <?php
    if ($datosUsuario) {
      echo '<select class="w3-select" name="idUsuario">
      <option value="" disabled selected>Elegí un usuario</option>';
      for ($i=0; $i < count($datosUsuario); $i++) { 
        echo '<option value="'.$datosUsuario[$i]->id.'">'.$datosUsuario[$i]->nombre.'</option>';
      }
      echo '</select>';
    }
    ?>
    </div>
    <br>
    <div class="float-container">
      <label>Título del proyecto <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese título del proyecto..." name="tituloProyecto" maxlength="43" id="tituloProyecto">
    </div>

    <div class="float-container">
      <label>Nombre y apellido <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese nombre y apellido del solicitante ..." name="nombreSolicitante" maxlength="43">
    </div>
    <div class="float-container">
      <label>Localidad <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese localidad..." name="localidadSolicitante" maxlength="43" id="localidadPortada" autocomplete="off">
    </div>

    <div class="float-container">
      <label>Agencia <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese agencia..." name="agenciaProyecto" maxlength="43" id="agenciaPortada" readonly>
    </div>

    <script type="text/javascript">
      var ciudades = [];
      $(document).ready(function(){
          var localidad = 'Localidad';
          
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
          $.ajax({
                    type: 'POST',
                    url: "{{ url('/buscarLocalidades') }}",
                    dataType: "json",
                    data : {'buscar' : localidad }
                }).done(function (data) {
                  for (i = 0; i < data.length; i++)
                  {
                    ciudades.push(data[i]['nombre']);
                  }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    
  if (jqXHR.status === 0) {

    alert('Not connect: Verify Network.');

  } else if (jqXHR.status == 404) {

    alert('Requested page not found [404]');

  } else if (jqXHR.status == 500) {

    alert('Internal Server Error [500].');

  } else if (textStatus === 'parsererror') {

    alert('Requested JSON parse failed.');

  } else if (textStatus === 'timeout') {

    alert('Time out error.');

  } else if (textStatus === 'abort') {

    alert('Ajax request aborted.');

  } else {

    alert('Uncaught Error: ' + jqXHR.responseText);

  }
                });
      });

      $(document).on('focus','#agenciaPortada',function() {
        var localidad = $('#localidadPortada').val();

        console.log('buscarAgencia según Localidad'+localidad);

        var url = window.location.pathname.split('/');
                url = '/'+url[1]+'/'+url[2]+'/';

          $.ajax({
                    type: 'POST',
                    url: url+'buscarLocalidades',
                    dataType: "json",
                    data : {'localidad' : localidad }
                }).done(function (data) {
                  $('#agenciaPortada').val(data.nombre);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    
  if (jqXHR.status === 0) {

    alert('Not connect: Verify Network.');

  } else if (jqXHR.status == 404) {

    alert('Requested page not found [404]');

  } else if (jqXHR.status == 500) {

    alert('Internal Server Error [500].');

  } else if (textStatus === 'parsererror') {

    alert('Requested JSON parse failed.');

  } else if (textStatus === 'timeout') {

    alert('Time out error.');

  } else if (textStatus === 'abort') {

    alert('Ajax request aborted.');

  } else {

    alert('Uncaught Error: ' + jqXHR.responseText);

  }
                });

      }); 
    </script>

    <div class="float-container">
      <label>Monto a solicitar <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese el monto solicitado..." id="montoSolicitado"  name="montoSolicitado" maxlength="6" value="<?=$monto?>" readonly>
    </div>

    <p align="center"><b>BREVE DESCRIPCIÓN DEL EMPRENDIMIENTO Y JUSTIFICACIÓN DE LA NECESIDAD DE FINANCIAMIENTO <span style="color:red;">&#10033;</span></b></p>
    <p><textarea placeholder="Ingrese texto aquí..." name="descEmprendimiento" maxlength="254"></textarea></p>
  </div>
  <!-- FIN TAB PORTADA -->
  <!-- \\\\\\\\\\\\\\\\\\\\\\\ INFORMACION EMPRENDEDOR  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
  <script type="text/javascript">
    $(function() {
    $('input').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
});
  </script>
    <div class="tab">
      <B><H2>INFORMACIÓN DEL EMPRENDEDOR</H2></B>
    <div>
    <p align="center"><b>Datos personales:</b></p>
    </div>

    <div class="float-container">
      <label>Nombre y apellido <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese nombre y apellido del emprendedor..."  name="nombreEmprendedor" id="nombreEmprendedor" maxlength="43">
    </div>

    <div class="float-container">
      <label>DNI <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese el número de documento..." name="dniEmprendedor" id="dni_emprendedor" maxlength="11">
    </div>

    <div class="float-container">
      <label>Localidad <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese la localidad en donde reside..." name="localidadEmprendedor" maxlength="43">
    </div>

    <div class="float-container">
      <label>Domicilio <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese el domicilio real del emprendedor..." name="domicilioEmprendedor" maxlength="43">
    </div>

    <p align="center"><b>Datos de contacto:</b></p>

    <div class="float-container">
      <label>Teléfono <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese el número de teléfono..."  name="telefonoEmprendedor" maxlength="12">
    </div>

    <div class="float-container">
      <label>Email <span style="color:red;">&#10033;</span></label>
      <input data-placeholder="Ingrese su correo electrónico..."  name="emailEmprendedor" maxlength="43">
    </div>

    <div class="float-container">
      <label>Facebook</label>
      <input data-placeholder="Ingrese su cuenta en facebook..."  name="facebookEmprendedor" maxlength="43">
    </div>
    <div style="border-top: 2px solid #4CAF50;display: inline-block;width: 100%;"></div>
    

    <p align="center"><b>Formación y ocupación:</b></p>
    <p align="center">Grado de instrucción <span style="color:red;">&#10033;</span></p>
    <p align="center"><em>Ingrese el último grado de instrucción finalizado por el emprendedor.</em></p>
    <div class="lista_grados" align="center">
      <ul>
        <li><input type="radio" name="gradoInstruccion" value="Primario"> Primario</li>
        <li><input type="radio" name="gradoInstruccion" value="Secundario"> Secundario</li>
        <li><input type="radio" name="gradoInstruccion" value="Terceario"> Terceario </li>
        <li><input type="radio" name="gradoInstruccion" value="Universitario"> Universitario</li>
      </ul>
    </div>

    <div class="float-container">
      <label>Otra aplicación</label>
      <input data-placeholder="Ingrese otra aplicación que desarrolle en la actualidad..." maxlength="43" name="otraOcupacion">
    </div>

    <div class="float-container">
      <label>Ingreso mensual</label>
      <input data-placeholder="Ingresar el salario mensual..." id="ingresoMensual" maxlength="10" name="ingresoMensual">
    </div>

    <div class="float-container">
      <label>Deseo de capacitación</label>
      <input data-placeholder="Deseo de capacitación..." maxlength="43" name="deseoCapacitacion">
    </div>

  </div>

  <!-- \\\\\\\\\\\\\\\\\\\\\\\ DATOS GENERALES EMPRENDIMIENTO  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
  <div class="tab">
    <B><H2>DATOS GENERALES EMPRENDIMIENTO</H2></B>
    <div class="float-container">
      <label>Actividad principal</label>
      <input data-placeholder="Ingrese la actividad principal del emprendimiento..." name="actPrincipalEmprendimiento" maxlength="119">
    </div>
    <div class="float-container">
      <label>Fecha de inicio(dd-mm-AAAA)</label>
      <input data-placeholder="Ingrese la fecha de inicio del emprendimiento" name="fecInicioEmprendimiento" id="inicio_emprendimiento">
    </div>
    <div class="float-container">
      <label>Antigüedad</label>
      <input data-placeholder="Ingrese la antigüedad del emprendimiento..." maxlength="43" name="antiguedadEmprendimiento">
    </div>

    <div class="float-container">
      <label>CUIT</label>
      <input data-placeholder="Ingrese el número de CUIT..." maxlength="19" name="cuitEmprendimiento" id="cuit_emprendimiento">
    </div>

    <div class="float-container">
      <label>Ingresos brutos</label>
      <input data-placeholder="Ingrese el número de ingresos brutos del emprendimiento..." maxlength="10" name="ingresosBrutosEmprendimiento" id="ingresosBrutos">
    </div>
    <div style="border-top: 2px solid #4CAF50;display: inline-block;width: 100%;"></div>

    <p align="center"><b>Localización del emprendimiento</b></p>

    <div class="float-container">
      <label>Domicilio real</label>
      <input data-placeholder="Ingrese el domicilio real del emprendimiento..." maxlength="43" name="domicilioEmprendimiento">
    </div>

    <div class="float-container">
      <label>Localidad</label>
      <input data-placeholder="Ingrese la localidad del emprendimiento..." maxlength="43" name="localidadEmprendimiento" id="localidad_emprendimiento" autocomplete="off">
    </div>

    <p align="center"><b>El lugar donde se desarrolla es:</b></p>
    <div class="lista_grados" align="center">
      <ul>
        <li><input type="radio" name="lugarEmprendimiento" value="Propio"> Propio</li>
        <li><input type="radio" name="lugarEmprendimiento" value="Prestado"> Prestado</li>
        <li><input type="radio" name="lugarEmprendimiento" value="Alquilado"> Alquilado  </li>
        <li><input type="radio" name="lugarEmprendimiento" value="Otro"> Otro</li>
      </ul>
    </div>
    <p align="center"><B>DETALLE EL-LOS PRODUCTOS O SERVICIOS QUE OFRECERÁ:</B></p>
    <p><textarea placeholder="Ingrese texto aquí..." maxlength="254" name="descProdServicios"></textarea></p>
    <p align="center"><b>¿HA RECIBIDO APORTES O CRÉDITOS DE ORGANISMOS PÚBLICOS PARA EL DESARROLLO DEL PROYECTO?</b></p>
    <p align="center"><em>En caso de no haber recibido aportes, deje vacíos los campos.</em></p>

    <div class="float-container">
      <label>Institución</label>
      <input data-placeholder="Ingrese la institución de la cual ha recibido el aporte..." maxlength="43" name="institucionAporte">
    </div>

    <div class="float-container">
      <label>Fecha</label>
      <input data-placeholder="Ingrese la fecha en la que ha recibido el aporte..." name="fecAporte" id="fecha_institucion">
    </div>

    <div class="float-container">
      <label>Monto</label>
      <input data-placeholder="Ingrese el monto del aporte" maxlength="10" name="montoAporte" id="montoAporte">
    </div>

    <p align="center"><b>TIPO DE APORTE:</b></p>
    <div class="lista_grados" align="center">
      <ul>
        <li><input type="radio" name="tipoAporte" value="Credito"> Credito</li>
        <li><input type="radio" name="tipoAporte" value="Subsidio"> Subsidio</li>
        <li><input type="radio" name="tipoAporte" value="Otro"> Otro  </li>
      </ul>
    </div>
    <p align="center">
      <b>ESTADO DE DEVOLUCIÓN/RENDICIÓN:</b>
    </p>
    <div class="lista_grados" align="center">
      <ul>
        <li><input type="radio" name="estadoAporte" value="Rendido"> Rendido</li>
        <li><input type="radio" name="estadoAporte" value="En proceso"> En proceso</li>
        <li><input type="radio" name="estadoAporte" value="No rendido"> No rendido</li>
        <li><input type="radio" name="estadoAporte" value="Otro"> Otro</li>
      </ul>
    </div>
    <br><div style="border-top: 2px solid #4CAF50;display: inline-block;width: 100%;"></div>
    <p align="center">
      <B>EXPERIENCIA O FORMACIÓN DE EL/LOS EMPRENDEDORES PARA EL DESARROLLO DEL EMPRENDIMIENTO:</B></p>
    <p><textarea placeholder="Ingrese texto aquí..." maxlength="254" name="experienciaEmprendedores"></textarea></p>
    <p align="center"><B>OPORTUNIDAD DE MERCADO O  PROBLEMA QUE  RESUELVE:</B></p>
    <p><textarea placeholder="Ingrese texto aquí..." maxlength="254" name="oportunidadMercado"></textarea></p>
    <p align="center"><B>DESCRIPCIÓN DEL DESTINO DEL FINANCIAMIENTO:</B></p>
    <p><textarea placeholder="Ingrese texto aquí..." maxlength="254" name="descFinanciamiento"></textarea></p>
  </div>
  <!-- \\\\\\\\\\\\\\\\\\\\\\\ ASPECTOS SOCIALES  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
  <div class="tab">
    <B><H2>ASPECTOS SOCIALES</H2></B>
    <p align="center">
     <b> Situación laboral actual:</b>
    </p>
    <div class="lista_grados" align="center">
      <ul>
        <li><input type="radio" name="situacionLaboral" value="Ocupado"> Ocupado</li>
        <li><input type="radio" name="situacionLaboral" value="Desocupado"> Desocupado</li>
        <li><input type="radio" name="situacionLaboral" value="Changas"> Changas</li>
        <li><input type="radio" name="situacionLaboral" value="Trabajo temporal"> Trabajo temporal</li>
        <li><input type="radio" name="situacionLaboral" value="Ama de casa"> Ama de casa</li>
        <li><input type="radio" name="situacionLaboral" value="Otro"> Otro</li>
      </ul>
    </div>
    <div class="float-container">
      <label>Aclaraciones</label>
      <input data-placeholder="Ingrese aclaraciones..." maxlength="79" name="aclaracionesGenerales">
    </div>

    <div class="float-container">
      <label>Ingreso</label>
      <input data-placeholder="Ingrese el salario general..." maxlength="10" name="ingresoGenerales" id="ingresoGenerales">
    </div>


    <p align="center">
     <b> Percepciones sociales: </b>
    </p>
    <p align="center"><em>En caso de no haber recibido ninguna de éstas, deje vacíos los campos.</em></p>
    <div class="lista_grados" align="center">
      <ul>
        <li><input type="radio" name="percepcionesSociales" value="Pensión/Jubilación"> Pensión/Jubilación</li>
        <li><input type="radio" name="percepcionesSociales" value="AUH/AFH"> AUH/AFH</li>
        <li><input type="radio" name="percepcionesSociales" value="Pensión madre de siete hijos"> Pensión madre de siete hijos</li>
        <li><input type="radio" name="percepcionesSociales" value="Prestación por desempleo"> Prestación por desempleo</li>
        <li><input type="radio" name="percepcionesSociales" value="Prestación por viudez o fallecimiento"> Prestación por viudez o fallecimiento</li>
        <li><input type="radio" name="percepcionesSociales" value="Otro"> Otro</li>
      </ul>
    </div>

    <div class="float-container">
      <label>Monto al mes</label>
      <input data-placeholder="Ingrese el monto al mes de las percepciones sociales..." maxlength="10" name="montoMesPercepciones" id="montoMes">
    </div>

    <div class="float-container">
      <label>Personas a cargo</label>
      <input data-placeholder="Ingrese la cantidad de personas que tiene a cargo..." maxlength="2" name="cantPersonasCargo">
    </div>


    <p align="center">
     <b> Lugar donde vivo es: </b>
    </p>
    <div class="lista_grados" align="center">
      <ul>
        <li><input type="radio" name="lugarHabita" value="Propio"> Propio</li>
        <li><input type="radio" name="lugarHabita" value="Alquilado"> Alquilado</li>
        <li><input type="radio" name="lugarHabita" value="Prestado"> Prestado</li>
        <li><input type="radio" name="lugarHabita" value="Otro"> Otro</li>
      </ul>
    </div>
    <p align="center">Personas o instituciones que pueden dar referencias sobre el emprendedor</p>
    <input type="button" id="add_field" value="adicionar">
    <br>
    <div id="listas">
    </div>
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MERCADO  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
      <B><H2>MERCADO</H2></B>
      <div id="clientes_mercado">
        <p align="center"><b>PRINCIPALES CLIENTES - ¿Quién te compra?</b></p>
        <input type="button" id="add_cliente" value="adicionar">
        <br>
      </div>
      <div id="proveedores_mercado">
        <p align="center"><b>PROVEEDORES ¿A quién le comprás tus materias primas o insumos?</b></p>
        <input type="button" id="add_proveedor" value="adicionar">
        <br>
      </div>
      <div id="competencia_mercado">
        <p align="center"><b>COMPETENCIA ¿Quién vende lo mismo que vos o algo parecido?</b></p>
        <input type="button" id="add_competencia" value="adicionar">
        <br>
      </div>
      <br><div style="border-top: 2px solid #4CAF50;display: inline-block;width: 100%;"></div>
      <p align="center"><b>¿CUÁL SERÍA TU VENTAJA EN COMPARACIÓN CON LOS COMPETIDORES? ¿Cómo te diferencias?</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="ventajaCompetidores" maxlength="254"></textarea></p>
      <p align="center"><b>ESTRATEGIAS DE PROMOCIÓN QUE UTILIZARÁ ¿Cómo vas a hacer conocer tu producto o servicio?</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="estrategiasPromocion" maxlength="254"></textarea></p>
      <p align="center"><b>PUNTOS DE VENTA ¿Dónde vas a vender?</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="puntosVenta" maxlength="254"></textarea></p> 
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ PRODUCCIÓN - COSTOS - RESULTADOS  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
      <h2><b>PRODUCCIÓN - COSTOS - RESULTADOS</b></h2>
      <p align="center"><b>MATERIAS PRIMAS O INSUMOS QUE SE NECESITAN</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="materiasPrimas" maxlength="254"></textarea></p>
      <p align="center"><b>HERRAMIENTAS O MAQUINARIAS NECESARIAS PARA PRODUCIR O BRINDAR EL SERVICIO</b></p>
      <p><textarea placeholder="Ingrese texto aquí..." name="descHerramientas" maxlength="254"></textarea></p>
      <!-- ITEM DINAMICO VENTAS -->
        <div id="ventas_financiamiento">
          <p align="center"><b>VOLUMEN ESTIMADO DE VENTAS AL MES DE EJECUTAR EL FINANCIAMIENTO</b></p>
          <input type="button" id="add_venta" value="adicionar">
          <br>
        </div>
      <!-- FIN ITEM DINAMICO VENTAS -->
      <p align="center">TOTAL:</p>
      <p><input placeholder= "Total" type="text" name="total_completo" id="total_completo" readonly></p>
      <div id="costos_emprendimiento" class="costosEmprendimiento" align="center">
          <p><B>OTROS COSTOS DEL EMPRENDIMIENTO</B></p>
          <div>
            <p><label>Insumos y materias primas:</label></p>
            <input placeholder="Insumos y materias primas..." class="sumable" maxlength="10" name="insumosCostos" id="insumos_materias" value="0">
          </div>

          <div>
            <p><label >Alquileres:</label></p>
            <input placeholder="Alquileres..." class="sumable" maxlength="10" name="alquileresCostos" id="alquileres" value="0">
          </div>

          <div>
            <p><label>Servicios(luz-agua-gas-internet)</label></p>
            <input placeholder="Servicios(luz-agua-gas-internet)..." class="sumable" maxlength="10" name="serviciosCostos" id="servicios_otros" value="0">
          </div>
          <div>
            <p><label>Monotributo</label></p>
            <input placeholder="Monotributo..." class="sumable" maxlength="10" name="monotributoCostos" id="monotributo_otros" value="0">
          </div>
          <div>
            <p><label>Ingresos brutos</label></p>
            <p><input placeholder="Ingresos brutos..." class="sumable" maxlength="10" name="ingresosBrutosCostos" id="ingresos_brutos" value="0"></p>
          </div>
          <div>
            <p><label>Seguros</label></p>
            <p><input placeholder="Seguros..." class="sumable" maxlength="10" name="segurosCostos" id="seguros_otros" value="0"></p>
          </div>
          <div>
            <p><label>Combustible</label></p>
            <p><input placeholder="Combustible..." class="sumable" maxlength="10" name="combustibleCostos" id="combustible_otros" value="0"></p>
          </div>
          <div>
            <p><label>Sueldos</label></p>
            <p><input placeholder="Sueldos..." class="sumable" maxlength="10" name="sueldosCostos" id="sueldos_otros" value="0"></p>
          </div>
          <div>
            <p><label>Comercialización</label></p>
            <p><input placeholder="Comercializacion..." class="sumable" maxlength="10" name="comercializacionCostos" id="comercializacion" value="0"></p>
          </div>
          <div>
            <p><label>Otros</label></p>
            <p><input placeholder="Otros..." class="sumable" maxlength="10" name="otrosCostos" id="otros" value="0"></p>
          </div>
          <div>
            <p><label>Cuota Mensual</label></p>
            <p><input placeholder="Cuota mensual..." class="sumable" maxlength="10" name="cuotaMensualCostos" id="cuotamensual_otros" value="0"></p>
          </div>
            <p align="center">TOTAL</p>
            <p><input type="text" id="total_costos" name="total_costos"></p>
      </div>
      <!-- ITEM DINAMICO BIENES FINANCIAMIENTO -->
        <div id="financiamiento">
          <p align="center"><b>BIENES A FINANCIAR</b></p>
          <input type="button" id="add_itemFinan" value="adicionar">
          <div id="item_financiamiento">
          </div>
        </div>
         <!-- FIN ITEM DINAMICO BIENES FINANCIAMIENTO -->
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MANIFESTACIÓN DE LOS BIENES DEL EMPRENDEDOR  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
        <div class="tab">
    <b><h2>MANIFESTACIÓN DE LOS BIENES DEL EMPRENDEDOR</h2></b>

    <div class="float-container">
      <label>Nombre y apellido</label>
      <input type="text" data-placeholder="Ingresar nombre y Apellido..." maxlength="43" name="nombreMBE" id="nombre_mbe">
    </div>
    <div class="float-container">
      <label>DNI</label>
      <input type="text" data-placeholder="Ingresar DNI..." maxlength="11" name="dniMBE">
    </div>
    <div class="float-container">
      <label>CUIT</label>
      <input type="text" data-placeholder="Ingresar CUIT..." maxlength="20" name="cuitMBE">
    </div>
    <div class="float-container">
      <label>Localidad</label>
      <input type="text" data-placeholder="Ingresar Localidad..." maxlength="43" name="localidadMBE">
    </div>
    <div class="float-container">
      <label>Domicilio</label>
      <input type="text" data-placeholder="Ingresar Domicilio..." maxlength="43" name="domicilioMBE">
    </div>

    <div id="bienes_emprendedor">
    
    <div id="disponibilidades">
      <p align="center"><b>DISPONIBILIDADES</b></p>
      <input type="button" id="add_disponibilidad" value="adicionar">
    </div>

      <div id="bienes_cambio">
      <p align="center"><b>BIENES DE CAMBIO</b></p>
      <input type="button" id="add_bien" value="adicionar">
      </div>

      <div id="bienes_uso">
        <p align="center"><b>BIENES DE USO</b></p>
        <input type="button" id="add_bienuso" value="adicionar">
      </div>
      <hr style="border-top: 4px solid #0174b6 !important;">
        <div id="deudas_comerciales">
          <p align="center"><b>DEUDAS COMERCIALES</b></p>
          <input type="button" id="add_deudacomercial" value="adicionar">
        </div>

        <div id="deudas_bancarias">
          <p align="center"><b>DEUDAS BANCARIAS</b></p>
          <input type="button" id="add_deudabancaria" value="adicionar">
        </div>

        <div id="deudas_fiscales">
          <p align="center"><b>DEUDAS FISCALES</b></p>
          <input type="button" id="add_deudafiscal" value="adicionar">
        </div>
        
        <p><input placeholder="Otras deudas..." maxlength="10" type="text" name="otras_deudas"></p>
    </div>
   
    </div>
    <!-- \\\\\\\\\\\\\\\\\\\\\\\ MANIFESTACIÓN DE LOS BIENES DEL GARANTE  \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="tab">
    <h2><b>MANIFESTACIÓN DE LOS BIENES DEL GARANTE</b></h2>
    
    <div class="float-container">
      <label>Nombre y apellido</label>
      <input type="text" data-placeholder="Ingresar nombre y Apellido..." maxlength="43" name="nombreMBG">
    </div>
    <div class="float-container">
      <label>DNI</label>
      <input type="text" data-placeholder="Ingresar DNI..." maxlength="11" name="dniMBG">
    </div>
    <div class="float-container">
      <label>CUIT</label>
      <input type="text" data-placeholder="Ingresar CUIT..." maxlength="20" name="cuitMBG">
    </div>
    <div class="float-container">
      <label>Localidad</label>
      <input type="text" data-placeholder="Ingresar Localidad..." maxlength="43" name="localidadMBG">
    </div>
    <div class="float-container">
      <label>Domicilio</label>
      <input type="text" data-placeholder="Ingresar Domicilio..." maxlength="43" name="domicilioMBG">
    </div>

    <div id="bienes_garante">
    
    <div id="disponibilidades_g">
      <p align="center"><b>DISPONIBILIDADES</b></p>
      <input type="button" id="add_disponibilidad_g" value="adicionar">
    </div>

      <div id="bienes_cambio_g">
      <p align="center"><b>BIENES DE CAMBIO</b></p>
      <input type="button" id="add_bien_g" value="adicionar">
      </div>

      <div id="bienes_uso_g">
        <p align="center"><b>BIENES DE USO</b></p>
        <input type="button" id="add_bienuso_g" value="adicionar">
      </div>
      <hr>
        <div id="deudas_comerciales_g">
          <p align="center"><b>DEUDAS COMERCIALES</b></p>
          <input type="button" id="add_deudacomercial_g" value="adicionar">
        </div>

        <div id="deudas_bancarias_g">
          <p align="center"><b>DEUDAS BANCARIAS</b></p>
          <input type="button" id="add_deudabancaria_g" value="adicionar">
        </div>

        <div id="deudas_fiscales_g">
          <p align="center"><b>DEUDAS FISCALES</b></p>
          <input type="button" id="add_deudafiscal_g" value="adicionar">
        </div>
        
        <p><input placeholder="Otras deudas..." type="text" name="otras_deudas_g"></p>
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

  <!-- Circles which indicates the steps of the form: -->
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
  <p align="center"><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>
</form>

<script type="text/javascript" src="{{ asset('js/autocomplete.js') }}"></script>
 <script>
autocomplete(document.getElementById("localidadPortada"), ciudades);
</script> 

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
<script type="text/javascript" src="{{ asset('js/rules_validation.js') }}"></script>



<script type="text/javascript">
  $(document).ready(function(){
        //FORMATO DE MASCARAS
        $('#cuit_emprendimiento').mask('00-00000000-0');
        $('#dni_emprendedor').mask('00000000'); //placeholder
        $('#inicio_emprendimiento').mask('00-00-0000');
        $('#fecha_institucion').mask('00-00-0000');
        $('#montoSolicitado').mask("0000000");
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