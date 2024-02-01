<div class="sidebar sidebar-style-2"
  data-background-color="{{ $settings->admin_theme_version == 'light' ? 'white' : 'dark2' }}">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          @if (Auth::guard('admin')->user()->image != null)
          <img src="{{ asset('assets/img/admins/' . Auth::guard('admin')->user()->image) }}" alt="Admin Image"
            class="avatar-img rounded-circle">
          @else
          <img src="{{ asset('assets/img/blank_user.jpg') }}" alt="" class="avatar-img rounded-circle">
          @endif
        </div>

        <div class="info">
          <a data-toggle="collapse" href="#adminProfileMenu" aria-expanded="true">
            <span>
              {{ Auth::guard('admin')->user()->first_name }}

              @if (is_null($roleInfo))
              <span class="user-level">{{ 'Super Admin' }}</span>
              @else
              <span class="user-level">{{ $roleInfo->name }}</span>
              @endif

              <span class="caret"></span>
            </span>
          </a>

          <div class="clearfix"></div>

          <div class="collapse in" id="adminProfileMenu">
            <ul class="nav">
              <li>
                <a href="{{ route('admin.edit_profile') }}">
                  <span class="link-collapse">{{ 'Edit Profile' }}</span>
                </a>
              </li>

              <li>
                <a href="{{ route('admin.change_password') }}">
                  <span class="link-collapse">{{ 'Change Password' }}</span>
                </a>
              </li>

              <li>
                <a href="{{ route('admin.logout') }}">
                  <span class="link-collapse">{{ 'Logout' }}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      @php
      if (!is_null($roleInfo)) {
      $rolePermissions = json_decode($roleInfo->permissions);
      }
      @endphp

      <ul class="nav nav-primary">
        {{-- search --}}
        <div class="row mb-3">
          <div class="col-12">
            <form action="">
              <div class="form-group py-0">
                <input name="term" type="text" class="form-control sidebar-search ltr"
                  placeholder="Search Menu Here...">
              </div>
            </form>
          </div>
        </div>

        {{-- dashboard --}}
        <li class="nav-item @if (request()->routeIs('admin.dashboard')) active @endif">
          <a href="{{ route('admin.dashboard') }}">
            <i class="la flaticon-paint-palette"></i>
            <p>{{ 'Dashboard' }}</p>
          </a>
        </li>
        {{---------users-----------}}
        @if (is_null($roleInfo) || (!empty($rolePermissions) && in_array('User Management', $rolePermissions)))
        {{-- dashboard --}}
        <li class="nav-item
                          @if (request()->routeIs('admin.user_management.registered_users')) active
                              @elseif (request()->routeIs('admin.user_management.user.details')) active
                              @elseif (request()->routeIs('admin.user_management.user.change_password')) active @endif
                          ">
          <a href="{{ route('admin.user_management.registered_users') }}">
            <i class="fal fa-users"></i>
            <p>{{ 'Users Management' }}</p>
          </a>
        </li>
        @endif
        {{----------Settings-------------}}
        <li class="nav-item
                    @if (request()->routeIs('admin.basic_settings.mail_from_admin')) active
                    @elseif (request()->routeIs('admin.basic_settings.mail_to_admin')) active
                    @elseif (request()->routeIs('admin.basic_settings.mail_templates')) active
                    @elseif (request()->routeIs('admin.basic_settings.edit_mail_template')) active
                    @elseif (request()->routeIs('admin.basic_settings.breadcrumb')) active
                    @elseif (request()->routeIs('admin.basic_settings.page_headings')) active
                    @elseif (request()->routeIs('admin.basic_settings.plugins')) active
                    @elseif (request()->routeIs('admin.basic_settings.seo')) active
                    @elseif (request()->routeIs('admin.basic_settings.maintenance_mode')) active
                    @elseif (request()->routeIs('admin.basic_settings.general_settings')) active
                    @elseif (request()->routeIs('admin.basic_settings.cookie_alert')) active
                    @elseif (request()->routeIs('admin.basic_settings.social_medias')) active @endif">
          <a data-toggle="collapse" href="#basic_settings">
            <i class="la flaticon-settings"></i>
            <p>{{ 'Basic Settings' }}</p>
            <span class="caret"></span>
          </a>

          <div id="basic_settings" class="collapse
                      @if (request()->routeIs('admin.basic_settings.mail_from_admin')) show
                      @elseif (request()->routeIs('admin.basic_settings.mail_to_admin')) show
                      @elseif (request()->routeIs('admin.basic_settings.mail_templates')) show
                      @elseif (request()->routeIs('admin.basic_settings.edit_mail_template')) show
                      @elseif (request()->routeIs('admin.basic_settings.page_headings')) show
                      @elseif (request()->routeIs('admin.basic_settings.plugins')) show
                      @elseif (request()->routeIs('admin.basic_settings.maintenance_mode')) show
                      @elseif (request()->routeIs('admin.basic_settings.cookie_alert')) show
                      @elseif (request()->routeIs('admin.basic_settings.general_settings')) show
                      @elseif (request()->routeIs('admin.basic_settings.social_medias')) show @endif">
            <ul class="nav nav-collapse">
              <li class="{{ request()->routeIs('admin.basic_settings.general_settings') ? 'active' : '' }}">
                <a href="{{ route('admin.basic_settings.general_settings') }}">
                  <span class="sub-item">{{ 'General Settings' }}</span>
                </a>
              </li>

              <li class="submenu">
                <a data-toggle="collapse" href="#mail-settings">
                  <span class="sub-item">{{ 'Email Settings' }}</span>
                  <span class="caret"></span>
                </a>

                <div id="mail-settings" class="collapse
                            @if (request()->routeIs('admin.basic_settings.mail_from_admin')) show
                            @elseif (request()->routeIs('admin.basic_settings.mail_to_admin')) show
                            @elseif (request()->routeIs('admin.basic_settings.mail_templates')) show
                            @elseif (request()->routeIs('admin.basic_settings.edit_mail_template')) show @endif">
                  <ul class="nav nav-collapse subnav">
                    <li class="{{ request()->routeIs('admin.basic_settings.mail_from_admin') ? 'active' : '' }}">
                      <a href="{{ route('admin.basic_settings.mail_from_admin') }}">
                        <span class="sub-item">{{ 'Mail From Admin' }}</span>
                      </a>
                    </li>

                    <li class="{{ request()->routeIs('admin.basic_settings.mail_to_admin') ? 'active' : '' }}">
                      <a href="{{ route('admin.basic_settings.mail_to_admin') }}">
                        <span class="sub-item">{{ 'Mail To Admin' }}</span>
                      </a>
                    </li>

                    <li class="@if (request()->routeIs('admin.basic_settings.mail_templates')) active
                                @elseif (request()->routeIs('admin.basic_settings.edit_mail_template')) active @endif">
                      <a href="{{ route('admin.basic_settings.mail_templates') }}">
                        <span class="sub-item">{{ 'Mail Templates' }}</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="{{ request()->routeIs('admin.basic_settings.plugins') ? 'active' : '' }}">
                <a href="{{ route('admin.basic_settings.plugins') }}">
                  <span class="sub-item">{{ 'Plugins' }}</span>
                </a>
              </li>

              <li class="{{ request()->routeIs('admin.basic_settings.maintenance_mode') ? 'active' : '' }}">
                <a href="{{ route('admin.basic_settings.maintenance_mode') }}">
                  <span class="sub-item">{{ 'Maintenance Mode' }}</span>
                </a>
              </li>

              <li class="{{ request()->routeIs('admin.basic_settings.cookie_alert') ? 'active' : '' }}">
                <a href="{{ route('admin.basic_settings.cookie_alert', ['language' => 'en']) }}">
                  <span class="sub-item">{{ 'Cookie Alert' }}</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        {{---------------- Pwa -----------}}
        <li class="nav-item @if (request()->routeIs('admin.pwa')) active @endif">
          <a href="{{ route('admin.pwa') }}">
            <i class="la flaticon-paint-palette"></i>
            <p>{{ 'PWA' }}</p>
          </a>
        </li>
        {{------ Notifications -----}}
        <li
          class="nav-item @if (request()->routeIs('admin.user_management.push_notification.settings')) active
                                  @elseif (request()->routeIs('admin.user_management.push_notification.notification_for_visitors')) active @endif">
          <a data-toggle="collapse" href="#push_notification">
            <i class="fal fa-bell"></i>
            <p>{{ 'Push Notification' }}</p>
            <span class="caret"></span>
          </a>

          <div id="push_notification"
            class="collapse
                            @if (request()->routeIs('admin.user_management.push_notification.settings')) show
                                  @elseif (request()->routeIs('admin.user_management.push_notification.notification_for_visitors')) show @endif">
            <ul class="nav nav-collapse">
              <li class="{{ request()->routeIs('admin.user_management.push_notification.settings') ? 'active' : '' }}">
                <a href="{{ route('admin.user_management.push_notification.settings') }}">
                  <span class="sub-item">{{ 'Settings' }}</span>
                </a>
              </li>

              <li
                class="{{ request()->routeIs('admin.user_management.push_notification.notification_for_visitors') ? 'active' : '' }}">
                <a href="{{ route('admin.user_management.push_notification.notification_for_visitors') }}">
                  <span class="sub-item">{{ 'Send Notification' }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        {{----------Package Management ------------------}}
        <li class="nav-item {{ request()->routeIs('admin.package') ? 'active' : '' }}">
          <a href="{{ route('admin.package',['language'=> $defaultLang->code]) }}">
            <i class="fas fa-address-book"></i>
            <p>{{ 'Lry Package Management' }}</p>
          </a>
        </li>
        {{----------Package Management ------------------}}
        <li class="nav-item {{ request()->routeIs('admin.recharge.package') ? 'active' : '' }}">
          <a href="{{ route('admin.recharge.package',['language'=> $defaultLang->code]) }}">
            <i class="fas fa-address-book"></i>
            <p>{{ 'Rec Package Management' }}</p>
          </a>
        </li>
        {{------------------ admin -----------}}
        @if (is_null($roleInfo) || (!empty($rolePermissions) && in_array('Admin Management', $rolePermissions)))
        <li class="nav-item @if (request()->routeIs('admin.admin_management.role_permissions')) active
            @elseif (request()->routeIs('admin.admin_management.role.permissions')) active
            @elseif (request()->routeIs('admin.admin_management.registered_admins')) active @endif">
          <a data-toggle="collapse" href="#admin">
            <i class="fal fa-users-cog"></i>
            <p>{{ 'Admin Management' }}</p>
            <span class="caret"></span>
          </a>

          <div id="admin" class="collapse
              @if (request()->routeIs('admin.admin_management.role_permissions')) show
              @elseif (request()->routeIs('admin.admin_management.role.permissions')) show
              @elseif (request()->routeIs('admin.admin_management.registered_admins')) show @endif">
            <ul class="nav nav-collapse">
              <li class="@if (request()->routeIs('admin.admin_management.role_permissions')) active
                  @elseif (request()->routeIs('admin.admin_management.role.permissions')) active @endif">
                <a href="{{ route('admin.admin_management.role_permissions') }}">
                  <span class="sub-item">{{ 'Role & Permissions' }}</span>
                </a>
              </li>

              <li class="{{ request()->routeIs('admin.admin_management.registered_admins') ? 'active' : '' }}">
                <a href="{{ route('admin.admin_management.registered_admins') }}">
                  <span class="sub-item">{{ 'Registered Admins' }}</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        @endif
        <!---------- Language Management-------->
        @if (is_null($roleInfo) || (!empty($rolePermissions) && in_array('Language Management', $rolePermissions)))
        <li class="nav-item @if (request()->routeIs('admin.language_management')) active
                            @elseif (request()->routeIs('admin.language_management.edit_keyword')) active @endif">
          <a href="{{ route('admin.language_management') }}">
            <i class="fal fa-language"></i>
            <p>{{ 'Language Management' }}</p>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>
