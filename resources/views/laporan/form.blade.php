<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('laporan.index') }}" method="get" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Periode Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" style="width: 100%; padding-left: 15%;">

                    {{-- tanggal awal --}}
                    <div class="form-group row">
                        <label for="tanggal_awal" class="col-md-2 col-md-offset-1 control-label">Tanggal Awal</label>
                        <div class="col-md-8">
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control datepicker" value="{{ request('tanggal_awal') }}" required autofocus>
                        </div>
                    </div>

                    {{-- tanggal akhir --}}
                    <div class="form-group row">
                        <label for="tanggal_akhir" class="col-md-2 col-md-offset-1 control-label">Tanggal Akhir</label>
                        <div class="col-md-8">
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control datepicker" value="{{ request('tanggal_akhir') }}" required>
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