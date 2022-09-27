@extends('layouts.master')

@section('title')
Setting
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Pengaturan</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('setting.update') }}" method="post" class="form-setting" data-toggle="validator" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="alert alert-info alert-dismissible" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i> Perubahan berhasil disimpan
                        </div>

                        {{-- nama perusahaan --}}
                        <div class="form-group row">
                            <label for="nama_perusahaan" class="col-lg-2 offset-lg-1 col-form-label">Nama Perusahaan</label>
                            <div class="col-lg-8">
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" required autofocus>
                            </div>
                        </div>

                        {{-- telepon --}}
                        <div class="form-group row">
                            <label for="telepon" class="col-lg-2 offset-lg-1 col-form-label">Telepon</label>
                            <div class="col-lg-8">
                                <input type="text" name="telepon" id="telepon" class="form-control" required>
                            </div>
                        </div>

                        {{-- alamat --}}
                        <div class="form-group row">
                            <label for="alamat" class="col-lg-2 offset-lg-1 col-form-label">Alamat</label>
                            <div class="col-lg-8">
                                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>

                        {{-- Logo --}}
                        <div class="form-group row">
                            <label for="path_logo" class="col-lg-2 offset-lg-1 col-form-label">Logo Perusahaan</label>
                            <div class="input-group col-lg-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="path_logo" id="path-logo"
                                        onchange="preview('.tampil-logo', this.files[0])">
                                    <label for="path_logo" class="custom-file-label">Choose File</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="path_logo" class="col-lg-2 offset-lg-1 col-form-label"></label>
                            <div class="input-group col-lg-4">
                                <div class="tampil-logo"></div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-sm bg-gradient-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->
@endsection

@push('scripts')
<script>
    $(function () {
        showData();
        
        $('.form-setting').on('submit', function (e) {
            if(! e.preventDefault()) {
                $.ajax({
                    url: $('.form-setting').attr('action'),
                    type: $('.form-setting').attr('method'),
                    data: new FormData($('.form-setting')[0]),
                    async: false,
                    processData: false,
                    contentType: false
                })
                .done(response => {
                    showData();
                    $('.alert').fadeIn();

                    setTimeout(() => {
                        $('.alert').fadeOut();
                    }, 3000);
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan perubahan');
                    return;
                });
            }
        });
    });

    function showData() {
        $.get('{{ route('setting.show') }}')
            .done(response => {
                $('[name=nama_perusahaan]').val(response.nama_perusahaan);
                $('[name=telepon]').val(response.telp);
                $('[name=alamat]').val(response.alamat);
                $('title').text(response.nama_perusahaan + ' | Pengaturan');

                $('.tampil-logo').html(`<img src="{{ url('/') }}${response.path_logo}" width="200">`);
                $('[rel=icon]').attr('href', `{{ url('/') }}${response.path_logo}`);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
</script>
@endpush