<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLOCALIDADESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('LOCALIDADES', function(Blueprint $table)
		{
			$table->foreign('agencia_id', 'FK_AgenciaLoc')->references('id')->on('AGENCIAS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('LOCALIDADES', function(Blueprint $table)
		{
			$table->dropForeign('FK_AgenciaLoc');
		});
	}

}
