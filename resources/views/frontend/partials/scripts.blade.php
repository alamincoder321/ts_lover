<script>
  'use strict';
  const baseURL = "{{ url('/') }}";
  const whatsappNumber = '{{ $basicInfo->whatsapp_number }}';
  const whatsappPopupMessage = `{!! $basicInfo->whatsapp_popup_message !!}`;
  const whatsappPopupStatus = {{ $basicInfo->whatsapp_popup_status }};
  const whatsappHeaderTitle = '{{ $basicInfo->whatsapp_header_title }}';
</script>
{{-- jQuery --}}
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
{{-- bootstrap js --}}
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
{{-- toastr js --}}
<script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
{{-- push-notification js --}}
<script type="text/javascript" src="{{ asset('assets/js/push-notification.js') }}"></script>

{{-- whatsapp js --}}
<script type="text/javascript" src="{{ asset('assets/js/floating-whatsapp.js') }}"></script>

{{-- main js --}}
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
{{---custom js-------}}
<script type="text/javascript" src="{{ asset('assets/front/js/custom.js') }}"></script>

<script src="{{ asset('assets/js/pwa.js') }}" defer></script>
@if (session()->has('success'))
<script>
  'use strict';
    toastr['success']("{{ __(session('success')) }}");
</script>
@endif

@if (session()->has('error'))
<script>
  'use strict';
    toastr['error']("{{ __(session('error')) }}");
</script>
@endif

@if (session()->has('warning'))
<script>
  'use strict';
    toastr['warning']("{{ __(session('warning')) }}");
</script>
@endif
