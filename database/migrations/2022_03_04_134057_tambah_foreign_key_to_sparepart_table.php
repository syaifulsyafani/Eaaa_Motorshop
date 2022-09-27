<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKeyToSparepartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sparepart', function (Blueprint $table) {
            $table->unsignedInteger('kategori_id')->change();
            $table->foreign('kategori_id')
                  ->references('kategori_id')
                  ->on('kategori')
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sparepart', function (Blueprint $table) {
            $table->integer('kategori_id')->change();
            $table->dropForeign('sparepart_kategori_id_foreign');
        });
    }
}
