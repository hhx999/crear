<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCLIENTESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('CLIENTES', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'FK_FormularioCli')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('CLIENTES', function(Blueprint $table)
		{
			$table->dropForeign('FK_FormularioCli');
		});
	}

}
