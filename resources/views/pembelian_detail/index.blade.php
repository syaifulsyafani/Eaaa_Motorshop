@extends('layouts.master')

@section('title')
Transaksi Pembelian
@endsection

@push('css')
<style>
    .tampil-bayar {
        font-size: 5em;
        text-align: center;
        height: 120px;                        
    }

    .tampil-terbilang {
        padding: 10px;
        background: #f0f0f0;
    }

    .table-pembelian tbody tr:last-child {
        display: none;
    }

    @media(max-width: 768px) {
        .tampil-bayar {
            font-size: 3em;
            height: 70px;
            padding-top: 5px;
        }
    }
</style>
@endpush

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Transaksi Pembelian</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Supplier</td>
                            <td>: {{ $supplier->nama }}</td>
                        </tr>
                        <tr>
                            <td>Telp</td>
                            <td>: {{ $supplier->telp }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $supplier->alamat }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-body">
                    
                    <form class="form-sparepart">
                        @csrf
                        <div class="form-group row">
                            <label for="kode_part" class="col-md-2  col-form-label">Kode Part</label>
                            <div class="col-md-5">
                                <div class="input-group">                            
                                    <input type="hidden" name="pembelian_id" id="pembelian_id" value="{{ $pembelian_id }}">
                                    <input type="hidden" name="sparepart_id" id="sparepart_id">
                                    <input type="text" class="form-control" name="kode_part" id="kode_part">
                                    <div class="input-group-prepend">
                                        <button onclick="tampilSparepart()" class="btn btn-outline-info" type="button"><i class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table class="table table-stiped table-bordered table-pembelian">
                        <thead>
                            <th width="6%">No</th>
                            <th>Kode</th> 
                            <th>Nama</th>
                            <th width="15%">Harga</th>
                            <th width="10%">Jumlah</th>
                            <th width="16%">Subtotal</th>
                            <th width="10%"><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="tampil-bayar bg-gradient-info"></div>
                            <div class="tampil-terbilang"></div>
                        </div>
                        <div class="col-md-4">
                            <form action="{{ route('pembelian.store') }}" class="form-pembelian" method="post">
                                @csrf
                                <input type="hidden" name="pembelian_id" value="{{ $pembelian_id }}">
                                <input type="hidden" name="total" id="total">                                
                                <input type="hidden" name="total_item" id="total_item">                                
                                <input type="hidden" name="bayar" id="bayar">   
                                
                                <div class="form-group row">
                                    <label for="totalrp" class="col-md-4 control-label col-form-label">Total</label>
                                    <div class="col-md-8">
                                        <input type="text" id="totalrp" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="diskon" class="col-md-4 control-label col-form-label">Diskon</label>
                                    <div class="col-md-8">
                                        <input type="number" name="diskon" id="diskon" class="form-control" value="{{ $diskon }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bayar" class="col-md-4 control-label col-form-label">Bayar</label>
                                    <div class="col-md-8">
                                        <input type="text" id="bayarrp" class="form-control" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-sm bg-gradient-primary float-right btn-simpan">Simpan Transaksi</button>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

@includeIf('pembelian_detail.sparepart')
@endsection

@push('scripts')
<script>
    let table, table2;

    $(function () {
        $('body').addClass('sidebar-collapse');

        table = $('.table-pembelian').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pembelian_detail.data', $pembelian_id) }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'kode_part'},
                {data: 'nama_part'},
                {data: 'harga_beli'},
                {data: 'jumlah'},
                {data: 'subtotal'},
                {data: 'aksi', searchable: false, sortable: false},
            ],
            dom: 'Brt',
            bSort: false,
        })
        .on('draw.dt', function () {
            loadForm($('#diskon').val());
        });

        table2 = $('.table-sparepart').DataTable();

        $(document).on('input', '.quantity', function () {
            let id = $(this).data('id');
            let jumlah = parseInt($(this).val());
            
            if (jumlah < 1) {
                alert('Jumlah tidak boleh kurang dari 1');
                $(this).val(1);
                return;
            }

            if (jumlah > 10000) {
                alert('Jumlah tidak boleh lebih dari 10.000');
                $(this).val(10000);
                return;
            }

            $.post(`{{ url('/pembelian_detail') }}/${id}`, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'put',
                'jumlah': jumlah,
            })
                .done(response => {
                    $(this).on('mouseout', function () {
                        table.ajax.reload(() => loadForm($('#diskon').val()));
                    });                
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
        });

        $(document).on('input', '#diskon', function () {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }

            loadForm($(this).val());
        });

        $('.btn-simpan').on('click', function () {
            $('.form-pembelian').submit();
        });
    });

	function tampilSparepart() {
		$('#modal-sparepart').modal('show');
	}

	function hideSparepart() {
		$('#modal-sparepart').modal('hide');
	}
     
    function pilihSparepart(id, kode) {
        $('#sparepart_id').val(id);
        $('#kode_part').val(kode);
        hideSparepart();
        tambahSparepart(); 
    }

    function tambahSparepart() {
        $.post('{{ route('pembelian_detail.store') }}', $('.form-sparepart').serialize())
            .done(response => {
                $('#kode_part').focus();
                table.ajax.reload(() => loadForm($('#diskon').val()));
            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data?')) {
            $.post(url, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'delete',
            })
                .done((response) => {
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

    function loadForm(diskon = 0) {
        $('#total').val($('.total').text());
        $('#total_item').val($('.total_item').text());

        $.get(`{{ url('/pembelian_detail/loadform') }}/${diskon}/${$('.total').text()}`)
            .done(response => {
                $('#totalrp').val('Rp. '+ response.totalrp);
                $('#bayarrp').val('Rp. '+ response.bayarrp);
                $('#bayar').val(response.bayar);
                $('.tampil-bayar').text('Rp. '+ response.bayarrp);
                $('.tampil-terbilang').text(response.terbilang);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
</script>
@endpush