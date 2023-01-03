<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data_barang = DataBarang::all();
        return view('home.index', compact('data_barang'));
    }

    public function search(Request $request)
    {
        // dd($request->all());
        try {
            $data_barang = DataBarang::where('nama','like',"%".$request->cari."%")->get();

            return view('home.search', compact('data_barang'));
        } catch (\Throwable $th) {
            return redirect()->route('home.search')->with('info', 'Barang tidak ditemukan');
        }
    }
}
