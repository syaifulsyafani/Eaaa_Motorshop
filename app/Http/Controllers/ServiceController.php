<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            return view('service.index');   
        } elseif (auth()->user()->level == 2) {
            return view('service.daftar');
        }
    }

    public function data()
    {
        $service = Service::orderBy('service_id', 'desc')->get();

        return datatables()
            ->of($service)
            ->addIndexColumn()
            ->addColumn('harga', function($service) {
                return 'Rp. '. format_uang($service->harga);
            })
            ->addColumn('aksi', function ($service) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('service.update', $service->service_id) .'`)" class="btn btn-sm bg-gradient-warning"><i class="fa fa-pen"></i></button>
                    <button onclick="deleteData(`'. route('service.destroy', $service->service_id) .'`)" class="btn btn-sm bg-gradient-danger"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
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
       $service = new Service();
       $service->nama_service = $request->service;
       $service->harga = $request->harga;
       $service->ket_service = $request->keterangan;
       $service->save();

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
        $service = Service::find($id);

        return response()->json($service);
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
        $service = Service::find($id);
        $service->nama_service = $request->service;
        $service->harga = $request->harga;
        $service->ket_service = $request->keterangan;
        $service->update();

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
        $service = Service::find($id);
        $service->delete();

        return response(null, 204);
    }
}
