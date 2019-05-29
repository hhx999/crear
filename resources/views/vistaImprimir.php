<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <title>LINEA EMPRENDEDOR</title>
        <style type="text/css">
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
            <th style="width: 368px;">TÍTULO DEL PROYECTO:</th>
            <td style="width: 368px;"><?php isset($datosFormulario->tituloProyecto) ? print $datosFormulario->tituloProyecto : print "-" ; ?></td>
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
    <div style="border: 1px solid black;width: 700px;margin-top: 10px;margin-left: 15px;padding-bottom: 10px;padding-left: 10px;padding-right: 10px;">
        <p> <?php isset($datosFormulario->descEmprendimiento) ? print $datosFormulario->descEmprendimiento : print "-" ; ?>
        </p>
    </div>
    <style type="text/css">.documentacion {
        margin: 10px;
    }
    .documentacion input {
        margin:10px;
    }
</style>
    <div style="margin-top: 40px; font-size: 22px;">CHECKLIST DOCUMENTACIÓN</div>
    <div class="documentacion">
        <input type="checkbox" name="vehicle1" value="Bike"> Fotocopia DNI Solicitante<br>
        <input type="checkbox" name="vehicle1" value="Bike"> Certificado de domicilio<br>
        <input type="checkbox" name="vehicle1" value="Bike"> Recibo de sueldo del solicitante(de haber) <br>
        <input type="checkbox" name="vehicle1" value="Bike"> Constancia de inscripcion en AFIP<br>
        <input type="checkbox" name="vehicle1" value="Bike"> Constancia de inscripcion en IIBB - ART Río Negro<br>
        <input type="checkbox" name="vehicle1" value="Bike"> Constancia único libre de deuda - ART Río Negro<br>
        <input type="checkbox" name="vehicle1" value="Bike"> Fotocopia DNI Garante<br>
        <input type="checkbox" name="vehicle1" value="Bike"> Recibo de sueldo - DDJJ IIBB S/Corresponda - Garante <br>
        <input type="checkbox" name="vehicle1" value="Bike"> Certificado de domicilio del garante <br>
        <input type="checkbox" name="vehicle1" value="Bike"> Presupuestos <br>
        <input type="checkbox" name="vehicle1" value="Bike"> Fotos <br>
    </div>
    <div style="page-break-after: always;clear:both;"></div>
    <div class="cabecera"> <b style="font-size:24px;">DATOS PERSONALES</b> </div>
    <div class="cabecera_azul">
        <b>INFORMACIÓN DEL EMPRENDEDOR</b>
    </div>
    <div style="margin-top: 40px;">
    <div align="center" style="margin-bottom: 20px;"><b>DATOS GENERALES:</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="width: 368px;">NOMBRE Y APELLIDO:</th>
                <td style="width: 368px;"><?php isset($datosFormulario->nombreEmprendedor) ? print $datosFormulario->nombreEmprendedor : print "-" ; ?></td>
              </tr>
              <tr>
                <th>DNI</th>
                <td><?php isset($datosFormulario->dniEmprendedor) ? print $datosFormulario->dniEmprendedor : print "-" ; ?></td>
              </tr>
              <tr>
                <th>LOCALIDAD:</th>
                <td><?php isset($datosFormulario->localidadEmprendedor) ? print $datosFormulario->localidadEmprendedor : print "-" ; ?></td>
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
                  <th style="width: 368px;">TELÉFONO:</th>
                  <td style="width: 368px;"><?php isset($datosFormulario->telefonoEmprendedor) ? print $datosFormulario->telefonoEmprendedor : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>EMAIL:</th>
                  <td><?php isset($datosFormulario->emailEmprendedor) ? print $datosFormulario->emailEmprendedor : print "-" ; ?></td>
              </tr>
                <tr>
                  <th>FACEBOOK:</th>
                  <td><?php isset($datosFormulario->facebookEmprendedor) ? print $datosFormulario->facebookEmprendedor : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
    </div>
    <div style="margin-top: 40px;">
        <div align="center" style="margin-bottom: 20px;"><b>FORMACIÓN Y OCUPACIÓN:</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                  <th style="width: 368px;">GRADO DE INSTRUCCIÓN</th>
                  <td style="width: 368px;">
                    <?php isset($datosFormulario->gradoInstruccion) ? print $datosFormulario->gradoInstruccion : print "-" ; ?>
                    </td>
              </tr>
              <tr>
                  <th style="width: 368px;">OTRA APLICACIÓN QUE DESARROLLE EN LA ACTUALIDAD</th>
                  <td style="width: 368px;"><?php isset($datosFormulario->otraOcupacion) ? print $datosFormulario->otraOcupacion : print "-" ; ?></td>
              </tr>
                <tr>
                  <th>INGRESO MENSUAL:</th>
                  <td><?php isset($datosFormulario->ingresoMensual) ? print $datosFormulario->ingresoMensual : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>DESEO DE CAPACITACIÓN:</th>
                  <td style="width: 368px;"><?php isset($datosFormulario->deseoCapacitacion) ? print $datosFormulario->deseoCapacitacion : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
    </div>
    <div style="page-break-after: always;clear:both;"></div>
        <div class="cabecera_azul"> <b> DATOS GENERALES DEL EMPRENDIMIENTO </b> </div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="width: 368px;">TÍTULO DEL PROYECTO:</th>
                <td style="width: 368px;"><?php isset($datosFormulario->tituloProyecto) ? print $datosFormulario->tituloProyecto : print "-" ; ?></td>
              </tr>
              <tr>
                <th>ACTIVIDAD PRINCIPAL:</th>
                <td style="width: 368px;"><?php isset($datosFormulario->actPrincipalEmprendimiento) ? print $datosFormulario->actPrincipalEmprendimiento : print "-" ; ?></td>
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
                <th style="width: 368px;">DOMICILIO REAL:</th>
                <td style="width: 368px;"><?php isset($datosFormulario->domicilioEmprendimiento) ? print $datosFormulario->domicilioEmprendimiento : print "-" ; ?></td>
              </tr>
              <tr>
                <th>LOCALIDAD:</th>
                <td><?php isset($datosFormulario->localidadEmprendimiento) ? print $datosFormulario->localidadEmprendimiento : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>LUGAR DONDE SE DESARROLLA ES:</th>
                  <td><?php isset($datosFormulario->lugarEmprendimiento) ? print $datosFormulario->lugarEmprendimiento : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
        <div class="cabecera_azul"><b>DETALLE EL-LOS PRODUCTOS O SERVICIOS QUE OFRECERÁ</b></div>
        <div style="align-items: center;">
            <div style="border: 1px solid black;width: 700px;margin-top: 10px;margin-left: 15px;padding-bottom: 10px;padding-left: 10px;padding-right: 10px;">
                <p>
                  <?php isset($datosFormulario->descProdServicios) ? print $datosFormulario->descProdServicios : print "-" ; ?>
                </p>
            </div>
        </div>
        <div class="cabecera_azul" style="margin-top: 10px;"><b>¿HA RECIBIDO APORTES O CRÉDITOS DE ORGANISMOS PÚBLICOS 
