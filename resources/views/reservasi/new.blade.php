@extends('layouts.master')

@section('title')
Reservasi
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Reservasi Baru</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('reservasi.store') }}" method="post" class="form-reservasi" data-toggle="validator" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="alert alert-info alert-dismissible" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i> Data berhasil disimpan
                        </div>

                        {{-- nama --}}
                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-md-2 offset-md-1 col-form-label">Nama</label>
                            <div class="col-md-8">
                                <input type="text" name="nama_pelanggan" id="nama_pelanggan"
                                    class="form-control" required autofocus>
                            </div>
                        </div>

                        {{-- telp --}}
                        <div class="form-group row">
                            <label for="no_telp" class="col-md-2 offset-md-1 col-form-label">No.Telp</label>
                            <div class="col-md-8">
                                <input type="text" name="no_telp" id="no_telp"
                                    class="form-control" required>
                            </div>
                        </div>

                        {{-- alamat --}}
                        <div class="form-group row">
                            <label for="alamat" class="col-md-2 offset-md-1 col-form-label">Alamat</label>
                            <div class="col-md-8">
                                <input type="text" name="alamat" id="alamat"
                                    class="form-control" required>
                            </div>
                        </div>

                        {{-- service --}}
                        <div class="form-group row">
                            <label for="service" class="col-md-2 offset-md-1 col-form-label">Service</label>
                            <div class="col-md-8">
                                <select name="service" id="service" class="custom-select" required>
                                    <option value="">-Pilih Service-</option>
                                    <option value="Custom">Custom</option>
                                    <option value="Repaint">Repaint</option>
                                    <option value="Restorasi">Restorasi</option>
                                </select>
                            </div>
                        </div>

                        {{-- tgl --}}
                        <div class="form-group row">
                            <label for="tgl" class="col-md-2 offset-md-1 col-form-label">Tanggal</label>
                            <div class="col-md-8">
                                <input type="date" name="tgl" id="tgl"
                                    class="form-control" required >
                            </div>
                        </div>

                        {{-- user_id --}}
                        <div class="form-group row">
                            <div class="col-md-8">
                                <input type="text" name="user_id" id="user_id"
                                    class="form-control" value="{{ auth()->id() }}" hidden>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn bg-gradient-primary" style="width: 100px;">Simpan</button>
                    </div>
                </form>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->
@endsection