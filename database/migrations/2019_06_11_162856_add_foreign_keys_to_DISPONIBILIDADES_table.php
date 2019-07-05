<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDISPONIBILIDADESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('DISPONIBILIDADES', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'DISPONIBILIDADES_ibfk_1')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('DISPONIBILIDADES', function(Blueprint $table)
		{
			$table->dropForeign('DISPONIBILIDADES_ibfk_1');
		});
	}

}
