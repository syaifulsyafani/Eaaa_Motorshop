<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory;

    protected $table = 'pembelian_detail';
    protected $primaryKey = 'pembelian_detail_id';
    protected $guarded = [];

    public function sparepart()
    {
        // di tutorial memakai tipe 'hasOne' harusnya 'hasMany'
        return $this->hasOne(Sparepart::class, 'sparepart_id', 'sparepart_id');
    }
}
