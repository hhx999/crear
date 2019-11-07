<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprendimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprendimientos', function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->integer('id', true);
            $table->timestamps();
            $table->string('estadoEmprendimiento');
            $table->string('denominacion');
            $table->string('tipoSociedad');
            $table->string('cuit',12);
            $table->string('domicilio')->nullable();
            $table->string('localidad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('codPostal')->nullable();
            $table->string('email');
            $table->string('telefono');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprendimientos');
    }
}
