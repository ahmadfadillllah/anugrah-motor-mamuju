<?php

namespace App\Imports;

use App\Models\DataBarang;
use Maatwebsite\Excel\Concerns\ToModel;

class DataBarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataBarang([
            'jenisbarang_id' => $row[1],
            'nama' => $row[0],
            'stok' => 0,
            'status' => $row[2]
        ]);
    }
}
