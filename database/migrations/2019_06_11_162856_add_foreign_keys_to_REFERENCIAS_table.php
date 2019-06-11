<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToREFERENCIASTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('REFERENCIAS', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'FK_FormularioRef')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('REFERENCIAS', function(Blueprint $table)
		{
			$table->dropForeign('FK_FormularioRef');
		});
	}

}
