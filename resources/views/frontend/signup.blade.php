@extends('frontend.login_register_layout')
@section('css')
<link href="{{ asset('/assets/login_registration/css/passtrength.css')}}" rel="stylesheet">
@endsection
@section('contents')
<div class="login-box">
  <div class="ribbon-wrapper">
    <div class="glow">�&nbsp;</div>
    <div class="ribbon-front">
      <a href="/login" class="form_logo">
        <img src="images/logo.png" class="img-fluid" alt="Logo">
      </a>
    </div>
    <div class="ribbon-edge-topleft"></div>
    <div class="ribbon-edge-topright"></div>
    <div class="ribbon-edge-bottomleft"></div>
    <div class="ribbon-edge-bottomright"></div>
  </div>
  <form action="{{ route('user.signup_submit') }}" method="post" id="formSubmit">
    @csrf
    <div>
      <div class="text-white">
        <h2>Register</h2>
        <p>Create an account</p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="user-box">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa-solid fa-users"></i></span>
              <div class="form-floating">
                <input type="text" id="txtsponsor" class="form-control" name="username" placeholder="Username" required="required" value="">
                <label for="txtsponsor">Username</label>
              </div>
            </div>
          </div>
          @error('username')
          <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <div class="user-box">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
              <div class="form-floating">
                <input type="email" class="form-control" id="txtemail" name="email" placeholder="Email Address" required="required">
                <label for="txtemail">Email Address</label>
              </div>
            </div>
          </div>
          @error('email')
          <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <div class="user-box">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
              <div class="form-floating">
                <input type="text" id="txtname" class="form-control" name="full_name" placeholder="Full Name" required="required">
                <label for="txtname">Full Name</label>
              </div>
            </div>
          </div>
          @error('full_name')
          <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <div class="user-box">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa-solid fa-users"></i></span>
              <div class="form-floating">
                <input type="text" id="" class="form-control" name="referral_id" placeholder="Referral Id" value="">
                <label for="">Referral Id</label>
              </div>
            </div>
          </div>
          @error('referral_id')
          <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <div class="user-box">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa-solid fa-globe"></i></span>
              <div class="form-floating">

                <select class="form-control" id="ddlcountry" name="country">
                  <option value="">Select Country</option>
                  <option value="1">Afghanistan</option>
                  <option value="2">Albania</option>
                  <option value="3">Algeria</option>
                  <option value="4">American Samoa</option>
                  <option value="6">Angola</option>
                  <option value="7">Anguilla</option>
                  <option value="8">Antigua And Barbuda</option>
                  <option value="9">Argentina</option>
                  <option value="10">Armenia</option>
                  <option value="11">Aruba</option>
                  <option value="12">Australia</option>
                  <option value="13">Austria</option>
                  <option value="14">Azerbaijan</option>
                  <option value="15">Bahamas</option>
                  <option value="16">Bahrain</option>
                  <option value="17">Bangladesh</option>
                  <option value="18">Barbados</option>
                  <option value="19">Belarus</option>
                  <option value="20">Belgium</option>
                  <option value="21">Belize</option>
                  <option value="22">Benin</option>
                  <option value="23">Bermuda</option>
                  <option value="24">Bhutan</option>
                  <option value="25">Bolivia</option>
                  <option value="26">Bosnia And Herzegovina</option>
                  <option value="27">Botswana</option>
                  <option value="28">Brazil</option>
                  <option value="29">British Indian Ocean Territory</option>
                  <option value="30">British Virgin Islands</option>
                  <option value="31">Brunei</option>
                  <option value="32">Bulgaria</option>
                  <option value="33">Burkina Faso</option>
                  <option value="34">Burma</option>
                  <option value="35">Burundi</option>
                  <option value="36">Cambodia</option>
                  <option value="37">Cameroon</option>
                  <option value="38">Canada</option>
                  <option value="39">Cape Verde</option>
                  <option value="40">Cayman Islands</option>
                  <option value="41">Central African Republic</option>
                  <option value="42">Chad</option>
                  <option value="43">Chile</option>
                  <option value="44">China</option>
                  <option value="45">Colombia</option>
                  <option value="46">Comoros</option>
                  <option value="47">Congo Democratic Republic</option>
                  <option value="48">Congo Republic</option>
                  <option value="49">Cook Islands</option>
                  <option value="50">Costa Rica</option>
                  <option value="51">Cote Divoire</option>
                  <option value="52">Croatia</option>
                  <option value="53">Cuba</option>
                  <option value="54">Cyprus</option>
                  <option value="55">Czech Republic</option>
                  <option value="56">Denmark</option>
                  <option value="57">Djibouti</option>
                  <option value="58">Dominica</option>
                  <option value="59">Dominican Republic</option>
                  <option value="60">East Timor</option>
                  <option value="61">Egypt</option>
                  <option value="62">El Salvador</option>
                  <option value="63">England</option>
                  <option value="64">Ecuador</option>
                  <option value="65">Equatorial Guinea</option>
                  <option value="66">Eritrea</option>
                  <option value="67">Estonia</option>
                  <option value="68">Ethiopia</option>
                  <option value="69">Falkland Islands</option>
                  <option value="70">Faroe Islands</option>
                  <option value="71">Fiji</option>
                  <option value="72">Finland</option>
                  <option value="73">France</option>
                  <option value="74">French Polynesia</option>
                  <option value="75">Gabon</option>
                  <option value="76">Gambia</option>
                  <option value="77">Georgia</option>
                  <option value="78">Germany</option>
                  <option value="79">Ghana</option>
                  <option value="80">Gibraltar</option>
                  <option value="81">Great Britain</option>
                  <option value="82">Greece</option>
                  <option value="83">Greenland</option>
                  <option value="84">Grenada</option>
                  <option value="85">Guam</option>
                  <option value="86">Guatemala</option>
                  <option value="87">Guernsey</option>
                  <option value="88">Guinea</option>
                  <option value="89">Guinea Bissau</option>
                  <option value="90">Guyana</option>
                  <option value="91">Haiti</option>
                  <option value="92">Honduras</option>
                  <option value="93">Hong Kong</option>
                  <option value="94">Hungary</option>
                  <option value="95">Iceland</option>
                  <option value="96">India</option>
                  <option value="97">Indonesia</option>
                  <option value="98">Iran</option>
                  <option value="99">Iraq</option>
                  <option value="100">Ireland</option>
                  <option value="101">Isle Of Man</option>
                  <option value="102">Israel</option>
                  <option value="103">Italy</option>
                  <option value="104">Jamaica</option>
                  <option value="105">Japan</option>
                  <option value="106">Jersey</option>
                  <option value="107">Jordan</option>
                  <option value="108">Kazakhstan</option>
                  <option value="109">Kenya</option>
                  <option value="110">Kiribati</option>
                  <option value="111">Kuwait</option>
                  <option value="112">Kyrgyzstan</option>
                  <option value="113">Laos</option>
                  <option value="114">Latvia</option>
                  <option value="115">Lebanon</option>
                  <option value="116">Lesotho</option>
                  <option value="117">Liberia</option>
                  <option value="118">Libya</option>
                  <option value="119">Liechtenstein</option>
                  <option value="120">Lithuania</option>
                  <option value="121">Luxembourg</option>
                  <option value="122">Macau</option>
                  <option value="123">Macedonia</option>
                  <option value="124">Madagascar</option>
                  <option value="125">Malawi</option>
                  <option value="126">Malaysia</option>
                  <option value="127">Maledives</option>
                  <option value="128">Mali</option>
                  <option value="129">Malta</option>
                  <option value="130">Marshall Islands</option>
                  <option value="131">Martinique</option>
                  <option value="132">Mauretania</option>
                  <option value="133">Mauritius</option>
                  <option value="134">Mexico</option>
                  <option value="135">Micronesia</option>
                  <option value="136">Moldova</option>
                  <option value="137">Monaco</option>
                  <option value="138">Mongolia</option>
                  <option value="139">Montserrat</option>
                  <option value="140">Morocco</option>
                  <option value="141">Mozambique</option>
                  <option value="142">Namibia</option>
                  <option value="143">Nauru</option>
                  <option value="144">Nepal</option>
                  <option value="145">Netherlands</option>
                  <option value="146">Netherlands Antilles</option>
                  <option value="147">New Zealand</option>
                  <option value="148">Nicaragua</option>
                  <option value="149">Niger</option>
                  <option value="150">Nigeria</option>
                  <option value="151">Niue</option>
                  <option value="152">Norfolk Island</option>
                  <option value="153">North Korea</option>
                  <option value="154">Northern Mariana Islands</option>
                  <option value="155">Norway</option>
                  <option value="156">Oman</option>
                  <option value="157">Pakistan</option>
                  <option value="158">Palau</option>
                  <option value="159">Panama</option>
                  <option value="160">Papua New Guinea</option>
                  <option value="161">Paraquay</option>
                  <option value="162">Peru</option>
                  <option value="163">Philippines</option>
                  <option value="164">Pitcairn Islands</option>
                  <option value="165">Poland</option>
                  <option value="166">Portugal</option>
                  <option value="167">Puerto Rico</option>
                  <option value="168">Qatar</option>
                  <option value="169">Romania</option>
                  <option value="170">Russia</option>
                  <option value="171">Rwanda</option>
                  <option value="172">Saint Helena</option>
                  <option value="173">Saint Kitts And Nevis</option>
                  <option value="174">Saint Lucia</option>
                  <option value="175">Saint Pierre And Miquelon</option>
                  <option value="176">Saint Vincent And The Grenadines</option>
                  <option value="177">Samoa</option>
                  <option value="178">San Marino</option>
                  <option value="179">Sao Tome And Principe</option>
                  <option value="180">Saudi Arabia</option>
                  <option value="181">Scotland</option>
                  <option value="182">Senegal</option>
                  <option value="183">Serbia Montenegro</option>
                  <option value="184">Seychelles</option>
                  <option value="185">Sierra Leone</option>
                  <option value="186">Singapore</option>
                  <option value="187">Slovakia</option>
                  <option value="188">Slovenia</option>
                  <option value="189">Solomon Islands</option>
                  <option value="190">Somalia</option>
                  <option value="191">South Africa</option>
                  <option value="192">South Georgia</option>
                  <option value="193">South Korea</option>
                  <option value="194">Spain</option>
                  <option value="195">Sri Lanka</option>
                  <option value="196">Sudan</option>
                  <option value="197">Suriname</option>
                  <option value="198">Eswatini</option>
                  <option value="199">Sweden</option>
                  <option value="200">Switzerland</option>
                  <option value="201">Syria</option>
                  <option value="202">Taiwan</option>
                  <option value="203">Tajikistan</option>
                  <option value="204">Tanzania</option>
                  <option value="205">Thailand</option>
                  <option value="206">Tibet</option>
                  <option value="207">Togo</option>
                  <option value="208">Tonga</option>
                  <option value="209">Trinidad And Tobago</option>
                  <option value="210">Tunisia</option>
                  <option value="211">Turkey</option>
                  <option value="212">Turkmenistan</option>
                  <option value="213">Turks And Caicos Islands</option>
                  <option value="214">Tuvalu</option>
                  <option value="215">Uganda</option>
                  <option value="216">Ukraine</option>
                  <option value="217">United Arab Emirates</option>
                  <option value="218">Uruquay</option>
                  <option value="219">UNITED STATES</option>
                  <option value="220">Uzbekistan</option>
                  <option value="221">Vanuatu</option>
                  <option value="222">Vatican City</option>
                  <option value="223">Venezuela</option>
                  <option value="224">Vietnam</option>
                  <option value="225">Virgin Islands</option>
                  <option value="226">Wales</option>
                  <option value="227">Wallis And Futuna</option>
                  <option value="228">Yemen</option>
                  <option value="229">Zambia</option>
                  <option value="230">Zimbabwe</option>
                  <option value="231">UNITED KINGDOM</option>
                  <option value="237">Uzbekistan</option>
                  <option value="238">Kosovo</option>
                  <option value="239">montenegro</option>
                  <option value="240">Myanmar(burma)</option>
                  <option value="241">North macedonia</option>
                  <option value="242">Sudan south</option>
                  <option value="243">Central African Rep.</option>
                  <option value="244">Congo, Dem. Rep.</option>
                  <option value="245">Congo, Rep.</option>
                  <option value="246">Coted Ivoire</option>
                  <option value="247">Czech Rep.</option>
                  <option value="248">Dominican Rep.</option>
                  <option value="249">Guinea-Bissau</option>
                  <option value="250">Hong Kong, China</option>
                  <option value="251">Korea</option>
                  <option value="252">Korea</option>
                  <option value="253">Macedonia, FYR</option>
                  <option value="254">Mauritania</option>
                  <option value="255">Myanmar</option>
                  <option value="256">Paraguay</option>
                  <option value="257">Serbia</option>
                  <option value="258">Slovak Republic</option>
                  <option value="259">Swaziland</option>
                  <option value="260">Uruguay</option>
                  <option value="261">West Bank and Gaza</option>
                  <option value="262">Yemen, Rep.</option>
                </select>
                <label for="CountryName">Country</label>
              </div>
            </div>
          </div>
          @error('country')
          <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <div class="user-box">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
              <div class="form-floating">
                <input type="email" class="form-control cssOnlyNumericDecimal" id="txtmobile" name="mobile" placeholder="Mobile Number" required="required">
                <label for="txtmobile">Mobile Number</label>
              </div>
            </div>
          </div>
          @error('mobile')
          <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <div class="user-box">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
              <div class="form-floating">
                <input type="password" class="form-control" id="txtpassword" name="password" placeholder="password" required="required">
              </div>
            </div>
          </div>
          @error('password')
          <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-md-6">
          <div class="user-box">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
              <div class="form-floating">
                <input type="password" class="form-control" id="txtconfirmpassword" name="password_confirmation" placeholder="Confirm Password" required="required">
                <label for="txtconfirmpassword">Confirm Password</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="checkbox">
            <input id="chkaccept" type="checkbox">
            <label class="checkbox-1 text-white" for="chkaccept">
              Accept Terms and Conditions
            </label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-md-4">
          <a id="btnregisterforS" class="btn-login">
            Register Now
          </a>

        </div>
        <div class="col-6 col-md-4">
          <a href="{{ route('user.login') }}" class="btn-login">
            Login
          </a>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
