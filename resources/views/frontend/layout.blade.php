<!DOCTYPE html>
<html lang="" dir="rtl">

  <head>
    {{-- required meta tags --}}
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- csrf-token for ajax request --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- title --}}
    <title>@yield('pageHeading') {{ '| ' . $websiteInfo->website_title }}</title>

    <meta name="keywords" content="@yield('metaKeywords')">
    <meta name="description" content="@yield('metaDescription')">
    <meta name="theme-color" content="{{ $basicInfo->primary_color }}" />

    {{-- fav icon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/' . $websiteInfo->favicon) }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/' . $websiteInfo->favicon) }}">

    {{-- include styles --}}
    @includeIf('frontend.partials.styles')
    <link rel="manifest" crossorigin="use-credentials" href="{{ asset('manifest.json') }}" />
    {{-- additional style --}}
    @yield('style')
  </head>

  <body>
    @yield('content')
    {{-- floating whatsapp button --}}
    @if ($basicInfo->whatsapp_status == 1 && $basicInfo->tawkto_status == 0)
    <div class="whatsapp-btn"></div>
    @endif

    {{-- tawk.to button --}}
    @if ($basicInfo->whatsapp_status == 0 && $basicInfo->tawkto_status == 1)
    @php
    $directLink = str_replace('tawk.to', 'embed.tawk.to', $basicInfo->tawkto_direct_chat_link);
    $directLink = str_replace('chat/', '', $directLink);
    @endphp

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
      "use strict";

            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();

            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = '{{ $directLink }}';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
    </script>
    <!--End of Tawk.to Script-->
    @endif
    @includeIf('frontend.partials.scripts')
    {{-- additional script --}}
    @yield('script')
  </body>

</html>
