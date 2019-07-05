<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDISPONIBILIDADESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('DISPONIBILIDADES', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('tipo', 45);
			$table->integer('monto');
			$table->string('encargado', 25);
			$table->integer('formulario_id')->nullable()->index('formulario_id');
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
		Schema::drop('DISPONIBILIDADES');
	}

}
