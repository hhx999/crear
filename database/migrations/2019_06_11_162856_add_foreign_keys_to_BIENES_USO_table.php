<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBIENESUSOTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('BIENES_USO', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'BIENES_USO_ibfk_1')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('BIENES_USO', function(Blueprint $table)
		{
			$table->dropForeign('BIENES_USO_ibfk_1');
		});
	}

}
