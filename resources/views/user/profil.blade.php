@extends('layouts.master')

@section('title')
Edit Profil
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Edit Profil</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('setting.update') }}" method="post" class="form-profil" data-toggle="validator" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="alert alert-info alert-dismissible" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i> Perubahan berhasil disimpan
                        </div>

                        {{-- username --}}
                        <div class="form-group row">
                            <label for="username" class="col-lg-2 offset-lg-1 col-form-label">Username</label>
                            <div class="col-lg-8">
                                <input type="text" name="username" id="username" class="form-control" required autofocus>
                            </div>
                        </div>
                        
                        {{-- nama --}}
                        <div class="form-group row">
                            <label for="name" class="col-lg-2 offset-lg-1 col-form-label">Nama</label>
                            <div class="col-lg-8">
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        
                        {{-- telepon --}}
                        <div class="form-group row">
                            <label for="telp" class="col-lg-2 offset-lg-1 col-form-label">Telepon</label>
                            <div class="col-lg-8">
                                <input type="text" name="telp" id="telp" class="form-control" required>
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
                            <label for="foto" class="col-lg-2 offset-lg-1 col-form-label">Foto Profil</label>
                            <div class="input-group col-lg-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="path-logo"
                                        onchange="preview('.tampil-foto', this.files[0])">
                                    <label for="foto" class="custom-file-label">Choose File</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-lg-2 offset-lg-1 col-form-label"></label>
                            <div class="input-group col-lg-4">
                                <div class="tampil-foto"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="old_password" class="col-lg-2 offset-lg-1 col-form-label">Password Lama</label>
                            <div class="col-md-8">
                                <input type="password" name="old_password" id="old_password" class="form-control" 
                                required
                                minlength="5">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-lg-2 offset-lg-1 col-form-label">Password Baru</label>
                            <div class="col-md-8">
                                <input type="password" name="password" id="password" class="form-control" 
                                required
                                minlength="5">
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
        showProfil();
        
        $('.form-profil').on('submit', function (e) {
            if(! e.preventDefault()) {
                $.ajax({
                    url: $('.form-profil').attr('action'),
                    type: $('.form-profil').attr('method'),
                    data: new FormData($('.form-profil')[0]),
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

    function showProfil() {
        $.get('{{ route('user.showProfil') }}')
            .done(response => {
                $('[name=username]').val(response.username);
                $('[name=name]').val(response.name);
                $('[name=telp]').val(response.telp);
                $('[name=alamat]').val(response.alamat);

                $('.tampil-foto').html(`<img src="{{ url('/') }}${response.foto}" width="200">`);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
</script>
@endpush