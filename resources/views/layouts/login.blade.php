<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>{!! empty($title) ? config('app.name') : $title !!}</title>

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />

  @yield('header')
</head>
<body class="bg-lighter">

  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
      <div class="col-md-5">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Main JS -->
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('footer')
</body>
</html>
