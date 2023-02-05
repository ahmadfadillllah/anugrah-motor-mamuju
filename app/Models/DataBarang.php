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
        'nama',
        'stok',
        'status'
    ];

    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenisbarang_id');
    }

    public function barang_masuk()
    {
        return $this->hasOne(BarangMasuk::class, 'databarang_id');
    }

    public function barang_keluar()
    {
        return $this->hasOne(BarangKeluar::class, 'databarang_id');
    }
}
