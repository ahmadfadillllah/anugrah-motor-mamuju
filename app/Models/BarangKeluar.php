<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barangkeluar';

    protected $fillable = [
        'tanggal_keluar',
        'databarang_id',
        'stok_sebelumnya',
        'jumlah',
    ];

    public function data_barang()
    {
        return $this->belongsTo(DataBarang::class, 'databarang_id');
    }
}
