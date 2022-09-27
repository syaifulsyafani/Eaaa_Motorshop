@extends('layouts.master')

@section('title')
Daftar Pembelian
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Daftar Pembelian</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button onclick="addForm()" class="btn btn-sm bg-gradient-success"><i class="fa fa-plus-circle"></i> Transaksi Baru</button>
                    @empty(! session('pembelian_id'))                        
                    <a href="{{ route('pembelian_detail.index') }}" class="btn btn-sm bg-gradient-warning"><i class="fa fa-pen"></i> Transaksi Lama</a>
                    @endempty
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-stiped table-bordered table-pembelian">
                        <thead>
                            <th width="7%">No</th>
                            {{-- tanggal diambil dari created_at --}}
                            <th>Tanggal</th> 
                            <th>Supplier</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Diskon</th>
                            <th>Total Bayar</th>
                            <th width="8%"><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

@includeIf('pembelian.supplier')
@includeIf('pembelian.detail')
@endsection

@push('scripts')
<script>
    let table, table1;

    $(function () {
        table = $('.table-pembelian').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pembelian.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'tanggal'},
                {data: 'supplier'},
                {data: 'total_item'},
                {data: 'total_harga'},
                {data: 'diskon'},
                {data: 'bayar'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('.table-supplier').DataTable();
        table1 = $('.table-detail').DataTable({
            processing: true,
            bsort: false,
            dom: 'Brt',
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'kode_part'},
                {data: 'nama_part'},
                {data: 'harga_beli'},
                {data: 'jumlah'},
                {data: 'subtotal'},
            ]
        })
    });

	function addForm() {
		$('#modal-supplier').modal('show');
	}
    
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
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }
</script>
@endpush