<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\DataBarang;
use App\Models\JenisBarang;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    //
    public function index()
    {
        $jenis_barang = JenisBarang::all()->count();
        $barang = DataBarang::all()->count();
        $barang_masuk = BarangMasuk::all()->count();
        $barang_keluar = BarangKeluar::all()->count();

        $dataBarang = [
            $jenis_barang,
            $barang,
            $barang_masuk,
            $barang_keluar,
        ];

        return view('dashboard.index', compact('jenis_barang', 'barang', 'barang_masuk', 'barang_keluar', 'dataBarang'));
    }


}
