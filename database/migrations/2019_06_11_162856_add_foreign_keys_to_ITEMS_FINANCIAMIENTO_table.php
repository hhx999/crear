<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToITEMSFINANCIAMIENTOTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ITEMS_FINANCIAMIENTO', function(Blueprint $table)
		{
			$table->foreign('formulario_id', 'FK_FormularioItem')->references('id')->on('FORMULARIOS')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ITEMS_FINANCIAMIENTO', function(Blueprint $table)
		{
			$table->dropForeign('FK_FormularioItem');
		});
	}

}
