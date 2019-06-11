<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateITEMSFINANCIAMIENTOTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ITEMS_FINANCIAMIENTO', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombreItem', 45);
			$table->string('descripcion', 45);
			$table->integer('cantidad');
			$table->float('precioUnitario', 10, 0);
			$table->integer('formulario_id')->nullable()->index('FK_FormularioItem');
			$table->date('updated_at')->nullable();
			$table->date('created_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ITEMS_FINANCIAMIENTO');
	}

}
