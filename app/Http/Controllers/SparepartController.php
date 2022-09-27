<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;
use App\Models\Kategori;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'kategori_id');

        if (auth()->user()->level == 1) {
            return view('sparepart.index', compact('kategori'));
        } elseif (auth()->user()->level == 2) {
            return view('sparepart.daftar', compact('kategori'));
        } elseif (auth()->user()->level == 3) {
            return view('sparepart.daftar-m', compact('kategori'));
        }
    }

    public function data()
    {
        $sparepart = Sparepart::leftJoin('kategori', 'kategori.kategori_id', 'sparepart.kategori_id')
                ->select('sparepart.id', 'nama_kategori')
                ->orderBy('sparepart_id', 'desc')
                ->get();

        return datatables()
            ->of($sparepart)
            ->addIndexColumn()
            ->addColumn('select_all', function($sparepart) {
                return '
                    <input type="checkbox" name="id[]" value="'. $sparepart->sparepart_id .'">
                ';
            })
            ->addColumn('kode_part', function($sparepart) {
                return '<span class="badge badge-success">'. $sparepart->kode_part .'</span>';
            })
            ->addColumn('harga', function($sparepart) {
                return 'Rp. '. format_uang($sparepart->harga);
            })
            ->addColumn('stok', function($sparepart) {
                return format_uang($sparepart->stok);
            })
            ->addColumn('aksi', function ($sparepart) {
                return '
                <div class="btn-group">
                <button type="button" onclick="editForm(`'. route('sparepart.update', $sparepart->sparepart_id) .'`)" class="btn btn-sm bg-gradient-warning"><i class="fa fa-pen"></i></button>
                <button type="button" onclick="deleteData(`'. route('sparepart.destroy', $sparepart->sparepart_id) .'`)" class="btn btn-sm bg-gradient-danger"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_part', 'select_all'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sparepart = Sparepart::latest()->first();
        $sparepart = Sparepart::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sparepart = Sparepart::find($id);

        return response()->json($sparepart);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sparepart = Sparepart::find($id);
        $sparepart->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sparepart = Sparepart::find($id);
        $sparepart->delete();

        return response(null, 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $sparepart = Sparepart::find($id);
            $sparepart->delete();
        }

        return response(null, 204);
    }
}
