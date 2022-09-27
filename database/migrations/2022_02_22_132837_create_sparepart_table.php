<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sparepart', function (Blueprint $table) {
            $table->increments('sparepart_id');
            $table->integer('kategori_id');
            $table->string('kode_part', '20')->unique();
            $table->string('nama_part', '50');
            $table->string('merk', '30');
            $table->integer('harga');
            $table->integer('stok')->default(0);
            $table->text('ket_part')->nullable();
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
        Schema::dropIfExists('sparepart');
    }
}
