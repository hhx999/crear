<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPATRIMONIOEMPRENDEDORTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('PATRIMONIO_EMPRENDEDOR', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'FK_FormularioPatrimonioEMP')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('PATRIMONIO_EMPRENDEDOR', function(Blueprint $table)
		{
			$table->dropForeign('FK_FormularioPatrimonioEMP');
		});
	}

}
