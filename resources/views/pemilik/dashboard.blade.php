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
        <hr class="my-4">
        <p>Selamat Datang di Eaaa Motorshop</p>
      </div>
</div> <!-- /.container-fluid -->
@endsection