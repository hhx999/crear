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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('denominacion');
            $table->string('tipoSociedad');
            $table->string('cuit',12);
            $table->string('domicilio');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('codPostal');
            $table->string('email');
            $table->string('telefono');
            $table->integer('usuario_id')->index('FK_UsuarioEmprendimiento');
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
