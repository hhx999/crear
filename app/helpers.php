<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Usuario;
use App\FormTipo;
use App\Documentacion;
use App\Multimedia;

class Helpers 
{
    /*Subir archivos multimedia*/
    public static function crearItemBienFinanciamiento($nombre_view)
    {
        if ($nombre_view == 'ingresarLineaEmprendedor') {
            # imprimimos los inputs para la vista de ingreso de linea emprendedor
            for ($i=1; $i <= 10; $i++) { 
                print_r('<tr>
                                            <td>
                                                <input type="text" name="item'.$i.'_descripcion" placeholder="descripción del bien">
                                            </td>
                                            <td>
                                                <input type="text" name="item'.$i.'_cantidad" placeholder="xxx.xx">
                                            </td>
                                            <td>
                                                <input type="text" name="item'.$i.'_precio" placeholder="xxx.xx">
                                            </td>
                                            <td>
                                                <input type="text" name="item'.$i.'_total" placeholder="xxx.xx" readonly>
                                            </td>
                                        </tr>');
            }
        } else if ($nombre_view == 'borradorLineaEmprendedor')
        {
            # imprimimos los inputs para la vista de borrador de linea emprendedor
            for ($i=1; $i <= 10; $i++) { 
                print_r('<tr>
                                            <td>
                                                <input type="text" name="item'.$i.'_descripcion" placeholder="descripción del bien" value="{{$datosBorrador->item'.$i.'_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item'.$i.'_cantidad" placeholder="xxx.xx" value="{{$datosBorrador->item'.$i.'_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item'.$i.'_precio" placeholder="xxx.xx" value="{{$datosBorrador->item'.$i.'_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item'.$i.'_total" placeholder="xxx.xx" value="{{$datosBorrador->item'.$i.'_total}}" readonly>
                                            </td>
                                        </tr>');
            }
        } else if ($nombre_view == 'editarLineaEmprendedor') {
            # imprimimos los inputs para la vista de edicion de linea emprendedor
            for ($i=1; $i < 10; $i++) { 
                print_r('<tr>
                                            <td>
                                                <input type="text" name="item'.$i.'_descripcion" placeholder="descripción del bien" value="{{$datosForm->item'.$i.'_descripcion}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item'.$i.'_cantidad" placeholder="xxx.xx" value="{{$datosForm->item'.$i.'_cantidad}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item'.$i.'_precio" placeholder="xxx.xx" value="{{$datosForm->item'.$i.'_precio}}">
                                            </td>
                                            <td>
                                                <input type="text" name="item'.$i.'_total" placeholder="xxx.xx" value="{{$datosForm->item'.$i.'_total}}" readonly>
                                            </td>
                                        </tr>');
            }
        }
    }
    public static function subirMultimedia($descripcion,$archivoMultimedia, $lastID)
    {
        DB::beginTransaction();
                    try {
                    //Asignamos las reglas de extensiones de archivos para subir
                      $rules = array('jpg','png','jpeg','pdf','xlsx','xls','odt');
                    //El path desde donde se envia el archivo
                      $path = storage_path().DIRECTORY_SEPARATOR.$archivoMultimedia->getClientOriginalName();
                    //Nombre del archivo
                      $nombre =  pathinfo($path, PATHINFO_FILENAME);
                    //Extensión del archivo
                      $ext = pathinfo($path, PATHINFO_EXTENSION);
                    //Comprobamos que la extensión del archivo esté en las reglas
                    if (in_array($ext, $rules)) {
                        //Agregamos un registro en la tabla multimedia con su nombre y extensión original
                            $multimedia = new Multimedia;
                            $multimedia->nombre = $nombre;
                            $multimedia->extension = $ext;
                            $multimedia->save();
                        //path de destino
                            $destinationPath = '/var/www/html/crear/app/Assets/Images';
                        //Subimos el archivo al path de destino y le asignamos un nombre nuevo mediante el id que nos provee el registro de multimedia
                            $archivoMultimedia->move($destinationPath, $multimedia->id);
                        //asignamos el archivo a la tabla de documentación para finalizar la operación
                            $documentacion = new Documentacion;
                            $documentacion->descripcion = $descripcion;
                            $documentacion->formulario_id = $lastID;
                            $documentacion->multimedia_id = $multimedia->id;
                            $documentacion->save();
                        }
                    } catch (\Illuminate\Database\QueryException $e) {
                        DB::rollback();
                        dd($e);
                    }
        DB::commit();
    }
    public static function subirImagenEmprendimiento($descripcion,$archivoMultimedia, $lastID)
    {
        DB::beginTransaction();
                    try {
                    //Asignamos las reglas de extensiones de archivos para subir
                      $rules = array('jpg','png','jpeg');
                    //El path desde donde se envia el archivo
                      $path = storage_path().DIRECTORY_SEPARATOR.$archivoMultimedia->getClientOriginalName();
                    //Nombre del archivo
                      $nombre =  pathinfo($path, PATHINFO_FILENAME);
                    //Extensión del archivo
                      $ext = pathinfo($path, PATHINFO_EXTENSION);
                    //Comprobamos que la extensión del archivo esté en las reglas
                    if (in_array($ext, $rules)) {
                        //Agregamos un registro en la tabla multimedia con su nombre y extensión original
                            $multimedia = new Multimedia;
                            $multimedia->nombre = $nombre;
                            $multimedia->extension = $ext;
                            $multimedia->save();
                        //path de destino
                            $destinationPath = '/var/www/html/crear/public/img/emprendimientos';
                        //Subimos el archivo al path de destino y le asignamos un nombre nuevo mediante el id que nos provee el registro de multimedia
                            $archivoMultimedia->move($destinationPath, $multimedia->id);
                        //asignamos el archivo a la tabla de documentación para finalizar la operación
                            $imgEmprendimiento = new ImagenesEmprendimiento;
                            $imgEmprendimiento->descripcion = $descripcion;
                            $imgEmprendimiento->emprendimiento_comercial_id = $lastID;
                            $imgEmprendimiento->multimedia_id = $multimedia->id;
                            $imgEmprendimiento->save();
                        }
                    } catch (\Illuminate\Database\QueryException $e) {
                        DB::rollback();
                        dd($e);
                    }
        DB::commit();
    }
    //Subir multimedia lineaCreditos
    public static function subirInfoLineaCreditos($descripcion,$archivoMultimedia, $lastID)
    {
        $form_tipo = FormTipo::where('id',$lastID)->first();
        DB::beginTransaction();
                    try {
                    //Asignamos las reglas de extensiones de archivos para subir
                      $rules = array('pdf','odt','doc','xlsx','docx','xls');
                    //El path desde donde se envia el archivo
                      $path = storage_path().DIRECTORY_SEPARATOR.$archivoMultimedia->getClientOriginalName();
                    //Nombre del archivo
                      $nombre =  pathinfo($path, PATHINFO_FILENAME);
                    //Extensión del archivo
                      $ext = pathinfo($path, PATHINFO_EXTENSION);
                    //Comprobamos que la extensión del archivo esté en las reglas
                    if (in_array($ext, $rules)) {
                        //Agregamos un registro en la tabla multimedia con su nombre y extensión original
                            $multimedia = new Multimedia;
                            $multimedia->nombre = $nombre;
                            $multimedia->extension = $ext;
                            $multimedia->save();
                        //path de destino
                            $destinationPath = public_path('infoLineas/');
                        //Subimos el archivo al path de destino y le asignamos un nombre nuevo mediante el id que nos provee el registro de multimedia
                            $archivoMultimedia->move($destinationPath, $multimedia->id.'.'.$ext);
                        //asignamos el archivo a la tabla de documentación para finalizar la operación
                            $infoLinea = new InfoLinea;
                            $infoLinea->descripcion = $descripcion;
                            $infoLinea->form_tipo_id = $lastID;
                            $infoLinea->multimedia_id = $multimedia->id;
                            $infoLinea->save();
                        }
                    } catch (\Illuminate\Database\QueryException $e) {
                        DB::rollback();
                        dd($e);
                    }
        DB::commit();
    }
    /*Crear options de select con conjunto de datos para el ingreso de linea emprendedor*/
    //funcion toma dos parametros, primero el arreglo de datos y el otro la aguja 
    public static function crearOptionLE($elementosSeleccionables,$datoSeleccionado) {
        if(!isset($dato)) {
            print '<option value="" disabled selected>Elegí la opción...</option>';
        }
        foreach ($elementosSeleccionables as $seleccion) {
            if ($seleccion == $datoSeleccionado) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            print '<option '.$selected.' value="'.$seleccion.'">'.$seleccion.'</option>';
        }
    }
    public static function crearOptionLEObjetos($elementosSeleccionables,$datoSeleccionado) {
        if(!isset($dato)) {
            print '<option value="" disabled selected>Elegí la opción...</option>';
        }
        foreach ($elementosSeleccionables as $seleccion) {
            if ($seleccion->nombre == $datoSeleccionado) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            print '<option '.$selected.' value="'.$seleccion->nombre.'">'.$seleccion->nombre.'</option>';
        }
    }
    public static function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
       
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    } 
    /*FUNCION PARA CAMBIAR EL FORMATO DE LA FECHA PARA SU POSTERIOR INGRESO EN LA BD*/
	public static function cambioFormatoFecha($fecCambia)
     {
     	if ($fecCambia) {		
	        $fecDividida = explode("-", $fecCambia);
	        $fecFinal = $fecDividida[2]."-".$fecDividida[1]."-".$fecDividida[0];
     	} else {
     		$fecFinal = NULL;
     	}
        return $fecFinal;
     }
    /* HELPERS PARA VISTAS DE ADMIN Y USUARIO, CREAN LOS REGISTROS Y SUS ACCIONES SEGUN EL ROL DEL USUARIO*/
    public static function crearRegistrosForm($rol,$formularios,$filtro = null) 
    {
        $estados = config('constantes.estados');
        print_r('
            <table class="w3-table-all w3-hoverable">
                <thead>
                  <tr class="w3-green">
                    <th colspan="8" style="text-align: center;">FORMULARIOS CREAR</th>
                  </tr>
                  <tr>
                    <th style="display:none;">ID</th>
                    <th>Nº PROYECTO</th>
                    <th>SOLICITANTE</th>
                    <th>FECHA</th>
                    <th>LOCALIDAD</th>
                    <th>MONTO</th>
                    <th>LÍNEA DE CRÉDITO</th>
                    <th>ACCIONES</th>
                  </tr>
                </thead>
                ');
        if (empty($formularios[0])) {
            echo "<tr><td colspan='6'>No se encontraron formularios cargados.</td></tr>";
        } else {
            for ($i=0; $i < count($formularios); $i++) {
                $idUsuario = $formularios[$i]->idUsuario;
                $usuario = Usuario::find($idUsuario);
                $formTipo = FormTipo::find($formularios[$i]->form_tipo_id);
                if ($rol == 'admin' && $filtro == 'verTodos') {
                    if ($formularios[$i]->estado == $estados['enviado']) {
                        $idForm = $formularios[$i]->id;
                        echo "<tr>";
                     }
                    if ($formularios[$i]->estado == $estados['observacion']) {
                        $idForm = $formularios[$i]->id;
                        echo "<tr class='w3-orange'>";
                    }
                    if ($formularios[$i]->estado == $estados['actualizado']) {
                        $idForm = $formularios[$i]->id;
                        echo "<tr class='w3-khaki'>";
                     }
                    if ($formularios[$i]->estado == $estados['completo']) {
                        $idForm = $formularios[$i]->id;
                        echo "<tr class='w3-light-green'>";
                    }
                        echo "<td style='display:none;'>".$formularios[$i]->id."</td>";
                        echo "<td>".$formularios[$i]->numeroSeguimiento."</td>";
                        echo "<td>".$formularios[$i]->nombreEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->updated_at."</td>";
                        echo "<td>".$formularios[$i]->localidadEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->montoSolicitado."</td>";
                        echo "<td>".$formTipo->nombre."</td>";
                        echo "<td><a href='adminFormulario/".$formularios[$i]->id."'><img class='acciones' src='".asset('img/icons/edit.svg')."' style='width:30px;margin-left:5px;margin-right:15px;'></a><a id='eliminar'><img class='acciones' src=".asset('img/icons/trash-2.svg')." width='30px'></a>
                            <div style='margin-top:4px;background-color:#f0e68c;border-radius:15px;' align='center'>
                            <a href='generarPdf/".$formularios[$i]->id."' target='_blank' style='text-decoration:none;font-size:10px;color:black;'>GENERAR PDF</a></div>
                            <div style='margin-top:4px;background-color:#f0e68c;border-radius:15px;' align='center'>
                            <a href='cambiarEstado/".$formularios[$i]->id."' target='_blank' style='text-decoration:none;font-size:10px;color:black;'>Cambiar estado</a></div>
                            </td>";
                        echo "</tr>";
                        if ($formularios[$i]->estado == $estados['eliminado']) {
                            $idForm = $formularios[$i]->id;
                            echo "<tr class='w3-red'>";
                            echo "<td style='display:none;'>".$formularios[$i]->id."</td>";
                            echo "<td>".$formularios[$i]->numeroSeguimiento."</td>";
                            echo "<td>".$formularios[$i]->nombreEmprendedor."</td>";
                            echo "<td>".$formularios[$i]->updated_at."</td>";
                            echo "<td>".$formularios[$i]->localidadEmprendedor."</td>";
                            echo "<td>".$formularios[$i]->montoSolicitado."</td>";
                            echo "<td>".$formTipo->nombre."</td>";
                            echo "<td>";
                            foreach ($formularios[$i]->motivos as $motivo) {
                                # Motivos de rechazo
                                echo "-".$motivo->descripcion."<br>";
                            }
                            echo "</td>";
                            echo "</tr>";
                         }
                }
                else if ($rol == 'admin' && $filtro == 'tramite') {
                    if ($formularios[$i]->estado == $estados['enviado']) {
                        $idForm = $formularios[$i]->id;
                        echo "<tr>";
                        echo "<td style='display:none;'>".$formularios[$i]->id."</td>";
                        echo "<td>".$formularios[$i]->numeroSeguimiento."</td>";
                        echo "<td>".$formularios[$i]->nombreEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->updated_at."</td>";
                        echo "<td>".$formularios[$i]->localidadEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->montoSolicitado."</td>";
                        echo "<td>".$formTipo->nombre."</td>";
                        echo Helpers::acciones($rol,$formularios[$i]->id);
                        echo "</tr>";
                     } 
                    if ($formularios[$i]->estado == $estados['observacion']) {
                        $idForm = $formularios[$i]->id;
                        echo "<tr class='w3-orange'>";
                        echo "<td style='display:none;'>".$formularios[$i]->id."</td>";
                        echo "<td>".$formularios[$i]->numeroSeguimiento."</td>";
                        echo "<td>".$formularios[$i]->nombreEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->updated_at."</td>";
                        echo "<td>".$formularios[$i]->localidadEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->montoSolicitado."</td>";
                        echo "<td>".$formTipo->nombre."</td>";
                        echo Helpers::acciones($rol,$formularios[$i]->id);
                        echo "</tr>";
                    } 
                    if ($formularios[$i]->estado == $estados['actualizado']) {
                        $idForm = $formularios[$i]->id;
                        echo "<tr class='w3-khaki'>";
                        echo "<td style='display:none;'>".$formularios[$i]->id."</td>";
                        echo "<td>".$formularios[$i]->numeroSeguimiento."</td>";
                        echo "<td>".$formularios[$i]->nombreEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->updated_at."</td>";
                        echo "<td>".$formularios[$i]->localidadEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->montoSolicitado."</td>";
                        echo "<td>".$formTipo->nombre."</td>";
                        echo Helpers::acciones($rol,$formularios[$i]->id);
                        echo "</tr>";
                     } 
                } 
                else if ($rol == 'admin' && $filtro == 'eliminados') {
                    if ($formularios[$i]->estado == $estados['eliminado']) {
                        $idForm = $formularios[$i]->id;
                        echo "<tr class='w3-red'>";
                        echo "<td style='display:none;'>".$formularios[$i]->id."</td>";
                        echo "<td>".$formularios[$i]->numeroSeguimiento."</td>";
                        echo "<td>".$formularios[$i]->nombreEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->updated_at."</td>";
                        echo "<td>".$formularios[$i]->localidadEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->montoSolicitado."</td>";
                        echo "<td>".$formTipo->nombre."</td>";
                        echo "<td>";
                            foreach ($formularios[$i]->motivos as $motivo) {
                                # Motivos de rechazo
                                echo "-".$motivo->descripcion."<br>";
                            }
                        echo "</td>";
                        echo "</tr>";
                     }
                }
                else if ($rol == 'admin' && $filtro == 'completos') {
                    if ($formularios[$i]->estado == $estados['completo']) {
                        $idForm = $formularios[$i]->id;
                        echo "<tr class='w3-light-green'>";
                        echo "<td style='display:none;'>".$formularios[$i]->id."</td>";
                        echo "<td>".$formularios[$i]->numeroSeguimiento."</td>";
                        echo "<td>".$formularios[$i]->nombreEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->updated_at."</td>";
                        echo "<td>".$formularios[$i]->localidadEmprendedor."</td>";
                        echo "<td>".$formularios[$i]->montoSolicitado."</td>";
                        echo "<td>".$formTipo->nombre."</td>";
                        echo "<td><a href='adminFormulario/".$idForm."'><img class='acciones' src='".asset('img/icons/edit.svg')."' style='width:30px;margin-left:5px;margin-right:15px;'></a><a id='eliminar'><img class='acciones' src=".asset('img/icons/trash-2.svg')." width='30px'></a>
                            <div style='margin-top:4px;background-color:#f0e68c;border-radius:15px;' align='center'>
                            <a href='generarPdf/".$idForm."' target='_blank' style='text-decoration:none;font-size:10px;color:black;'>GENERAR PDF</a></div>
                            <div style='margin-top:4px;background-color:#f0e68c;border-radius:15px;' align='center'>
                            <a href='cambiarEstado/".$idForm."' target='_blank' style='text-decoration:none;font-size:10px;color:black;'>Cambiar estado</a></div>
                            </td>";
                        //echo Helpers::acciones($rol,$formularios[$i]->id);
                        echo "</tr>";
                     }
                }
            }
        }
        echo "</table>";
    }
    public static function acciones($rol,$idForm)
    {
        if ($rol == 'admin') {
            $acciones = "<td><a href='adminFormulario/".$idForm."'><img class='acciones' src='".asset('img/icons/edit.svg')."' style='width:30px;margin-left:5px;margin-right:15px;'></a><a id='eliminar'><img class='acciones' src=".asset('img/icons/trash-2.svg')." width='30px'></a>
            <div style='margin-top:4px;background-color:#f0e68c;border-radius:15px;' align='center'>
            <a href='generarPdf/".$idForm."' target='_blank' style='text-decoration:none;font-size:10px;color:black;'>GENERAR PDF</a></div>
            </td>";
        }
        return $acciones;
    }

    public static function crearCheckValido($nombre,$datos)
    {      
      $valido = '';

      if ($datos != 0) {
        $valido = 'checked';
        $datos = 1;
      }
      print_r('
          <input type="checkbox" class="validar" name=verificar["'.$nombre.'"] value="'.$datos.'" '.$valido.'></input>
        '); 
    }
    public static function crearRadio($inputName,$opcion) 
    {
        switch ($inputName) {
            case 'lugarEmprendimiento':
                $valores = ['Propio','Prestado','Alquilado','Otro'];
                break;
            case 'gradoInstruccion':
                $valores = ['Primario','Secundario','Terceario','Universitario'];
                break;
            case 'tipoAporte':
                $valores = ['Credito','Subsidio','Otro'];
                break;
            case 'estadoAporte':
                $valores = ['Rendido','En proceso','No rendido','Otro'];
                break;
            case 'situacionLaboral':
                $valores = ['Ocupado','Desocupado','Changas','Trabajo temporal','Ama de casa','Otro'];
                break;
            case 'percepcionesSociales':
                $valores = ['Pensión/Jubilación','AUH/AFH','Pensión madre de siete hijos','Prestación por desempleo','Prestación por viudez o fallecimiento','Otro'];
                break;
            case 'lugarHabita':
                $valores = ['Propio','Prestado','Alquilado','Otro'];
                break;
            default:
                $valores = NULL;
                break;
        }

        $valores = array_flip($valores); 
        $valores = array_change_key_case($valores, CASE_UPPER); 
        $valores = array_flip($valores); 
        $opcion = strtoupper($opcion);
        echo "<ul>"; 
            for ($i=0; $i < count($valores); $i++) { 
                if ($valores[$i] == $opcion) {
                    echo '<li><input type="radio" name="'.$inputName.'" value="'.$valores[$i].'" checked="checked">'.$valores[$i].'</li>';
                } else {
                    echo '<li><input type="radio" name="'.$inputName.'" value="'.$valores[$i].'">'.$valores[$i].'</li>';
                }
            }
        echo "</ul>";
    }
    public static function opcionSelectItems($opcion)
    {
       $valItems = ['BIENES DE CAPITAL','CAPITAL DE TRABAJO','INSTALACIONES','OBRA CIVIL'];
       echo '
                  <select name="tipoItemFinan[]">';
            for ($i=0; $i < count($valItems); $i++) { 
                if ($valItems[$i] == $opcion) {
                    echo '<option value="'.$valItems[$i].'" selected>'.$valItems[$i].'</option>';
                } else {
                    echo '<option value="'.$valItems[$i].'">'.$valItems[$i].'</option>';
                }
            }
        echo '</select>';
    }
    public static function crearRegistrosDatos($titulo, $datos)
    {
        $registros = [];
        $tituloLower = strtolower($titulo);
        if (empty($datos[0])) {
            echo "<h3>No hay datos de ".$tituloLower." cargados.</h3>";    
        } else {
            //CREAMOS HTML DE TABLA
            echo "<table class='w3-table-all'>";
            //CONVERTIMOS EL OBJETO EN UN CONJUNTO DE ARRAYS
            foreach ($datos as $value) {
                $registros[] = json_decode(json_encode($value), true);
            }
            //FILTRO DE REGISTROS NO IMPORTANTES
            for ($i=0; $i < count($registros); $i++) {
                foreach ($registros[$i] as $key => $value) {
                    if ($key == "id" || $key == "updated_at" || $key == "created_at" || $key == "formulario_id" || $key == "encargado") {
                        unset($registros[$i][$key]);
                    }
                }
            }
            //EXTRAER CLAVES PARA CREAR EL LA FILA CON LOS NOMBRES DE LOS ATRIBUTOS
            for ($i=0; $i < count($registros); $i++) { 
                $clavesReg[] = array_keys($registros[$i]); 
            }
            //CREAR TÍTULO DE TABLA
            $numClaves = sizeof($clavesReg);
            $numClaves = $numClaves+3;
            echo "<tr><th class='w3-white' style='text-align:center;' colspan=".$numClaves.">".$titulo."</th></tr>";
            //CREACIÓN DE FILA CON NOMBRES DE ATRIBUTOS
                echo "<tr>"; 
                foreach ($clavesReg[0] as $key => $value) {
                    echo "<th>".ucfirst($value)."</th>";
                }
                echo "</tr>";
            //CREACIÓN DE LAS FILAS CON LOS DATOS
            for ($i=0; $i < count($clavesReg); $i++) { 
                echo "<tr>";
                foreach ($registros[$i] as $key => $value) {
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            //CERRAMOS TABLA
            echo "</table>";
        }
    }
    public static function crearDatosVentas($ventas)
    {
        $totalVentas = 0;
        if (empty($ventas[0])) {
            echo "<h3>No hay ventas cargadas.</h3>"; 
        } else {
            print_r('
                 <table class="w3-table-all">
                        <thead>
                        <tr>
                          <th class="w3-green" colspan="5" style="text-align: center;font-size: 16px;">VENTAS</th>
                        </tr>
                        <tr>
                          <th colspan="5" style="text-align: center;font-size: 16px;">VOLUMEN ESTIMADO DE VENTAS AL MES DE EJECUTAR EL FINANCIAMIENTO</th>
                        </tr>
                      </thead>
                    </table> 
                    <table class="w3-table-all w3-card-4">
                    <tr>
                      <th>Producto o servicio</th>
                      <th>Ud. Medida</th>
                      <th>CANTIDAD AL AÑO</th>
                      <th>PRECIO</th>
                      <th>TOTAL</th>
                    </tr>
                    ');
            for ($i=0; $i < count($ventas) ; $i++) {
                echo "<tr>";
                echo "<td>".$ventas[$i]->producto."</td>";
                echo "<td>".$ventas[$i]->udMedida."</td>";
                echo "<td>".$ventas[$i]->cantAnio."</td>";
                echo "<td> $".$ventas[$i]->precio."</td>";
                echo "<td> $".$ventas[$i]->cantAnio*$ventas[$i]->precio."</td>";
                echo "</tr>";
                $totalVentas = $totalVentas + ($ventas[$i]->cantAnio*$ventas[$i]->precio);
            }
            echo "<tr><th colspan='4'>TOTAL VENTAS</th><td>$ ".$totalVentas." ?></td></tr>";
            echo "</table>";
        }
    }
    public static function calcularTotalCostos($formularioEnviado)
    {
        $totalCostos = 0;
        $totalCostos = $formularioEnviado->insumosCostos+$formularioEnviado->alquileresCostos+$formularioEnviado->serviciosCostos+$formularioEnviado->monotributoCostos+$formularioEnviado->ingresosBrutosCostos+$formularioEnviado->segurosCostos+$formularioEnviado->combustibleCostos+$formularioEnviado->sueldosCostos+$formularioEnviado->comercializacionCostos+$formularioEnviado->otrosCostos+$formularioEnviado->segurosCostos;
        return $totalCostos;
    }
    public static function calcularTotalManifestacion($bienes,$deudas,$otrasDeudas = 0)
    {
        $total = 0;
        $totalActivo = 0;
        $totalPasivo = 0;

        for ($i=0; $i < count($bienes); $i++) { 
            foreach ($bienes[$i] as $key) {
                $totalActivo += $key->monto;
            }
        }
        for ($i=0; $i < count($deudas); $i++) { 
            foreach ($deudas[$i] as $key) {
                $totalPasivo += $key->monto;
            }
        }
        $total = $totalActivo - $totalPasivo - $otrasDeudas;
        print_r('
            <p align="center">
                OTRAS DEUDAS: $'.$otrasDeudas.'<br>
                TOTAL ACTIVO: $'.$totalActivo.'<br>
                TOTAL PASIVO: $'.$totalPasivo.'<br><br>
                <b>TOTAL PATRIMONIO NETO:</b> $'.$total.' 
            </p>
            ');
    }
    public static function calcularBienesFinanciamiento($datos)
    {
        $totalBienes = 0;
        $totalCapital = 0;
        $totalInstalaciones = 0;
        $totalObra = 0;
        $total = 0;
        for ($i=0; $i < count($datos); $i++) {
        $monto = $datos[$i]->cantidad * $datos[$i]->precioUnitario;

            if ($datos[$i]->nombreItem == 'BIENES DE CAPITAL') {
                $totalBienes += $monto;
            }
            if ($datos[$i]->nombreItem == 'CAPITAL DE TRABAJO') {
                $totalCapital += $monto;
            }
            if ($datos[$i]->nombreItem == 'INSTALACIONES') {
                $totalInstalaciones += $monto;
            }
            if ($datos[$i]->nombreItem == 'OBRA CIVIL') {
                $totalObra += $monto;
            }
        }
        $total = $totalBienes + $totalCapital + $totalInstalaciones + $totalObra;
        print_r('
            <p align="center">
                BIENES DE CAPITAL: $'.$totalBienes.'<br>
                CAPITAL DE TRABAJO: $'.$totalCapital.'<br>
                INSTALACIONES: $'.$totalInstalaciones.'<br>
                OBRA CIVIL: $'.$totalObra.'<br><br>
                <B align="center">TOTAL SOLICITADO AL CREAR</B><BR> $'.$total.'<br>
            </p>'
        );
    }
    /*FUNCION QUE CREA LOS ITEMS DE */
    public static function crearItemSeguimiento($pasosValidos,$observaciones)
    {
        $respuesta = null;
        $pasosValidos = json_decode($pasosValidos);
        $pasosValidos = (array) $pasosValidos;

        $hojasObs = [];

        for ($i=0; $i < count($observaciones); $i++) { 
            $hojasObs[] = $observaciones[$i]->hoja;
        }

        unset($pasosValidos['id']);
        unset($pasosValidos['formulario_id']);
        unset($pasosValidos['updated_at']);
        unset($pasosValidos['created_at']);
        unset($pasosValidos['observaciones']);

        foreach ($pasosValidos as $key => $value) {
            if ($value == '0') {
                if (in_array($key, $hojasObs)) {
                    $respuesta = '<span style="width:33.33%;padding: 10px;height: 50px;" class="w3-bar-item w3-mobile w3-orange">'.$key.'
                            <i class="fas fa-exclamation" style="font-size:24px;margin-left: 5px;"></i>
                              </span>';
                } else {
                    $respuesta = '<span style="width:33.33%;padding: 10px;height: 50px;" class="w3-bar-item w3-mobile">'.$key.'
                            <i class="far fa-clock" style="font-size:24px;margin-left: 5px;"></i>
                              </span>';
                }
            }
            
            if ($value == '1') {
                $respuesta = '<span style="width:33.33%;padding: 10px;height: 50px;color:white;" class="w3-bar-item w3-mobile w3-light-green">'.$key.'<i class="fas fa-check" style="font-size:24px;margin-left: 5px;"></i></span>';
            }
            echo $respuesta;
        }
    }
    /*FUNCIONES PARA CREAR LOS INPUTS DE BIENES DE EMPRENDEDOR Y GARANTE EN EL UPDATE DE ESTOS MISMOS*/
    public static function crearPatrimonioEmprendedor($nombre,$datos)
    {
        if ($nombre) {
          $countBienes = 0;
          for ($i=0; $i < count($datos); $i++) { 
              if ($datos[$i]->encargado == 'EMPRENDEDOR') {
                  $countBienes++; 
              }
          }
          for ($i=0; $i < $countBienes; $i++) {
                if ($datos[$i]->encargado == 'EMPRENDEDOR') {
                    $opciones = Helpers::conjuntoBienes($nombre,'emprendedor');
                echo '
                  <div id="'.$opciones[3].'" class="item_bien">
                    <p>';
                echo Helpers::crearSelectPatrimonio($opciones[0],$datos[$i]->tipo);
                echo '
                        </p>
                        <p class="monto_bienes">
                          <input placeholder="Monto" type="text" name="'.$opciones[4].'[]" value="'.$datos[$i]->monto.'">
                        </p><a href="#" class="remover_campo">Remover</a>
                      </div>
                  ';
                }
            }
        }
    }
    public static function crearPatrimonioGarante($nombre,$datos)
    {
        if ($nombre) {
          $countBienes = 0;
          for ($i=0; $i < count($datos); $i++) {
              if ($datos[$i]->encargado == 'EMPRENDEDOR') {
                    $countBienes++;
              }
          }
          for ($i=$countBienes; $i < count($datos); $i++) {
                if ($datos[$i]->encargado == 'GARANTE') {
                    $opciones = Helpers::conjuntoBienes($nombre,'garante');
                echo '
                  <div id="'.$opciones[3].'" class="item_bien">
                    <p>';
                echo Helpers::crearSelectPatrimonio($opciones[0],$datos[$i]->tipo);
                echo '
                        </p>
                        <p class="monto_bienes">
                          <input placeholder="Monto" type="text" name="'.$opciones[4].'[]" value="'.$datos[$i]->monto.'">
                        </p><a href="#" class="remover_campo">Remover</a>
                      </div>
                  ';
                }
            }
        }
    }
    public static function conjuntoBienes($nombre,$encargado) {
        $opciones = [];
        $encargado = '';
        if ($encargado == 'garante') {
          $encargado = '_g';
        }
        switch ($nombre) {
              case 'DISPONIBILIDADES':
                $opciones = ['disponibilidades'.$encargado,'DISPONIBILIDADES','add_disponibilidad'.$encargado,'disponibilidad'.$encargado,'monto_disponibilidad'.$encargado]; 
                break;
              case 'BIENES DE CAMBIO':
                $opciones = ['bienes_cambio'.$encargado,'BIENES DE CAMBIO','add_bien'.$encargado,'bien_cambio'.$encargado,'monto_bienescambio'.$encargado];
                break;
              case 'BIENES DE USO':
                $opciones = ['bienes_uso'.$encargado,'BIENES DE USO','add_bienuso'.$encargado,'bien_uso'.$encargado,'monto_bienesuso'.$encargado];
              case 'DEUDAS COMERCIALES':
                $opciones = ['deudas_comerciales'.$encargado,'DEUDAS COMERCIALES','add_deudacomercial'.$encargado,'deuda_comercial'.$encargado,'monto_dcomercial'.$encargado];
                break;
              case 'DEUDAS BANCARIAS':
                $opciones = ['deudas_bancarias'.$encargado,'DEUDAS BANCARIAS','add_deudabancaria'.$encargado,'deuda_bancaria'.$encargado,'monto_dbancaria'.$encargado];
                break;
              case 'DEUDAS FISCALES':
                $opciones = ['deudas_fiscales'.$encargado,'DEUDAS FISCALES','add_deudafiscal'.$encargado,'deuda_fiscal'.$encargado,'monto_dfiscal'.$encargado];
                break;
            }
        return $opciones;
    }
    public static function crearSelectPatrimonio($id,$opcion) {
        switch (true) {
            case ($id == 'disponibilidades' || $id == 'disponibilidades_g'):
                $selectItems = ['Efectivo','Cuentas bancarias','Créditos por ventas','Otros créditos'];
                break;
            case ($id == 'bienes_cambio' || $id == 'bienes_cambio_g'):
                $selectItems = ['Mercaderías','Materia prima','Insumos'];
                break;
            case ($id == 'bienes_uso' || $id == 'bienes_uso_g'):
                $selectItems = ['Inmuebles','Rodados'];
                break;
            case ($id == 'deudas_comerciales' || $id == 'deudas_comerciales_g'):
                $selectItems = ['En cuentas corrientes','Cheques de pago diferido','Documentadas','Otros'];
                break;
            case ($id == 'deudas_bancarias' || $id == 'deudas_bancarias_g'):
                $selectItems = ['En cuentas corrientes','Cheques de pago diferido','Documentadas','Otros'];
                break;
            case ($id == 'deudas_fiscales' || $id == 'deudas_fiscales_g'):
                $selectItems = ['Rentas Río Negro','Tributos municipales','Deudas sociales (Aportes, contribuciones, salarios, etc)'];
                break;
        }
        echo '<select id="'.$id.'" name="'.$id.'[]">';
        for ($i=0; $i < count($selectItems); $i++) {
                if ($selectItems[$i] == $opcion) {
                    echo '<option value="'.$selectItems[$i].'" selected>'.$selectItems[$i].'</option>';
                } else {
                    echo '<option value="'.$selectItems[$i].'">'.$selectItems[$i].'</option>';
                }
        }
        echo '</select>';
    }
}
