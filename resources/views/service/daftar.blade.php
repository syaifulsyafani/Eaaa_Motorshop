@extends('layouts.master')

@section('title')
Daftar Service
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Daftar Service</li>
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
                            <th width="7%">No</th>
                            <th>Service</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
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
                url: '{{ route('service.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'nama_service'},
                {data: 'harga'},
                {data: 'ket_service'},
            ]
        });
    });
</script>
@endpush