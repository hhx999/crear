<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLOCALIDADESTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('LOCALIDADES', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 45);
			$table->integer('agencia_id')->nullable()->index('FK_AgenciaLoc');
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
		Schema::drop('LOCALIDADES');
	}

}
