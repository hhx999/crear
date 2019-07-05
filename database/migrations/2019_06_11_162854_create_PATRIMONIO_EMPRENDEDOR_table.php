<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePATRIMONIOEMPRENDEDORTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PATRIMONIO_EMPRENDEDOR', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('grupo', 45)->nullable();
			$table->string('tipo', 56)->nullable();
			$table->boolean('esDeuda')->default(0);
			$table->integer('monto')->nullable();
			$table->integer('formulario_id')->nullable()->index('FK_FormularioPatrimonioEMP');
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
		Schema::drop('PATRIMONIO_EMPRENDEDOR');
	}

}
