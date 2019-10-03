<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorradorVentasLE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrador_ventasLE', function (Blueprint $table) {
            $table->integer('id',true);
            $table->string('producto', 45)->nullable();
            $table->string('udMedida', 45)->nullable();
            $table->integer('cantAnio')->nullable();
            $table->float('precio', 10, 0)->nullable();
            $table->integer('borrador_id')->nullable()->index('FK_FormularioBorradorVentas');
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
        Schema::dropIfExists('borrador_ventasLE');
    }
}
