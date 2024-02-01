<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Cyplfx </title>
    <meta charset="utf-8">
    <link type="image/x-icon" href="fav.jpg" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- csrf-token for ajax request --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('frontend.partials.login_register_style')
    <style>
      .modal-body {
        padding: 0rem;
      }
    </style>
    @yield('css')
  </head>
  <body class="signup-pg">
    @yield('contents')
    @include('frontend.partials.login_register_script')
    @yield('js')
  </body>

</html>
