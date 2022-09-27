<div class="modal fade" id="modal-supplier" tabindex="-1" role="dialog" aria-labelledby="modal-supplier" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered table-striped table-supplier">
                    <thead>
                        <th width="6%">No</th>
                        <th>Toko</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                        <th width="14%"><i class="fas fa-cog"></i></th>
                    </thead>            
                    <tbody>
                        @foreach ($supplier as $key => $item)
                            <tr>
                                <td width="6%">{{ $key+1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->telp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td width="14%">
                                    <a href="{{ route('pembelian.create', $item->supplier_id) }}" class="btn btn-sm bg-gradient-primary">
                                        <i class="fas fa-check-circle"></i>
                                        Pilih
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>    
                </table>            
            </div>
        </div>
    </div>
</div>