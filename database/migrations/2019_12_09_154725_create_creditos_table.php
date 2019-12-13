<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('usuario_id')->nullable()->index('usuarioCredito');
            $table->integer('emprendimiento_id')->nullable()->index('emprendimientoCredito');
            $table->integer('formulario_id')->nullable()->index('formularioCredito');
            $table->string('fechaOtorgado')->nullable();
            $table->boolean('activo')->default('0');
            $table->integer('estado')->nullable()->index('estadoCredito');
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
        Schema::dropIfExists('creditos');
    }
}
