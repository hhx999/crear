<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <title>LINEA EMPRENDEDOR</title>
        <style type="text/css">
        * {
          font-family: sans-serif;
        }
        .cabecera{
            text-align: center;
            padding:20px;
        }
        .cabecera_azul{
            background:#000080;
            color: white;
            text-align: center;
            padding:20px;
        }
        h2,h3{
            float:left;
        }
        #proyecto p {
            display: inline-block;
        }
        th,td {
          padding: 6px;
        }
        .documentacion input {
          padding 5px;
        }
        </style>
    <title>FORMULARIO Nº <?=$datosFormulario->numeroProyecto?> - $datosFormulario->tituloProyecto</title>
    </head>
    <body>
    <div class="cabecera" style="font-size: 24px;">
        <b>LÍNEA DE CRÉDITOS PARA EMPRENDEDORES</b><br>
        Portada a completar por la Agencia de Desarrollo<br>
    </div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
        <tbody>
          <tr>
            <th>TÍTULO DEL PROYECTO:</th>
            <td><?php isset($datosFormulario->tituloProyecto) ? print $datosFormulario->tituloProyecto : print "-" ; ?></td>
          </tr>
          <tr>
            <th>Nombre y apellido solicitante:</th>
            <td><?php isset($datosFormulario->nombreSolicitante) ? print $datosFormulario->nombreSolicitante : print "-" ; ?></td>
          </tr>
          <tr>
            <th>Localidad:</th>
            <td><?php isset($datosFormulario->localidadSolicitante) ? print $datosFormulario->localidadSolicitante : print "-" ; ?></td>
          </tr>
          <tr>
              <th>Agencia:</th>
              <td><?php isset($datosFormulario->agenciaProyecto) ? print $datosFormulario->agenciaProyecto : print "-" ; ?></td>
          </tr>
          <tr>
              <th>Número de proyecto:</th>
              <td><?php isset($datosFormulario->numeroProyecto) ? print $datosFormulario->numeroProyecto : print "-" ; ?></td>
          </tr>
          <tr>
              <th>Monto solicitado:</th>
              <td><?php isset($datosFormulario->montoSolicitado) ? print $datosFormulario->montoSolicitado : print "-" ; ?></td>
          </tr>
            <tr>
              <th>Fecha de presentación de proyecto:</th>
              <td><?php isset($datosFormulario->fecPresentacionProyecto) ? print $datosFormulario->fecPresentacionProyecto : print "-" ; ?></td>
          </tr>
        </tbody>
        </table>
    <div class="cabecera_azul" style="margin-top: 30px;">
        <b>BREVE DESCRIPCIÓN DEL EMPRENDIMIENTO Y JUSTIFICACIÓN DE LA NECESIDAD DE FINANCIAMIENTO </b>
    </div>
    <div style="border: 1px solid black;width: 100%;margin-top: 10px;margin-left: 15px;margin-right: 15px;padding-bottom: 10px;padding-left: 10px;padding-right: 10px;">
        <p> <?php isset($datosFormulario->descEmprendimiento) ? print $datosFormulario->descEmprendimiento : print "-" ; ?>
        </p>
    </div>
    <style type="text/css">.documentacion {
        margin: 10px;
    }
    .documentacion input {
        margin:5px;
    }
