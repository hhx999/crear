<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyEmprendimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emprendimientos', function (Blueprint $table) {
            $table->foreign('usuario_id', 'FK_UsuarioEmprendimiento')->references('id')->on('USUARIOS')->onUpdate('RESTRICT')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emprendimientos', function (Blueprint $table) {
            $table->dropForeign('FK_UsuarioEmprendimiento');
        });
    }
}
