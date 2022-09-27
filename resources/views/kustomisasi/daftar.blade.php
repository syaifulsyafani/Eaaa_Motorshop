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
                <div class="alert alert-info alert-dismissible" style="display: none;" id="tambah">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i> Data berhasil disimpan!
                </div>
                
                <div class="card-body table-responsive">
                    <table class="table table-stiped table-bordered">
                        <thead>
                            <th width="6%">No</th>
                            <th width="10%">Kode</th>
                            <th>Nama</th>
                            <th width="10%">No.Telp</th>
                            <th width="18%">Tanggal Masuk</th>
                            <th width="18%">Tanggal Keluar</th>
                            <th width="6%">Status</th>
                            <th width="10%"><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

@includeIf('kustomisasi.edit')
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
                {data: 'no_telp'},
                {data: 'tgl_masuk'},
                {data: 'tgl_keluar'},
                {data: 'status'},
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
		$('#modal-form .modal-title').text('Tambah Kustomisasi');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post'); 
        $('#modal-form [name=nama_pelanggan]').focus();
	}
     
    function editForm(url) {
		$('#modal-form').modal('show');
		$('#modal-form .modal-title').text('Edit Kustomisasi');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put'); 
        $('#modal-form [name=nama_pelanggan]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_pelanggan]').val(response.nama_pelanggan);
                $('#modal-form [name=no_telp]').val(response.no_telp);
                $('#modal-form [name=alamat]').val(response.alamat);
                $('#modal-form [name=service]').val(response.service);
                $('#modal-form [name=status]').val(response.status);
                $('#modal-form [name=tgl_masuk]').val(response.tgl_masuk);
                $('#modal-form [name=tgl_keluar]').val(response.tgl_keluar);
                $('#modal-form [name=ket_kustomisasi]').val(response.ket_kustomisasi);
                $('#modal-form [name=merk]').val(response.merk);
                $('#modal-form [name=tipe]').val(response.tipe);
                $('#modal-form [name=tahun]').val(response.tahun);
                $('#modal-form [name=warna]').val(response.warna);
                $('#modal-form [name=no_polisi]').val(response.no_polisi);
                $('#modal-form [name=no_rangka]').val(response.no_rangka);
                $('#modal-form [name=no_mesin]').val(response.no_mesin);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilan data');
                return;
            });
	}
</script>
@endpush