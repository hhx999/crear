<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVENTASTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('VENTAS', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('producto', 45);
			$table->string('udMedida', 45);
			$table->integer('cantAnio')->nullable();
			$table->float('precio', 10, 0);
			$table->integer('formulario_id')->nullable()->index('FK_FormularioVentas');
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
		Schema::drop('VENTAS');
	}

}
