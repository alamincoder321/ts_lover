<div class="main-header">
    @php
    $user = Auth::guard('web')->user();
    @endphp
    <!-- Logo Header Start -->
    <div class="logo-header" data-background-color="dark2">
        @if (!empty($websiteInfo->logo))
        <a href="{{ route('index') }}" class="logo" target="_blank">
            <img src="{{ asset('assets/img/' . $websiteInfo->logo) }}" alt="logo" class="navbar-brand" width="120">
        </a>
        @endif
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>

        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- Logo Header End -->

    <!-- Navbar Header Start -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            @if ($user->image != null)
                            <div class="avatar avatar-online">
                                <span class="avatar-title rounded-circle border border-white bg-info">
                                    <img src="{{ asset('assets/account/img/'.$user->image) }}" alt="User Image"
                                        class="avatar-img rounded-circle">
                                </span>
                            </div>
                            @else
                            <div class="avatar avatar-online">
                                <span class="avatar-title rounded-circle border border-white bg-info">
                                    {{Str::substr($user->full_name, 0, 1) }}
                                </span>
                            </div>
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        @if ( $user->photo != null)
                                        <div class="avatar avatar-online">
                                            <span class="avatar-title rounded-circle border border-white bg-info">
                                                <img src="{{ asset('assets/admin/img/vendor-photo/' . $user->photo) }}"
                                                    alt="Vendor Image" class="avatar-img rounded-circle">
                                            </span>
                                        </div>
                                        @else
                                        <div class="avatar avatar-online">
                                            <span class="avatar-title rounded-circle border border-white bg-info">
                                                {{Str::substr($user->full_name, 0, 1) }}
                                            </span>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="u-text">
                                        <h4>
                                            {{ $user->username }}
                                        </h4>
                                        <p class="text-muted">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="">
                                    {{ __('Edit Profile') }}
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('user.logout') }}">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar Header End -->
</div>
