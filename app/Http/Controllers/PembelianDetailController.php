<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianDetail;
use App\Models\Pembelian;
use App\Models\Sparepart;
use App\Models\Supplier;

class PembelianDetailController extends Controller
{
    public function index()
    {
        $pembelian_id = session('pembelian_id');
        $sparepart    = Sparepart::orderBy('nama_part')->get();
        $supplier     = Supplier::find(session('supplier_id'));
        $diskon       = Pembelian::find($pembelian_id)->diskon ?? 0;

        if (! $supplier) {
            abort(404);
        }

        return view('pembelian_detail.index', compact('pembelian_id', 'sparepart', 'supplier', 'diskon'));
    }

    public function data($id)
    {
        $detail = PembelianDetail::with('sparepart')
            ->where('pembelian_id', $id)
            ->get();
        
        $data = array();
        $total = 0;
        $total_item = 0;

        foreach ($detail as $item) {
            $row = array();            
            $row['kode_part']   = '<span class="badge badge-success">'. $item->sparepart['kode_part'] .'</span>';
            $row['nama_part']   = $item->sparepart['nama_part'];
            $row['harga_beli']  = 'Rp. '. format_uang($item->harga_beli);
            $row['jumlah']      = '<input type="number" class="form-control form-control-sm quantity" data-id="'. $item->pembelian_detail_id .'" value="'. $item->jumlah .'">';
            $row['subtotal']    = 'Rp. '. format_uang($item->subtotal); 
            $row['aksi']        =  '<div class="btn-group">    
                                        <button onclick="deleteData(`'. route('pembelian_detail.destroy', $item->pembelian_detail_id) .'`)" class="btn btn-sm bg-gradient-danger"><i class="fa fa-trash"></i></button>
                                    </div>';
            $data[] = $row;

            $total += $item->harga_beli * $item->jumlah;
            $total_item += $item->jumlah;
        }
        $data[] = [
            'kode_part'     => '<div class="total d-none">'. $total .'</div> <div class="total_item d-none">'. $total_item .'</div>',
            'nama_part'     => '',
            'harga_beli'    => '',
            'jumlah'        => '',
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

        $detail = new PembelianDetail();
        $detail->pembelian_id = $request->pembelian_id;
        $detail->sparepart_id = $sparepart->sparepart_id;
        $detail->harga_beli   = $sparepart->harga;
        $detail->jumlah       = 1;
        $detail->subtotal     = $sparepart->harga;
        $detail->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function update(Request $request, $id)
    {
        $detail = PembelianDetail::find($id);
        $detail->jumlah   = $request->jumlah;
        $detail->subtotal = $detail->harga_beli * $request->jumlah;
        $detail->update();
    }

    public function destroy($id)
    {
        $detail = PembelianDetail::find($id);
        $detail->delete();

        return response(null, 204);
    }

    public function loadForm($diskon, $total)
    {
        $bayar = $total - ($diskon / 100 * $total);
        $data = [
            'totalrp'   => format_uang($total),
            'bayar'     => $bayar,
            'bayarrp'   => format_uang($bayar),
            'terbilang' => ucwords(terbilang($bayar). 'Rupiah')
        ];

        return response()->json($data);
    }
}