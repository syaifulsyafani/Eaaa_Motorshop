<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" style="width: 100%; padding-left: 15%;">

                    {{-- service --}}
                    <div class="form-group row">
                        <label for="service" class="col-md-2 col-md-offset-1 control-label">Service</label>
                        <div class="col-md-8">
                            <input type="text" name="service" id="service"
                                class="form-control @error('service') is-invalid @enderror" required autofocus>
                        </div>
                        @error('service')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- harga --}}
                    <div class="form-group row">
                        <label for="harga" class="col-md-2 col-md-offset-1 control-label">Harga</label>
                        <div class="col-md-8">
                            <input type="number" name="harga" id="harga"
                                class="form-control @error('harga') is-invalid @enderror">
                        </div>
                        @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- keterangan --}}
                    <div class="form-group row">
                        <label for="keterangan" class="col-md-2 col-md-offset-1 control-label">Keterangan</label>
                        <div class="col-md-8">
                            <input type="text" name="keterangan" id="keterangan"
                                class="form-control @error('keterangan') is-invalid @enderror">
                        </div>
                        @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm bg-gradient-primary">Simpan</button>
                    <button type="button" class="btn btn-sm bg-gradient-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>