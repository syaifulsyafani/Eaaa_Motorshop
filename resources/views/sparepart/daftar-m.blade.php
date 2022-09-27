@extends('layouts.master')

@section('title')
Daftar Sparepart
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Daftar Sparepart</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <form action="" class="form-sparepart">
                        @csrf
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <th width="5%">No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Merk</th>
                                <th>Stok</th>
                                <th>Keterangan</th>
                            </thead>
                        </table>
                    </form>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('sparepart.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
				{data: 'kode_part'},
                {data: 'nama_part'},
                {data: 'nama_kategori'},
				{data: 'merk'},
				{data: 'stok'},
                {data: 'ket_part'},
            ]
        });
    });
</script>
@endpush