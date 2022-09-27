@extends('layouts.master')

@section('title')
Daftar Reservasi
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Daftar Reservasi</li>
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
                            <th width="18%">Tanggal Kedatangan</th>
                            <th>Nama</th>
                            <th width="10%">No.Telp</th>
                            <th width="6%">Service</th>
                            <th>Alamat</th>
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
                url: '{{ route('reservasi.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'kode_reservasi'},
                {data: 'tgl', sortable: false},
                {data: 'nama_pelanggan'},
                {data: 'no_telp'},
                {data: 'service'},
                {data: 'alamat'},
            ]
        });
    });
</script>
@endpush