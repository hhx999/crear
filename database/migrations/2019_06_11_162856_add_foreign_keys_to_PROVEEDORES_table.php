<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPROVEEDORESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('PROVEEDORES', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'FK_FormularioProveedor')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('PROVEEDORES', function(Blueprint $table)
		{
			$table->dropForeign('FK_FormularioProveedor');
		});
	}

}
