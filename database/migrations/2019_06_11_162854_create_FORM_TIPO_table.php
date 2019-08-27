<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFORMTIPOTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('FORM_TIPO', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 85);
			$table->float('monto')->nullable();
			$table->float('tasaInteres')->nullable();
			$table->integer('gracia')->nullable();
			$table->integer('plazoMax')->nullable();
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
		Schema::drop('FORM_TIPO');
	}

}