</style>
    <div style="margin-top: 40px; font-size: 22px;">CHECKLIST DOCUMENTACIÓN</div>
    <div class="documentacion">
      <ul>
      <?php foreach($documentacionUsuario as $documento)
      {
          print_r('<li><input type="checkbox" name="'.$documento.'" checked >'.$documento.'</li>');
      }
      foreach($documentacionFaltante as $faltante)
      {
          print_r('<li><input type="checkbox" name="'.$faltante.'" >'.$faltante.'</li>');
      }
      ?>
    </ul>
    </div>
    <div style="page-break-after: always;clear:both;"></div>
    <div class="cabecera"> <b style="font-size:24px;">DATOS PERSONALES</b> </div>
    <div class="cabecera_azul">
        <b>INFORMACIÓN DEL EMPRENDEDOR</b>
    </div>
    <div style="margin-top: 40px;">
    <div align="center" style="margin-bottom: 20px;"><b>DATOS GENERALES:</b></div>
        <table style="width:100%;" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th>NOMBRE Y APELLIDO:</th>
                <td><?php isset($datosFormulario->nombreEmprendedor) ? print $datosFormulario->nombreEmprendedor : print "-" ; ?></td>
              </tr>
              <tr>
                <th>DNI</th>
                <td><?php isset($datosFormulario->dniEmprendedor) ? print $datosFormulario->dniEmprendedor : print "-" ; ?></td>
              </tr>
              <tr>
                <th>LOCALIDAD:</th>
                <td><?php isset($datosFormulario->localidadEmprendedor) ? print $datosFormulario->get_localidad->nombre : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>DOMICILIO:</th>
                  <td><?php isset($datosFormulario->domicilioEmprendedor) ? print $datosFormulario->domicilioEmprendedor : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
    </div>
    <div style="margin-top: 40px;">
        <div align="center" style="margin-bottom: 20px;"><b>DATOS DE CONTACTO:</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                  <th>TELÉFONO:</th>
                  <td><?php isset($datosFormulario->telefonoEmprendedor) ? print $datosFormulario->telefonoEmprendedor : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>EMAIL:</th>
                  <td><?php isset($datosFormulario->emailEmprendedor) ? print $datosFormulario->emailEmprendedor : print "-" ; ?></td>
              </tr>
                <tr>
                  <th>FACEBOOK:</th>
                  <td><?php isset($datosFormulario->facebookEmprendedor) ? print $datosFormulario->facebookEmprendedor : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>INSTAGRAM:</th>
                  <td><?php isset($datosFormulario->instagramEmprendedor) ? print $datosFormulario->instagramEmprendedor : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
    </div>
    <div style="margin-top: 40px;">
        <div align="center" style="margin-bottom: 20px;"><b>FORMACIÓN Y OCUPACIÓN:</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                  <th>GRADO DE INSTRUCCIÓN</th>
                  <td>
                    <?php isset($datosFormulario->gradoInstruccion) ? print $datosFormulario->gradoInstruccion : print "-" ; ?>
                    </td>
              </tr>
              <tr>
                  <th>OTRA APLICACIÓN QUE DESARROLLE EN LA ACTUALIDAD</th>
                  <td><?php isset($datosFormulario->otraOcupacion) ? print $datosFormulario->otraOcupacion : print "-" ; ?></td>
              </tr>
                <tr>
                  <th>INGRESO MENSUAL:</th>
                  <td><?php isset($datosFormulario->ingresoMensual) ? print $datosFormulario->ingresoMensual : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>DESEO DE CAPACITACIÓN:</th>
                  <td><?php isset($datosFormulario->deseoCapacitacion) ? print $datosFormulario->deseoCapacitacion : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
    </div>
    <div style="page-break-after: always;clear:both;"></div>
        <div class="cabecera_azul"> <b> DATOS GENERALES DEL EMPRENDIMIENTO </b> </div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th>TÍTULO DEL PROYECTO:</th>
                <td><?php isset($datosFormulario->tituloProyecto) ? print $datosFormulario->tituloProyecto : print "-" ; ?></td>
              </tr>
              <tr>
                <th>ACTIVIDAD PRINCIPAL:</th>
                <td><?php isset($datosFormulario->actPrincipalEmprendimiento) ? print $datosFormulario->actividadPrincipal->nombre : print "-" ; ?></td>
              </tr>
              <tr>
                <th>FECHA DE INICIO A LA ACTIVIDAD:</th>
                <td><?php isset($datosFormulario->fecInicioEmprendimiento) ? print $datosFormulario->fecInicioEmprendimiento : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>ANTIGÜEDAD:</th>
                  <td><?php isset($datosFormulario->antiguedadEmprendimiento) ? print $datosFormulario->antiguedadEmprendimiento : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>NÚMERO DE CUIT:</th>
                  <td><?php isset($datosFormulario->cuitEmprendimiento) ? print $datosFormulario->cuitEmprendimiento : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>NÚMERO DE INGRESOS BRUTOS:</th>
                  <td><?php isset($datosFormulario->ingresosBrutosEmprendimiento) ? print $datosFormulario->ingresosBrutosEmprendimiento : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
        <div class="cabecera_azul"> <b> LOCALIZACIÓN DEL EMPRENDIMIENTO </b> </div>
        
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="width: 240px;">DOMICILIO REAL:</th>
                <td><?php isset($datosFormulario->domicilioEmprendimiento) ? print $datosFormulario->domicilioEmprendimiento : print "-" ; ?></td>
              </tr>
              <tr>
                <th style="width: 240px;">LOCALIDAD:</th>
                <td><?php isset($datosFormulario->localidadEmprendimiento) ? print $datosFormulario->localidadEmprendimiento : print "-" ; ?></td>
              </tr>
              <tr>
                  <th style="width: 240px;">LUGAR DONDE SE DESARROLLA ES:</th>
                  <td><?php isset($datosFormulario->lugarEmprendimiento) ? print $datosFormulario->lugarEmprendimiento : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
        <div class="cabecera_azul"><b>DETALLE EL-LOS PRODUCTOS O SERVICIOS QUE OFRECERÁ</b></div>
        <div style="align-items: center;">
                <p>
                  <?php isset($datosFormulario->descProdServicios) ? print $datosFormulario->descProdServicios : print "-" ; ?>
                </p>
        <div class="cabecera_azul"><b>EXPERIENCIA O FORMACIÓN DE EL/LOS EMPRENDEDORES PARA EL DESARROLLO DEL EMPRENDIMIENTO</b></div>
                <p><?php isset($datosFormulario->experienciaEmprendedores) ? print $datosFormulario->experienciaEmprendedores : print "-" ; ?>
                </p>
        <div class="cabecera_azul"><b>OPORTUNIDAD DE MERCADO O  PROBLEMA QUE  RESUELVE</b></div>
                <p><?php isset($datosFormulario->oportunidadMercado) ? print $datosFormulario->oportunidadMercado : print "-" ; ?>
                </p>
        <div class="cabecera_azul"><b>DESCRIPCIÓN DEL DESTINO DEL FINANCIAMIENTO</b></div>
                <p><?php isset($datosFormulario->descFinanciamiento) ? print $datosFormulario->descFinanciamiento : print "-" ; ?>
                </p>
        <div style="page-break-after: always;clear:both;"></div>
        <div class="cabecera_azul"><b>MERCADO</b></div>
        <div class="cabecera"> <b> PRINCIPALES CLIENTES - ¿Quién te compra?<br> (Describir perfil de cliente actual: edad, ubicación, nivel socio-económico - intereses)</b> </div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="width: 147px;">CLIENTES</th>
                <th style="width: 107px;">UBICACIÓN</th>
              </tr>
                <?php
                if (!isset($datosFormulario->descripcionClientes)) {
                  echo "<tr><td align='center'>-</td><td align='center'>-</td></tr>";
                } else {
                  echo "<tr><td>".$datosFormulario->descripcionClientes."</td><td>".$datosFormulario->ubicacionClientes."</td></tr>";
                  }
                ?>
            </tbody>
        </table>
        <div class="cabecera"> <b> PROVEEDORES ¿A quién le comprás tus materias primas o insumos? </b> </div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
          <tbody>
            <tr>
              <th style="width: 147px;">NOMBRE O RAZÓN SOCIAL</th>
              <th style="width: 107px;">UBICACIÓN</th>
            </tr>
             <?php
                if (!isset($datosFormulario->descripcionProveedores)) {
                  echo "<tr><td align='center'>-</td><td align='center'>-</td></tr>";
                } else {
                  echo "<tr><td>".$datosFormulario->descripcionProveedores."</td><td>".$datosFormulario->ubicacionProveedores."</td></tr>";
                  }
                ?>
          </tbody>
        </table>
        <div class="cabecera"> <b>COMPETENCIA ¿Quién vende lo mismo que vos o algo parecido?</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
          <tbody>
            <tr>
              <th style="width: 147px;">NOMBRE O RAZÓN SOCIAL</th>
              <th style="width: 107px;">UBICACIÓN</th>
            </tr>
            <?php
                if (!isset($datosFormulario->descripcionCompetencia)) {
                  echo "<tr><td align='center'>-</td><td align='center'>-</td></tr>";
                } else {
                  echo "<tr><td>".$datosFormulario->descripcionCompetencia."</td><td>".$datosFormulario->ubicacionCompetencia."</td></tr>";
                  }
                ?>         
          </tbody>
        </table>
        <div class="cabecera"> <b>¿CUÁL SERÍA TU VENTAJA EN COMPARACIÓN CON LOS COMPETIDORES? ¿Cómo te diferencias? </b></div>
        <p><?php isset($datosFormulario->ventajaCompetidores) ? print $datosFormulario->ventajaCompetidores : ""; ?></p>
        <div class="cabecera_azul"><b>COMERCIALIZACIÓN</b></div>
        <div class="cabecera"><b>ESTRATEGIAS DE PROMOCIÓN QUE UTILIZARÁ¿Cómo vas a hacer conocer tu producto o servicio?</b></div>
        <p><?php isset($datosFormulario->estrategiasPromocion) ? print $datosFormulario->estrategiasPromocion : ""; ?></p>
        <div class="cabecera"><b>PUNTOS DE VENTA ¿Dónde vas a vender? </b></div>
        <p><?php isset($datosFormulario->puntoVentaLocal) ? print "-Local<br>": ""; ?>
          <?php isset($datosFormulario->puntoVentaProvincial) ? print "-Provincial<br>": ""; ?>
          <?php isset($datosFormulario->puntoVentaNacional) ? print "-Nacional<br>": ""; ?>
        </p>
        <div style="page-break-after: always;clear:both;"></div>


        <div class="cabecera_azul"><b>PROCESO PRODUCTIVO</b></div>
        <div class="cabecera"><b>MATERIAS PRIMAS O INSUMOS QUE SE NECESITAN</b></div>
        <p> <?php isset($datosFormulario->materiasPrimas) ? print $datosFormulario->materiasPrimas : ""; ?> </p>
        <div class="cabecera"><b>HERRAMIENTAS O MAQUINARIAS NECESARIAS PARA PRODUCIR O BRINDAR EL SERVICIO</b></div>
        <p> <?php isset($datosFormulario->descHerramientas) ? print $datosFormulario->descHerramientas : ""; ?> </p>
        <div class="cabecera_azul"><b>VENTAS</b></div>
        <div class="cabecera"><b>VOLUMEN ESTIMADO DE VENTAS AL MES DE EJECUTAR EL FINANCIAMIENTO</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
          <tbody>
            <tr>
              <th>PRODUCTO O SERVICIO</th>
              <th>Ud. Medida</th>
              <th style="width: 81px;">CANTIDAD</th>
              <th style="width: 81px;">PRECIO</th>
              <th style="width: 91px;">TOTAL</th>
            </tr>
            <tr>
              <td><?= $datosFormulario->producto1 ?></td>
              <td><?= $datosFormulario->udMedida1 ?></td>
              <td><?= $datosFormulario->cantidad1 ?></td>
              <td><?= $datosFormulario->valor1 ?></td>
              <td><?= $datosFormulario->cantidad1 * $datosFormulario->valor1  ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->producto2 ?></td>
              <td><?= $datosFormulario->udMedida2 ?></td>
              <td><?= $datosFormulario->cantidad2 ?></td>
              <td><?= $datosFormulario->valor2 ?></td>
              <td><?= $datosFormulario->cantidad2 * $datosFormulario->valor2  ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->producto3 ?></td>
              <td><?= $datosFormulario->udMedida3 ?></td>
              <td><?= $datosFormulario->cantidad3 ?></td>
              <td><?= $datosFormulario->valor3 ?></td>
              <td><?= $datosFormulario->cantidad3 * $datosFormulario->valor3  ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->producto4 ?></td>
              <td><?= $datosFormulario->udMedida4 ?></td>
              <td><?= $datosFormulario->cantidad4 ?></td>
              <td><?= $datosFormulario->valor4 ?></td>
              <td><?= $datosFormulario->cantidad4 * $datosFormulario->valor4  ?></td>
            </tr>
            <tr>
              <td colspan="4">Otros productos</td>
              <td><?= $datosFormulario->otrosProductosVenta?></td>
            </tr>
            <tr>
              <TH colspan="4">TOTAL</TH>
              <td><?php $totalVentas =  ($datosFormulario->cantidad1 * $datosFormulario->valor1) + ($datosFormulario->cantidad2 * $datosFormulario->valor2) + ($datosFormulario->cantidad3 * $datosFormulario->valor3) + ($datosFormulario->cantidad4 * $datosFormulario->valor4); echo $totalVentas;   ?></td>
            </tr>
          </tbody>
        </table>

          <div style="page-break-after: always;clear:both;"></div>
        <div class="cabecera_azul"> <b> OTROS COSTOS DEL EMPRENDIMIENTO </b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="text-align: center;">TIPO</th>
                <th style="width: 120px;text-align: center;">COSTO AL AÑO</th>
              </tr>
              <tr>
                <th>INSUMOS Y MATERIAS PRIMAS</th>
                <td><?php isset($datosFormulario->insumosCostos) ? print $datosFormulario->insumosCostos : ""; ?></td>
              </tr>
              <tr>
                <th>ALQUILERES</th>
                <td> <?php isset($datosFormulario->alquileresCostos) ? print $datosFormulario->alquileresCostos : ""; ?> </td>
              </tr>
              <tr>
                  <th>SERVICIOS (LUZ-AGUA-GAS-INTERNET)</th>
                  <td> <?php isset($datosFormulario->serviciosCostos) ? print $datosFormulario->serviciosCostos : ""; ?> </td>
              </tr>
              <tr>
                  <th>MONOTRIBUTO</th>
                  <td> <?php isset($datosFormulario->monotributoCostos) ? print $datosFormulario->monotributoCostos : ""; ?> </td>
              </tr>
              <tr>
                <th>INGRESOS BRUTOS</th>
                <td><?php isset($datosFormulario->ingresosBrutosCostos) ? print $datosFormulario->ingresosBrutosCostos : ""; ?></td>
              </tr>
              <tr>
                <th>SEGUROS</th>
                <td><?php isset($datosFormulario->segurosCostos) ? print $datosFormulario->segurosCostos : ""; ?></td>
              </tr>
              <tr>
                <th>COMBUSTIBLE </th>
                <td><?php isset($datosFormulario->combustibleCostos) ? print $datosFormulario->combustibleCostos : ""; ?></td>
              </tr>
              <tr>
                <th>SUELDOS</th>
                <td><?php isset($datosFormulario->sueldosCostos) ? print $datosFormulario->sueldosCostos : ""; ?></td>
              </tr>
              <tr>
                <th>COMERCIALIZACIÓN</th>
                <td><?php isset($datosFormulario->comercializacionCostos) ? print $datosFormulario->comercializacionCostos : ""; ?></td>
              </tr>
              <tr>
                <th>OTROS</th>
                <td>
                    <?php isset($datosFormulario->otrosCostos) ? print $datosFormulario->otrosCostos : ""; ?>
                  </td>
              </tr>
              <tr>
                <th>CUOTA MENSUAL</th>
                <td>
                  <?php isset($datosFormulario->cuotaMensualCostos) ? print $datosFormulario->cuotaMensualCostos : ""; ?>
                </td>
              </tr>
              <tr>
                <th>TOTAL</th>
                <td>
                  <?php $totalCostos = 
                    $datosFormulario->insumosCostos +$datosFormulario->alquileresCostos + $datosFormulario->serviciosCostos + $datosFormulario->monotributoCostos + $datosFormulario->ingresosBrutosCostos +$datosFormulario->segurosCostos + $datosFormulario->combustibleCostos + $datosFormulario->sueldosCostos + $datosFormulario->comercializacionCostos + $datosFormulario->otrosCostos + $datosFormulario->cuotaMensualCostos;
                    echo $totalCostos;
                    ?>
                </td>
              </tr>
            </tbody>
        </table>
        <div class="cabecera_azul"><b>GANANCIA DEL EMPRENDIMIENTO</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
          <tbody>
            <tr>
              <th style="text-align: center;">INGRESOS POR VENTAS AL AÑO</th>
              <th style="text-align: center;">COSTOS AL AÑO</th>
              <th style="text-align: center;">GANANCIA</th>
            </tr>
            <tr>
              <td style="text-align: center;"><?php isset($totalVentas) ? print $totalVentas : print "-"; ?></td>
              <td style="text-align: center;"><?php isset($totalCostos) ? print $totalCostos : print "-"; ?></td>
              <td style="text-align: center;"><?php isset($totalVentas) ? print $totalVentas-$totalCostos : print "-"; ?> </td>
            </tr>
          </tbody>
        </table>
        <div style="page-break-after: always;clear:both;"></div>
        <div class="cabecera_azul"><b>DESCRIPCIÓN DE LOS BIENES A FINANCIAR</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
          <tbody>
            <tr>
              <th style="width: 242px;text-align: center;">Descripción</th>
              <th style="width: 81px;text-align: center;">CANTIDAD</th>
              <th style="width: 142px;text-align: center;">PRECIO UNITARIO</th>
              <th style="width: 91px;text-align: center;">TOTAL</th>
            </tr>
            <tr>
              <td><?= $datosFormulario->item1_descripcion ?></td>
              <td><?= $datosFormulario->item1_cantidad ?></td>
              <td><?= $datosFormulario->item1_precio ?></td>
              <td><?= $datosFormulario->item1_cantidad * $datosFormulario->item1_precio ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->item2_descripcion ?></td>
              <td><?= $datosFormulario->item2_cantidad ?></td>
              <td><?= $datosFormulario->item2_precio ?></td>
              <td><?= $datosFormulario->item2_cantidad * $datosFormulario->item2_precio ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->item3_descripcion ?></td>
              <td><?= $datosFormulario->item3_cantidad ?></td>
              <td><?= $datosFormulario->item3_precio ?></td>
              <td><?= $datosFormulario->item3_cantidad * $datosFormulario->item3_precio ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->item4_descripcion ?></td>
              <td><?= $datosFormulario->item4_cantidad ?></td>
              <td><?= $datosFormulario->item4_precio ?></td>
              <td><?= $datosFormulario->item4_cantidad * $datosFormulario->item4_precio ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->item5_descripcion ?></td>
              <td><?= $datosFormulario->item5_cantidad ?></td>
              <td><?= $datosFormulario->item5_precio ?></td>
              <td><?= $datosFormulario->item5_cantidad * $datosFormulario->item5_precio ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->item6_descripcion ?></td>
              <td><?= $datosFormulario->item6_cantidad ?></td>
              <td><?= $datosFormulario->item6_precio ?></td>
              <td><?= $datosFormulario->item6_cantidad * $datosFormulario->item6_precio ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->item7_descripcion ?></td>
              <td><?= $datosFormulario->item7_cantidad ?></td>
              <td><?= $datosFormulario->item7_precio ?></td>
              <td><?= $datosFormulario->item7_cantidad * $datosFormulario->item7_precio ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->item8_descripcion ?></td>
              <td><?= $datosFormulario->item8_cantidad ?></td>
              <td><?= $datosFormulario->item8_precio ?></td>
              <td><?= $datosFormulario->item8_cantidad * $datosFormulario->item8_precio ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->item9_descripcion ?></td>
              <td><?= $datosFormulario->item9_cantidad ?></td>
              <td><?= $datosFormulario->item9_precio ?></td>
              <td><?= $datosFormulario->item9_cantidad * $datosFormulario->item9_precio ?></td>
            </tr>
            <tr>
              <td><?= $datosFormulario->item10_descripcion ?></td>
              <td><?= $datosFormulario->item10_cantidad ?></td>
              <td><?= $datosFormulario->item10_precio ?></td>
              <td><?= $datosFormulario->item10_cantidad * $datosFormulario->item10_precio ?></td>
            </tr>
          </tbody>
        </table>
        <div class="cabecera_azul"><b>TOTAL SOLICITADO AL CREAR</b></div>
        <p align="center"><b>$<?= 
        ($datosFormulario->item1_cantidad * $datosFormulario->item1_precio) + 
        ($datosFormulario->item2_cantidad * $datosFormulario->item2_precio) + 
        ($datosFormulario->item3_cantidad * $datosFormulario->item3_precio) + 
        ($datosFormulario->item4_cantidad * $datosFormulario->item4_precio) + 
        ($datosFormulario->item5_cantidad * $datosFormulario->item5_precio) + 
        ($datosFormulario->item6_cantidad * $datosFormulario->item6_precio) + 
        ($datosFormulario->item7_cantidad * $datosFormulario->item7_precio) + 
        ($datosFormulario->item8_cantidad * $datosFormulario->item8_precio) + 
        ($datosFormulario->item9_cantidad * $datosFormulario->item9_precio) + 
        ($datosFormulario->item10_cantidad * $datosFormulario->item10_precio)
        ?></b></p>

        <div style="page-break-after: always;clear:both;"></div>

        <div class="cabecera_azul">MANIFESTACIÓN DE BIENES DEL EMPRENDEDOR</div>
        <div class="cabecera"><b>DATOS GENERALES</b></div>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <tbody>
            <tr>
              <th>NOMBRE Y APELLIDO</th>
              <td><?php isset($datosFormulario->nombreEmprendedor) ? print $datosFormulario->nombreEmprendedor : ""; ?></td>
            </tr>
            <tr>
              <th>DNI</th>
              <td><?php isset($datosFormulario->dniEmprendedor) ? print $datosFormulario->dniEmprendedor : ""; ?></td>
            </tr>
            <tr>
              <th>CUIT</th>
              <td><?php isset($datosFormulario->cuitEmprendimiento) ? print $datosFormulario->cuitEmprendimiento : ""; ?></td>
            </tr>
            <tr>
              <th>LOCALIDAD</th>
              <td><?php isset($datosFormulario->usuario->get_localidad->nombre ) ? print $datosFormulario->usuario->get_localidad->nombre  : ""; ?></td>
            </tr>
            <tr>
              <th>DOMICILIO</th>
              <td><?php isset($datosFormulario->domicilioEmprendedor) ? print $datosFormulario->domicilioEmprendedor : ""; ?></td>
            </tr>
          </tbody>
        </table>
        <br>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <thead>
            <tr>
              <th>TIPO</th>
              <th>MONTO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <th>DISPONIBILIDADES</th>
            <td></td>
            </tr>
            <tr>
              <td>
                Efectivo
              </td>
              <td>
                <?=$datosFormulario->efectivoMBE;?>
              </td>
            </tr>
            <tr>
              <td>Cuentas Bancarias</td>
              <td>
                <?= $datosFormulario->cuentasBancariasMBE;?>
              </td>
            </tr>
            <tr>
              <td>Créditos por ventas</td>
              <td><?= $datosFormulario->creditosVentasMBE;?></td>
            </tr>
            <tr>
              <td>Otros créditos</td>
              <td><?= $datosFormulario->otrosCreditosMBE;?></td>
            </tr>
            <tr>
              <th>BIENES DE CAMBIO</th>
              <td></td>
            </tr>
            <tr>
              <td>Mercaderías</td>
              <td><?= $datosFormulario->mercaderiasMBE; ?></td>
            </tr>
            <tr>
              <td>Materías Primas</td>
              <td><?= $datosFormulario->materiasPrimasMBE; ?></td>
            </tr>
            <tr>
              <td>Insumos</td>
              <td><?= $datosFormulario->insumosMBE; ?></td>
            </tr>
            <tr>
              <th>BIENES DE USO</th>
              <td></td>
            </tr>
            <tr>
              <td>Inmuebles</td>
              <td><?= $datosFormulario->inmueblesMBE; ?></td>
            </tr>
            <tr>
              <td>Rodados</td>
              <td><?= $datosFormulario->rodadosMBE; ?></td>
            </tr>
            <tr>
              <td>Maquinarias y equipos</td>
              <td><?= $datosFormulario->maquinariasEquiposMBE; ?></td>
            </tr>
            <tr>
              <td>Instalaciones</td>
              <td><?= $datosFormulario->instalacionesMBE; ?></td>
            </tr>
            <tr>
              <th>TOTAL ACTIVO</th>
              <th> <?php $totalActivoMBE = 
                $datosFormulario->efectivoMBE +
