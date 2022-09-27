@extends('layouts.master')

@section('title')
Transaksi Penjualan
@endsection

@push('css')
<style>
    .tampil-bayar {
        font-size: 4em;
        text-align: center;
        height: 100px;                        
    }

    .tampil-terbilang {
        padding: 10px;
        background: #f0f0f0;
    }

    .table-penjualan tbody tr:last-child {
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
<li class="breadcrumb-item active">Transaksi Penjualan</li>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <form class="form-sparepart">
                        @csrf
                        <div class="form-group row">
                            <label for="kode_part" class="col-md-2  col-form-label">Kode Part</label>
                            <div class="col-md-5">
                                <div class="input-group">                            
                                    <input type="hidden" name="penjualan_id" id="penjualan_id" value="{{ $penjualan_id }}">
                                    <input type="hidden" name="sparepart_id" id="sparepart_id">
                                    <input type="text" class="form-control" name="kode_part" id="kode_part">
                                    <div class="input-group-prepend">
                                        <button onclick="tampilSparepart()" class="btn btn-outline-info" type="button"><i class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table class="table table-stiped table-bordered table-penjualan">
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
                            <form action="{{ route('transaksi.simpan') }}" class="form-penjualan" method="post">
                                @csrf
                                <input type="hidden" name="penjualan_id" value="{{ $penjualan_id }}">
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
                                        <input type="number" name="diskon" id="diskon" class="form-control" value="{{ $penjualan->diskon }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bayar" class="col-md-4 control-label col-form-label">Bayar</label>
                                    <div class="col-md-8">
                                        <input type="text" id="bayarrp" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="diterima" class="col-md-4 control-label col-form-label">Diterima</label>
                                    <div class="col-md-8">
                                        <input type="number" name="diterima" id="diterima" class="form-control" value="{{ $penjualan->diterima }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kembali" class="col-md-4 control-label col-form-label">Kembali</label>
                                    <div class="col-md-8">
                                        <input type="text" id="kembali" name="kembali" class="form-control" value="0" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btnsm bg-gradient-primary float-right btn-simpan">Simpan Transaksi</button>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

@includeIf('penjualan_detail.sparepart')
@endsection

@push('scripts')
<script>
    let table, table2;

    $(function () {
        $('body').addClass('sidebar-collapse');

        table = $('.table-penjualan').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('transaksi.data', $penjualan_id) }}',
            },
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'kode_part'},
                {data: 'nama_part'},
                {data: 'harga'},
                {data: 'jumlah'},
                {data: 'subtotal'},
                {data: 'aksi', searchable: false, sortable: false},
            ],
            dom: 'Brt',
            bSort: false,
        })
        .on('draw.dt', function () {
            loadForm($('#diskon').val());
            setTimeout(() => {
                $('#diterima').trigger('input');
            }, 300);
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

            $.post(`{{ url('/transaksi') }}/${id}`, {
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

        $('#diterima').on('input', function() {
            if($(this).val() == "") {
                $(this).val(0).select();
            }

            loadForm($('#diskon').val(), $(this).val());
        }).focus(function () {
            $(this).select();
        });

        $('.btn-simpan').on('click', function () {
            $('.form-penjualan').submit();
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
        $.post('{{ route('transaksi.store') }}', $('.form-sparepart').serialize())
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

    function loadForm(diskon = 0, diterima = 0) {
        $('#total').val($('.total').text());
        $('#total_item').val($('.total_item').text());

        $.get(`{{ url('/transaksi/loadform') }}/${diskon}/${$('.total').text()}/${diterima}`)
            .done(response => {
                $('#totalrp').val('Rp. '+ response.totalrp);
                $('#bayarrp').val('Rp. '+ response.bayarrp);
                $('#bayar').val(response.bayar);
                $('.tampil-bayar').text('Bayar: Rp. '+ response.bayarrp);
                $('.tampil-terbilang').text(response.terbilang);

                $('#kembali').val('Rp. '+ response.kembalirp);
                if($('#diterima').val() != 0){
                    $('.tampil-bayar').text('Kembali: Rp. '+ response.kembalirp);
                    $('.tampil-terbilang').text(response.kembali_terbilang);
                }
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
</script>
@endpush