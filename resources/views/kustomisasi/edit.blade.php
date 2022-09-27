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

                <div class="modal-body" style="width:100%; padding-left:15%;">

                    {{-- nama --}}
                    <div class="form-group row">
                        <label for="nama_pelanggan" class="col-md-2 col-md-offset-1 control-label">Nama</label>
                        <div class="col-md-8">
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan"
                                class="form-control @error('nama_pelanggan') is-invalid @enderror" readonly>
                        </div>
                        @error('nama_pelanggan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- telp --}}
                    <div class="form-group row">
                        <label for="no_telp" class="col-md-2 col-md-offset-1 control-label">No.Telp</label>
                        <div class="col-md-8">
                            <input type="text" name="no_telp" id="no_telp"
                                class="form-control @error('no_telp') is-invalid @enderror" readonly>
                        </div>
                        @error('no_telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- alamat --}}
                    <div class="form-group row">
                        <label for="alamat" class="col-md-2 col-md-offset-1 control-label">Alamat</label>
                        <div class="col-md-8">
                            <input type="text" name="alamat" id="alamat"
                                class="form-control @error('alamat') is-invalid @enderror" readonly>
                        </div>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- service --}}
                    <div class="form-group row">
                        <label for="service" class="col-md-2 col-md-offset-1 control-label">Service</label>
                        <div class="col-md-8">
                            <input type="text" name="service" id="service"
                                class="form-control @error('alamat') is-invalid @enderror" readonly>
                        </div>
                        @error('service')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- status --}}
                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-md-offset-1 control-label">Status</label>
                        <div class="col-md-8">
                            <select name="status" id="status" class="custom-select" required>
                                <option value="">-Pilih Status-</option>
                                <option value="Pending">Pending</option>
                                <option value="On Progress">On Progress</option>
                                <option value="Hold">Hold</option>
                                <option value="Complete">Complete</option>
                            </select>
                        </div>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- tgl_masuk --}}
                    <div class="form-group row">
                        <label for="tgl_masuk" class="col-md-2 col-md-offset-1 control-label">Masuk</label>
                        <div class="col-md-8">
                            <input type="date" name="tgl_masuk" id="tgl_masuk"
                                class="form-control @error('tgl_masuk') is-invalid @enderror" readonly>
                        </div>
                        @error('tgl_masuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- tgl_keluar --}}
                    <div class="form-group row">
                        <label for="tgl_keluar" class="col-md-2 col-md-offset-1 control-label">Keluar</label>
                        <div class="col-md-8">
                            <input type="date" name="tgl_keluar" id="tgl_keluar"
                                class="form-control @error('tgl_keluar') is-invalid @enderror" readonly>
                        </div>
                        @error('tgl_keluar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- keterangan --}}
                    <div class="form-group row">
                        <label for="ket_kustomisasi" class="col-md-2 col-md-offset-1 control-label">Keterangan</label>
                        <div class="col-md-8">
                            <input type="text" name="ket_kustomisasi" id="ket_kustomisasi"
                                class="form-control @error('ket_kustomisasi') is-invalid @enderror" required>
                        </div>
                        @error('ket_kustomisasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- merk --}}
                    <div class="form-group row">
                        <label for="merk" class="col-md-2 col-md-offset-1 control-label">Merk</label>
                        <div class="col-md-8">
                            <input type="text" name="merk" id="merk"
                                class="form-control @error('merk') is-invalid @enderror" readonly>
                        </div>
                        @error('merk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- tipe --}}
                    <div class="form-group row">
                        <label for="tipe" class="col-md-2 col-md-offset-1 control-label">Tipe</label>
                        <div class="col-md-8">
                            <input type="text" name="tipe" id="tipe"
                                class="form-control @error('tipe') is-invalid @enderror" readonly>
                        </div>
                        @error('tipe')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- tahun --}}
                    <div class="form-group row">
                        <label for="tahun" class="col-md-2 col-md-offset-1 control-label">Tahun</label>
                        <div class="col-md-8">
                            <input type="text" name="tahun" id="tahun"
                                class="form-control @error('tahun') is-invalid @enderror" readonly>
                        </div>
                        @error('tahun')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- warna --}}
                    <div class="form-group row">
                        <label for="warna" class="col-md-2 col-md-offset-1 control-label">Warna</label>
                        <div class="col-md-8">
                            <input type="text" name="warna" id="warna"
                                class="form-control @error('warna') is-invalid @enderror" readonly>
                        </div>
                        @error('warna')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- no_polisi --}}
                    <div class="form-group row">
                        <label for="no_polisi" class="col-md-2 col-md-offset-1 control-label">No. Polisi</label>
                        <div class="col-md-8">
                            <input type="text" name="no_polisi" id="no_polisi"
                                class="form-control @error('no_polisi') is-invalid @enderror" readonly>
                        </div>
                        @error('no_polisi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- no_rangka --}}
                    <div class="form-group row">
                        <label for="no_rangka" class="col-md-2 col-md-offset-1 control-label">No. Rangka</label>
                        <div class="col-md-8">
                            <input type="text" name="no_rangka" id="no_rangka"
                                class="form-control @error('no_rangka') is-invalid @enderror" readonly>
                        </div>
                        @error('no_rangka')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- no_mesin --}}
                    <div class="form-group row">
                        <label for="no_mesin" class="col-md-2 col-md-offset-1 control-label">No. Mesin</label>
                        <div class="col-md-8">
                            <input type="text" name="no_mesin" id="no_mesin"
                                class="form-control @error('no_mesin') is-invalid @enderror" readonly>
                        </div>
                        @error('no_mesin')
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