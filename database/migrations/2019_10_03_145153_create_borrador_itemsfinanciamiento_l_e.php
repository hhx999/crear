<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorradorItemsfinanciamientoLE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrador_itemsfinanciamientoLE', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombreItem', 45)->nullable();
            $table->string('descripcion', 45)->nullable();
            $table->integer('cantidad')->nullable();
            $table->float('precioUnitario', 10, 0)->nullable();
            $table->integer('borrador_id')->nullable()->index('FK_FormularioBorradorItem');
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
        Schema::dropIfExists('borrador_itemsfinanciamientoLE');
    }
}
