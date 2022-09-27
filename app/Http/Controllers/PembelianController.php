<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Sparepart;
use App\Models\Pembelian;
use App\Models\PembelianDetail;

class PembelianController extends Controller
{
    public function index()
    {
        $supplier = Supplier::orderBy('nama')->get();

        return view('pembelian.index', compact('supplier'));
    }

    public function data()
    {
        $pembelian = Pembelian::orderBy('pembelian_id', 'desc')->get();

        return datatables()
            ->of($pembelian)
            ->addIndexColumn()
            ->addColumn('total_item', function ($pembelian) {
                return format_uang($pembelian->total_item);
            })
            ->addColumn('total_harga', function ($pembelian) {
                return 'Rp. '. format_uang($pembelian->total_harga);
            })
            ->addColumn('bayar', function ($pembelian) {
                return 'Rp. '. format_uang($pembelian->bayar);
            })
            ->addColumn('tanggal', function ($pembelian) {
                return tanggal_indonesia($pembelian->created_at, false);
            })
            ->addColumn('supplier', function ($pembelian) {
                return $pembelian->supplier->nama;
            })
            ->editColumn('diskon', function ($pembelian) {
                return $pembelian->diskon . ' %';
            })
            ->addColumn('aksi', function ($pembelian) {
                return '
                <div class="btn-group">
                    <button onclick="showDetail(`'. route('pembelian.show', $pembelian->pembelian_id) .'`)" class="btn btn-sm bg-gradient-info"><i class="fa fa-eye"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create($id)
    {
        $pembelian = new Pembelian();
        $pembelian->supplier_id = $id;
        $pembelian->total_item  = 0; 
        $pembelian->total_harga = 0; 
        $pembelian->diskon      = 0; 
        $pembelian->bayar       = 0; 
        $pembelian->save();

        session(['pembelian_id' => $pembelian->pembelian_id]);
        session(['supplier_id' => $pembelian->supplier_id]);

        return redirect()->route('pembelian_detail.index');
    }

    public function store(Request $request)
    {
        $pembelian = Pembelian::findOrFail($request->pembelian_id);
        $pembelian->total_item  = $request->total_item;
        $pembelian->total_harga = $request->total;
        $pembelian->diskon      = $request->diskon;
        $pembelian->bayar       = $request->bayar;
        $pembelian->update();

        $detail = PembelianDetail::where('pembelian_id', $pembelian->pembelian_id)->get();        
        foreach ($detail as $item) {
            $sparepart = Sparepart::find($item->sparepart_id);
            $sparepart->stok += $item->jumlah;
            $sparepart->update();
        }

        return redirect()->route('pembelian.index');
    }

    public function show($id)
    {
        $detail = PembelianDetail::with('sparepart')->where('pembelian_id', $id)->get();

        return datatables()
            ->of($detail)
            ->addIndexColumn()
            ->addColumn('kode_part', function ($detail) {
                return '<span class="badge badge-success">'. $detail->sparepart->kode_part .'</span>';
            })
            ->addColumn('nama_part', function ($detail) {
                return $detail->sparepart->nama_part;
            })
            ->addColumn('harga_beli', function ($detail) {
                return 'Rp. '. format_uang($detail->harga_beli);
            })
            ->addColumn('jumlah', function ($detail) {
                return $detail->jumlah;
            })
            ->addColumn('subtotal', function ($detail) {
                return 'Rp. '. format_uang($detail->subtotal);
            })
            ->rawColumns(['kode_part'])
            ->make(true);
    }

    public function destroy($id)
    {
        
    }
}
