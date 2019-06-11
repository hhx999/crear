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
			$table->foreign('form_tipo_id', 'FK_TipoFormulario')->references('id')->on('FORM_TIPO')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idUsuario', 'FK_UsuarioFormulario')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('FK_TipoFormulario');
			$table->dropForeign('FK_UsuarioFormulario');
		});
	}

}
