<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="msapplication-TileColor" content="#1F2937" />
  <meta name="theme-color" content="#1F2937" />

  <!-- Primary Meta Tags -->
  <title>{!! !empty($title) ? $title : config('app.name') !!}</title>
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" type="image/x-icon" />

  <!-- Main CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&family=Outfit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
  <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet" />

  <!-- Addons -->
  <link type="text/css" href="{{ asset('vendor/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('assets/img/favicon/apple-touch-icon-57x57.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/img/favicon/apple-touch-icon-114x114.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/img/favicon/apple-touch-icon-72x72.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/img/favicon/apple-touch-icon-144x144.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('assets/img/favicon/apple-touch-icon-60x60.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('assets/img/favicon/apple-touch-icon-120x120.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('assets/img/favicon/apple-touch-icon-76x76.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('assets/img/favicon/apple-touch-icon-152x152.png') }}" />
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon/favicon-196x196.png') }}" sizes="196x196" />
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon/favicon-96x96.png') }}" sizes="96x96" />
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}" sizes="16x16" />
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon/favicon-128.png') }}" sizes="128x128" />
  <meta name="application-name" content="&nbsp;"/>
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicon/mstile-144x144.png') }}" />
  <meta name="msapplication-square70x70logo" content="{{ asset('assets/img/favicon/mstile-70x70.png') }}" />
  <meta name="msapplication-square150x150logo" content="{{ asset('assets/img/favicon/mstile-150x150.png') }}" />
  <meta name="msapplication-wide310x150logo" content="{{ asset('assets/img/favicon/mstile-310x150.png') }}" />
  <meta name="msapplication-square310x310logo" content="{{ asset('assets/img/favicon/mstile-310x310.png') }}" />

  <!-- Header Addons -->
  @yield('header')
</head>
<body>

  <!-- Content Wrapper -->
  <div id="app-wrapper" data-sidebar="dark">

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" data-trigger="sidebar-toggler"></div>
    <!-- Sidebar Overlay -->

    <!-- Sidebar Wrapper -->
    @include('layouts.admin.admin')
    <!-- Sidebar Wrapper -->

    <!-- Main Container -->
    <main id="content-wrapper">

      <div id="content-top">
        <!-- Navbar -->
        @include('layouts.admin.navbar')
        <!-- Navbar -->

        <div id="content-main" class="container-fluid">

          @yield('content')

        </div>
      </div>

      <!-- Footer -->
      <footer class="footer mt-5">
        <div class="container">
          <span class="copyright">Hak Cipta 2021 - {{ date('Y') }}, <a href="{{ url('/') }}">Garuda Admin Kit</a>, oleh <a href="https://www.dasakreativa.web.id">Dasa Kreativa Studio</a>.</span>
        </div>
      </footer>

    </main>
    <!-- Main Container -->

  </div>
  <!-- Content Wrapper -->

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('vendor/simplebar/dist/simplebar.min.js') }}"></script>
  @yield('footer')
</body>
</html>
