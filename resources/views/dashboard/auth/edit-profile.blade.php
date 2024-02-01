@extends('account.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Edit Profile') }}</h4>
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
                <a href="#">{{ __('Edit Profile') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-title">{{ __('Edit Profile') }}</div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <form id="ajaxEditForm" action="{{ route('account.update_profile') }}" method="post">
                                @csrf
                                <h2>Details</h2>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">{{ __('Photo') }}</label>
                                            <br>
                                            <div class="thumb-preview">
                                                @if ($account->photo != null)
                                                    <img src="{{ asset('assets/account/img/' . $account->image) }}"
                                                        alt="..." class="uploaded-img">
                                                @else
                                                    <img src="{{ asset('assets/img/noimage.jpg') }}" alt="..."
                                                        class="uploaded-img">
                                                @endif

                                            </div>

                                            <div class="mt-3">
                                                <div role="button" class="btn btn-primary btn-sm upload-btn">
                                                    {{ __('Choose Photo') }}
                                                    <input type="file" class="img-input" name="photo">
                                                </div>
                                                <p id="editErr_photo" class="mt-1 mb-0 text-danger em"></p>
                                                <p class="mt-2 mb-0 text-warning">{{ __('Image Size 80x80') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>{{ __('Username*') }}</label>
                                            <input type="text" value="{{ $account->username }}" class="form-control"
                                                name="username">
                                            <p id="editErr_username" class="mt-1 mb-0 text-danger em"></p>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" id="updateBtn" class="btn btn-success">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
