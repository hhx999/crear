<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyBorradorItemsfinanciamientoLETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borrador_itemsfinanciamientoLE', function (Blueprint $table) {
            //
            $table->foreign('borrador_id', 'FK_FormularioBorradorItem')->references('id')->on('borradoresLE')->onUpdate('RESTRICT')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrador_itemsfinanciamientoLE', function (Blueprint $table) {
            //
            $table->dropForeign('FK_FormularioBorradorItem');
        });
    }
}
