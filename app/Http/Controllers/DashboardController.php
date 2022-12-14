<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Reservasi,
    Kustomisasi,
    Kategori,
    Service,
    Sparepart,
    Supplier,
    Penjualan,
    Pembelian,
    Pengeluaran,
};

class DashboardController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::count();
        $kustomisasi = Kustomisasi::count();
        $supplier = Supplier::count();
        $sparepart = Sparepart::count();
        $service = Service::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_penjualan   = Penjualan::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pembelian   = Pembelian::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pengeluaran = Pengeluaran::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('nominal');

            $pendapatan        = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal    = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }


        if (auth()->user()->level == 1) {
            return view('admin.dashboard', compact('reservasi', 'kustomisasi', 'supplier', 'sparepart', 'tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan'));
        } elseif (auth()->user()->level == 2) {
            return view('kasir.dashboard', compact('service', 'sparepart'));
        } elseif (auth()->user()->level == 3) {
            return view('mekanik.dashboard', compact('kustomisasi', 'sparepart'));
        } elseif (auth()->user()->level == 4) {
            return view('pemilik.dashboard');
        } else {
            return view('pelanggan.dashboard');
        }
    }
}
