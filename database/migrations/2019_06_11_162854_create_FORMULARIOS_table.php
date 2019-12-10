<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
class CreateFORMULARIOSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('FORMULARIOS', function(Blueprint $table)
		{
			$table->integer('id', true);
			//Estado del proyecto
			$table->integer('estado')->nullable();
			$table->integer('numeroSeguimiento')->nullable();
			//Portada del formulario, la portada la llenan los administradores del crear
			$table->string('tituloProyecto', 45)->nullable();
			$table->string('nombreSolicitante', 45)->nullable();
			$table->string('localidadSolicitante', 45)->nullable();
			$table->string('agenciaProyecto', 45)->nullable();
			$table->string('numeroProyecto', 45)->nullable();
			$table->float('montoSolicitado', 10, 0)->nullable();
			$table->dateTime('fecPresentacionProyecto')->nullable();
			$table->string('descEmprendimiento', 300)->nullable();
			//Información del emprendedor, la primera hoja del formulario para el usuario
			$table->string('nombreEmprendedor', 45)->nullable();
			$table->string('dniEmprendedor', 45)->nullable();
			$table->string('localidadEmprendedor', 45)->nullable();
			$table->string('domicilioEmprendedor', 45)->nullable();
			$table->string('telefonoEmprendedor', 20)->nullable();
			$table->string('emailEmprendedor', 45)->nullable();
			$table->string('facebookEmprendedor', 45)->nullable();
			$table->string('instagramEmprendedor',45)->nullable();
			$table->string('gradoInstruccion', 45)->nullable();
			$table->string('otraOcupacion', 45)->nullable();
			$table->integer('ingresoMensual')->nullable();
			$table->string('deseoCapacitacion', 45)->nullable();
			//Datos generales del emprendimiento
			$table->string('actPrincipalEmprendimiento', 255)->nullable();
			$table->date('fecInicioEmprendimiento')->nullable();
			$table->string('antiguedadEmprendimiento', 45)->nullable();
			$table->string('cuitEmprendimiento', 20)->nullable();
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
			$table->string('producto1')->nullable();
			$table->string('udMedida1')->nullable();
			$table->float('cantidad1', 10, 0)->nullable()->default(0);
			$table->float('valor1', 10, 0)->nullable()->default(0);
			$table->string('producto2')->nullable();
			$table->string('udMedida2')->nullable();
			$table->float('cantidad2', 10, 0)->nullable()->default(0);
			$table->float('valor2', 10, 0)->nullable()->default(0);
			$table->string('producto3')->nullable();
			$table->string('udMedida3')->nullable();
			$table->float('cantidad3', 10, 0)->nullable()->default(0);
			$table->float('valor3', 10, 0)->nullable()->default(0);
			$table->string('producto4')->nullable();
			$table->string('udMedida4')->nullable();
			$table->float('cantidad4', 10, 0)->nullable()->default(0);
			$table->float('valor4', 10, 0)->nullable()->default(0);
			$table->float('otrosProductosVenta', 10, 0)->nullable()->default(0);
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

			//Bienes a financiar

			$table->string('item1_descripcion')->nullable();
			$table->integer('item1_cantidad')->nullable()->default(0);
			$table->float('item1_precio',10,0)->nullable()->default(0);

			$table->string('item2_descripcion')->nullable();
			$table->integer('item2_cantidad')->nullable()->default(0);
			$table->float('item2_precio',10,0)->nullable()->default(0);

			$table->string('item3_descripcion')->nullable();
			$table->integer('item3_cantidad')->nullable()->default(0);
			$table->float('item3_precio',10,0)->nullable()->default(0);

			$table->string('item4_descripcion')->nullable();
			$table->integer('item4_cantidad')->nullable()->default(0);
			$table->float('item4_precio',10,0)->nullable()->default(0);

			$table->string('item5_descripcion')->nullable();
			$table->integer('item5_cantidad')->nullable()->default(0);
			$table->float('item5_precio',10,0)->nullable()->default(0);

			$table->string('item6_descripcion')->nullable();
			$table->integer('item6_cantidad')->nullable()->default(0);
			$table->float('item6_precio',10,0)->nullable()->default(0);

			$table->string('item7_descripcion')->nullable();
			$table->integer('item7_cantidad')->nullable()->default(0);
			$table->float('item7_precio',10,0)->nullable()->default(0);

			$table->string('item8_descripcion')->nullable();
			$table->integer('item8_cantidad')->nullable()->default(0);
			$table->float('item8_precio',10,0)->nullable()->default(0);

			$table->string('item9_descripcion')->nullable();
			$table->integer('item9_cantidad')->nullable()->default(0);
			$table->float('item9_precio',10,0)->nullable()->default(0);

			$table->string('item10_descripcion')->nullable();
			$table->integer('item10_cantidad')->nullable()->default(0);
			$table->float('item10_precio',10,0)->nullable()->default(0);

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

			$table->integer('idUsuario')->index('FK_UsuarioFormulario');
			$table->integer('form_tipo_id')->index('FK_TipoFormulario');
			$table->integer('emprendimiento_id')->index('FK_EmprendimientoFormulario');
			$table->integer('tecnico_id')->index('FK_TecnicoFormulario')->nullable();
			$table->integer('organismoPublico')->index('FK_OrganismoFormulario')->nullable();
			
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
		Schema::drop('FORMULARIOS');
	}

}
