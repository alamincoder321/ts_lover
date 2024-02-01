<script src="{{ asset('/assets/login_registration/js/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/login_registration/js/popper.min.js') }}"></script>
<script src="{{ asset('/assets/login_registration/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/login_registration/js/MyCustomJS.js') }}"></script>
<script src="{{ asset('/assets/login_registration/js/iao-alert.jquery.js') }}"></script>
{{-- toastr js --}}
<script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
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
