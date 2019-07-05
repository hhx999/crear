<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDOCUMENTACIONTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('DOCUMENTACION', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'DOCUMENTACION_ibfk_1')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('multimedia_id', 'DOCUMENTACION_ibfk_2')->references('id')->on('MULTIMEDIA')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('DOCUMENTACION', function(Blueprint $table)
		{
			$table->dropForeign('DOCUMENTACION_ibfk_1');
			$table->dropForeign('DOCUMENTACION_ibfk_2');
		});
	}

}
