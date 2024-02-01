@extends('dashboard.layout')

@section('content')
  <div class="mt-2 mb-4">
    <h2 class="pb-2">{{ __('Welcome back,') }} {{ Auth::guard('web')->user()->username . '!' }}</h2>
  </div>
  @if (Session::get('secret_login') != 1)
    @if (Auth::guard('web')->user()->status == 0 && $admin_setting->vendor_admin_approval == 1)
      <div class="mt-2 mb-4">
        <div class="alert alert-danger text-dark">
          {{ $admin_setting->admin_approval_notice != null ? $admin_setting->admin_approval_notice : 'Your account is deactive!' }}
        </div>
      </div>
    @endif
  @endif
  @php
    $account = Auth::guard('web')->user();
  @endphp
  {{-- dashboard information start --}}
  <div class="row dashboard-items">
    <div class="col-md-3">
      <a href="#">
        <div class="card card-stats card-primary card-round">
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <div class="icon-big text-center">
                  <i class="fas fa-allergies"></i>
                </div>
              </div>
              <div class="col-7 col-stats">

              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ __('Chart of Total Gain Monthly') }} ({{ date('Y') }})</div>
        </div>

        <div class="card-body">
          <div class="chart-container">
            <canvas id="incomeMonthly"></canvas>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{ __('Income from Equipment Bookings') }} ({{ date('Y') }})</div>
        </div>

        <div class="card-body">
          <div class="chart-container">
            <canvas id="incomeChart"></canvas>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
@endsection


@section('script')
{{-- <script>
  'use strict';
  const monthArr = {!! json_encode($months) !!};
  const incomeArr = {!! json_encode($incomes) !!};
</script> --}}
  <!-- chart js ----->
  <script type="text/javascript" src="{{ asset('assets/js/chart.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/chart-init.js') }}"></script>
@endsection
