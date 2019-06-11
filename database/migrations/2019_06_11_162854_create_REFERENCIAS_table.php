<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateREFERENCIASTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('REFERENCIAS', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 45);
			$table->string('localidad', 45)->nullable();
			$table->string('telefono', 45)->nullable();
			$table->integer('formulario_id')->nullable()->index('FK_FormularioRef');
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
		Schema::drop('REFERENCIAS');
	}

}
