<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePROVEEDORESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PROVEEDORES', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 45);
			$table->string('ubicacion', 45);
			$table->string('compra', 45);
			$table->integer('formulario_id')->nullable()->index('FK_FormularioProveedor');
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
		Schema::drop('PROVEEDORES');
	}

}
