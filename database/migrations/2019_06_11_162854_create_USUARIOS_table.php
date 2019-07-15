<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUSUARIOSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('USUARIOS', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('dni')->unique('dni');
			$table->string('password', 255);
			$table->string('nombreApellido', 45);
			$table->date('fecNacimiento')->nullable();
			$table->string('actividadPrincipal', 255)->nullable();
			$table->string('domicilio', 45)->nullable();
			$table->string('email', 45);
			$table->string('localidad', 45)->nullable();
			$table->string('provincia', 45)->nullable();
			$table->string('agencia', 45)->nullable();
			$table->string('telefono', 45)->nullable();
			$table->boolean('verificado')->default(0);
			$table->string('rol', 20);
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
		Schema::drop('USUARIOS');
	}

}
