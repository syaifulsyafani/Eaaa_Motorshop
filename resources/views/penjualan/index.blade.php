@extends('layouts.master')

@section('title')
Daftar Penjualan
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Daftar Penjualan</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="alert alert-info alert-dismissible" style="display: none;" id="hapus">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i> Data berhasil dihapus!
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-stiped table-bordered table-penjualan">
                        <thead>
                            <th width="7%">No</th>
                            {{-- tanggal diambil dari created_at --}}
                            <th>Tanggal</th> 
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Diskon</th>
                            <th>Total Bayar</th>
                            <th>Kasir</th>
                            <th width="8%"><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

@includeIf('penjualan.detail')
@endsection

@push('scripts')
<script>
    let table, table1;

    $(function () {
        table = $('.table-penjualan').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('penjualan.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'tanggal'},
                {data: 'total_item'},
                {data: 'total_harga'},
                {data: 'diskon'},
                {data: 'bayar'},
                {data: 'kasir'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        table1 = $('.table-detail').DataTable({
            processing: true,
            bsort: false,
            dom: 'Brt',
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'kode_part'},
                {data: 'nama_part'},
                {data: 'harga'},
                {data: 'jumlah'},
                {data: 'subtotal'},
            ]
        })
    });
    
    function showDetail(url){
        $('#modal-detail').modal('show');

        table1.ajax.url(url);
        table1.ajax.reload();
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data?')) {
            $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'delete',
            })
                .done((response) => {
                    table.ajax.reload();
                    $('#hapus').fadeIn();

                    setTimeout(() => {
                        $('#hapus').fadeOut();
                    }, 3000);
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }
</script>
@endpush