<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    //
    public function index()
    {
        $data_barang = DataBarang::with('jenis_barang', 'satuan_barang')->get();
        return view('databarang.index', compact('data_barang'));
    }

    public function tambah()
    {
        $jenis_barang = JenisBarang::all();
        $satuan_barang = SatuanBarang::all();
        return view('databarang.tambah', compact('jenis_barang', 'satuan_barang'));
    }

    public function insert(Request $request)
    {
        $date = date('YmdHisgis');

        $request->validate([
            'jenisbarang_id' => 'required',
            'satuanbarang_id' => 'required',
            'nama' => 'required',
            'stok' => 'required',
            'gambar' => 'required','mimes:png,jpg,jpeg,JPG',
        ]);

        try {

            $barang = new DataBarang;
            $barang->jenisbarang_id = $request->jenisbarang_id;
            $barang->satuanbarang_id = $request->satuanbarang_id;
            $barang->nama = $request->nama;
            $barang->stok = $request->stok;
            if($request->hasFile('gambar')){
                $request->file('gambar')->move('admin/dompet.dexignlab.com/xhtml/images/barang/', $date.$request->file('gambar')->getClientOriginalName());
                $barang->gambar = $date.$request->file('gambar')->getClientOriginalName();
                $barang->save();
            }

            return redirect()->route('databarang.index')->with('success', 'Barang telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('databarang.index')->with('info', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $jenis_barang = JenisBarang::all();
        $satuan_barang = SatuanBarang::all();

        $data_barang = DataBarang::with('jenis_barang', 'satuan_barang')->where('id', $id)->first();

        return view('databarang.edit', compact('data_barang', 'jenis_barang', 'satuan_barang'));
    }

    public function update(Request $request, $id)
    {
        try {
            DataBarang::where('id', $id)->update([
                'nama' => $request->nama,
                'jenisbarang_id' => $request->jenisbarang_id,
                'satuanbarang_id' => $request->satuanbarang_id,
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

            return redirect()->route('databarang.index')->with('success', 'Barang berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('databarang.index')->with('info', $th->getMessage());
        }
    }
}
