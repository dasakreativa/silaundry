<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>

<body class="bg-lighter">

  <div class="row min-vh-100 w-100 align-items-center justify-content-center">
    <div class="col-md-4 text-center">
      <div class="title d-flex flex-column">
        <img src="@yield('image')" alt="@yield('title')" class="w-75 mx-auto" />
        <h3>@yield('title')</h3>
        <p>@yield('message')</p>

        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left mr-2"></i>{{ __('error.button.back') }}</a>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
