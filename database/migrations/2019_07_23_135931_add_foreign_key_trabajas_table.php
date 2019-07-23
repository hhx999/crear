<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTrabajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajas', function (Blueprint $table) {
            //
            $table->foreign('usuario_id', 'FK_Usuario')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('cascade');
            $table->foreign('emprendimiento_id', 'FK_Emprendimiento')->references('id')->on('emprendimientos')->onUpdate('RESTRICT')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabajas', function (Blueprint $table) {
            //
            $table->dropForeign('FK_Usuario');
            $table->dropForeign('FK_Emprendimiento');
        });
    }
}
