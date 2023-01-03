<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barangmasuk';

    protected $fillable = [
        'tanggal_masuk',
        'databarang_id',
        'stok_sebelumnya',
        'jumlah',
    ];

    public function data_barang()
    {
        return $this->belongsTo(DataBarang::class, 'databarang_id');
    }
}
