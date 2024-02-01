@extends('frontend.layout')

@section('pageHeading')
  {{ __('Dashboard') }}
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">
@endsection

@section('content')
  @includeIf('frontend.partials.breadcrumb', ['breadcrumb' => $bgImg->breadcrumb, 'title' => __('Dashboard')])

  <!--====== Start Dashboard Section ======-->
  <section class="user-dashboard pt-130 pb-120">
    <div class="container">
      <div class="row">
        @includeIf('frontend.user.side-navbar')

        <div class="col-lg-9">
          <div class="row mb-5">
            <div class="col-lg-12">
              <div class="user-profile-details">
                <div class="account-info">
                  <div class="title">
                    <h4>
                      {{ __('User Information') }}
                      <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i> {{ __('Add Account') }}</a>
                    </h4>

                  </div>

                  <div class="main-info">
                    <ul class="list">
                      @if ($authUser->first_name != null && $authUser->last_name != null)
                        <li><span>{{ __('Name') . ':' }}</span></li>
                      @endif
                      <li><span>{{ __('Email') . ':' }}</span></li>

                      @if ($authUser->contact_number != null)
                        <li><span>{{ __('Phone') . ':' }}</span></li>
                      @endif

                      @if ($authUser->address != null)
                        <li><span>{{ __('Address') . ':' }}</span></li>
                      @endif

                      @if ($authUser->city != null)
                        <li><span>{{ __('City') . ':' }}</span></li>
                      @endif

                      @if ($authUser->state != null)
                        <li><span>{{ __('State') . ':' }}</span></li>
                      @endif

                      @if ($authUser->country != null)
                        <li><span>{{ __('Country') . ':' }}</span></li>
                      @endif
                    </ul>

                    <ul class="list">
                      @if ($authUser->first_name != null && $authUser->last_name != null)
                        <li>{{ $authUser->first_name . ' ' . $authUser->last_name }}</li>
                      @endif

                      <li>{{ $authUser->email }}</li>

                      @if ($authUser->contact_number != null)
                        <li>{{ $authUser->contact_number }}</li>
                      @endif

                      @if ($authUser->address != null)
                        <li>{{ $authUser->address }}</li>
                      @endif

                      @if ($authUser->city != null)
                        <li>{{ $authUser->city }}</li>
                      @endif

                      @if ($authUser->state != null)
                        <li>{{ $authUser->state }}</li>
                      @endif

                      @if ($authUser->country != null)
                        <li>{{ $authUser->country }}</li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @php
          $auth = Auth::guard('web')->user();
          $authRegAccount = $auth->accounts->count()
        @endphp

          <div class="row">
            <div class="col-md-6">
              <a href="" class="d-block">
                <div class="card card-box box-1">
                  <div class="card-info">
                    <h5>{{ __('Wallet Balance') }}</h5>
                    <p>
                      {{ $auth->wallet_balance }}
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-md-6">
              <a href="" class="d-block">
                <div class="card card-box box-1">
                  <div class="card-info">
                    <h5>{{ __('Accounts') }}</h5>
                    <p>
                      {{ $authRegAccount }}
                    </p>
                  </div>
                </div>
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== End Dashboard Section ======-->
  @include('frontend.user.create-account')
@endsection
@section('script')

@endsection
