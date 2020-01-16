<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesEmprendimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_emprendimientos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->boolean('activo')->default(1);
            $table->string('descripcion');
            $table->integer('emprendimiento_comercial_id')->index('emprendimiento_comercial_id');
            $table->integer('multimedia_id')->index('multimedia_id');
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
        Schema::dropIfExists('imagenes_emprendimientos');
    }
}
