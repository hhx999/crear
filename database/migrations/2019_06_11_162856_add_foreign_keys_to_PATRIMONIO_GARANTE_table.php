<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPATRIMONIOGARANTETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('PATRIMONIO_GARANTE', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'FK_FormularioPatrimonioGAR')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('PATRIMONIO_GARANTE', function(Blueprint $table)
		{
			$table->dropForeign('FK_FormularioPatrimonioGAR');
		});
	}

}
