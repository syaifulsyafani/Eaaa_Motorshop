<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKustomisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kustomisasi', function (Blueprint $table) {
            $table->increments('kustomisasi_id');
            $table->string('kode_kustomisasi', '11')->unique();
            $table->string('nama_pelanggan', '50');
            $table->string('no_telp', '13');
            $table->text('alamat')->nullable();
            $table->string('service', '10');
            $table->string('status', '11');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->text('ket_kustomisasi')->nullable();
            $table->string('merk', '30')->nullable();
            $table->string('tipe', '50')->nullable();
            $table->string('tahun', '4')->nullable();
            $table->string('warna', '20')->nullable();
            $table->string('no_polisi', '10');
            $table->string('no_rangka', '17');
            $table->string('no_mesin', '12');
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
        Schema::dropIfExists('kustomisasi');
    }
}
