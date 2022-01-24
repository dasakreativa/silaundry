<li class="nav-item dropdown userinfo">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
    <div class="info-left mr-2">
      <div class="name">Halo Amir Zuhdi Wibowo</div>
    </div>
    <img class="info-img" width="30px" height="30px" src="https://www.gravatar.com/avatar/94d093eda664addd6e450d7e9881bcad?s=32&d=identicon&r=PG" alt="The User" />
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <div class="dropdown-header">
      <img src="https://www.gravatar.com/avatar/94d093eda664addd6e450d7e9881bcad?s=32&d=identicon&r=PG" alt="The User" />
      <div class="user-wrap">
        <h3>The User</h3>
        <p>Roles</p>
      </div>
    </div>

    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item logout" href="{{ route('logout') }}">Keluar</a>
  </div>
</li>

@section('footer')
<script>
  $('.logout').click(function(e) {
    e.preventDefault();
    Swal.fire('Test');
  });
</script>
@endsection