$datosFormulario->cuentasBancariasMBE + $datosFormulario->creditosVentasMBE +
$datosFormulario->otrosCreditosMBE +
$datosFormulario->mercaderiasMBE +
$datosFormulario->materiasPrimasMBE +
$datosFormulario->insumosMBE +
$datosFormulario->inmueblesMBE +
$datosFormulario->rodadosMBE +
$datosFormulario->maquinariasEquiposMBE +
$datosFormulario->instalacionesMBE;echo $totalActivoMBE;
               ?></th>
            </tr>
          </tbody>
        </table>
        <div style="page-break-after: always;clear:both;"></div>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <thead>
            <tr>
              <th>TIPO</th>
              <th>MONTO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Deudas comerciales</th>
              <td></td>
            </tr>
            <tr>
              <td>En cuentas corrientes</td>
              <td><?= $datosFormulario->deudaCuentasCorrientesMBE; ?></td>
            </tr>
            <tr>
              <td>Cheques de pago diferido</td>
              <td><?= $datosFormulario->deudaChequesPagoDiferidoMBE; ?></td>
            </tr>
            <tr>
              <td>Documentadas</td>
              <td><?= $datosFormulario->documentadasMBE; ?></td>
            </tr>
            <tr>
              <td>Otras</td>
              <td><?= $datosFormulario->otrasDeudasComercialesMBE; ?></td>
            </tr>
            <tr>
              <th>Deudas bancarias</th>
              <td></td>
            </tr>
            <tr>
              <td>Tarjetas de crédito</td>
              <td><?= $datosFormulario->deudaTarjetasCreditoMBE; ?></td>
            </tr>
            <tr>
              <td>Con garantía hipotecaria(inmuebles)</td>
              <td><?= $datosFormulario->deudaGarantiaHipotecariaMBE; ?></td>
            </tr>
            <tr>
              <td>Con garantía prendaria(rodados)</td>
              <td><?= $datosFormulario->deudaGarantiaPrendariaMBE; ?></td>
            </tr>

            <tr>
              <th>Deudas fiscales</th>
              <td></td>
            </tr>
            <tr>
              <td>AFIP</td>
              <td><?= $datosFormulario->deudaAfipMBE;?></td>
            </tr>
            <tr>
              <td>Rentas</td>
              <td><?= $datosFormulario->deudaRentasRnMBE;?></td>
            </tr>
            <tr>
              <td>Tributos municipales</td>
              <td><?= $datosFormulario->deudaTributosMunicipalesMBE;?></td>
            </tr>
            <tr>
              <td>DEUDAS SOCIALES (Aportes, contribuciones, salarios, etc)</td>
              <td><?= $datosFormulario->deudasSocialesMBE;?></td>
            </tr>
            <tr>
              <td>Otras deudas</td>
              <td><?= $datosFormulario->otrasDeudasMBE;?></td>
            </tr>
            <tr>
              <th>Total pasivo</th>
              <td><?php $totalPasivoMBE = $datosFormulario->deudaCuentasCorrientesMBE +
