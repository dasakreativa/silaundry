@extends('layouts.admin')

@section('header')
  <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}" />
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="my-4 d-flex align-items-center justify-content-between">
      <div class="left">
        <h3>Tambah Outlet</h3>
        <p class="m-0 text-muted">Tambah daftar outlet.</p>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dasbor</li>
        </ol>
      </nav>
    </div>

    <div class="col-md-6 mx-auto">

      <form method="POST" action="#" class="card border-0 shadow">
        <div class="card-header bg-white">
          <h3 class="m-0">Tambah Data</h3>
        </div>
        <div class="card-body">

          <div class="form-group">
            <label for="name">Nama Outlet</label>
            <input type="text" class="form-control" placeholder="Masukkan nama outlet" name="name" name="name" />
          </div>

          <div class="form-group">
            <label for="owner">Pemegang</label>
            <button type="button" class="form-control text-left" data-toggle="modal" data-target="#userSearch">Cari pengguna</button>
          </div>

        </div>
        <div class="card-footer bg-white border-0"></div>
      </form>

    </div>
  </div>
</div>

<!-- Modal Add User -->
<div class="modal fade" id="userSearch" tabindex="-1" aria-labelledby="userSearchLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userSearchLabel">Cari Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('outlet.user-lists') }}" method="post">
          <div class="form-group">
            <label for="search">Pencarian</label>
            <div class="input-group">
              <input type="text" class="form-control" id="search" placeholder="Cari pengguna" name="search" />
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-search"></i></button>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Cari Berdasarkan</label>
            <div class="d-flex">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="username" name="type" class="custom-control-input" value="username" />
                <label class="custom-control-label" for="username">Nama lengkap</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="fillname" name="type" class="custom-control-input" value="fullname" />
                <label class="custom-control-label" for="fillname">Nama pengguna</label>
              </div>
            </div>
          </div>
        </form>

        <div class="search-wrapper"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Pilih</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
  <script src="{{ asset('vendor/select2/js/select2.js') }}"></script>

  <script>
    function parseTarget(a, b) {
      $(a).append(`<div class="form-group">
        <label for="${b.username}">
          <input name="user" value="${b.username}" id="${b.username}" type="radio" />
          <div class="d-flex">
            <img src="${ '{{ url('/') }}/uploads/' + b.foto }" height="50px" class="mr-2 rounded" />
            <div>
              <h4>${b.fullname}</h4>
              <span class="text-muted">${(b.roles[0].name == 'admin') ? 'Administrator' : 'Penjaga Toko'}</span>
            </div>
          </div>
        </label>
      </div>`);
    }

    function ajaxUser(data) {
      $.ajax({
        url:  "{{ route('outlet.user-lists') }}",
        data: data ? {search: data} : {},
        type: "POST",

        beforeSend() {},
        success(respond) {
          respond.data.forEach((a) => {
            parseTarget('.search-wrapper', a);
          });
        },
        error(respond) { console.log(respond); },
      });
    }

    ajaxUser();
  </script>
@endsection
