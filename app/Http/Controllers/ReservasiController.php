<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\User;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            return view('reservasi.index');
        } else {
            return view('reservasi.view');
        }
    }

    public function data()
    {
        $reservasi = Reservasi::orderBy('tgl', 'asc')->get();

        return datatables()
            ->of($reservasi)
            ->addIndexColumn()
            ->addColumn('kode_reservasi', function($reservasi) {
                return '<span class="badge badge-success">'. $reservasi->kode_reservasi .'</span>';
            })
            ->addColumn('tgl', function ($reservasi) {
                return tanggal_indonesia($reservasi->tgl);
            })
            ->addColumn('aksi', function ($reservasi) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('reservasi.update', $reservasi->reservasi_id) .'`)" class="btn btn-sm bg-gradient-warning"><i class="fa fa-pen"></i></button>
                    <button onclick="deleteData(`'. route('reservasi.destroy', $reservasi->reservasi_id) .'`)" class="btn btn-sm bg-gradient-danger"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_reservasi'])
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
        $reservasi = Reservasi::latest()->first() ?? new Reservasi();
        $request['kode_reservasi'] = 'RSV2207'. tambah_nol_didepan((int)$reservasi->reservasi_id +1, 3);

        $reservasi = Reservasi::create($request->all());

        // return redirect('/reservasi/view');

        return redirect()->route('reservasi.view')->with(['success' => 'Data berhasil disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservasi = Reservasi::find($id);

        return response()->json($reservasi);
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
        $reservasi = Reservasi::find($id);
        $reservasi->update($request->all());

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
        $reservasi = Reservasi::find($id);
        $reservasi->delete();

        return response()->json(null, 204);
    }

    public function new()
    {
        return view('reservasi.new');
    }

    public function view()
    {
        return view('reservasi.view');
    }
}
