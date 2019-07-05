<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDEUDASCOMERCIALESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('DEUDAS_COMERCIALES', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'DEUDAS_COMERCIALES_ibfk_1')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('DEUDAS_COMERCIALES', function(Blueprint $table)
		{
			$table->dropForeign('DEUDAS_COMERCIALES_ibfk_1');
		});
	}

}
