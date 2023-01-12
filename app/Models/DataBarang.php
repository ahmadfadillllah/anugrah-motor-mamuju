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
        'status'
    ];

    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenisbarang_id');
    }
}
