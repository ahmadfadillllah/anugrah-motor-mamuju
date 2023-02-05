<?php

namespace App\Http\Controllers;

use App\Imports\DataBarangImport;
use App\Models\DataBarang;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataBarangController extends Controller
{
    //
    public function index()
    {
        $data_barang = DataBarang::with('jenis_barang')->orderBy('nama', 'asc')->get();
        $jenis_barangg = JenisBarang::orderBy('nama', 'asc')->get();
        return view('databarang.index', compact('data_barang', 'jenis_barangg'));
    }

    public function insert(Request $request)
    {
        $date = date('YmdHisgis');

        $request->validate([
            'jenisbarang_id' => 'required',
            'nama' => 'required',
            'status' => 'required',
        ]);

        try {

            $barang = new DataBarang;
            $barang->jenisbarang_id = $request->jenisbarang_id;
            $barang->nama = $request->nama;
            $barang->stok = 0;
            $barang->status = $request->status;
            $barang->save();

            return redirect()->back()->with('success', 'Barang telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $jenis_barang = JenisBarang::all();

        $data_barang = DataBarang::with('jenis_barang')->where('id', $id)->first();

        return view('databarang.edit', compact('data_barang', 'jenis_barang'));
    }

    public function update(Request $request, $id)
    {
        try {
            DataBarang::where('id', $id)->update([
                'nama' => $request->nama,
                'jenisbarang_id' => $request->jenisbarang_id,
                'status' => $request->status,
            ]);
            return redirect()->route('databarang.index')->with('success', 'Barang berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->route('databarang.index')->with('info', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DataBarang::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Barang berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new DataBarangImport, $request->file);

            return redirect()->back()->with('success', 'Data berhasil di import');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }
}
