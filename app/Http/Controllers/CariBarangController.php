<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class CariBarangController extends Controller
{
    //
    public function index(Request $request)
    {
        // dd($request->all());
        try {
            $barang = JenisBarang::where('nama','like',"%".$request->cari."%")->orderBy('nama', 'asc')->get();

            return view('caribarang.index', compact('barang'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Barang tidak ditemukan');
        }
    }
}
