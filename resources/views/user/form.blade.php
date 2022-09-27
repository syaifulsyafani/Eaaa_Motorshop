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

                    {{-- Nama --}}
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-md-offset-1 control-label">Nama</label>
                        <div class="col-md-8">
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>

                    {{-- Username --}}
                    <div class="form-group row">
                        <label for="username" class="col-md-2 col-md-offset-1 control-label">Username</label>
                        <div class="col-md-8">
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                    </div>
                    
                    {{-- Email --}}
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-md-offset-1 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                    </div>

                    {{-- Level --}}
                    <div class="form-group row">
                        <label for="level" class="col-md-2 col-md-offset-1 control-label">Bagian</label>
                        <div class="col-md-8">
                            <select name="level" id="level" class="custom-select" required>
                                <option value="">-Pilih Bagian-</option>
                                <option value="0">Customer</option>
                                <option value="2">Kasir</option>
                                <option value="3">Mekanik</option>
                            </select>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-md-offset-1 control-label">Password</label>
                        <div class="col-md-8">
                            <input type="password" name="password" id="password" class="form-control" 
                            required
                            minlength="5">
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