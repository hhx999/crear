<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorradoresLE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borradoresLE', function (Blueprint $table) {
            $table->integer('id',true);
            $table->string('asuntoBorrador',255)->nullable();
            //Información del emprendedor, la primera hoja del formulario para el usuario
            $table->string('nombreEmprendedor', 45)->nullable();
            $table->string('dniEmprendedor', 45)->nullable();
            $table->string('localidadEmprendedor', 45)->nullable();
            $table->string('domicilioEmprendedor', 45)->nullable();
            $table->string('telefonoEmprendedor', 20)->nullable();
            $table->string('emailEmprendedor', 45)->nullable();
            $table->string('facebookEmprendedor', 45)->nullable();
            $table->string('instagramEmprendedor', 45)->nullable();
            $table->string('gradoInstruccion', 45)->nullable();
            $table->string('otraOcupacion', 45)->nullable();
            $table->integer('ingresoMensual')->nullable();
            $table->string('deseoCapacitacion', 45)->nullable();
            //Datos generales del emprendimiento
            $table->string('estadoEmprendimiento',45)->nullable();
            $table->string('denominacion',255)->nullable();
            $table->string('tipoSociedad',155)->nullable();
            $table->string('actPrincipalEmprendimiento', 255)->nullable();
            $table->date('fecInicioEmprendimiento')->nullable()->format('d-m-Y');
            $table->string('antiguedadEmprendimiento', 45)->nullable();
            $table->string('cuitEmprendimiento', 20)->nullable();
            $table->string('cargo',45)->nullable();
            $table->string('emailEmprendimiento',255)->nullable();
            $table->string('telefonoEmprendimiento',45)->nullable();
            $table->float('ingresosBrutosEmprendimiento', 10, 0)->nullable();
            $table->string('domicilioEmprendimiento', 45)->nullable();
            $table->string('localidadEmprendimiento', 45)->nullable();
            $table->string('lugarEmprendimiento', 45)->nullable();
            $table->string('descProdServicios')->nullable();
            $table->string('institucionAporte', 45)->nullable();
            $table->string('experienciaEmprendedores')->nullable();
            $table->text('oportunidadMercado', 65535)->nullable();
            $table->string('descFinanciamiento')->nullable();
            //Mercado
            $table->string('descripcionClientes')->nullable();
            $table->string('ubicacionClientes', 45)->nullable();
            $table->string('descripcionProveedores')->nullable();
            $table->string('ubicacionProveedores', 45)->nullable();
            $table->string('descripcionCompetencia')->nullable();
            $table->string('ubicacionCompetencia', 45)->nullable();
            $table->string('ventajaCompetidores')->nullable();
            $table->string('estrategiasPromocion')->nullable();
            $table->string('puntoVentaLocal')->nullable();
            $table->string('puntoVentaProvincial')->nullable();
            $table->string('puntoVentaNacional')->nullable();
            //Producción costos y resultados
            $table->string('materiasPrimas')->nullable();
            $table->string('descHerramientas')->nullable();
            $table->float('insumosCostos', 10, 0)->nullable()->default(0);
            $table->float('alquileresCostos', 10, 0)->nullable()->default(0);
            $table->float('serviciosCostos', 10, 0)->nullable()->default(0);
            $table->float('monotributoCostos', 10, 0)->nullable()->default(0);
            $table->float('ingresosBrutosCostos', 10, 0)->nullable()->default(0);
            $table->float('segurosCostos', 10, 0)->nullable()->default(0);
            $table->float('combustibleCostos', 10, 0)->nullable()->default(0);
            $table->float('sueldosCostos', 10, 0)->nullable()->default(0);
            $table->float('comercializacionCostos', 10, 0)->nullable()->default(0);
            $table->float('otrosCostos', 10, 0)->nullable()->default(0);
            $table->float('cuotaMensualCostos', 10, 0)->nullable()->default(0);
            //Manifestación de los bienes del emprendedor
            $table->string('nombreMBE', 45)->nullable();
            $table->string('dniMBE', 11)->nullable();
            $table->string('cuitMBE', 20)->nullable();
            $table->string('localidadMBE', 45)->nullable();
            $table->string('domicilioMBE', 45)->nullable();

            $table->float('efectivoMBE', 10, 0)->nullable()->default(0);
            $table->float('cuentasBancariasMBE', 10, 0)->nullable()->default(0);
            $table->float('creditosVentasMBE', 10, 0)->nullable()->default(0);
            $table->float('otrosCreditosMBE', 10, 0)->nullable()->default(0);
            $table->float('mercaderiasMBE', 10, 0)->nullable()->default(0);
            $table->float('materiasPrimasMBE', 10, 0)->nullable()->default(0);
            $table->float('insumosMBE', 10, 0)->nullable()->default(0);
            $table->float('inmueblesMBE', 10, 0)->nullable()->default(0);
            $table->float('rodadosMBE', 10, 0)->nullable()->default(0);
            $table->float('maquinariasEquiposMBE', 10, 0)->nullable()->default(0);
            $table->float('instalacionesMBE', 10, 0)->nullable()->default(0);
            $table->float('deudaCuentasCorrientesMBE', 10, 0)->nullable()->default(0);
            $table->float('deudaChequesPagoDiferidoMBE', 10, 0)->nullable()->default(0);
            $table->float('documentadasMBE', 10, 0)->nullable()->default(0);
            $table->float('otrasDeudasComercialesMBE', 10, 0)->nullable()->default(0);
            $table->float('deudaTarjetasCreditoMBE', 10, 0)->nullable()->default(0);
            $table->float('deudaGarantiaHipotecariaMBE', 10, 0)->nullable()->default(0);
            $table->float('deudaGarantiaPrendariaMBE', 10, 0)->nullable()->default(0);
            $table->float('deudaAfipMBE', 10, 0)->nullable()->default(0);
            $table->float('deudaRentasRnMBE', 10, 0)->nullable()->default(0);
            $table->float('deudaTributosMunicipalesMBE', 10, 0)->nullable()->default(0);
            $table->float('deudasSocialesMBE', 10, 0)->nullable()->default(0);
            $table->float('otrasDeudasMBE', 10, 0)->nullable()->default(0);

            //Manifestación bienes del garante
            $table->string('nombreMBG', 45)->nullable();
            $table->string('dniMBG', 11)->nullable();
            $table->string('cuitMBG', 20)->nullable();
            $table->string('localidadMBG', 45)->nullable();
            $table->string('domicilioMBG', 45)->nullable();

            $table->float('efectivoMBG', 10, 0)->nullable()->default(0);
            $table->float('cuentasBancariasMBG', 10, 0)->nullable()->default(0);
            $table->float('creditosVentasMBG', 10, 0)->nullable()->default(0);
            $table->float('otrosCreditosMBG', 10, 0)->nullable()->default(0);
            $table->float('mercaderiasMBG', 10, 0)->nullable()->default(0);
            $table->float('materiasPrimasMBG', 10, 0)->nullable()->default(0);
            $table->float('insumosMBG', 10, 0)->nullable()->default(0);
            $table->float('inmueblesMBG', 10, 0)->nullable()->default(0);
            $table->float('rodadosMBG', 10, 0)->nullable()->default(0);
            $table->float('maquinariasEquiposMBG', 10, 0)->nullable()->default(0);
            $table->float('instalacionesMBG', 10, 0)->nullable()->default(0);
            $table->float('deudaCuentasCorrientesMBG', 10, 0)->nullable()->default(0);
            $table->float('deudaChequesPagoDiferidoMBG', 10, 0)->nullable()->default(0);
            $table->float('documentadasMBG', 10, 0)->nullable()->default(0);
            $table->float('otrasDeudasComercialesMBG', 10, 0)->nullable()->default(0);
            $table->float('deudaTarjetasCreditoMBG', 10, 0)->nullable()->default(0);
            $table->float('deudaGarantiaHipotecariaMBG', 10, 0)->nullable()->default(0);
            $table->float('deudaGarantiaPrendariaMBG', 10, 0)->nullable()->default(0);
            $table->float('deudaAfipMBG', 10, 0)->nullable()->default(0);
            $table->float('deudaRentasRnMBG', 10, 0)->nullable()->default(0);
            $table->float('deudaTributosMunicipalesMBG', 10, 0)->nullable()->default(0);
            $table->float('deudasSocialesMBG', 10, 0)->nullable()->default(0);
            $table->float('otrasDeudasMBG', 10, 0)->nullable()->default(0);

            $table->integer('idUsuario')->index('FK_UsuarioFormularioBorrador');
            $table->integer('form_tipo_id')->index('FK_TipoFormularioBorrador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borradoresLE');
    }
}
