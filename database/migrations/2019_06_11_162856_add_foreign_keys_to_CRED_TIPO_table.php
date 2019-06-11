<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCREDTIPOTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('CRED_TIPO', function(Blueprint $table)
		{
			$table->foreign('form_tipo_id', 'FK_TipoFormularioCredTipo')->references('id')->on('FORM_TIPO')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('CRED_TIPO', function(Blueprint $table)
		{
			$table->dropForeign('FK_TipoFormularioCredTipo');
		});
	}

}
