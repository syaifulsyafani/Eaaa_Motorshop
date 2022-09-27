<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;

    protected $table = 'penjualan_detail';
    protected $primaryKey = 'penjualan_detail_id';
    protected $guarded = [];

    public function sparepart()
    {
        // di tutorial memakai tipe 'hasOne' harusnya 'hasMany'
        return $this->hasOne(Sparepart::class, 'sparepart_id', 'sparepart_id');
    }

    public function service()
    {
        // di tutorial memakai tipe 'hasOne' harusnya 'hasMany'
        return $this->hasOne(Service::class, 'service_id', 'service_id');
    }
}
