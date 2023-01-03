<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    protected $table = 'databarang';

    protected $fillable = [
        'jenisbarang_id',
        'satuanbarang_id',
        'nama',
        'stok',
        'gambar'
    ];

    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenisbarang_id');
    }

    public function satuan_barang()
    {
        return $this->belongsTo(SatuanBarang::class, 'satuanbarang_id');
    }
}
