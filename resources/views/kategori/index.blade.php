@extends('layouts.master')

@section('title')
Daftar Kategori
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Daftar Kategori</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="alert alert-info alert-dismissible" style="display: none;" id="tambah">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i> Data berhasil disimpan!
                </div>

                <div class="alert alert-info alert-dismissible" style="display: none;" id="hapus">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i> Data berhasil dihapus!
                </div>

                <div class="card-body">
                    <button onclick="addForm('{{ route('kategori.store') }}')" class="btn btn-sm bg-gradient-success"><i class="fa fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-stiped table-bordered">
                        <thead>
                            <th width="7%">No</th>
                            <th>Kategori</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

@includeIf('kategori.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('kategori.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'nama_kategori'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('#modal-form').on('submit', function (e) {
            if(! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                        $('#tambah').fadeIn();

                        setTimeout(() => {
                            $('#tambah').fadeOut();
                        }, 3000);
                    })
                    .fail((error) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        })

    });

	function addForm(url) {
		$('#modal-form').modal('show');
		$('#modal-form .modal-title').text('Tambah Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post'); 
        $('#modal-form [name=nama]').focus();
	}
     
    function editForm(url) {
		$('#modal-form').modal('show');
		$('#modal-form .modal-title').text('Edit Kategori');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put'); 
        $('#modal-form [name=nama]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama]').val(response.nama_kategori);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilan data');
                return;
            });
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