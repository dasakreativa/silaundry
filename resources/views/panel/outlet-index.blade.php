@extends('layouts.admin')

@section('header')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="{{ asset('css/crud.css') }}" />
@endsection

@section('content')
  <div class="my-4 d-flex align-items-center justify-content-between">
    <div class="left">
      <h3>Semua Outlet</h3>
      <p class="m-0 text-muted">Semua daftar outlet yang dimiliki.</p>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dasbor</li>
      </ol>
    </nav>
  </div>

  <div class="card border-0 shadow">
    <div class="card-header border-0 bg-white d-flex justify-content-end">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">Aksi</button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="javascript:void()">Muat Ulang Data</a>
          <a class="dropdown-item" href="{{ route('outlet.create') }}">Tambahkan Data Baru</a>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead>
          <tr>
            <th>Nama Outlet</th>
            <th>Pemegang</th>
            <th>Dibuat Pada</th>
            <th>Alamat Lengkap</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="card-footer border-0 bg-white">Hello world</div>
  </div>
@endsection

@section('footer')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

<script>
  $('.table').dataTable();
</script>
@endsection
