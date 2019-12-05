<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrador extends Model {

	protected $table = 'borradoresLE';
	
	protected $fillable = [
	"idUsuario",
	"form_tipo_id",
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
    public function items_financiamiento()
    {
    	return $this->hasMany('App\BorradorItemFinanciamiento');
    }
    public function ventas()
    {
    	return $this->hasMany('App\BorradorVenta');
    }
}