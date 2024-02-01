@php
$user = Auth::guard('web')->user();
@endphp

<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if ($user->image != null)
                    <div class="avatar avatar-online">
                        <span class="avatar-title rounded-circle border border-white bg-info">
                            <img src="{{ asset('assets/account/img/'.$user->image) }}" alt="User Image"
                                class="avatar-img rounded-circle">
                        </span>
                    </div>

                    @else
                    <div class="avatar avatar-online">
                        <span class="avatar-title rounded-circle border border-white bg-info">{{
                            Str::substr($user->full_name, 0, 1) }}</span>
                    </div>
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#adminProfileMenu" aria-expanded="true">
                        <span class="px-2">
                            {{ $user->username }}
                            <span class="user-level">{{ __('Dashboard') }}</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item ">
                    <a href="">
                        <i class="la flaticon-paint-palette"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#basic_settings">
                        <i class="fas fa-warehouse"></i>
                        <p> {{ __('My Invest')}}</p>
                        <span class="caret"></span>
                    </a>

                    <div id="basic_settings" class="collapse">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="">
                                    <span class="sub-item">{{ 'Details' }}</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="">
                                    <span class="sub-item">{{ 'Activities' }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a href="">
                        <i class="fas fa-box-open"></i>
                        <p>{{ __('All Invest Packages') }}</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="">
                        <i class="fas fa-money-check"></i>
                        <p>{{ __('Withdraw') }}</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="">
                        <i class="fas fa-exchange-alt"></i>
                        <p>{{ __('Transactions') }}</p>
                    </a>
                </li>
                <li class="nav-item @if(request()->routeIs('user.change_password')) active @endif ">
                    <a href="{{ route('user.change_password') }}">
                        <i class="fas fa-edit"></i>
                        <p>{{ __('Change Password') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=" {{ route('user.logout') }}">
                        <i class="fal fa-sign-out"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