$datosFormulario->deudaChequesPagoDiferidoMBE +
$datosFormulario->documentadasMBE +
$datosFormulario->otrasDeudasComercialesMBE +
$datosFormulario->deudaTarjetasCreditoMBE +
$datosFormulario->deudaGarantiaHipotecariaMBE +
$datosFormulario->deudaGarantiaPrendariaMBE +
$datosFormulario->deudaAfipMBE +
$datosFormulario->deudaRentasRnMBE +
$datosFormulario->deudaTributosMunicipalesMBE +
$datosFormulario->deudasSocialesMBE +
$datosFormulario->otrasDeudasMBE; echo $totalPasivoMBE;?></td>
            </tr>
          </tbody>
        </table>
        <div align="center">
          <p> <b>TOTAL ACTIVO: <?= $totalActivoMBE; ?></b>$</p>
          <p><b>TOTAL PASIVO: <?= $totalPasivoMBE; ?></b>$</p>
          <p><b>PATRIMONIO NETO: <?= $totalActivoMBE - $totalPasivoMBE; ?></b>
            $</p>
        </div>

        <div style="page-break-after: always;clear:both;"></div>

        <div class="cabecera_azul">MANIFESTACIÓN DE BIENES DEL GARANTE</div>
        <div class="cabecera"><b>DATOS GENERALES</b></div>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <tbody>
            <tr>
              <th>NOMBRE Y APELLIDO</th>
              <td><?php isset($datosFormulario->nombreMBG) ? print $datosFormulario->nombreMBG : ""; ?></td>
            </tr>
            <tr>
              <th>DNI</th>
              <td><?php isset($datosFormulario->dniMBG) ? print $datosFormulario->dniMBG : ""; ?></td>
            </tr>
            <tr>
              <th>CUIT</th>
              <td><?php isset($datosFormulario->cuitMBG) ? print $datosFormulario->cuitMBG : ""; ?></td>
            </tr>
            <tr>
              <th>LOCALIDAD</th>
              <td><?php isset($datosFormulario->localidadMBG ) ? print $datosFormulario->localidadMBG  : ""; ?></td>
            </tr>
            <tr>
              <th>DOMICILIO</th>
              <td><?php isset($datosFormulario->domicilioMBG) ? print $datosFormulario->domicilioMBG : ""; ?></td>
            </tr>
          </tbody>
        </table>
        <br>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <thead>
            <tr>
              <th>TIPO</th>
              <th>MONTO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <th>DISPONIBILIDADES</th>
            <td></td>
            </tr>
            <tr>
              <td>
                Efectivo
              </td>
              <td>
                <?=$datosFormulario->efectivoMBG;?>
              </td>
            </tr>
            <tr>
              <td>Cuentas Bancarias</td>
              <td>
                <?= $datosFormulario->cuentasBancariasMBG;?>
              </td>
            </tr>
            <tr>
              <td>Créditos por ventas</td>
              <td><?= $datosFormulario->creditosVentasMBG;?></td>
            </tr>
            <tr>
              <td>Otros créditos</td>
              <td><?= $datosFormulario->otrosCreditosMBG;?></td>
            </tr>
            <tr>
              <th>BIENES DE CAMBIO</th>
              <td></td>
            </tr>
            <tr>
              <td>Mercaderías</td>
              <td><?= $datosFormulario->mercaderiasMBG; ?></td>
            </tr>
            <tr>
              <td>Materías Primas</td>
              <td><?= $datosFormulario->materiasPrimasMBG; ?></td>
            </tr>
            <tr>
              <td>Insumos</td>
              <td><?= $datosFormulario->insumosMBG; ?></td>
            </tr>
            <tr>
              <th>BIENES DE USO</th>
              <td></td>
            </tr>
            <tr>
              <td>Inmuebles</td>
              <td><?= $datosFormulario->inmueblesMBG; ?></td>
            </tr>
            <tr>
              <td>Rodados</td>
              <td><?= $datosFormulario->rodadosMBG; ?></td>
            </tr>
            <tr>
              <td>Maquinarias y equipos</td>
              <td><?= $datosFormulario->maquinariasEquiposMBG; ?></td>
            </tr>
            <tr>
              <td>Instalaciones</td>
              <td><?= $datosFormulario->instalacionesMBG; ?></td>
            </tr>
            <tr>
              <th>TOTAL ACTIVO</th>
              <th> <?php $totalActivoMBG = 
                $datosFormulario->efectivoMBG +
