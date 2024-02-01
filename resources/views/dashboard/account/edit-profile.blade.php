@extends('dashboard.layout')

@section('content')
<div class="page-header">
    <h4 class="page-title">{{ __('Admin Profile') }}</h4>
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
            <a href="#">{{ __('Profile Settings') }}</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-title">{{ __('Update Profile') }}</div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <form id="editProfileForm" action="{{ route('admin.update_profile') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">{{ __('Image') . '*' }}</label>
                                <br>
                                <div class="thumb-preview">
                                    @if (!empty($user->image))
                                    <img src="{{ asset('assets/img/admins/' . $user->image) }}" alt="image"
                                        class="uploaded-img">
                                    @else
                                    <img src="{{ asset('assets/img/noimage.jpg') }}" alt="..." class="uploaded-img">
                                    @endif
                                </div>

                                <div class="mt-3">
                                    <div role="button" class="btn btn-primary btn-sm upload-btn">
                                        {{ __('Choose Image') }}
                                        <input type="file" class="img-input" name="image">
                                    </div>
                                </div>
                                @if ($errors->has('image'))
                                <p class="mt-2 mb-0 text-danger">{{ $errors->first('image') }}</p>
                                @endif
                                <p class="text-warning mt-2 mb-0">{{ __('Upload squre size image for best quality.') }}
                                </p>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Username') . '*' }}</label>
                                <input type="text" class="form-control" name="username" value="{{ $user->username }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Email') . '*' }}</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Full Name') . '*' }}</label>
                                <input type="text" class="form-control" name="full_name" value="{{ $user->full_name }}">
                                @if ($errors->has('full_name'))
                                <p class="mt-2 mb-0 text-danger">{{ $errors->first('full_name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ __('Mobile') . '*' }}</label>
                                <input type="text" class="form-control" name="" value="{{ $user->mobile }}" disabled>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Address') . '*' }}</label>
                                <input type="text" class="form-control" name="" value="{{ $user->address }}"
                                placeholder="Adress.." >
                                @if ($errors->has('address'))
                                <p class="mt-2 mb-0 text-danger">{{ $errors->first('address') }}</p>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" form="editProfileForm" class="btn btn-success">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
