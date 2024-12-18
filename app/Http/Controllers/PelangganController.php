<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Faktur;
use App\Models\Invoice;

class PelangganController extends Controller
{
    public function data_pelanggan()
    {
        $pelanggan = Pelanggan::all();

        return view('data_pelanggan.data_pelanggan', compact('pelanggan'));
    }

    public function tambah_pelanggan(Request $request)
    {
        $save = new Pelanggan;
        $save->nama_toko = $request->nama_toko; 
        $save->no_tlp = $request->no_tlp; 
        $save->alamat = $request->alamat; 
        $save->save(); 
        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    
    public function edit_pelanggan(Request $request, $id)
    {

        Pelanggan::where('id', $id)->update([
            'nama_toko' => $request->nama_toko,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
           
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function hapus_pelanggan($id)
    {
        $kategori_barang = Pelanggan::where('id', $id)->delete();
        return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
    }

    public function detail_pelanggan($id)
    {
        $detail = Pelanggan::find($id);
        $faktur = Faktur::where('id', $id)->get();
        return view('data_pelanggan.detail_pelanggan', compact('detail', 'faktur'));
    }

    public function detail_faktur_pelanggan($id)
    {
        $faktur = Faktur::find($id);
        $df = Invoice::where('faktur_id', $id)->get();
        return view('data_pelanggan.detail_faktur_pelanggan', compact('df', 'faktur'));
    }
}
