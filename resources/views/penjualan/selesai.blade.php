@extends('layouts.master')

@section('title')
Daftar Penjualan
@endsection

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
                <div class="card-body table-responsive">
                    <div class="alert alert-success alert-dismissible">
                        <i class="icon far fa-check"></i>
                        Transaksi Baru disimpan.
                    </div>
                </div>
                <div class="card-footer">
                    {{-- <button class="btn btn-sm bg-gradient-warning" onclick="notaBesar('{{ route('transaksi.nota_besar') }}', 'Nota PDF')">Cetak Ulang Nota</button> --}}
                    <a href="{{ route('transaksi.nota_besar') }}" target="_blank" class="btn btn-sm bg-gradient-success">Cetak Nota</a>
                    <a href="{{ route('transaksi.baru') }}" class="btn btn-sm bg-gradient-primary">Transaksi Baru</a>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

@endsection

@push('scripts')
<script>
    function notaBesar(url, title) {
        popupCenter(url, title, 720, 675);
    }

    function popupCenter({url, title, w, h}) {
        const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
        const dualScreenTop  = window.screenTop  !==  undefined ? window.screenTop  : window.screenY;

        const width  = window.innerWidth  ? window.innerWidth  : document.documentElement.clientWidth  ? document.documentElement.clientWidth  : screen.width;
        const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        const systemZoom = width / window.screen.availWidth;
        const left       = (width - w) / 2 / systemZoom + dualScreenLeft
        const top        = (height - h) / 2 / systemZoom + dualScreenTop
        const newWindow  = window.open(url, title, 
        `
            scrollbars= yes,
            width   = ${w / systemZoom}, 
            height  = ${h / systemZoom}, 
            top     = ${top}, 
            left    = ${left}
        `
        )

        if (window.focus) newWindow.focus();
    }
</script>
@endpush