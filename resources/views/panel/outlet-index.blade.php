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

  <div class="card">
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
      <table class="w-100 table table-striped mb-0" id="outlet-list">
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
  </div>
@endsection

@section('footer')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js" integrity="sha512-he8U4ic6kf3kustvJfiERUpojM8barHoz0WYpAUDWQVn61efpm3aVAD8RWL8OloaDDzMZ1gZiubF9OSdYBqHfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $('#outlet-list').dataTable({
    ajax: "{{ route('outlet.data') }}",
    processing: true,
    serverSide: true,
    lengthMenu: [30, 50, 100, 200, 500],
    columns : [
      { data: 'name' },
      {
        data: 'owner',
        render(a, b, c) {
          return `<div class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <a href="{{ url("/panel/user") }}/${a}">${c.owner_name}</a>`;
        }
      },
      {
        data: 'created_at',
        render(a, b, c) {
          return moment(a).format('LLLL');
        }
      },
      {
        data: 'name',
        render(a, b, c) {
          return `${c.alamat_jalan !== '' ? c.alamat_jalan + ', ' : '' }${c.alamat_kelurahan}, ${c.alamat_kecamatan}, ${c.alamat_kabupaten}, ${c.alamat_provinsi}`;
        }
      },
      {
        data: 'id',
        render(a, b, c) {
          return '';
        }
      },
    ],
  });
</script>
@endsection
