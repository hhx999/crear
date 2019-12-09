<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_lineas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descripcion', 45);
            $table->integer('form_tipo_id')->nullable()->index('form_tipo_id');
            $table->integer('multimedia_id')->nullable()->index('multimedia_id');
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
        Schema::dropIfExists('info_lineas');
    }
}
