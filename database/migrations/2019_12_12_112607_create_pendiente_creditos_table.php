<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendienteCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendiente_creditos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('fecha');
            $table->boolean('confirmado')->nullable();
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
        Schema::dropIfExists('pendiente_creditos');
    }
}
