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
			$table->integer('estado')->nullable();
			$table->string('tituloProyecto', 45);
			$table->string('nombreSolicitante', 45);
			$table->string('localidadSolicitante', 45);
			$table->string('agenciaProyecto', 45);
			$table->string('numeroProyecto', 45)->nullable();
			$table->float('montoSolicitado', 10, 0);
			$table->dateTime('fecPresentacionProyecto')->nullable();
			$table->string('descEmprendimiento', 300);
			$table->string('nombreEmprendedor', 45)->nullable();
			$table->string('dniEmprendedor', 45)->nullable();
			$table->string('localidadEmprendedor', 45)->nullable();
			$table->string('domicilioEmprendedor', 45)->nullable();
			$table->string('telefonoEmprendedor', 20);
			$table->string('emailEmprendedor', 45)->nullable();
			$table->string('facebookEmprendedor', 45)->nullable();
			$table->string('gradoInstruccion', 45)->nullable();
			$table->string('otraOcupacion', 45)->nullable();
			$table->integer('ingresoMensual')->nullable();
			$table->string('deseoCapacitacion', 45)->nullable();
			$table->string('actPrincipalEmprendimiento', 120)->nullable();
			$table->date('fecInicioEmprendimiento')->nullable();
			$table->string('antiguedadEmprendimiento', 45)->nullable();
			$table->string('cuitEmprendimiento', 20)->nullable();
			$table->float('ingresosBrutosEmprendimiento', 10, 0)->nullable();
			$table->string('domicilioEmprendimiento', 45)->nullable();
			$table->string('localidadEmprendimiento', 45)->nullable();
			$table->string('lugarEmprendimiento', 45)->nullable();
			$table->string('descProdServicios')->nullable();
			$table->string('institucionAporte', 45)->nullable();
			$table->date('fecAporte')->nullable();
			$table->float('montoAporte', 10, 0)->nullable();
			$table->string('tipoAporte', 45)->nullable();
			$table->string('estadoAporte', 45)->nullable();
			$table->string('experienciaEmprendedores')->nullable();
			$table->text('oportunidadMercado', 65535)->nullable();
			$table->string('descFinanciamiento')->nullable();
			$table->string('situacionLaboral', 45)->nullable();
			$table->string('aclaracionesGenerales', 80)->nullable();
			$table->float('ingresoGenerales', 10, 0)->nullable();
			$table->string('percepcionesSociales', 45)->nullable();
			$table->float('montoMesPercepciones', 10, 0)->nullable();
			$table->integer('cantPersonasCargo')->nullable();
			$table->string('lugarHabita', 45)->nullable();
			$table->string('ventajaCompetidores')->nullable();
			$table->string('estrategiasPromocion')->nullable();
			$table->string('puntosVenta')->nullable();
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
			$table->string('nombreMBE', 45)->nullable();
			$table->string('dniMBE', 11)->nullable();
			$table->string('cuitMBE', 20)->nullable();
			$table->string('localidadMBE', 45)->nullable();
			$table->string('domicilioMBE', 45)->nullable();
			$table->integer('otrasDeudasMBE')->nullable();
			$table->string('nombreMBG', 45)->nullable();
			$table->string('dniMBG', 11)->nullable();
			$table->string('cuitMBG', 20)->nullable();
			$table->string('localidadMBG', 45)->nullable();
			$table->string('domicilioMBG', 45)->nullable();
			$table->integer('otrasDeudasMBG')->nullable();
			$table->integer('idUsuario')->index('FK_UsuarioFormulario');
			$table->integer('form_tipo_id')->index('FK_TipoFormulario');
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
