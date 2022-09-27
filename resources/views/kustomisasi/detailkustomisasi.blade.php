<!-- calling view template master -->
@extends('layouts.master')

<!-- page content -->
@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-primary" style="padding-bottom: 10px;">Detail Kustomisasi</h1>

	<!-- DataTales Example -->	
	<div class="row">
			<div class="col-6">
				<div class="card shadow mb-4">
					<div class="card-body">
						<form style="height: 130px;">
							<div class="table-responsive">
								<table>
									<tr>
										<th width="80px">Kode</th>
										<th width="10px">:</th>
										<td>KUS-0001</td>
									</tr>
									<tr>
										<th>Nama</th>
										<th>:</th>
										<td>Syaiful</td>
									</tr>
									<tr>
										<th>Telp</th>
										<th>:</th>
										<td>0812738494738</td>
									</tr>
									<tr>
										<th>Alamat</th>
										<th>:</th>
										<td>Jl. jadi</td>
									</tr>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-6">
				<div class="card shadow mb-4">
					<div class="card-body">
						<form style="height: 130px;">
							<div class="table-responsive">
								<table>
									<tr>
										<th width="120px">Tgl. Masuk</th>
										<th width="10px">:</th>
										<td>Jumat, 11 Maret 2022</td>
									</tr>
									<tr>
										<th>Tgl. Keluar</th>
										<th>:</th>
										<td>Jumat, 25 Maret 2022</td>
									</tr>
									<tr>
										<th>Service</th>
										<th>:</th>
										<td>Repaint</td>
									</tr>
									<tr>
										<th>Status</th>
										<th>:</th>
										<td>Pending</td>
									</tr>
									<tr>
										<th>Keterangan</th>
										<th>:</th>
										<td>Warna Deep Black</td>
									</tr>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="card shadow mb-4">
					<div class="card-body">
						<form>
							<div class="table-responsive">
								<table class="table table-borderless text-center" id="dataTable" width="100%" cellspacing="0">
									<thead class="table-primary">
										<tr>
											<th>Nomor Polisi</th>
											<th>Merk</th>
											<th>Type</th>
											<th>Tahun</th>
											<th>Warna</th>
											<th>Nomor Rangka</th>
											<th>Nomor Mesin</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>B 1234 ABC</td>
											<td>Honda</td>
											<td>Vario 150</td>
											<td>2021</td>
											<td>Hitam</td>
											<td>isdu2b83y47ys</td>
											<td>wye73y3vywfr</td>						
										</tr>
									</tbody>
								</table>
							</div>

							<a style="float: right; width: 80px;" class="btn btn-sm btn-danger" href="#" role="button">Delete</a>
							<a style="float: right; margin-right: 6px; width: 60px;" class="btn btn-sm btn-warning" href="#" role="button">Edit</a>
							<a style="float: right; margin-right: 6px; width: 80px;" class="btn btn-sm btn-primary" href="#" role="button">Kembali</a>
							
						</form>
					</div>
				</div>
			</div>
	</div>

</div>
@endsection