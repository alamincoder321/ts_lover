@extends('backend.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">{{ __('Permissions') }}</h4>
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
                <a href="#">{{ __('Admin Management') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Role') }}</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('Permissions') }}</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('admin.admin_management.role.update_permissions', ['id' => $role->id]) }}"
                    method="post">
                    @csrf
                    <div class="card-header">
                        <div class="card-title d-inline-block">{{ __('Permissions of') . ' ' . $role->name }}</div>
                        <a class="btn btn-info btn-sm float-right d-inline-block"
                            href="{{ route('admin.admin_management.role_permissions') }}">
                            <span class="btn-label">
                                <i class="fas fa-backward"></i>
                            </span>
                            {{ __('Back') }}
                        </a>
                    </div>

                    <div class="card-body py-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="alert alert-warning text-center" role="alert">
                                    <strong class="text-dark">{{ __('Select from this below options.') }}</strong>
                                </div>
                            </div>
                        </div>

                        @php $rolePermissions = json_decode($role->permissions); @endphp

                        <div class="row mt-3 justify-content-center">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="Admin Management" @if (is_array($rolePermissions) && in_array('Admin Management', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('Admin Management') }}</span>
                                        </label>

                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="Language Management"
                                                @if (is_array($rolePermissions) && in_array('Language Management', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('Language Management') }}</span>
                                        </label>

                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="Basic Settings" @if (is_array($rolePermissions) && in_array('Basic Settings', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('Basic Settings') }}</span>
                                        </label>

                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="Announcement Popups"
                                                @if (is_array($rolePermissions) && in_array('Announcement Popups', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('Announcement Popups') }}</span>
                                        </label>

                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="Menu Builder" @if (is_array($rolePermissions) && in_array('Menu Builder', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('Menu Builder') }}</span>
                                        </label>

                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="Home Page" @if (is_array($rolePermissions) && in_array('Home Page', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('Home Page') }}</span>
                                        </label>


                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="Custom Pages" @if (is_array($rolePermissions) && in_array('Custom Pages', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('Custom Pages') }}</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="Payment Request" @if (is_array($rolePermissions) && in_array('Payment Request', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('Payment Request') }}</span>
                                        </label>


                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="Footer" @if (is_array($rolePermissions) && in_array('Footer', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('Footer') }}</span>
                                        </label>

                                        <label class="selectgroup-item">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]"
                                                value="User Management" @if (is_array($rolePermissions) && in_array('User Management', $rolePermissions)) checked @endif>
                                            <span class="selectgroup-button">{{ __('User Management') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
