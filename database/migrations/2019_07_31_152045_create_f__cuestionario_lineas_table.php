<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFCuestionarioLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f__cuestionario_lineas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('estado',10);
            $table->string('antiguedad',10);
            $table->string('destino',20);
            $table->string('lineas',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f__cuestionario_lineas');
    }
}
