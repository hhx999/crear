<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model {

	protected $table = 'FORMULARIOS';

    protected $fillable = [
"idUsuario",
"form_tipo_id",
"estado",
"nombreEmprendedor",
"dniEmprendedor",
"localidadEmprendedor",    
"domicilioEmprendedor",
"telefonoEmprendedor",
"emailEmprendedor",
"facebookEmprendedor",
"gradoInstruccion",
"otraOcupacion", 
"ingresoMensual",
"deseoCapacitacion",
"actPrincipalEmprendimiento",
"fecInicioEmprendimiento",
"antiguedadEmprendimiento",
"cuitEmprendimiento",
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
"puntosVenta",
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
}
