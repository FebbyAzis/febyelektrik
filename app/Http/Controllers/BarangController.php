<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pelanggan;

class BarangController extends Controller
{
    public function data_barang()
    {
        $barang = Barang::orderby('id', 'desc')->get();

        return view('data_barang.data_barang', compact('barang'));
    }

    public function tambah_barang(Request $request)
    {
        $save = new Barang;
        $save->nama_barang = $request->nama_barang; 
        $save->qty = $request->qty; 
        $save->banyaknya = $request->banyaknya; 
        $save->harga_beli = str_replace('.','',$request->harga_beli);
        $save->harga_jual = str_replace('.','',$request->harga_jual);
        $save->save(); 
        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    
    public function edit_barang(Request $request, $id)
    {

        Barang::where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'qty' => $request->qty,
            'banyaknya' => $request->banyaknya,
            'harga_beli' => str_replace('.','',$request->harga_beli),
            'harga_jual' => str_replace('.','',$request->harga_jual),
           
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function hapus_barang($id)
    {
        $kategori_barang = Barang::where('id', $id)->delete();
        return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
    }

    // public function searchBarang(Request $request)
    // {
    //     $query = $request->input('q');
    //     $barang = Barang::where('nama_barang', 'LIKE', '%' . $query . '%')->get();

    //     return response()->json($barang->map(function ($item) {
    //         return ['id' => $item->id, 'text' => $item->nama_barang];
    //     }));
    // }
}
