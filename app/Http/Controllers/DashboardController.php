<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Faktur;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $total_beli = Invoice::count('id');
        $invoice = Invoice::all();
        $total_diskon = Invoice::sum(DB::raw('(harga_jual * kuantitas * disc / 100)'));
        // dd($dashboard);
         // Ambil tahun dari request, default ke tahun sekarang
         $year = $request->input('year', date('Y'));

         // Total pemasukan berdasarkan bulan
         $pemasukan = Invoice::whereYear('created_at', $year)
             ->selectRaw("MONTH(created_at) as month, SUM(harga_jual * kuantitas) - SUM(harga_jual * kuantitas * disc / 100)as total")
             ->groupBy('month')
             ->pluck('total', 'month');
 
         // Total pengeluaran berdasarkan bulan
         $pengeluaran = Invoice::whereYear('created_at', $year)
             ->selectRaw("MONTH(created_at) as month, SUM(harga_beli * kuantitas) as total")
             ->groupBy('month')
             ->pluck('total', 'month');
 
         // Format data untuk grafik
         $chartData = [];
         for ($i = 1; $i <= 12; $i++) {
             $chartData[] = [
                 'month' => $i,
                 'pemasukan' => $pemasukan[$i] ?? 0,
                 'pengeluaran' => $pengeluaran[$i] ?? 0,
             ];
         }
        return view('dashboard', compact('total_beli', 'invoice', 'year', 'pemasukan', 'pengeluaran',
    'chartData', 'total_diskon'));
    }
}
