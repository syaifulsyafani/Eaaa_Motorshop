<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Sparepart;
use App\Models\Service;


class PenjualanDetailController extends Controller
{
    public function index()
    {
        $sparepart  = Sparepart::orderBy('nama_part')->get();
        $service    = Service::orderBy('nama_service')->get();

        // cek transaksi berjalan
        if ($penjualan_id = session('penjualan_id')) {
            $penjualan = Penjualan::find($penjualan_id);
            return view('penjualan_detail.index', compact('sparepart', 'service', 'penjualan_id', 'penjualan'));
        } else {
            if (auth()->user()->level == 1) {
                return redirect()->route('transaksi.baru');
            } else {
                return redirect()->route('dashboard');  
            } 
        }

    }

    public function data($id)
    {
        $detail = PenjualanDetail::with('sparepart')
            ->where('penjualan_id', $id)
            ->get();
        
        $data = array();
        $total = 0;
        $total_item = 0;

        foreach ($detail as $item) {
            $row = array();            
            $row['kode_part']   = '<span class="badge badge-success">'. $item->sparepart['kode_part'] .'</span>';
            $row['nama_part']   = $item->sparepart['nama_part'];
            $row['harga']       = 'Rp. '. format_uang($item->harga);
            $row['jumlah']      = '<input type="number" class="form-control form-control-sm quantity" data-id="'. $item->penjualan_detail_id .'" value="'. $item->jumlah .'">';
            $row['diskon']      = $item->diskon . '%'; 
            $row['subtotal']    = 'Rp. '. format_uang($item->subtotal); 
            $row['aksi']        =  '<div class="btn-group">    
                                        <button onclick="deleteData(`'. route('transaksi.destroy', $item->penjualan_detail_id) .'`)" class="btn btn-sm bg-gradient-danger"><i class="fa fa-trash"></i></button>
                                    </div>';
            $data[] = $row;

            $total += $item->harga * $item->jumlah;
            $total_item += $item->jumlah;
        }
        $data[] = [
            'kode_part'     => '<div class="total d-none">'. $total .'</div> <div class="total_item d-none">'. $total_item .'</div>',
            'nama_part'     => '',
            'harga'    => '',
            'jumlah'        => '',
            'diskon'        => '',
            'subtotal'      => '',
            'aksi'          => '',            
        ];

        
        return datatables()
        ->of($data)
        ->addIndexColumn()
        ->rawColumns(['aksi', 'kode_part', 'jumlah'])
        ->make(true);
    }

    public function store(Request $request)
    {
        $sparepart = Sparepart::where('sparepart_id', $request->sparepart_id)->first();
        if (! $sparepart) {
            return response()->json('Data gagal disimpan', 400);
        }

        $detail = new PenjualanDetail();
        $detail->penjualan_id = $request->penjualan_id;
        $detail->sparepart_id = $sparepart->sparepart_id;
        $detail->service_id   = 0;
        $detail->harga        = $sparepart->harga;
        $detail->jumlah       = 1;
        $detail->subtotal     = $sparepart->harga;
        $detail->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function loadForm($diskon = 0, $total, $diterima)
    {
        $bayar      = $total - ($diskon / 100 * $total);
        $kembali    = ($diterima != 0) ? $diterima - $bayar : 0;
        $data       = [
            'totalrp'   => format_uang($total),
            'bayar'     => $bayar,
            'bayarrp'   => format_uang($bayar),
            'terbilang' => ucwords(terbilang($bayar). 'Rupiah'),
            'kembalirp' => format_uang($kembali),
            'kembali_terbilang' => ucwords(terbilang($kembali). 'Rupiah')
        ];

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $detail = PenjualanDetail::find($id);
        $detail->jumlah   = $request->jumlah;
        $detail->subtotal = $detail->harga * $request->jumlah;
        $detail->update();
    }

    public function destroy($id)
    {
        $detail = PenjualanDetail::find($id);
        $detail->delete();

        return response(null, 204);
    }
}