PARA EL DESARROLLO DEL PROYECTO?</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="width: 368px;">INSTITUCIÓN:</th>
                <td style="width: 368px;"><?php isset($datosFormulario->institucionAporte) ? print $datosFormulario->institucionAporte : print "-" ; ?></td>
              </tr>
              <tr>
                <th>FECHA:</th>
                <td><?php isset($datosFormulario->fecAporte) ? print $datosFormulario->fecAporte : print "-" ; ?></td>
              </tr>
              <tr>
                <th>MONTO:</th>
                <td><?php isset($datosFormulario->montoAporte) ? print $datosFormulario->montoAporte : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>TIPO DE APORTE:</th>
                  <td><?php isset($datosFormulario->tipoAporte) ? print $datosFormulario->tipoAporte : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>ESTADO DE DEVOLUCIÓN/RENDICIÓN:</th>
                  <td><?php isset($datosFormulario->estadoAporte) ? print $datosFormulario->estadoAporte : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
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
        <div class="cabecera_azul"><b>ASPECTOS SOCIALES</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="width: 368px;">SITUACIÓN LABORAL ACTUAL:</th>
                <td style="width: 368px;"><?php isset($datosFormulario->situacionLaboral) ? print $datosFormulario->situacionLaboral : print "-" ; ?></td>
              </tr>
              <tr>
                <th>ACLARACIONES:</th>
                <td style="width: 368px;"><?php isset($datosFormulario->aclaracionesGenerales) ? print $datosFormulario->aclaracionesGenerales : print "-" ; ?></td>
              </tr>
              <tr>
                <th>INGRESO:</th>
                <td><?php isset($datosFormulario->ingresoGenerales) ? print $datosFormulario->ingresoGenerales : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>PERCEPCIONES SOCIALES:</th>
                  <td><?php isset($datosFormulario->percepcionesSociales) ? print $datosFormulario->percepcionesSociales : print "-" ; ?></td>
              </tr>
              <tr>
                  <th>MONTO TOTAL AL MES PERCEPCIONES SOCIALES:</th>
                  <td><?php isset($datosFormulario->montoMesPercepciones) ? print $datosFormulario->montoMesPercepciones : print "-" ; ?></td>
              </tr>
            </tbody>
        </table>
        <div class="cabecera_azul"><b>CANTIDAD DE PERSONAS QUE TIENE A CARGO</b></div>
        <p align="center"> <?php isset($datosFormulario->cantPersonasCargo) ? print $datosFormulario->cantPersonasCargo : print "x" ; ?> </p>
        <p align="center"><b>LUGAR DONDE VIVO ES:</b> <?php isset($datosFormulario->lugarHabita) ? print $datosFormulario->lugarHabita : print "<br> -"; ?></p>
        <div class="cabecera_azul">
          <b>
          PERSONAS O INSTITUCIONES QUE PUEDEN DAR REFERENCIAS SOBRE EL EMPRENDEDOR          
          </b>
        </div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="width: 242px;">NOMBRE Y APELLIDO/INSTITUCIÓN</th>
                <th style="width: 242px;">LOCALIDAD</th>
                <th style="width: 242px;">TELEFONO</th>
              </tr>
                <?php
              if (!isset($referentes)) {
                echo "<tr><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td></tr>";
              } else {
                for ($i=0; $i < count($referentes) ; $i++) { 
                  echo "<tr><td>".$referentes[$i]->nombre."</td><td>".$referentes[$i]->localidad."</td><td>".$referentes[$i]->telefono."</td></tr>";
                }
              }
                ?>
            </tbody>
        </table>
        <div style="page-break-after: always;clear:both;"></div>
        <div class="cabecera_azul"><b>MERCADO</b></div>
        <div class="cabecera"> <b> PRINCIPALES CLIENTES - ¿Quién te compra?<br> (Describir perfil de cliente actual: edad, ubicación, nivel socio-económico - intereses)</b> </div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="width: 147px;">NOMBRE Y APELLIDO</th>
                <th style="width: 107px;">EDAD</th>
                <th style="width: 147px;">UBICACIÓN</th>
                <th style="width: 147px;">NIVEL SOCIO-ECONÓMICO</th>
                <th style="width: 167px;">INTERESES</th>
              </tr>
                <?php
                if (!isset($clientes)) {
                  echo "<tr><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td></tr>";
                } else {
                  for ($i=0; $i < count($clientes) ; $i++) { 
                    echo "<tr><td style='width: 147px;'>".$clientes[$i]->nombre."</td><td style='width: 107px;'>".$clientes[$i]->edad."</td><td style='width: 147px;'>".$clientes[$i]->ubicacion."</td><td style='width: 147px;'>".$clientes[$i]->nivelSocEconomico."</td><td style='width: 147px;'>".$clientes[$i]->intereses."</td></tr>";
                  }
                }
                ?>
            </tbody>
        </table>
        <div class="cabecera"> <b> PROVEEDORES ¿A quién le comprás tus materias primas o insumos? </b> </div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
          <tbody>
            <tr>
              <th style="width: 242px;">NOMBRE O RAZÓN SOCIAL</th>
              <th style="width: 242px;">UBICACIÓN</th>
              <th style="width: 242px;">COMPRA</th>
            </tr>
             <?php
              if (!isset($proveedores)) {
                echo "<tr><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td></tr>";
              } else {
                for ($i=0; $i < count($proveedores) ; $i++) { 
                  echo "<tr><td>".$proveedores[$i]->nombre."</td><td>".$proveedores[$i]->ubicacion."</td><td>".$proveedores[$i]->compra."</td></tr>";
                }
              }
                ?>
          </tbody>
        </table>
        <div class="cabecera"> <b>COMPETENCIA ¿Quién vende lo mismo que vos o algo parecido?</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
          <tbody>
            <tr>
              <th style="width: 242px;">NOMBRE O RAZÓN SOCIAL</th>
              <th style="width: 242px;">UBICACIÓN</th>
              <th style="width: 242px;">QUE OFRECE</th>
            </tr>
            <?php
            if (!isset($competencias)) {
                echo "<tr><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td></tr>";
              } else {
                for ($i=0; $i < count($competencias) ; $i++) { 
                  echo "<tr><td>".$competencias[$i]->nombre."</td><td>".$competencias[$i]->ubicacion."</td><td>".$competencias[$i]->ofrece."</td></tr>";
                }
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
        <p><?php isset($datosFormulario->puntosVenta) ? print $datosFormulario->puntosVenta : ""; ?></p>
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
              <th style="width: 242px;">PRODUCTO O SERVICIO</th>
              <th style="width: 142px;">Ud. Medida</th>
              <th style="width: 142px;">CANTIDAD AL AÑO</th>
              <th style="width: 81px;">PRECIO</th>
              <th style="width: 91px;">TOTAL</th>
            </tr>
              <?php
              $totalVentas = 0;
              $totalVentasUnico = 0;
              if (!isset($ventas)) {
                echo "<tr><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td></tr>";
              } else {
                for ($i=0; $i < count($ventas) ; $i++) {
                $totalVentasUnico = $ventas[$i]->cantAnio * $ventas[$i]->precio;
                $totalVentas += $totalVentasUnico; 
                  echo "<tr><td>".$ventas[$i]->producto."</td><td>".$ventas[$i]->udMedida."</td><td>".$ventas[$i]->cantAnio."</td><td>".$ventas[$i]->precio."</td><td>".$totalVentasUnico."</td></tr>";
                }
              }
              ?> 
          </tbody>
        </table>
          <p align="center"> TOTAL : <?php isset($totalVentas) ? print $totalVentas : ""; ?></p>
        <div class="cabecera_azul"> <b> OTROS COSTOS DEL EMPRENDIMIENTO </b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
            <tbody>
              <tr>
                <th style="width: 616px;text-align: center;">TIPO</th>
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
            </tbody>
        </table>
        <?php $totalCostos = $datosFormulario->insumosCostos +$datosFormulario->alquileresCostos + $datosFormulario->serviciosCostos + $datosFormulario->monotributoCostos + $datosFormulario->ingresosBrutosCostos +$datosFormulario->segurosCostos + $datosFormulario->combustibleCostos + $datosFormulario->sueldosCostos + $datosFormulario->comercializacionCostos + $datosFormulario->otrosCostos + $datosFormulario->cuotaMensualCostos; ?>
        <p align="center"> TOTAL: <?php isset($totalCostos) ? print $totalCostos : print "-" ?></p>
        <div class="cabecera_azul"><b>GANANCIA DEL EMPRENDIMIENTO</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
          <tbody>
            <tr>
              <th style="width: 242px;text-align: center;">INGRESOS POR VENTAS AL AÑO</th>
              <th style="width: 242px;text-align: center;">COSTOS AL AÑO</th>
              <th style="width: 242px;text-align: center;">RESULTADO</th>
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
              <th style="width: 142px;text-align: center;">ÍTEM (Bien de Capital - Capital de Trabajo - Obra Civil)</th>
              <th style="width: 242px;text-align: center;">Descripción</th>
              <th style="width: 81px;text-align: center;">CANTIDAD</th>
              <th style="width: 142px;text-align: center;">PRECIO UNITARIO</th>
              <th style="width: 91px;text-align: center;">TOTAL</th>
            </tr>
            <?php
              $total_bienes = 0;
              $total_capital = 0;
              $total_obra = 0;
              $total_instalaciones = 0;
              if (!isset($items)) {
                echo "<tr><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td><td align='center'>-</td></tr><br>";
              }
              if (isset($items)) {
                for ($i=0; $i < count($items) ; $i++) {
                  if ($items[$i]->nombreItem == 'BIENES DE CAPITAL') {
                  $totalItemsUnico = $items[$i]->cantidad * $items[$i]->precioUnitario;
                  echo "<tr><td>".$items[$i]->nombreItem."</td><td>".$items[$i]->descripcion."</td><td>".$items[$i]->cantidad."</td><td>".$items[$i]->precioUnitario."</td><td>".$totalItemsUnico."</td></tr>";
                  $total_bienes += $totalItemsUnico;
                  }
                  if ($items[$i]->nombreItem == 'CAPITAL DE TRABAJO') {
                    $totalItemsUnico = $items[$i]->cantidad * $items[$i]->precioUnitario;
                    echo "<tr><td>".$items[$i]->nombreItem."</td><td>".$items[$i]->descripcion."</td><td>".$items[$i]->cantidad."</td><td>".$items[$i]->precioUnitario."</td><td>".$totalItemsUnico."</td></tr>";
                    $total_capital += $totalItemsUnico;
                  }
                  if ($items [$i]->nombreItem == 'INSTALACIONES') {
                    $totalItemsUnico = $items[$i]->cantidad * $items[$i]->precioUnitario;
                    echo "<tr><td>".$items[$i]->nombreItem."</td><td>".$items[$i]->descripcion."</td><td>".$items[$i]->cantidad."</td><td>".$items[$i]->precioUnitario."</td><td>".$totalItemsUnico."</td></tr>";
                    $total_instalaciones += $totalItemsUnico;
                  }
                  if ($items [$i]->nombreItem == 'OBRA CIVIL') {
                    $totalItemsUnico = $items[$i]->cantidad * $items[$i]->precioUnitario;
                    echo "<tr><td>".$items[$i]->nombreItem."</td><td>".$items[$i]->descripcion."</td><td>".$items[$i]->cantidad."</td><td>".$items[$i]->precioUnitario."</td><td>".$totalItemsUnico."</td></tr>";
                    $total_obra += $totalItemsUnico;
                  }
                }
              }
              ?> 
          </tbody>
        </table>
        <div class="cabecera_azul"><b>TOTALES</b></div>
        <table style="width:100%" align="center" border="1"  cellpadding="24">
          <tbody>
            <tr>
              <th style="width: 368px;">BIENES DE CAPITAL</th>
              <td style="width: 368px;text-align: center">$<?= $total_bienes; ?></td>
            </tr>
            <tr>
              <th>CAPITAL DE TRABAJO</th>
              <td style="width: 368px;text-align: center">$<?= $total_capital; ?></td>
            </tr>
            <tr>
              <th>INSTALACIONES</th>
              <td style="width: 368px;text-align: center">$<?= $total_instalaciones; ?></td>
            </tr>
            <tr>
              <th>OBRA CIVIL</th>
              <td style="width: 368px;text-align: center">$<?= $total_obra; ?></td>
            </tr>
          </tbody>
        </table>
        <div class="cabecera_azul"><b>TOTAL SOLICITADO AL CREAR</b></div>
        <p align="center"><b>$<?= $total_bienes+$total_capital+$total_instalaciones+$total_obra; ?></b></p>

        <div style="page-break-after: always;clear:both;"></div>

        <div class="cabecera_azul">MANIFESTACIÓN DE BIENES DEL EMPRENDEDOR</div>
        <div class="cabecera"><b>DATOS GENERALES</b></div>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <tbody>
            <tr>
              <th style="width: 368px;">NOMBRE Y APELLIDO</th>
              <td style="width: 368px;"><?php isset($datosFormulario->nombreMBE) ? print $datosFormulario->nombreMBE : ""; ?></td>
            </tr>
            <tr>
              <th>DNI</th>
              <td><?php isset($datosFormulario->dniMBE) ? print $datosFormulario->dniMBE : ""; ?></td>
            </tr>
            <tr>
              <th>CUIT</th>
              <td><?php isset($datosFormulario->cuitMBE) ? print $datosFormulario->cuitMBE : ""; ?></td>
            </tr>
            <tr>
              <th>LOCALIDAD</th>
              <td><?php isset($datosFormulario->localidadMBE) ? print $datosFormulario->localidadMBE : ""; ?></td>
            </tr>
            <tr>
              <th>DOMICILIO</th>
              <td><?php isset($datosFormulario->domicilioMBE) ? print $datosFormulario->domicilioMBE : ""; ?></td>
            </tr>
          </tbody>
        </table>
        <br>
        <!--<p class="cabecera"> <b>DISPONIBILIDADES Y BIENES</b> </p>-->
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <tbody>
            <?php 
            $total_disponibilidad = 0;
            $total_bienescambio = 0;
            $total_bienesuso = 0;
             if (!isset($disponibilidades)) {
              echo '<tr>
              <th style="width: 368px;">TIPO</th>
              <th style="width: 368px; text-align: center;">MONTO</th>
            </tr><tr><td>-</td><td>-</td></tr>';
            } else {
              echo '<tr><th colspan=2 style="text-align:center;">DISPONIBILIDADES</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($disponibilidades) ; $i++) {
                if ($disponibilidades[$i]->encargado == 'EMPRENDEDOR') {
                  echo "<tr><td>".$disponibilidades[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$disponibilidades[$i]->monto."</td></tr>";
                  $total_disponibilidad += $disponibilidades[$i]->monto;
                 }
                }
              echo "<br>";
              echo '<tr><th colspan=2 style="text-align:center;">BIENES DE CAMBIO</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($bienes_cambio) ; $i++) {
                if ($bienes_cambio[$i]->encargado == 'EMPRENDEDOR') {
                  echo "<tr><td>".$bienes_cambio[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$bienes_cambio[$i]->monto."</td></tr>";
                  $total_bienescambio += $bienes_cambio[$i]->monto;
                 }
                }
              echo "<br>";
              echo '<tr><th colspan=2 style="text-align:center;">BIENES DE USO</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($bienes_uso) ; $i++) {
                if ($bienes_uso[$i]->encargado == 'EMPRENDEDOR') {
                  echo "<tr><td>".$bienes_uso[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$bienes_uso[$i]->monto."</td></tr>";
                  $total_bienesuso += $bienes_uso[$i]->monto;
                 }
                }
              } 
            ?>
          </tbody>
        </table>
        <br>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <tbody>
            <?php 
            $total_dcomercial = 0;
            $total_dbancaria = 0;
            $total_dfiscal = 0;
            $patrimonio_neto = 0;

            if (!isset($deudas_comerciales)) {
              echo "<tr><td>-</td><td>-</td></tr>";
            } else {

            echo '<tr><th colspan=2 style="text-align:center;">DEUDAS COMERCIALES</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($deudas_comerciales) ; $i++) {
                if ($deudas_comerciales[$i]->encargado == 'EMPRENDEDOR') {
                  echo "<tr><td>".$deudas_comerciales[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$deudas_comerciales[$i]->monto."</td></tr>";
                  $total_dcomercial += $deudas_comerciales[$i]->monto;
                 }
                }
              echo "<br>";
              echo '<tr><th colspan=2 style="text-align:center;">DEUDAS BANCARIAS</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($deudas_bancarias) ; $i++) {
                if ($deudas_bancarias[$i]->encargado == 'EMPRENDEDOR') {
                  echo "<tr><td>".$deudas_bancarias[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$deudas_bancarias[$i]->monto."</td></tr>";
                  $total_dbancaria += $deudas_bancarias[$i]->monto;
                 }
                }
              echo "<br>";
              echo '<tr><th colspan=2 style="text-align:center;">DEUDAS FISCALES</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($deudas_fiscales) ; $i++) {
                if ($deudas_fiscales[$i]->encargado == 'EMPRENDEDOR') {
                  echo "<tr><td>".$deudas_fiscales[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$deudas_fiscales[$i]->monto."</td></tr>";
                  $total_dfiscal += $deudas_fiscales[$i]->monto;
                 }
                }
              }
            ?>
          </tbody>
        </table>
        <div align="center">
          <p><b>OTRAS DEUDAS: </b>$<?php if (!isset($datosFormulario->otrasDeudasMBE)) {
            echo "0";
          } else { is_numeric($datosFormulario->otrasDeudasMBE) ? print $datosFormulario->otrasDeudasMBE : print "0"; }?></p>
          <p> <b>TOTAL ACTIVO:</b>$<?= $total_disponibilidad+$total_bienescambio+$total_bienesuso; ?></p>
          <p><b>TOTAL PASIVO: </b>$<?= $total_dcomercial + $total_dbancaria + $total_dfiscal?></p>
          <p><b>PATRIMONIO NETO:</b>
            $<?php echo $patrimonio_neto + ($total_disponibilidad+$total_bienescambio+$total_bienesuso) - ($total_dcomercial + $total_dbancaria + $total_dfiscal);
           ?></p>
        </div>

        <div style="page-break-after: always;clear:both;"></div>

        <div class="cabecera_azul">MANIFESTACIÓN DE BIENES DEL GARANTE</div>
        <div class="cabecera"><b>DATOS GENERALES</b></div>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <tbody>
            <tr>
              <th style="width: 368px;">NOMBRE Y APELLIDO</th>
              <td style="width: 368px;"><?php isset($datosFormulario->nombreMBG) ? print $datosFormulario->nombreMBG : ""; ?></td>
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
              <td><?php isset($datosFormulario->localidadMBG) ? print $datosFormulario->localidadMBG : ""; ?></td>
            </tr>
            <tr>
              <th>DOMICILIO</th>
              <td><?php isset($datosFormulario->domicilioMBG) ? print $datosFormulario->domicilioMBG : ""; ?></td>
            </tr>
          </tbody>
        </table>
        <br>
        <p class="cabecera"> <b>DISPONIBILIDADES Y BIENES</b> </p>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <tbody>
            <?php 
            $total_disponibilidad_g = 0;
            $total_bienescambio_g = 0;
            $total_bienesuso_g = 0;

             if (!isset($disponibilidades)) {
              echo '<tr>
              <th style="width: 368px;">TIPO</th>
              <th style="width: 368px; text-align: center;">MONTO</th>
            </tr><tr><td>-</td><td>-</td></tr>';
            } else {
              echo '<tr><th colspan=2 style="text-align:center;">DISPONIBILIDADES</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($disponibilidades) ; $i++) {
                if ($disponibilidades[$i]->encargado == 'GARANTE') {
                  echo "<tr><td>".$disponibilidades[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$disponibilidades[$i]->monto."</td></tr>";
                  $total_disponibilidad_g += $disponibilidades[$i]->monto;
                 }
                }
              echo "<br>";
              echo '<tr><th colspan=2 style="text-align:center;">BIENES DE CAMBIO</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($bienes_cambio) ; $i++) {
                if ($bienes_cambio[$i]->encargado == 'GARANTE') {
                  echo "<tr><td>".$bienes_cambio[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$bienes_cambio[$i]->monto."</td></tr>";
                  $total_bienescambio_g += $bienes_cambio[$i]->monto;
                 }
                }
              echo "<br>";
              echo '<tr><th colspan=2 style="text-align:center;">BIENES DE USO</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($bienes_uso) ; $i++) {
                if ($bienes_uso[$i]->encargado == 'GARANTE') {
                  echo "<tr><td>".$bienes_uso[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$bienes_uso[$i]->monto."</td></tr>";
                  $total_bienesuso_g += $bienes_uso[$i]->monto;
                 }
                }
              } 
            ?>
          </tbody>
        </table>
        <br>
        <p class="cabecera"> <b>DEUDAS</b></p>
        <table style="width: 100%;" align="center" border="1" cellpadding="24">
          <tbody>
            <?php 
            $total_dcomercial_g = 0;
            $total_dbancaria_g = 0;
            $total_dfiscal_g = 0;
            $patrimonio_neto_g = 0;

            if (!isset($deudas_comerciales)) {
              echo "<tr><td>-</td><td>-</td></tr>";
            } else {

            echo '<tr><th colspan=2 style="text-align:center;">DEUDAS COMERCIALES</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($deudas_comerciales) ; $i++) {
                if ($deudas_comerciales[$i]->encargado == 'GARANTE') {
                  echo "<tr><td>".$deudas_comerciales[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$deudas_comerciales[$i]->monto."</td></tr>";
                  $total_dcomercial_g += $deudas_comerciales[$i]->monto;
                 }
                }
              echo "<br>";
              echo '<tr><th colspan=2 style="text-align:center;">DEUDAS BANCARIAS</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($deudas_bancarias) ; $i++) {
                if ($deudas_bancarias[$i]->encargado == 'GARANTE') {
                  echo "<tr><td>".$deudas_bancarias[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$deudas_bancarias[$i]->monto."</td></tr>";
                  $total_dbancaria_g += $deudas_bancarias[$i]->monto;
                 }
                }
              echo "<br>";
              echo '<tr><th colspan=2 style="text-align:center;">DEUDAS FISCALES</th></tr>';
              echo '
                  <tr>
                          <th style="width: 368px;">TIPO</th>
                          <th style="width: 368px; text-align: center;">MONTO</th>
                        </tr>';
              for ($i=0; $i < count($deudas_fiscales) ; $i++) {
                if ($deudas_fiscales[$i]->encargado == 'GARANTE') {
                  echo "<tr><td>".$deudas_fiscales[$i]->tipo."</td><td style='width: 368px;text-align: center'>".$deudas_fiscales[$i]->monto."</td></tr>";
                  $total_dfiscal_g += $deudas_fiscales[$i]->monto;
                 }
                }
              }
            ?>
          </tbody>
        </table>
        <div align="center">
          <p><b>OTRAS DEUDAS: </b>$<?php if (!isset($datosFormulario->otrasDeudasMBG)) {
            echo "0";
          } else { is_numeric($datosFormulario->otrasDeudasMBG) ? print $datosFormulario->otrasDeudasMBG : print "0"; }?></p>
          <p> <b>TOTAL ACTIVO:</b>$<?= $total_disponibilidad_g+$total_bienescambio_g+$total_bienesuso_g; ?></p>
          <p><b>TOTAL PASIVO: </b>$<?= $total_dcomercial_g + $total_dbancaria_g + $total_dfiscal_g?></p>
          <p><b>PATRIMONIO NETO:</b>
            $<?php echo $patrimonio_neto_g + ($total_disponibilidad_g+$total_bienescambio_g+$total_bienesuso_g) - ($total_dcomercial_g + $total_dbancaria_g + $total_dfiscal_g);
           ?></p>
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
          <div style="border-top: 1px solid black;width: 300px;margin-top: 100px;margin-left:400px;text-align: center;font-size: 18px;">
               <b> Firma - Aclaración - DNI
                del Solicitante / Apoderado Legal</b>
          </div>
        <div class="cabecera_azul" style="margin-top: 50px;"><b>Opinión de la Agencia Local acerca de pertinencia 
y relevancia de la actividad  del proyecto (Principales virtudes de financiar proyecto)</b></div>
        <div style="height: 200px;width: 100%;"></div>
        <div style="margin-left:52px;border-top: 1px solid black;text-align:center;font-size:18;width: 300px;display: inline-block;">
          <b>Firma tutor del Proyecto</b>
        </div>
        <div style="border-top: 1px solid black;margin-left:400px;width: 300px;text-align: center;font-size: 18px;display: inline-block;margin-top: -21px;">
          <b>Agencia de Desarrollo</b>
        </div>
    </body>
</html>