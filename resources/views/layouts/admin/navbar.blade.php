<nav class="navbar navbar-expand navbar-light" id="admin-navbar">
  <div class="container-fluid">
    <button class="btn btn-toggler d-lg-none" data-trigger="sidebar-toggler"><i class="fa-solid fa-bars"></i></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        @include('layouts.admin.navbar-lmenu')
      </ul>
      <ul class="navbar-nav ml-auto">
        @include('layouts.admin.navbar-rmenu')
      </ul>
    </div>
  </div>
</nav>
