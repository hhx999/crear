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
        Schema::create('emprendimiento_comerciales', function (Blueprint $table) {
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
            $table->string('mail')->nullable();
            $table->string('denominacion')->nullable();
            $table->string('descripcion')->nullable();
            $table->boolean('publicado')->default(0);
            $table->integer('categoria_id')->index('categoria_id');
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
        Schema::dropIfExists('emprendimiento_comerciales');
    }
}
