<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFORMULARIOSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('FORMULARIOS', function(Blueprint $table)
		{
			$table->foreign('idUsuario', 'FK_UsuarioFormulario')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('tramite_id', 'Fk_TramiteFormulario')->references('id')->on('tramites')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('form_tipo_id', 'FK_TipoFormulario')->references('id')->on('FORM_TIPO')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('tecnico_id', 'FK_TecnicoFormulario')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('organismoPublico', 'FK_OrganismoFormulario')->references('id')->on('organismo_publicos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('estado', 'FK_EstadoFormulario')->references('id')->on('estado_formularios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('FORMULARIOS', function(Blueprint $table)
		{
			$table->dropForeign('FK_UsuarioFormulario');
			$table->dropForeign('Fk_TramiteFormulario');
			$table->dropForeign('FK_TipoFormulario');
			$table->dropForeign('FK_TecnicoFormulario');
			$table->dropForeign('FK_EstadoFormulario');
		});
	}

}
