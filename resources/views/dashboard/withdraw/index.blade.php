@extends('account.layout')

@section('content')
<div class="page-header">
  <h4 class="page-title">{{ __('Transactions') }}</h4>
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
      <a href="#">{{ __('Transactions History') }}</a>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h3>Transactions History</h3>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              @if (count($withdraws) > 0)
              <table class="table table-striped mt-3" id="basic-datatables">
                <thead>
                  <tr>
                    <th scope="col">{{ __('SI') }}</th>
                    <th scope="col">{{ __('Date') }}(d-m-y) </th>
                    <th scope="col">{{ __('Balance') }}</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($withdraws as $item)
                  <tr>
                    <td>
                      {{ $loop->iteration }}
                    </td>
                    <td>
                      {{-- {{ $item->date }} --}}
                      {{\Carbon\Carbon::parse($item->date)->format('d-m-Y');}}
                    </td>
                    <td>

                      {{ $settings->base_currency_symbol_position == 'left' ? $settings->base_currency_symbol : '' }}
                      {{ $item->withdraw_balance }}
                      {{ $settings->base_currency_symbol_position == 'right' ? $settings->base_currency_symbol : '' }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <div class="alert alert-warning">
                No Transaction History
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer"></div>
    </div>

  </div>
</div>
@includeIf('account.withdraw.create')
@endsection
