<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCOMPETENCIATable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('COMPETENCIA', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'FK_FormularioCompe')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('COMPETENCIA', function(Blueprint $table)
		{
			$table->dropForeign('FK_FormularioCompe');
		});
	}

}
