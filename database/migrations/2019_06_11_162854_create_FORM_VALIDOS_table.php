<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFORMVALIDOSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('FORM_VALIDOS', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->boolean('portada')->default(0);
			$table->boolean('infoEmprendedor')->default(0);
			$table->boolean('datosEmprendimiento')->default(0);
			$table->boolean('aspectosSociales')->default(0);
			$table->boolean('mercado')->default(0);
			$table->boolean('prodCostResultados')->default(0);
			$table->boolean('mbe')->default(0);
			$table->boolean('mbg')->default(0);
			$table->boolean('documentacion')->default(0);
			$table->integer('formulario_id')->nullable()->index('FK_FormularioFormValidos');
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
		Schema::drop('FORM_VALIDOS');
	}

}
