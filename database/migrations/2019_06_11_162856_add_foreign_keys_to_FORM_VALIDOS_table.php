<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFORMVALIDOSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('FORM_VALIDOS', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'FK_FormularioFormValidos')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('FORM_VALIDOS', function(Blueprint $table)
		{
			$table->dropForeign('FK_FormularioFormValidos');
		});
	}

}
