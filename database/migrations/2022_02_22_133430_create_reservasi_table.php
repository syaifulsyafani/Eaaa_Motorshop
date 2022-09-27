<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->increments('reservasi_id');
            $table->integer('user_id');
            $table->string('kode_reservasi', '11')->unique();
            $table->string('nama_pelanggan', '30');
            $table->string('no_telp', '13');
            $table->text('alamat')->nullable();
            $table->date('tgl')->unique();
            $table->string('service', '10');
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
        Schema::dropIfExists('reservasi');
    }
}
