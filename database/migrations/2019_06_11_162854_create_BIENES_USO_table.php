<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBIENESUSOTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('BIENES_USO', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('tipo', 45);
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
		Schema::drop('BIENES_USO');
	}

}
