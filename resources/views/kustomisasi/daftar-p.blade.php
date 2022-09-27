@extends('layouts.master')

@section('title')
Daftar Kustomisasi
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Daftar Kustomisasi</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body table-responsive">
                    <table class="table table-stiped table-bordered">
                        <thead>
                            <th width="6%">No</th>
                            <th width="10%">Kode</th>
                            <th width="15%">Nama</th>
                            <th width="10%">Merk</th>
                            <th width="10%">Tipe</th>
                            <th width="10%">Service</th>
                            <th width="10%">No. Polisi</th>
                            <th width="6%">Status</th>
                        </thead>
                        <tbody></tbody>
                    </table>
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
                url: '{{ route('kustomisasi.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'kode_kustomisasi'},                
                {data: 'nama_pelanggan'},
                {data: 'merk'},
                {data: 'tipe'},
                {data: 'service'},
                {data: 'no_polisi'},
                {data: 'status'},
            ]
        });
    });
</script>
@endpush