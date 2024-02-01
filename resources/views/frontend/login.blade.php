@extends('frontend.login_register_layout')
@section('contents')
<div class="login-box">
  <div class="ribbon-wrapper">
    <div class="glow">�&nbsp;</div>
    <div class="ribbon-front">
      <a href="" class="form_logo">
        <img src="images/logo.png" class="img-fluid" alt="Logo">
      </a>
    </div>
    <div class="ribbon-edge-topleft"></div>
    <div class="ribbon-edge-topright"></div>
    <div class="ribbon-edge-bottomleft"></div>
    <div class="ribbon-edge-bottomright"></div>
  </div>
  <form action="{{ route('user.login_submit') }}" method="post" id="formData">
    @csrf
    <div id="loginsection">
      <div class="text-white">
        <h2>Log In</h2>
        <p>Login to continue in your CypLfx account </p>
      </div>
      <div class="user-box">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
          <div class="form-floating">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required" id="txtbankerlogin">
            <label for="txtbankerlogin">Username</label>
          </div>
        </div>
        @error('username')
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="user-box">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
          <div class="form-floating">
            <span class="show-password  fa fa-eye"></span>
            <input type="password" class="form-control" name="password" placeholder="Password" required="required" id="txtpasswordbanker">
            <label for="txtpasswordbanker">Password</label>
          </div>

        </div>
      </div>
      @error('password')
      <p class="text-danger mt-2">{{ $message }}</p>
      @enderror
      <div class="">
        <a href="javascript:void(0)" class="switcher-text3 text-white" id="fpsec">Forgot Password</a>
      </div>
      <div class="row">
        <div class="col-6">
          <a href="javascript:void(0)" id="btnbankerloginbefor" class="btn-login w-100">
            Login
          </a>
        </div>
        <div class="col-6">
          <a href="{{ route('user.signup') }}" class="btn-login w-100">
            Register
          </a>
        </div>
      </div>
    </div>
  </form>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:330px">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <div class="slidercaptcha card">
            <div class="card-header">
              <span>Security Verification</span>
            </div>
            <div class="card-body">
              <div id="captchad"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--- sequirty model--->
@endsection
@section('js')
<script src="{{ asset('/assets/login_registration/slidercaptcha')}}/longbow.slidercaptcha.min.js"></script>
<script>
  $(function() {
    $('.show-password').click(function() {
      if ($(this).hasClass('fa-eye')) {
        $(this).removeClass('fa-eye');
        $(this).addClass('fa-eye-slash');
        $('#txtpasswordbanker').attr('type', 'text');
      } else {
        $(this).removeClass('fa-eye-slash');
        $(this).addClass('fa-eye');
        $('#txtpasswordbanker').attr('type', 'password');
      }
    });
  });
</script>

<script>
  $('#btnbankerloginbefor').click(function() {
    if ($('#txtbankerlogin').val() == "") {
      $('#txtbankerlogin').focus();
      $('#txtbankerlogin').parent('div').find('.reqiured-br').show()
      $.iaoAlert({
        msg: "Kindly enter User Id",
        type: "error",
        mode: "dark",
      })
      ValidationFlag = 0;
      return false;
    }
    if ($('#txtpasswordbanker').val() == "") {
      $('#txtpasswordbanker').parent('div').find('.reqiured-br').show()
      $('#txtpasswordbanker').focus();
      $.iaoAlert({
        msg: "Kindly enter Password",
        type: "error",
        mode: "dark",
      })
      ValidationFlag = 0;
      return false;
    }
    $('#myModal').modal('show')
  })

  var captcha = sliderCaptcha({
    id: 'captchad',
    repeatIcon: 'fa fa-redo',
    onSuccess: function() {
      $('#myModal').modal('hide')
      $('#formData').submit()
      var handler = setTimeout(function() {
        window.clearTimeout(handler);
        captcha.reset();
      }, 500);
    }
  });
</script>
@endsection