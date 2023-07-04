<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DataBarang;
use App\Models\JenisBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class BarangMasukController extends Controller
{
    //
    public function index()
    {

        // $barang_masuk = BarangMasuk::with('data_barang')->get();
        $barang_masuk = DataBarang::with('jenis_barang', 'barang_masuk')->whereHas('barang_masuk')->get();
        // dd($barang_masuk);
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

        return view('barangmasuk.index', compact('barang_masuk'));
    }

    public function tambah()
    {
        $jenis_barang = JenisBarang::all();
        $barang = DataBarang::with('jenis_barang')->get();
        return view('barangmasuk.tambah', compact('jenis_barang', 'barang'));
    }

    public function edit(Request $request)
    {
        try {
            $barang = DataBarang::with('jenis_barang')->whereIn('id', $request->id)->get();

        return view('barangmasuk.edit', compact('barang'));
        } catch (\Throwable $th) {
            return redirect()->route('barangmasuk.tambah')->with('info', 'Tidak ada barang yang dipilih');
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        try {
            foreach($request->id as $key=>$value){
                $barang = new BarangMasuk;
                $barang->tanggal_masuk = Carbon::now();
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
            return redirect()->route('barangmasuk.index')->with('success', 'Berhasil update barang');
        } catch (\Throwable $th) {
            return redirect()->route('barangmasuk.index')->with(['info' => $th->getMessage()]);
        }
    }

    public function show_data(Request $request)
    {
        $barang = DataBarang::where('id', $request->query('barang_id'))->first();

        return response()->json($barang, 200);
    }

    public function barangAjax(Request $request){
        if($request->query('jenisbarang_id')==0){
            $motors = DataBarang::all();
        }else{
            $motors = DataBarang::with('jenis_barang')->where('jenisbarang_id', $request->query('jenisbarang_id'))->get();
        }
        return $motors;
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

            return redirect()->route('barangmasuk.tambah')->with('success', 'Barang masuk berhasil direkap');
        } catch (\Throwable $th) {
            return redirect()->route('barangmasuk.tambah')->with('info', 'Barang masuk gagal di update');
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
