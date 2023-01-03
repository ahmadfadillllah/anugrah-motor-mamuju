<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;

class CariBarangController extends Controller
{
    //
    public function index(Request $request)
    {
        // dd($request->all());
        try {
            $barang = DataBarang::where('nama','like',"%".$request->cari."%")->get();

            return view('caribarang.index', compact('barang'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Barang tidak ditemukan');
        }
    }
}
