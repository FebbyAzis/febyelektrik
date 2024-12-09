<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pelanggan;

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
}
