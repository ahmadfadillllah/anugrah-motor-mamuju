<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\DataBarang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barang_keluar = BarangKeluar::with('data_barang')->get();

        return view('barangkeluar.index', compact('barang_keluar'));
    }

    public function tambah()
    {
        $barang = DataBarang::all();
        return view('barangkeluar.tambah', compact('barang'));
    }

    public function show_data(Request $request)
    {
        $barang = DataBarang::where('id', $request->query('barang_id'))->first();

        return response()->json($barang, 200);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        try {
            DataBarang::where('id', $request->databarang_id)->update(['stok' => $request->stok]);

            BarangKeluar::create([
                'tanggal_keluar' => $request->tanggal_keluar,
                'databarang_id' => $request->databarang_id,
                'stok_sebelumnya' => $request->stok_sebelumnya,
                'jumlah' => $request->jumlah,
            ]);

            return redirect()->route('barangkeluar.index')->with('success', 'Barang keluar berhasil direkap');
        } catch (\Throwable $th) {
            return redirect()->route('barangkeluar.index')->with('info', 'Barang keluar gagal di update');
        }
    }

    public function destroy($id)
    {
        try {
            BarangKeluar::where('id', $id)->delete();

            return redirect()->route('barangkeluar.index')->with('success', 'Barang keluar berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('barangkeluar.index')->with('info', $th->getMessage());
        }
    }
}
