<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    //
    public function index()
    {
        $jenis_barang = JenisBarang::all();

        return view('jenisbarang.index', compact('jenis_barang'));
    }

    public function insert(Request $request)
    {
        try {
            JenisBarang::create([
                'nama' => $request->nama,
            ]);
            return redirect()->back()->with('success', 'Jenis Barang berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update($id,Request $request)
    {
        try {
            JenisBarang::where('id', $id)->update(['nama' => $request->nama]);
            return redirect()->back()->with('success', 'Jenis Barang berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            JenisBarang::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Jenis Barang berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
