@extends('layouts.admin')

@section('header')
  <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/select2-bootstrap/select2-bootstrap4.min.css') }}" />

  <style>
    .form-label-modal label {
      width: 100%;
      display: flex;
      align-items: center;
      margin: 1rem 0;
      padding: .5rem .75rem;
      border: 1px solid #eee;
      border-radius: .5rem;
      cursor: pointer;
      transition: all .2s;
    }

    .form-label-modal label>div {
      margin-left: .5rem;
    }

    .form-label-modal label:hover {
      background: rgba(49, 113, 224, .10) !important;
      border-color: #3171e0;
    }

    .form-label-modal input {
      display: none;
    }

    .form-label-modal input:checked~label {
      background: #3171e0;
      color: white;
    }

    .form-label-modal input:checked~label * {
      color: white !important;
    }

    .form-label-modal label:hover *,
    .form-label-modal input:checked~label:hover * {
      color: #3171e0 !important;
    }
  </style>
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

    <div class="col-xl-8 mx-auto">

      <form method="POST" action="{{ route('outlet.store') }}" id="data-add" class="card">
        @csrf

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
            <input type="hidden" name="owner" />
            <button type="button" class="form-control text-left user-form" data-toggle="modal" data-target="#userSearch">Cari pengguna</button>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="alamat_provinsi">Provinsi</label>
                <select name="alamat_provinsi" class="form-control" id="alamat_provinsi">
                  <option selected disabled="disabled">Pilih Provinsi</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="alamat_kabupaten">Kabupaten/Kota</label>
                <select name="alamat_kabupaten" class="form-control" id="alamat_kabupaten">
                  <option selected disabled="disabled">Pilih Provinsi Dulu</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="alamat_kecamatan">Kecamatan/Kapenewon</label>
                <select name="alamat_kecamatan" class="form-control" id="alamat_kecamatan">
                  <option selected disabled="disabled">Pilih Kabupaten Dulu</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="alamat_kelurahan">Alamat Kelurahan/Kalurahan/Desa</label>
              <select name="alamat_kelurahan" class="form-control" id="alamat_kelurahan">
                <option selected disabled="disabled">Pilih Kecamatan/Kapenewon Dulu</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="alamat_jalan">Alamat Jalan</label>
              <input type="text" name="alamat_jalan" id="alamat_jalan" class="form-control" placeholder="Masukkan alamat jalan" />
            </div>
          </div>

        </div>
        <div class="card-footer bg-white border-0 mt-n4">
          <div class="d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="keep" value="true" name="keep" />
              <label class="custom-control-label" for="keep">Tetap disini</label>
            </div>
            <button type="submit" class="btn btn-success">Tambahkan</button>
          </div>
        </div>
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

        <form action="{{ route('outlet.user-lists') }}" id="search-form" method="post">
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
                <input type="radio" id="fullname" checked name="type" class="custom-control-input" value="fullname" />
                <label class="custom-control-label" for="fullname">Nama lengkap</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="username" name="type" class="custom-control-input" value="username" />
                <label class="custom-control-label" for="username">Nama pengguna</label>
              </div>
            </div>
          </div>
        </form>

        <div class="search-wrapper"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <button type="button" data-trigger="select-user" class="btn btn-primary">Pilih</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
  <script src="{{ asset('vendor/select2/js/select2.js') }}"></script>

  <script>
    /** ==================== Ajax User Data ==================== **/
    function ajaxUser(data) {
      $.ajax({
        url:  "{{ route('outlet.user-lists') }}",
        data: data,
        type: "POST",

        beforeSend() {},
        success(respond) {
          let html = "";
          respond.data.forEach((b) => {
            html += `<div class="form-label-modal">
              <input name="user" value="${b.username}" data-fullname="${b.fullname}" data-username="${b.username}" id="${b.username}" type="radio" />
              <label for="${b.username}">
                <img src="${ '{{ url('/') }}/uploads/' + b.foto }" height="50px" class="mr-2 rounded" />
                <div>
                  <h4>${b.fullname}</h4>
                  <span class="text-muted">${(b.roles[0].name == 'admin') ? 'Administrator' : 'Penjaga Toko'}</span>
                </div>
              </label>
            </div>`
          });

          $('.search-wrapper').html(html);
        },
        error(respond) { console.log(respond); },
      });
    }

    /** ==================== Search User Data ==================== */
    $('form#search-form').submit(function(e) {
      e.preventDefault();

      let those = $(this);
      let form  = those.serialize();

      ajaxUser(form);
    });

    /* ================== Select user ================ */
    $('[data-trigger="select-user"]').click(function() {
      $('#userSearch').modal('hide');
      let username = $('.search-wrapper input:checked').data('username');
      let fullname = $('.search-wrapper input:checked').data('fullname');
      $('[name="owner"]').val(username);
      $('.user-form').text(fullname);

      $('.search-wrapper').html('');
      $('#search-form input[name=search]').val('');
      $('#search-form input[name=type]').val('fullname');
    });

    /* ================= Get Province =============== */
    $('#alamat_provinsi, #alamat_kabupaten, #alamat_kecamatan, #alamat_kelurahan').select2({
      theme: 'bootstrap4',
        placeholder: 'Pilih',
    });
    $('#alamat_provinsi').select2({
      theme: 'bootstrap4',
      ajax: {
        url: '{{ route("api.provinsi") }}',
        data: function (params) {
          var query = {
            search: params.term,
          }
          return query;
        },

        processResults: function (data) {
          return {
            results: $.map(data.data, function (item) {
              return {
                text: item.name,
                id: item.id,
              }
            })
          };
        }
      }
    });

    /* ================= Get Kabupaten =============== */
    $('#alamat_provinsi').on('select2:select', function() {
      $("#alamat_kabupaten").empty().trigger('change')
      $("#alamat_kecamatan").empty().trigger('change')
      $("#alamat_kelurahan").empty().trigger('change')

      $('#alamat_kabupaten').select2({
        theme: 'bootstrap4',
        ajax: {
          url: '{{ url("/api/wilayah/kabupaten") }}/' + $(this).val(),
          data: function (params) {
            var query = {
              search: params.term,
            }
            return query;
          },

          processResults: function (data) {
            return {
              results: $.map(data.data, function (item) {
                return {
                  text: item.name,
                  id: item.id,
                }
              })
            };
          }
        }
      });
    });

    /* ================= Get Kecamatan =============== */
    $('#alamat_kabupaten').on('select2:select', function() {
      $("#alamat_kecamatan").empty().trigger('change')
      $("#alamat_kelurahan").empty().trigger('change')

      $('#alamat_kecamatan').select2({
        theme: 'bootstrap4',
        ajax: {
          url: '{{ url("/api/wilayah/kecamatan") }}/' + $(this).val(),
          data: function (params) {
            var query = {
              search: params.term,
            }
            return query;
          },

          processResults: function (data) {
            return {
              results: $.map(data.data, function (item) {
                return {
                  text: item.name,
                  id: item.id,
                }
              })
            };
          }
        }
      });
    });

    /* ================= Get Kelurahan =============== */
    $('#alamat_kecamatan').on('select2:select', function() {
      $("#alamat_kelurahan").empty().trigger('change')

      $('#alamat_kelurahan').select2({
        theme: 'bootstrap4',
        ajax: {
          url: '{{ url("/api/wilayah/kelurahan") }}/' + $(this).val(),
          data: function (params) {
            var query = {
              search: params.term,
            }
            return query;
          },

          processResults: function (data) {
            return {
              results: $.map(data.data, function (item) {
                return {
                  text: item.name,
                  id: item.id,
                }
              })
            };
          }
        }
      });
    });

    /* ================= Ajax Submit Data =============== */
    $('#data-add').submit(function(e) {
      e.preventDefault();

      let those = $(this);
      let data  = those.serialize();

      $.ajax({
        url: those.attr('action'),
        type: those.attr('method'),
        data: data,

        beforeSend() {
          Swal.fire({
            icon: 'info',
            title: 'Memuat',
            html: 'Sistem sedang memuat permintaan anda, mohon tunggu sebentar.',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen() {
              Swal.showLoading();
            },
          });
        },

        success(response) {
          Swal.fire({
            title: response.title,
            text: response.message,
            icon: 'success',
            allowOutsideClick: false,
            showConfirmButton: response.redirect !== null ? false : true,
          });

          if(response.redirect !== null) {
            setTimeout(() => {
              window.location.href = response.redirect;
            }, 5000);
          }
        },

        error(res) {
          let response = res;
          Swal.fire({
            title: response.title,
            text: response.message,
            icon: 'error',
            allowOutsideClick: false,
          });
        },
      });
    });
  </script>
@endsection