@section('js')
<script src="{{asset('/assets/login_registration/js/passtrength.js')}}"></script>
<script>
  var referral = ''
  if (referral != "") {
    $('#txtsponsor').attr('disabled', 'disabled');
  }

  $(document).ready(function($) {
    $('#txtpassword').passtrength({
      minChars: 8,
      passwordToggle: true,
      tooltip: true
    });
    $("#txtpassword").parents(".passtrengthMeter").append("<label for='txtpassword'>Password</label>")
  });

  function PasswordStrengthCheck(Password) {

    var PasswordStrength = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@~#^_$!%,*?&])[A-Za-z\d@~#^_$!%,*?&]{8,}$/i);
    var ValidPassword = PasswordStrength.test(Password);
    // return true;

    if (!ValidPassword) {
      return false;
    } else {
      return true;
    }
  }

  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

  $('input[type="text"]').click(function() {
    $(this).parent('div').find('.reqiured-br').hide()
  })
  $('#ddlcountry').click(function() {
    $(this).parent('div').find('.reqiured-br').hide()
  })
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })

  $('#txtsponsor ').blur(function() {
    var username = $('#txtsponsor').val().trim();
    if (username != "") {
      $.ajax({
        url: "{{ route('CheckUsernameExists') }}",
        type: 'POST',
        dataType: 'json',
        data: {
          username: username
        },
        success: function(SuccessData) {
          console.log(SuccessData.message);
          if (SuccessData.message != "success") {

            $.iaoAlert({
              msg: 'Username Not Allow.please Unique Username',
              type: "warning",
              mode: "dark",
            })
            $('#txtemail').val('')
            $('#txtemail').focus()
            $('#ismailthere').addClass('fa-envelope')
            $('#ismailthere').removeClass('fa-check')
          } else {
            $('#ismailthere').removeClass('fa-envelope')
            $('#ismailthere').addClass('fa-check')
            $('#ismailthere').css('color', '#66cc00')
            $('#txtemail').parent('div').find('.success-br').show()
            $('#txtemail').parent('div').find('.reqiured-br').hide()
            $.iaoAlert({
              msg: "Congratulations! Username  is Allow",
              type: "success",
              mode: "dark",
            })
          }
        },
        error: function(request, error) {
          RemoveProgressFromBody();
          return false;
        }
      });
    }
  })


  $('#btnregisterforS').click(function() {

    if ($('#txtsponsor').val().trim() == "") {
      $('#txtsponsor').parent('div').find('.reqiured-br').show()
      $('#txtsponsor').focus()
      return false;
    }
    if ($('#txtemail').val().trim() == "") {
      $.iaoAlert({
        msg: "Enter Email Address",
        type: "error",
        mode: "dark",
      })

      $('#txtemail').focus()
      return false;
    }

    if ($('#txtname').val().trim() == "") {
      $.iaoAlert({
        msg: "Enter Full Name",
        type: "error",
        mode: "dark",
      })
      $('#txtname').focus()
      return false;
    }



    if ($('#ddlcountry').val().trim() == "") {
      $.iaoAlert({
        msg: "Select Country",
        type: "error",
        mode: "dark",
      })
      $('#ddlcountry').focus()
      return false;
    }

    if ($('#txtmobile').val().trim() == "") {
      $.iaoAlert({
        msg: "Enter Mobile Number",
        type: "error",
        mode: "dark",
      })
      $('#txtmobile').focus()
      return false;
    } else {
      if ($('#txtmobile').val().length < 5) {
        $.iaoAlert({
          msg: "Enter 5 digit mobile number",
          type: "error",
          mode: "dark",
        })
        $('#txtmobile').focus()
        return false;
      }
    }
    if ($('#txtpassword').val().trim() == "") {
      $.iaoAlert({
        msg: "Enter Password",
        type: "error",
        mode: "dark",
      })
      $('#txtpassword').focus()
      $('#passwordnotification').hide()
      return false;
    }
    if ($('#txtconfirmpassword').val().trim() == "") {
      $.iaoAlert({
        msg: "Enter Confirm Password",
        type: "error",
        mode: "dark",
      })
      $('#txtconfirmpassword').focus()
      return false;
    }
    var Password = $('#txtpassword').val().trim()
    var TPassword = $('#txtconfirmpassword').val().trim()

    if (Password != TPassword) {
      $.iaoAlert({
        msg: "Password and confirm password does not match",
        type: "error",
        mode: "dark",
      })
      // $('#errorfor').html('* Minimum 8 characters <br />* At least 1 special characters <br />* At least 1 number');
      $('#txtpassword').focus();
      return false;
    }
    if ($('#chkaccept').is(":checked") == false) {
      $.iaoAlert({
        msg: "Kindly accept terms and conditions",
        type: "error",
        mode: "dark",
      })
      $('#chkaccept').focus()
      return false;
    }

    $('#formSubmit').submit();
  })
</script>

@endsection