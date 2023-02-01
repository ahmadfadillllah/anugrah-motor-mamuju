<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
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

    public function show($id)
    {
        $data_barang = DataBarang::with('jenis_barang')->where('jenisbarang_id', $id)->get();
        $jenis_barang = JenisBarang::where('id', $id)->first();

        // dd($data_barang);

        return view('jenisbarang.show', compact('data_barang', 'jenis_barang'));
    }

    public function insert(Request $request)
    {
        $date = date('YmdHisgis');

        $request->validate([
            'nama' => 'required',
            'gambar' => 'required','mimes:png,jpg,jpeg,JPG',
        ]);

        try {
            $barang = new JenisBarang;
            $barang->nama = $request->nama;
            if($request->hasFile('gambar')){
                $request->file('gambar')->move('admin/dompet.dexignlab.com/xhtml/images/barang/', $date.$request->file('gambar')->getClientOriginalName());
                $barang->gambar = $date.$request->file('gambar')->getClientOriginalName();
                $barang->save();
            }
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
