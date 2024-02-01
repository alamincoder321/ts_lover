@extends('account.layout')

@section('content')
<div class="page-header">
  <h4 class="page-title">{{ __('Transfer to Walet') }}</h4>
  <ul class="breadcrumbs">
    <li class="nav-home">
      <a href="{{ route('account.dashboard') }}">
        <i class="flaticon-home"></i>
      </a>
    </li>
    <li class="separator">
      <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
      <a href="#">{{ __('Transfer to walet') }}</a>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h3>Transfer to Walet</h3>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="card">
              <div class="card-body">
                <p class="text-warning">Your Total Coin: {{ $account->total_gain_coin }} && Minimum Transfer Coin : {{
                  $bs->minimum_withdraw }}</p>
                <form id="ajaxForm" class="modal-form create" action="{{ route('account.withdraw_store') }}"
                  method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="">{{ __('Transfer Balance') . '**' }}</label>
                    <input type="number" class="form-control" name="withdraw_balance"
                      placeholder="{{ __('Enter Balance') }}" min="{{ $settings->minimum_withdraw }}" step="0000000.00">
                    <p id="err_withdraw_balance" class="mt-2 mb-0 text-danger em"></p>
                  </div>
                  <div class="form-group">
                    <button id="submitBtn" class="btn btn-success text-center">Send</button>
                  </div>
                </form>
              </div>

            </div>

          </div>
        </div>
      </div>
      <div class="card-footer"></div>
    </div>

  </div>
</div>
@endsection