$datosFormulario->cuentasBancariasMBG + $datosFormulario->creditosVentasMBG +
$datosFormulario->otrosCreditosMBG +
$datosFormulario->mercaderiasMBG +
$datosFormulario->materiasPrimasMBG +
$datosFormulario->insumosMBG +
$datosFormulario->inmueblesMBG +
$datosFormulario->rodadosMBG +
$datosFormulario->maquinariasEquiposMBG +
$datosFormulario->instalacionesMBG;echo $totalActivoMBG;
               ?></th>
            </tr>
          </tbody>
        </table>
        <div style="page-break-after: always;clear:both;"></div>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <thead>
            <tr>
              <th>TIPO</th>
              <th>MONTO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Deudas comerciales</th>
              <td></td>
            </tr>
            <tr>
              <td>En cuentas corrientes</td>
              <td><?= $datosFormulario->deudaCuentasCorrientesMBG; ?></td>
            </tr>
            <tr>
              <td>Cheques de pago diferido</td>
              <td><?= $datosFormulario->deudaChequesPagoDiferidoMBG; ?></td>
            </tr>
            <tr>
              <td>Documentadas</td>
              <td><?= $datosFormulario->documentadasMBG; ?></td>
            </tr>
            <tr>
              <td>Otras</td>
              <td><?= $datosFormulario->otrasDeudasComercialesMBG; ?></td>
            </tr>
            <tr>
              <th>Deudas bancarias</th>
              <td></td>
            </tr>
            <tr>
              <td>Tarjetas de crédito</td>
              <td><?= $datosFormulario->deudaTarjetasCreditoMBG; ?></td>
            </tr>
            <tr>
              <td>Con garantía hipotecaria(inmuebles)</td>
              <td><?= $datosFormulario->deudaGarantiaHipotecariaMBG; ?></td>
            </tr>
            <tr>
              <td>Con garantía prendaria(rodados)</td>
              <td><?= $datosFormulario->deudaGarantiaPrendariaMBG; ?></td>
            </tr>

            <tr>
              <th>Deudas fiscales</th>
              <td></td>
            </tr>
            <tr>
              <td>AFIP</td>
              <td><?= $datosFormulario->deudaAfipMBG;?></td>
            </tr>
            <tr>
              <td>Rentas</td>
              <td><?= $datosFormulario->deudaRentasRnMBG;?></td>
            </tr>
            <tr>
              <td>Tributos municipales</td>
              <td><?= $datosFormulario->deudaTributosMunicipalesMBG;?></td>
            </tr>
            <tr>
              <td>DEUDAS SOCIALES (Aportes, contribuciones, salarios, etc)</td>
              <td><?= $datosFormulario->deudasSocialesMBG;?></td>
            </tr>
            <tr>
              <td>Otras deudas</td>
              <td><?= $datosFormulario->otrasDeudasMBG;?></td>
            </tr>
            <tr>
              <th>Total pasivo</th>
              <td><?php $totalPasivoMBG = $datosFormulario->deudaCuentasCorrientesMBG +
