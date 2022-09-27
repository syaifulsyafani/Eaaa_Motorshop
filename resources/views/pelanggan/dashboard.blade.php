@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Halo, {{ auth()->user()->name }}</h1>
        <p class="lead">Selamat datang di Eaaa Motorshop, sebuah tempat dimana kamu dapat melakukan modifikasi terbaik untuk kendaraan kesayanganmu.</p>
        <hr class="my-4">
        <p>Klik tombol di bawah ini untuk membuat perjanjian layanan Kustomisasi, Repaint, dan Restorasi.</p>
        <a class="btn bg-gradient-primary" href="{{ route('reservasi.new') }}" role="button">Buat Perjanjian</a>
      </div>
</div> <!-- /.container-fluid -->
@endsection