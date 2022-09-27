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
                                class="form-control" required autofocus>
                        </div>
                    </div>

                    {{-- telp --}}
                    <div class="form-group row">
                        <label for="no_telp" class="col-md-2 col-md-offset-1 control-label">No.Telp</label>
                        <div class="col-md-8">
                            <input type="text" name="no_telp" id="no_telp"
                                class="form-control" required>
                        </div>
                    </div>

                    {{-- alamat --}}
                    <div class="form-group row">
                        <label for="alamat" class="col-md-2 col-md-offset-1 control-label">Alamat</label>
                        <div class="col-md-8">
                            <input type="text" name="alamat" id="alamat"
                                class="form-control" required>
                        </div>
                    </div>

                    {{-- service --}}
                    <div class="form-group row">
                        <label for="service" class="col-md-2 col-md-offset-1 control-label">Service</label>
                        <div class="col-md-8">
                            <select name="service" id="service" class="custom-select" required>
                                <option value="">-Pilih Service-</option>
                                <option value="Custom">Custom</option>
                                <option value="Repaint">Repaint</option>
                                <option value="Restorasi">Restorasi</option>
                            </select>
                        </div>
                    </div>

                    {{-- tgl --}}
                    <div class="form-group row">
                        <label for="tgl" class="col-md-2 col-md-offset-1 control-label">Tanggal</label>
                        <div class="col-md-8">
                            <input type="date" name="tgl" id="tgl"
                                class="form-control" required >
                        </div>
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