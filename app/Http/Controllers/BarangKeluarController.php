<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\DataBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        // $barang_keluar = BarangKeluar::with('data_barang')->get();
        $barang_keluar = DataBarang::with('jenis_barang', 'barang_keluar')->whereHas('barang_keluar')->get();
        $data_barang = DataBarang::with('jenis_barang')->orderBy('nama', 'asc')->get();

        foreach ($data_barang as $p) {
            if($p->stok > 0){
                $p->update([
                    'status'     => 'Tersedia'
                ]);
            }else{
                $p->update([
                    'status'     => 'Tidak Tersedia'
                ]);
            }
        }
        return view('barangkeluar.index', compact('barang_keluar'));
    }

    public function tambah()
    {
        $barang = DataBarang::all();
        return view('barangkeluar.tambah', compact('barang'));
    }

    public function edit(Request $request)
    {
        try {
            $barang = DataBarang::with('jenis_barang')->whereIn('id', $request->id)->get();

        return view('barangkeluar.edit', compact('barang'));
        } catch (\Throwable $th) {
            return redirect()->route('barangkeluar.tambah')->with('info', 'Tidak ada barang yang dipilih');
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        try {
            foreach($request->id as $key=>$value){
                $barang = new BarangKeluar();
                $barang->tanggal_keluar = Carbon::now();
                $barang->databarang_id = $request->id[$key];
                $barang->stok_sebelumnya = $request->stok_sebelumnya[$key];
                $barang->jumlah = $request->jumlah[$key];
                $barang->save();
            }

            foreach($request->id as $key=>$value){
                $barang = DataBarang::find($request->id[$key]);
                $barang->stok = $request->jumlah[$key];
                $barang->save();
            }
            return redirect()->route('barangkeluar.index')->with('success', 'Berhasil update barang');
        } catch (\Throwable $th) {
            return redirect()->route('barangkeluar.index')->with(['info' => $th->getMessage()]);
        }
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

            return redirect()->route('barangkeluar.tambah')->with('success', 'Barang keluar berhasil direkap');
        } catch (\Throwable $th) {
            return redirect()->route('barangkeluar.tambah')->with('info', 'Barang keluar gagal di update');
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
