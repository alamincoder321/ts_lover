@extends('backend.layout')

{{-- this style will be applied when the direction of language is right-to-left --}}
@includeIf('backend.partials.rtl-style')

@section('content')
<div class="page-header">
  <h4 class="page-title">{{ __('Recharge Package Edit') }}</h4>
  <ul class="breadcrumbs">
    <li class="nav-home">
      <a href="{{ route('admin.dashboard') }}">
        <i class="flaticon-home"></i>
      </a>
    </li>
    <li class="separator">
      <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
      <a href="#">{{ __('Recharge Packages Edit') }} <span class="text-danger">[{{ $language->name }}]</span> </a>
    </li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-4">
            <div class="card-title d-inline-block">{{ __('Recharge Package Edit') }}</div>
          </div>
          <div class="col-lg-8">
            <div class="float-right">

              <a href="{{ route('admin.recharge.package',['language'=> $defaultLang->code]) }}"
                class="btn btn-primary btn-sm">
                Back</a>

            </div>
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <form id="ajaxEditForm" action="{{ route('admin.package.recharge.update_package') }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $package_content->id ?? '' }}" name="package_content_id">
              <input type="hidden" value="{{ $language->id }}" name="language_id">
              <input type="hidden" value="{{ $package->id }}" name="package_id">
              <div class="form-group">
                <label for="">Title **</label>
                <input type="text" class="form-control" name="title" value="{{ $package_content->title ?? '' }}"
                  placeholder="Enter Title">
                <p id="editErr_title" class="mb-0 text-danger em"></p>
              </div>
              @if ($language->is_default == 1)
              <div class="form-group">
                <label for="">{{ __('Social Media Icon') . '*' }}</label>
                <div class="btn-group d-block">
                  <button type="button" class="btn btn-primary iconpicker-component edit-iconpicker-component">
                    <i class="{{ $package->icon }}" id="in_icon"></i>
                  </button>
                  <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="fa-car"
                    data-toggle="dropdown"></button>
                  <div class="dropdown-menu"></div>
                </div>

                <input type="hidden" id="editInputIcon" name="icon">
                <p id="editErr_icon" class="mt-1 mb-0 text-danger em"></p>

                <div class="text-warning mt-2">
                  <small>{{ __('Click on the dropdown icon to select a icon.') }}</small>
                </div>
              </div>

              <div class="form-group">
                <label for="">{{ __('Doller') . '*' }}</label>
                <input type="number" class="form-control" name="doller" value="{{ $package->doller }}">
                <p id="editErr_doller" class="mt-2 mb-0 text-danger em"></p>
              </div>
              <div class="form-group">
                <label for="">{{ __('Serial Number') . '*' }}</label>
                <input type="number" class="form-control ltr" name="serial_number"
                  value="{{ $package->serial_number }}">
                <p id="editErr_serial_number" class="mt-2 mb-0 text-danger em"></p>
                <p class="text-warning mt-2 mb-0">
                  <small>{{ __('The higher the serial number is, the later the FAQ will be shown.') }}</small>
                </p>
              </div>
              @endif
              <button id="updateBtn" type="button" class="btn btn-primary btn-md">
                {{ __('Save') }}
              </button>
            </form>


          </div>
        </div>
      </div>

      <div class="card-footer"></div>
    </div>
  </div>
</div>

@endsection
