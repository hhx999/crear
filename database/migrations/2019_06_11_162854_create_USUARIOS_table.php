<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUSUARIOSTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('USUARIOS', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('dni')->unique('dni');
			$table->string('nombre', 20);
			$table->string('password', 20);
			$table->string('email', 45);
			$table->boolean('verificado')->default(0);
			$table->string('rol', 20);
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
		Schema::drop('USUARIOS');
	}

}
