<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kustomisasi;

class KustomisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            return view('kustomisasi.index');
        } elseif (auth()->user()->level == 3) {
            return view('kustomisasi.daftar');
        } elseif (auth()->user()->level == 0) {
            return view('kustomisasi.daftar-p');
        }
    }

    public function data()
    {
        $kustomisasi = Kustomisasi::orderBy('kode_kustomisasi', 'asc')->get();

        if (auth()->user()->level == 1) {
            return datatables()
            ->of($kustomisasi)
            ->addIndexColumn()
            ->addColumn('kode_kustomisasi', function($kustomisasi) {
                return '<span class="badge badge-success">'. $kustomisasi->kode_kustomisasi .'</span>';
            })
            ->addColumn('tgl_masuk', function($kustomisasi) {
                return tanggal_indonesia($kustomisasi->tgl_masuk);
            })
            ->addColumn('tgl_keluar', function($kustomisasi) {
                return tanggal_indonesia($kustomisasi->tgl_keluar);
            })
            ->addColumn('aksi', function($kustomisasi) {
                return '
                <div class="btn-group">
                    <button onclick="viewIndex(`'. route('kustomisasi.show', $kustomisasi->kustomisasi_id) .'`)" class="btn btn-sm bg-gradient-info"><i class="fa fa-eye"></i></button>
                    <button onclick="editForm(`'. route('kustomisasi.update', $kustomisasi->kustomisasi_id) .'`)" class="btn btn-sm bg-gradient-warning"><i class="fa fa-pen"></i></button>
                    <button onclick="deleteData(`'. route('kustomisasi.destroy', $kustomisasi->kustomisasi_id) .'`)" class="btn btn-sm bg-gradient-danger"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_kustomisasi', 'tgl_masuk', 'tgl_keluar'])
            ->make(true);
        } elseif (auth()->user()->level == 3) {
            return datatables()
            ->of($kustomisasi)
            ->addIndexColumn()
            ->addColumn('kode_kustomisasi', function($kustomisasi) {
                return '<span class="badge badge-success">'. $kustomisasi->kode_kustomisasi .'</span>';
            })
            ->addColumn('tgl_masuk', function($kustomisasi) {
                return tanggal_indonesia($kustomisasi->tgl_masuk);
            })
            ->addColumn('tgl_keluar', function($kustomisasi) {
                return tanggal_indonesia($kustomisasi->tgl_keluar);
            })
            ->addColumn('aksi', function($kustomisasi) {
                return '
                <div class="btn-group">
                    <button onclick="viewIndex(`'. route('kustomisasi.show', $kustomisasi->kustomisasi_id) .'`)" class="btn btn-sm bg-gradient-info"><i class="fa fa-eye"></i></button>
                    <button onclick="editForm(`'. route('kustomisasi.update', $kustomisasi->kustomisasi_id) .'`)" class="btn btn-sm bg-gradient-warning"><i class="fa fa-pen"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_kustomisasi', 'tgl_masuk', 'tgl_keluar'])
            ->make(true);
        } elseif (auth()->user()->level == 0) {
            return datatables()
            ->of($kustomisasi)
            ->addIndexColumn()
            ->addColumn('kode_kustomisasi', function($kustomisasi) {
                return '<span class="badge badge-success">'. $kustomisasi->kode_kustomisasi .'</span>';
            })
            ->addColumn('tgl_masuk', function($kustomisasi) {
                return tanggal_indonesia($kustomisasi->tgl_masuk);
            })
            ->addColumn('tgl_keluar', function($kustomisasi) {
                return tanggal_indonesia($kustomisasi->tgl_keluar);
            })
            ->rawColumns(['kode_kustomisasi', 'tgl_masuk', 'tgl_keluar'])
            ->make(true);
        }
        
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
        $kustomisasi = Kustomisasi::latest()->first() ?? new Kustomisasi();
        $request['kode_kustomisasi'] = 'KSM2207'. tambah_nol_didepan((int)$kustomisasi->kustomisasi_id +1, 3);

        $kustomisasi = Kustomisasi::create($request->all());

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
        $kustomisasi = Kustomisasi::find($id);

        return response()->json($kustomisasi);
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
        $kustomisasi = Kustomisasi::find($id);
        $kustomisasi->update($request->all());

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
        $kustomisasi = Kustomisasi::find($id);
        $kustomisasi->delete();

        return response(null, 204);
    }
}
