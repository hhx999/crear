<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCLIENTESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CLIENTES', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 45);
			$table->string('edad', 45)->nullable();
			$table->string('ubicacion', 45)->nullable();
			$table->string('nivelSocEconomico', 45)->nullable();
			$table->string('intereses', 69)->nullable();
			$table->integer('formulario_id')->nullable()->index('FK_FormularioCli');
			$table->date('updated_at');
			$table->date('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('CLIENTES');
	}

}
