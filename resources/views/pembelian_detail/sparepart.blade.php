<div class="modal fade" id="modal-sparepart" tabindex="-1" role="dialog" aria-labelledby="modal-sparepart" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Sparepart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered table-striped table-sparepart">
                    <thead>
                        <th width="6%">No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th width="14%"><i class="fas fa-cog"></i></th>
                    </thead>            
                    <tbody>
                        @foreach ($sparepart as $key => $item)
                            <tr>
                                <td width="6%">{{ $key+1 }}</td>
                                <td><span class="badge badge-success">{{ $item->kode_part }}</span></td>
                                <td>{{ $item->nama_part }}</td>
                                <td>{{ $item->harga }}</td>
                                <td width="14%">
                                    <a href="#" class="btn btn-sm bg-gradient-primary"
                                    onclick="pilihSparepart('{{ $item->sparepart_id }}', '{{ $item->kode_part }}')">
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