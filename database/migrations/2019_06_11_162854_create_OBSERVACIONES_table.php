<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOBSERVACIONESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('OBSERVACIONES', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('hoja', 45)->nullable();
			$table->text('observacion', 65535)->nullable();
			$table->integer('form_valido_id')->nullable()->index('form_validos_id');
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
		Schema::drop('OBSERVACIONES');
	}

}
