<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">test</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">test</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-box-seam"></i>
                        </span>
                        <span class="hide-menu">@lang('lang.test')</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.field.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-clipboard-list"></i>
                        </span>
                        <span class="hide-menu">{{ _trans('fields') }}</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.role.create') ? 'active' : '' }}" href="{{ route('admin.role.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-shield-check"></i>
                        </span>
                        <span class="hide-menu">{{ _trans('roles') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.admin.create') ? 'active' : '' }}" href="{{ route('admin.admin.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">{{ _trans('admins') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.user.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">{{ _trans('users') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                      <span class="d-flex">
                        <i class="ti ti-settings"></i>
                    </span>
                    <span class="hide-menu">{{ _trans('global_settings') }}</span>
                </a>
                    <ul aria-expanded="false" class="collapse first-level">
                      <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.settings.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-settings"></i>
                            </span>
                            <span class="hide-menu">{{ _trans('settings') }}</span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a href="{{ route('admin.language.index') }}" class="sidebar-link">
                          <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-globe"></i>
                          </div>
                          <span class="hide-menu">{{ _trans('languages') }}</span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a href="{{ route('admin.translation.index') }}" class="sidebar-link">
                          <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-globe"></i>
                          </div>
                          <span class="hide-menu">{{ _trans('translations') }}</span>
                        </a>
                      </li>
                    </ul>
                  </li> --}}


            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
