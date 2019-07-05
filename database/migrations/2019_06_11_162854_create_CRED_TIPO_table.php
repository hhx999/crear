<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCREDTIPOTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CRED_TIPO', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('monto');
			$table->text('descripcion', 65535);
			$table->integer('form_tipo_id')->index('FK_TipoFormularioCredTipo');
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
		Schema::drop('CRED_TIPO');
	}

}
