<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Sparepart;
use App\Models\Setting;
use PDF;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('penjualan.index');
    }

    public function data()
    {
        $penjualan = Penjualan::orderBy('penjualan_id', 'desc')->get();

        return datatables()
            ->of($penjualan)
            ->addIndexColumn()
            ->addColumn('total_item', function ($penjualan) {
                return format_uang($penjualan->total_item);
            })
            ->addColumn('total_harga', function ($penjualan) {
                return 'Rp. '. format_uang($penjualan->total_harga);
            })
            ->addColumn('bayar', function ($penjualan) {
                return 'Rp. '. format_uang($penjualan->bayar);
            })
            ->addColumn('tanggal', function ($penjualan) {
                return tanggal_indonesia($penjualan->created_at, false);
            })
            ->editColumn('diskon', function ($penjualan) {
                return $penjualan->diskon . ' %';
            })
            ->editColumn('kasir', function ($penjualan) {
                return $penjualan->user->name ?? '';
            })
            ->addColumn('aksi', function ($penjualan) {
                return '
                <div class="btn-group">
                    <button onclick="showDetail(`'. route('penjualan.show', $penjualan->penjualan_id) .'`)" class="btn btn-sm bg-gradient-info"><i class="fa fa-eye"></i></button>
                    <button onclick="deleteData(`'. route('penjualan.destroy', $penjualan->penjualan_id) .'`)" class="btn btn-sm bg-gradient-danger"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show($id)
    {
        $penjualan = PenjualanDetail::with('sparepart')->where('penjualan_id', $id)->get();

        return datatables()
            ->of($penjualan)
            ->addIndexColumn()
            ->addColumn('kode_part', function ($penjualan) {
                return '<span class="badge badge-success">'. $penjualan->sparepart->kode_part .'</span>';
            })
            ->addColumn('nama_part', function ($penjualan) {
                return $penjualan->sparepart->nama_part;
            })
            ->addColumn('harga', function ($penjualan) {
                return 'Rp. '. format_uang($penjualan->harga);
            })
            ->addColumn('jumlah', function ($penjualan) {
                return $penjualan->jumlah;
            })
            ->addColumn('subtotal', function ($penjualan) {
                return 'Rp. '. format_uang($penjualan->subtotal);
            })
            ->rawColumns(['kode_part'])
            ->make(true);
    }

    public function create()
    {
        $penjualan = new Penjualan();

        $penjualan->total_item  = 0;
        $penjualan->total_harga = 0;
        $penjualan->diskon      = 0;
        $penjualan->bayar       = 0;
        $penjualan->diterima    = 0;
        $penjualan->user_id     = auth()->id();

        $penjualan->save();

        session(['penjualan_id' => $penjualan->penjualan_id]);
        return redirect()->route('transaksi.index');
    }

    public function store(Request $request)
    {
        $penjualan = Penjualan::findOrFail($request->penjualan_id);
        $penjualan->total_item  = $request->total_item;
        $penjualan->total_harga = $request->total;
        $penjualan->diskon      = $request->diskon;
        $penjualan->bayar       = $request->bayar;
        $penjualan->diterima    = $request->diterima;
        $penjualan->update();

        $detail = PenjualanDetail::where('penjualan_id', $penjualan->penjualan_id)->get();        
        foreach ($detail as $item) {
            $sparepart         = Sparepart::find($item->sparepart_id);
            $sparepart->stok  -= $item->jumlah;
            $sparepart->update();
        }

        return redirect()->route('transaksi.selesai');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        $detail    = PenjualanDetail::where('penjualan_id', $penjualan->penjualan_id)->get();
        foreach ($detail as $item) {
            $item->delete();
        }
        
        $penjualan->delete();

        return response(null, 204);
    }

    public function selesai()
    {
        $setting = Setting::first();

        return view('penjualan.selesai', compact('setting'));
    }

    public function notaKecil()
    {
        $setting    = Setting::first();
        $penjualan  = Penjualan::find(session('penjualan_id'));
        if (! $penjualan) {
            abort(404);
        }

        $detail     = PenjualanDetail::with('sparepart')
            ->where('penjualan_id', session('penjualan_id'))
            ->get();

        return view('penjualan.nota_besar', compact('setting', 'penjualan', 'detail'));
    }

    public function notaBesar()
    {
        $setting = Setting::first();
        $penjualan = Penjualan::find(session('penjualan_id'));
        if (! $penjualan) {
            abort(404);
        }
        $detail = PenjualanDetail::with('sparepart')
            ->where('penjualan_id', session('penjualan_id'))
            ->get();
        
        $pdf = PDF::loadView('penjualan.nota_besar', compact('setting', 'penjualan', 'detail'));
        $pdf->setPaper(0,0,609,440, 'potrait');
        return $pdf->stream();
    }
}
