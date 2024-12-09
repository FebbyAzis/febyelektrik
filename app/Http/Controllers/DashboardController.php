<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Faktur;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_beli = Invoice::count('id');
        $invoice = Invoice::all();
        // dd($dashboard);
        return view('dashboard', compact('total_beli', 'invoice'));
    }
}
