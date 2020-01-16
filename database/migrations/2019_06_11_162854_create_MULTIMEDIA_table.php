<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMULTIMEDIATable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MULTIMEDIA', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->boolean('activo')->default(1);
			$table->string('nombre', 255);
			$table->string('extension', 5);
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
		Schema::drop('MULTIMEDIA');
	}

}
