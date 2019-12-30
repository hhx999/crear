<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprendimientoComercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprendimiento_comercials', function (Blueprint $table) {
            $table->integer('id',true);
            $table->string('facebook_nombre')->nullable();
            $table->string('facebook_enlace')->nullable();
            $table->string('twitter_nombre')->nullable();
            $table->string('twitter_enlace')->nullable();
            $table->string('instagram_nombre')->nullable();
            $table->string('instagram_enlace')->nullable();
            $table->string('youtube_nombre')->nullable();
            $table->string('youtube_enlace')->nullable();
            $table->string('web_nombre')->nullable();
            $table->string('web_enlace')->nullable();
            $table->string('telefono')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('mail');
            $table->string('denominacion');
            $table->string('descripcion');
            $table->boolean('publicado')->default(0);
            $table->integer('categoria_id')->index('categoria_id');
            $table->integer('usuario_id')->index('usuario_id');
            $table->integer('emprendimiento_id')->index('emprendimiento_id');
            $table->integer('localidad_id')->index('localidad_id');
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
        Schema::dropIfExists('emprendimiento_comercials');
    }
}
