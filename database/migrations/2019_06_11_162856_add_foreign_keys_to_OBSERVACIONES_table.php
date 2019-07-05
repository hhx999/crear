<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOBSERVACIONESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('OBSERVACIONES', function(Blueprint $table)
		{
			$table->foreign('form_valido_id', 'OBSERVACIONES_ibfk_1')->references('id')->on('FORM_VALIDOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('OBSERVACIONES', function(Blueprint $table)
		{
			$table->dropForeign('OBSERVACIONES_ibfk_1');
		});
	}

}
