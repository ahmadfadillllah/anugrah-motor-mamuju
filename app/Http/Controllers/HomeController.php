<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    //
    public function index()
    {
        $jenis_barang = JenisBarang::orderBy('nama', 'asc')->get();
        return view('home.index', compact('jenis_barang'));
    }

    public function show($id)
    {
        $data_barang = DataBarang::with('jenis_barang')->where('jenisbarang_id', $id)->orderBy('nama', 'asc')->get();

        return view('home.show', compact('data_barang'));
    }

    public function search(Request $request)
    {
        // dd($request->all());
        // try {
        //     $data_barang = DataBarang::where('nama','like',"%".$request->cari."%")->get();

        //     return view('home.search', compact('data_barang'));
        // } catch (\Throwable $th) {
        //     return redirect()->route('home.search')->with('info', 'Barang tidak ditemukan');
        // }

        try {
            $barang = JenisBarang::where('nama','like',"%".$request->cari."%")->orderBy('nama', 'asc')->get();

            return view('home.search', compact('barang'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Barang tidak ditemukan');
        }
    }
}
