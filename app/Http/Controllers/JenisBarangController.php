<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DataBarang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    //
    public function index()
    {
        $jenis_barang = JenisBarang::orderBy('nama', 'asc')->get();

        return view('jenisbarang.index', compact('jenis_barang'));
    }

    public function show($id)
    {
        $data_barang = DataBarang::with('jenis_barang')->where('jenisbarang_id', $id)->orderBy('nama', 'asc')->get();
        // dd($data_barang);
        $jenis_barang = JenisBarang::where('id', $id)->first();
        // dd($jenis_barang);

        $cek_barangmasuk_jan = DataBarang::whereMonth('created_at', '1')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_feb = DataBarang::whereMonth('created_at', '2')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_mar = DataBarang::whereMonth('created_at', '3')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_apr = DataBarang::whereMonth('created_at', '4')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_mei = DataBarang::whereMonth('created_at', '5')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_jun = DataBarang::whereMonth('created_at', '6')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_jul = DataBarang::whereMonth('created_at', '7')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_agu = DataBarang::whereMonth('created_at', '8')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_sep = DataBarang::whereMonth('created_at', '9')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_okt = DataBarang::whereMonth('created_at', '10')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_nov = DataBarang::whereMonth('created_at', '11')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangmasuk_des = DataBarang::whereMonth('created_at', '12')
        ->with('jenis_barang','barang_masuk')->where('jenisbarang_id', $id)->get()->count();

        //Barang Keluar
        $cek_barangkeluar_jan = DataBarang::whereMonth('created_at', '1')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_feb = DataBarang::whereMonth('created_at', '2')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_mar = DataBarang::whereMonth('created_at', '3')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_apr = DataBarang::whereMonth('created_at', '4')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_mei = DataBarang::whereMonth('created_at', '5')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_jun = DataBarang::whereMonth('created_at', '6')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_jul = DataBarang::whereMonth('created_at', '7')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_agu = DataBarang::whereMonth('created_at', '8')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_sep = DataBarang::whereMonth('created_at', '9')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_okt = DataBarang::whereMonth('created_at', '10')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_nov = DataBarang::whereMonth('created_at', '11')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $cek_barangkeluar_des = DataBarang::whereMonth('created_at', '12')
        ->with('jenis_barang','barang_keluar')->where('jenisbarang_id', $id)->get()->count();

        $dataPemasukan = [
            $cek_barangmasuk_jan,
            $cek_barangmasuk_feb,
            $cek_barangmasuk_mar,
            $cek_barangmasuk_apr,
            $cek_barangmasuk_mei,
            $cek_barangmasuk_jun,
            $cek_barangmasuk_jul,
            $cek_barangmasuk_agu,
            $cek_barangmasuk_sep,
            $cek_barangmasuk_okt,
            $cek_barangmasuk_nov,
            $cek_barangmasuk_des
        ];
        // dd($dataPemasukan);

        $dataPengeluaran = [
            $cek_barangkeluar_jan,
            $cek_barangkeluar_feb,
            $cek_barangkeluar_mar,
            $cek_barangkeluar_apr,
            $cek_barangkeluar_mei,
            $cek_barangkeluar_jun,
            $cek_barangkeluar_jul,
            $cek_barangkeluar_agu,
            $cek_barangkeluar_sep,
            $cek_barangkeluar_okt,
            $cek_barangkeluar_nov,
            $cek_barangkeluar_des
        ];

        return view('jenisbarang.show', compact('data_barang', 'jenis_barang', 'dataPemasukan', 'dataPengeluaran'));
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
