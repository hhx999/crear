<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePATRIMONIOGARANTETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PATRIMONIO_GARANTE', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('tipo', 56)->nullable();
			$table->boolean('esDeuda')->default(0);
			$table->integer('monto')->nullable();
			$table->integer('formulario_id')->nullable()->index('FK_FormularioPatrimonioGAR');
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
		Schema::drop('PATRIMONIO_GARANTE');
	}

}
