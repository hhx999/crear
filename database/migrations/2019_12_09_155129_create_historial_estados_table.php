<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_estados', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('fecha_cambio');
            $table->string('estado_anterior')->nullable();
            $table->string('estado_actual')->nullable();
            $table->integer('formulario_id')->nullable()->index('formulario_id');
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
        Schema::dropIfExists('historial_estados');
    }
}
