<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'setting_id' => 1,
            'nama_perusahaan' => 'Eaaa Motorshop',
            'alamat' => 'Jl. Pejaten Raya No.Kav.30, RT.5/RW.6, Pejaten Bar., Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12510',
            'telp' => '081280553444',
            'nota' => 1, // besar
            'path_logo' => '/img/Logo.png',
        ]);
    }
}
