@extends('backend.layout')
@section('content')
<div class="page-header">
  <h4 class="page-title">{{ __('Package Management') }}</h4>
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
      <a href="#">{{ __('Packages Management') }}</a>
    </li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-4">
            <div class="card-title d-inline-block">{{ __('Packages') }}</div>
          </div>

          <div class="col-lg-3">
            @includeIf('backend.partials.languages')
          </div>

          <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
            <a href="#" data-toggle="modal" data-target="#createModal"
              class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i>
              {{ __('Add') }}</a>
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            @if (count($packages) == 0)
            <h3 class="text-center">{{ __('NO PACKAGE FOUND') . '!' }}</h3>
            @else
            <div class="table-responsive">
              <table class="table table-striped mt-3" id="basic-datatables">
                <thead>
                  <tr>
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col">{{ __('Featured') }}</th>
                    <th scope="col">{{ __('Serial Number') }}</th>
                    <th scope="col">{{ __('Active') }}</th>
                    <th scope="col">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($packages as $package)
                  <tr>
                    <td>
                      {{ strlen($package->titlle) > 50 ? mb_substr($package->title, 0, 50, 'UTF-8') . '...' :
                      $package->title }}
                    </td>
                    <td>
                      <form id="FeatureStatusForm-{{ $package->id }}" class="d-inline-block"
                        action="{{ route('admin.package.update_package_featured_status', ['id' => $package->id]) }}"
                        method="post">
                        @csrf
                        <select
                          class="form-control form-control-sm {{ $package->featured == 1 ? 'bg-success' : 'bg-danger' }}"
                          name="featured"
                          onchange="document.getElementById('FeatureStatusForm-{{ $package->id }}').submit()">

                          <option value="1" {{ $package->featured ? 'selected' : '' }}>
                            {{ __('Active') }}
                          </option>
                          <option value="0" {{ !$package->featured ? 'selected' : '' }}>
                            {{ __('Deactive') }}
                          </option>

                        </select>
                      </form>
                    </td>
                    <td>{{ $package->serial_number }}</td>
                    <td>
                      <form id="ActiveStatusForm-{{ $package->id }}" class="d-inline-block"
                        action="{{ route('admin.package.update_package_active_status', ['id' => $package->id]) }}"
                        method="post">
                        @csrf
                        <select
                          class="form-control form-control-sm {{ $package->status == 1 ? 'bg-success' : 'bg-danger' }}"
                          name="active"
                          onchange="document.getElementById('ActiveStatusForm-{{ $package->id }}').submit()">

                          <option value="1" {{ $package->status == 1 ? 'selected' : '' }}>
                            {{ __('Active') }}
                          </option>
                          <option value="0" {{ $package->status == 0 ? 'selected' : '' }}>
                            {{ __('Deactive') }}
                          </option>

                        </select>
                      </form>
                    </td>
                    <td>
                      <div class="dropdown custom-dropdown d-inline-block">
                        <button class="btn btn-warning btn-sm editbtn dropdown-toggle" role="button"
                          id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="btn-label">
                            <i class="fas fa-edit"></i>
                          </span>
                          Edit
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          @foreach ($langs as $language)
                          <li>
                            <a class="dropdown-item"
                              href="{{ route('admin.package.invest_edit_package', ['package'=>$package->id, 'language' => $language->id]) }}">
                              Edit
                              (in
                              {{ $language->name }})
                            </a>
                          </li>
                          @endforeach
                        </ul>
                      </div>

                      <form class="deleteForm d-inline-block"
                        action="{{ route('admin.package.delete_package', ['id' => $package->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm deleteBtn">
                          <span class="btn-label">
                            <i class="fas fa-trash"></i>
                          </span>
                          {{ __('Delete') }}
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif
          </div>
        </div>
      </div>

      <div class="card-footer"></div>
    </div>
  </div>
</div>

{{-- create modal --}}
@include('backend.packages.create')
@endsection
