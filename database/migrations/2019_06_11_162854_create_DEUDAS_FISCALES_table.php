<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDEUDASFISCALESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('DEUDAS_FISCALES', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('tipo', 65);
			$table->integer('monto');
			$table->string('encargado', 25);
			$table->integer('formulario_id')->index('formulario_id');
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
		Schema::drop('DEUDAS_FISCALES');
	}

}