$datosFormulario->deudaChequesPagoDiferidoMBG +
$datosFormulario->documentadasMBG +
$datosFormulario->otrasDeudasComercialesMBG +
$datosFormulario->deudaTarjetasCreditoMBG +
$datosFormulario->deudaGarantiaHipotecariaMBG +
$datosFormulario->deudaGarantiaPrendariaMBG +
$datosFormulario->deudaAfipMBG +
$datosFormulario->deudaRentasRnMBG +
$datosFormulario->deudaTributosMunicipalesMBG +
$datosFormulario->deudasSocialesMBG +
$datosFormulario->otrasDeudasMBG; echo $totalPasivoMBG;?></td>
            </tr>
          </tbody>
        </table>
        <div align="center">
          <p> <b>TOTAL ACTIVO: <?= $totalActivoMBG; ?></b>$</p>
          <p><b>TOTAL PASIVO: <?= $totalPasivoMBG; ?></b>$</p>
          <p><b>PATRIMONIO NETO: <?= $totalActivoMBG - $totalPasivoMBG; ?></b>
            $</p>
        </div>

        <div style="page-break-after: always;clear:both;"></div>

        <div class="cabecera_azul"><b>DECLARACIÓN JURADA</b></div>
        <div>
          <p style="font-size: 16px;">
             Quien suscribe la presente, en su calidad de titular de la empresa o representante legal acreditado, declaro bajo juramento:
          </p>
          <p style="font-size: 16px;">
          - No estar incurso en las incompatibilidades expuestas por la Ley L Nº 3550 de Ética e Idoneidad de la Función Pública en las presentes actuaciones administrativas.<br>
          - Conocer y aceptar los requisitos y condiciones establecidos en la Línea.<br>
          - La veracidad de los datos consignados en las planillas de formulación del proyecto.<br>
          </p>
        </div>
        <div class="cabecera_azul" style="margin-top: 50px;"><b>Opinión de la Agencia Local acerca de pertinencia 
y relevancia de la actividad  del proyecto (Principales virtudes de financiar proyecto)</b></div>
        <div style="height: 200px;width: 100%;"></div>
        <div style="border-top: 1px solid black;margin-left:400px;width: 300px;text-align: center;font-size: 18px;display: inline-block;margin-top: -21px;">
          <b>Agencia de Desarrollo</b>
        </div>
    </body>
</html>