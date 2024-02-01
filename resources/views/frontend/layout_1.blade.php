<!DOCTYPE html>
<html>

  <head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Demo Startup Agency | Porto - Responsive HTML5 Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    @include('frontend.partials.style_1')
  </head>

  <body data-plugin-scroll-spy data-plugin-options="{'target': '#header'}">
    @yield('contents')

    @include('frontend.partials.script_1')
  </body>

</html>
