<?php

namespace App\Http\Controllers;

use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    public function index()
    {
        $satuan_barang = SatuanBarang::all();

        return view('satuanbarang.index', compact('satuan_barang'));
    }

    public function insert(Request $request)
    {
        try {
            SatuanBarang::create([
                'nama' => $request->nama,
            ]);
            return redirect()->back()->with('success', 'Satuan Barang berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update($id,Request $request)
    {
        try {
            SatuanBarang::where('id', $id)->update(['nama' => $request->nama]);
            return redirect()->back()->with('success', 'Satuan Barang berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            SatuanBarang::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Satuan Barang berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
