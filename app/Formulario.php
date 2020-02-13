<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model {

	protected $table = 'FORMULARIOS';

    protected $fillable = [
"idUsuario",
"form_tipo_id",
"tecnico_id",
"estado",
"emprendimiento_id",
"nombreEmprendedor",
    "dniEmprendedor",
    "localidadEmprendedor",    
    "domicilioEmprendedor",
    "telefonoEmprendedor",
    "emailEmprendedor",
    "facebookEmprendedor",
    "instagramEmprendedor",
    "gradoInstruccion",
    "otraOcupacion", 
    "ingresoMensual",
    "deseoCapacitacion",
    "estadoEmprendimiento",
    "denominacion",
    "tipoSociedad",
    "actPrincipalEmprendimiento",
    "fecInicioEmprendimiento",
    "antiguedadEmprendimiento",
    "cuitEmprendimiento",
    "emailEmprendimiento",
    "telefonoEmprendimiento",
    "cargo",
    "ingresosBrutosEmprendimiento",
    "domicilioEmprendimiento",
    "localidadEmprendimiento",
    "lugarEmprendimiento",
    "descProdServicios",
    "experienciaEmprendedores",
    "oportunidadMercado", 
    "descFinanciamiento",
    "descripcionClientes",
    "ubicacionClientes",
    "descripcionProveedores",
    "ubicacionProveedores",
    "descripcionCompetencia",
    "ubicacionCompetencia",
    "ventajaCompetidores",
    "estrategiasPromocion",
    "puntoVentaLocal",
    "puntoVentaProvincial",
    "puntoVentaNacional",
    "producto1",
"udMedida1",
"cantidad1",
"valor1",
"producto2",
"udMedida2",
"cantidad2",
"valor2",
"producto3",
"udMedida3",
"cantidad3",
"valor3",
"producto4",
"udMedida4",
"cantidad4",
"valor4",
"otrosProductosVenta",
    "materiasPrimas",
    "descHerramientas",
    "insumosCostos",
    "alquileresCostos",
    "serviciosCostos",
    "monotributoCostos",
    "ingresosBrutosCostos",
    "segurosCostos",
    "combustibleCostos",
    "sueldosCostos",
    "comercializacionCostos",
    "otrosCostos",
    "cuotaMensualCostos",
    "item1_descripcion",
"item1_cantidad",
"item1_precio",
"item2_descripcion",
"item2_cantidad",
"item2_precio",
"item3_descripcion",
"item3_cantidad",
"item3_precio",
"item4_descripcion",
"item4_cantidad",
"item4_precio",
"item5_descripcion",
"item5_cantidad",
"item5_precio",
"item6_descripcion",
"item6_cantidad",
"item6_precio",
"item7_descripcion",
"item7_cantidad",
"item7_precio",
"item8_descripcion",
"item8_cantidad",
"item8_precio",
"item9_descripcion",
"item9_cantidad",
"item9_precio",
"item10_descripcion",
"item10_cantidad",
"item10_precio",
    "efectivoMBE",
    "cuentasBancariasMBE",
    "creditosVentasMBE",
    "otrosCreditosMBE",
    "mercaderiasMBE",
    "materiasPrimasMBE",
    "insumosMBE",
    "inmueblesMBE",
    "rodadosMBE",
    "maquinariasEquiposMBE",
    "instalacionesMBE",
    "deudaCuentasCorrientesMBE",
    "deudaChequesPagoDiferidoMBE",
    "documentadasMBE",
    "otrasDeudasComercialesMBE",
    "deudaTarjetasCreditoMBE",
    "deudaGarantiaHipotecariaMBE",
    "deudaGarantiaPrendariaMBE",
    "deudaAfipMBE",
    "deudaRentasRnMBE",
    "deudaTributosMunicipalesMBE",
    "deudasSocialesMBE",
    "otrasDeudasMBE",
    "nombreMBG",
"dniMBG",
"cuitMBG",
"localidadMBG",
"domicilioMBG",
    "efectivoMBG",
    "cuentasBancariasMBG",
    "creditosVentasMBG",
    "otrosCreditosMBG",
    "mercaderiasMBG",
    "materiasPrimasMBG",
    "insumosMBG",
    "inmueblesMBG",
    "rodadosMBG",
    "maquinariasEquiposMBG",
    "instalacionesMBG",
    "deudaCuentasCorrientesMBG",
    "deudaChequesPagoDiferidoMBG",
    "documentadasMBG",
    "otrasDeudasComercialesMBG",
    "deudaTarjetasCreditoMBG",
    "deudaGarantiaHipotecariaMBG",
    "deudaGarantiaPrendariaMBG",
    "deudaAfipMBG",
    "deudaRentasRnMBG",
    "deudaTributosMunicipalesMBG",
    "deudasSocialesMBG",   
    "otrasDeudasMBG"  ];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'idUsuario');
    }
    public function credito()
    {
        return $this->hasOne(Credito::class);
    }
    public function get_localidad()
    {
        return $this->belongsTo(Localidad::class,'localidadEmprendedor');
    }
    public function emprendimiento()
    {
        return $this->belongsTo(Emprendimiento::class,'emprendimiento_id');
    }
    public function actividadPrincipal()
    {
        return $this->belongsTo(ActividadesPrincipales::class,'actPrincipalEmprendimiento');
    }
    public function referentes()
    {
        return $this->hasMany('App\Referencia');
    }
    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }
    public function proveedores()
    {
        return $this->hasMany('App\Proveedor');
    }
    public function competencias()
    {
        return $this->hasMany('App\Competencia');
    }
    public function ventas()
    {
    	return $this->hasMany('App\Venta');
    }
    public function items()
    {
    	return $this->hasMany('App\ItemFinanciamiento');
    }
    public function disponibilidades()
    {
    	return $this->hasMany('App\Disponibilidad');
    }
    public function bienescambio()
    {
        return $this->hasMany('App\BienCambio');
    }
    public function bienesuso()
    {
        return $this->hasMany('App\BienUso');
    }
    public function deudascomerciales()
    {
        return $this->hasMany('App\DeudaComercial');
    }
    public function deudasbancarias()
    {
        return $this->hasMany('App\DeudaBancaria');
    }
    public function deudasfiscales()
    {
        return $this->hasMany('App\DeudaFiscal');
    }
    public function pasosValidos()
    {
        return $this->hasOne('App\FormValido');
    }
    public function documentacion()
    {
        return $this->hasMany('App\Documentacion');
    }
    public function historialEstado()
    {
        return $this->hasMany('App\HistorialEstado');
    }
    public function motivos()
    {
        return $this->hasOne('App\EliminarMotivo');
    }
    public function obtenerEstado()
    {
        return $this->belongsTo('App\EstadoFormulario','estado');   
    }
}
