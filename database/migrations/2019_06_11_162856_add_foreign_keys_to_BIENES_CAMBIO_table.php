<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBIENESCAMBIOTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('BIENES_CAMBIO', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'BIENES_CAMBIO_ibfk_1')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('BIENES_CAMBIO', function(Blueprint $table)
		{
			$table->dropForeign('BIENES_CAMBIO_ibfk_1');
		});
	}

}
