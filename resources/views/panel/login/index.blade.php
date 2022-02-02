@extends('layouts.login')

@section('content')
<div class="card card-body">
  <div class="text-center text-md-center mb-4 mt-md-0">
    <img src="{{ asset('assets/img/brand/icon-dark-xxxhdpi.png') }}" alt="Logo SiLaundry" class="mx-auto mb-4 d-block" height="75px" />

    <h3>{{ __('login.heading') }}</h3>
    <p class="mb-0">{{ __('login.description') }}</p>
  </div>

  <form action="{{ route('login.process') }}" method="post" id="form-login">
    @csrf

    <div class="form-group">
      <label for="username">{{ __('login.username.label') }}</label>
      <input type="text" name="username" class="form-control" id="username" placeholder="{{ __('login.username.placeholder') }}" />
    </div>

    <div class="form-group">
      <label for="password">{{ __('login.password.label') }}</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="{{ __('login.password.placeholder') }}" />
    </div>

    <div class="d-flex justify-content-between">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="remember" name="remember" value="true" />
        <label class="custom-control-label" for="remember">{{ __('login.remember.label') }}</label>
      </div>

      <a href="javascript:void()">{{ __('login.button.forgot') }}</a>
    </div>

    <div class="text-center d-flex flex-column mt-3">
      <button type="submit" class="btn btn-primary">{{ __('login.button.submit') }}</button>
      <a href="{{ route('register') }}" class="btn btn-link mt-3">{{ __('login.button.register') }}</a>
    </div>

  </form>
</div>
@endsection

@section('footer')
<script defer>
  $('form').submit(function(e) {
    e.preventDefault();

    let data = $(this).serialize();
    let form = $(this);

    $.ajax({
      url : form.attr('action'),
      type: 'POST',
      data: data,

      beforeSend() {
        Swal.fire({
          icon: 'info',
          title: '{{ __("login.modal.title") }}',
          html: '{{ __("login.modal.description") }}',
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
          showConfirmButton: false,
        });

        setTimeout(() => {
          window.location.href = response.return;
        }, 5000);
      },

      error(response) {
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
