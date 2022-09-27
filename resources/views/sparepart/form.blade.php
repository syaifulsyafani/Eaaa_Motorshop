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

                    {{-- kode --}}
                    <div class="form-group row">
                        <label for="kode_part" class="col-md-2 col-md-offset-1 control-label">Kode</label>
                        <div class="col-md-8">
                            <input type="text" name="kode_part" id="kode_part" class="form-control @error('kode_part') is-invalid @enderror" required autofocus>
                        </div>
                        @error('kode_part')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- nama --}}
                    <div class="form-group row">
						<label for="nama_part" class="col-md-2 col-md-offset-1 control-label">Nama</label>
                        <div class="col-md-8">
                            <input type="text" name="nama_part" id="nama_part" class="form-control @error('nama_part') is-invalid @enderror" required>
                        </div>
                        @error('nama_part')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- kategori --}}
                    <div class="form-group row">
                        <label for="kategori_id" class="col-md-2 col-md-offset-1 control-label">Kategori</label>
                        <div class="col-md-8">
                            <select name="kategori_id" id="kategori_id" class="custom-select" required>
                                <option value="">-Pilih kategori-</option>
                                @foreach ($kategori as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- merk --}}
                    <div class="form-group row">
						<label for="merk" class="col-md-2 col-md-offset-1 control-label">Merk</label>
                        <div class="col-md-8">
                            <input type="text" name="merk" id="merk"
                                class="form-control @error('merk') is-invalid @enderror">
                        </div>
                        @error('merk')
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

                    {{-- stok --}}
                    <div class="form-group row">
                        <label for="stok" class="col-md-2 col-md-offset-1 control-label">Stok</label>
                        <div class="col-md-8">
                            <input type="number" name="stok" id="stok"
                                class="form-control @error('stok') is-invalid @enderror" value="0">
                        </div>
                        @error('stok')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- keterangan --}}
                    <div class="form-group row">
                        <label for="ket_part" class="col-md-2 col-md-offset-1 control-label">Keterangan</label>
                        <div class="col-md-8">
                            <input type="text" name="ket_part" id="ket_part"
                                class="form-control @error('ket_part') is-invalid @enderror">
                        </div>
                        @error('ket_part')
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