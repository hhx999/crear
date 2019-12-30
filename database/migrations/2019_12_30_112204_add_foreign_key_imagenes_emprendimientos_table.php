<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyImagenesEmprendimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagenes_emprendimientos', function (Blueprint $table) {
            //
            $table->foreign('emprendimiento_comercial_id', 'ImagenesEmprendimiento')->references('id')->on('emprendimiento_comercials')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('multimedia_id', 'ImagenesMultimedia')->references('id')->on('MULTIMEDIA')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagenes_emprendimientos', function (Blueprint $table) {
            //
            $table->dropForeign('ImagenesEmprendimiento');
            $table->dropForeign('ImagenesMultimedia');
        });
    }
}
