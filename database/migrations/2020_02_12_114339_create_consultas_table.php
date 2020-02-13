<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('consulta');
            $table->string('respuesta');
            $table->bigInteger('tramite_id')->unsigned()->index('FK_TramiteConsulta');
            $table->bigInteger('area_id')->unsigned()->index('FK_AreaConsulta');
            $table->integer('usuario_id')->index('Fk_UsuarioConsulta');
            $table->integer('tecnico_id')->index('Fk_TecnicoConsulta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
