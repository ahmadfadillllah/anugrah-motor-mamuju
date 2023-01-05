<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DataBarang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    //
    public function index()
    {
        $barang_masuk = BarangMasuk::with('data_barang')->get();

        return view('barangmasuk.index', compact('barang_masuk'));
    }

    public function tambah()
    {
        $barang = DataBarang::all();
        return view('barangmasuk.tambah', compact('barang'));
    }

    public function show_data(Request $request)
    {
        $barang = DataBarang::where('id', $request->query('barang_id'))->first();

        return response()->json($barang, 200);
    }

    public function insert(Request $request)
    {
        try {
            DataBarang::where('id', $request->databarang_id)->update(['stok' => $request->stok]);

            BarangMasuk::create([
                'tanggal_masuk' => $request->tanggal_masuk,
                'databarang_id' => $request->databarang_id,
                'stok_sebelumnya' => $request->stok_sebelumnya,
                'jumlah' => $request->jumlah,
            ]);

            return redirect()->route('barangmasuk.index')->with('success', 'Barang masuk berhasil direkap');
        } catch (\Throwable $th) {
            return redirect()->route('barangmasuk.index')->with('info', 'Barang masuk gagal di update');
        }
    }

    public function destroy($id)
    {
        try {
            BarangMasuk::where('id', $id)->delete();

            return redirect()->route('barangmasuk.index')->with('success', 'Barang masuk berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('barangmasuk.index')->with('info', $th->getMessage());
        }
    }
}
