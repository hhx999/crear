<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDOCUMENTACIONTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('DOCUMENTACION', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('descripcion', 45);
			$table->integer('formulario_id')->nullable()->index('formulario_id');
			$table->integer('multimedia_id')->nullable()->index('multimedia_id');
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
		Schema::drop('DOCUMENTACION');
	}

}
