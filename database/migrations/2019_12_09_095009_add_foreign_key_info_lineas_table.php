<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyInfoLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_lineas', function (Blueprint $table) {
            //
            $table->foreign('form_tipo_id', 'infolineas_ibfk_1')->references('id')->on('FORM_TIPO')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('multimedia_id', 'infolineas_ibfk_2')->references('id')->on('MULTIMEDIA')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_lineas', function (Blueprint $table) {
            //
            $table->dropForeign('infolineas_ibfk_1');
            $table->dropForeign('infolineas_ibfk_2');
        });
    }
}
