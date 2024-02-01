<div class="col-lg-3">
    <div class="user-sidebar">
        <ul class="links">
            <li><a href="{{ route('user.dashboard') }}"
                    class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">{{ __('Dashboard') }}</a></li>

            <li>
              <a href="{{ route('withdraw.all') }}" class="">{{ __('Withdraw Request') }}
              </a>
            </li>
            <li>
                <a href="{{ route('accounts.all') }}" class="">{{ __('Accounts') }}</a>
            </li>

            <li><a href="{{ route('user.edit_profile') }}"
                    class="{{ request()->routeIs('user.edit_profile') ? 'active' : '' }}">{{ __('Edit Profile') }}</a>
            </li>

            <li><a href="{{ route('user.change_password') }}"
                    class="{{ request()->routeIs('user.change_password') ? 'active' : '' }}">{{ __('Change Password') }}</a>
            </li>

            <li><a href="{{ route('user.logout') }}">{{ __('Logout') }}</a></li>
        </ul>
    </div>
</div>
