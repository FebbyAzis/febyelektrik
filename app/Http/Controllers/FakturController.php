<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Faktur;
use App\Models\Invoice;

class FakturController extends Controller
{
    public function faktur()
    {
        $faktur = Faktur::orderby('id', 'desc')->get();
        $barang = Barang::all();
        $pelanggan = Pelanggan::all();

        return view('faktur.faktur', compact('faktur', 'barang', 'pelanggan'));
    }

    public function tambah_faktur(Request $request)
    {
        $save = new Faktur;
        $save->data_pelanggan_id = $request->data_pelanggan_id; 
        $save->no_faktur = $request->no_faktur; 
        $save->tanggal = $request->tanggal; 
        $save->save(); 
        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    public function invoice($id)
    {
        $faktur = Faktur::find($id);
        $invoice = invoice::where('faktur_id', $id)->get();
        $barang = Barang::all();
        return view('faktur.invoice', compact('faktur', 'invoice', 'barang'));
    }

    public function tambah_invoice(Request $request)
    {
        $save = new Invoice;
        $save->faktur_id = $request->faktur_id; 
        $save->data_barang_id = $request->data_barang_id; 
        $save->nama_barang = $request->nama_barang;
        $save->qty = $request->qty;
        $save->banyaknya = $request->banyaknya;
        $save->harga_beli = $request->harga_beli;
        $save->harga_jual = $request->harga_jual;
        $save->kuantitas = $request->kuantitas; 
        $save->disc = $request->disc; 
        $save->save(); 
        return redirect()->back()->with('Success', 'Data berhasil ditambahkan!');
    }

    public function edit_invoice(Request $request, $id)
    {

        Invoice::where('id', $id)->update([
            'kuantitas' => $request->kuantitas,
            'disc' => $request->disc,
           
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function hapus_invoice($id)
    {
        $kategori_barang = Invoice::where('id', $id)->delete();
        return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
    }

    public function cetak_invoice($id)
    {
        $faktur = Faktur::find($id);
        $invoice = invoice::where('faktur_id', $id)->get();
        $barang = Barang::all();
        return view('faktur.cetak_invoice', compact('faktur', 'invoice', 'barang'));
    }

    public function search(Request $request)
    {
        // Cek apakah ada input pencarian
        if ($request->has('query')) {
            $query = $request->input('query');
            $products = Barang::where('nama_barang', 'like', "%{$query}%")->get();
            return response()->json($products);
        }
        
        return response()->json([]);
    }
}