<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.home') }}" class="text-nowrap logo-img">
                <img src="{{ \App\Models\Setting::first()->logo  }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.dashboard') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.courses.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-blackboard"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.courses') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.lectures.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.lectures') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.lessons.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.lessons') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.students.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-id-badge"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.students') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.levels.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.levels') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.cities.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.cities') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.faqs.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.faqs') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.admins.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.admins') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.withdraw_requests.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-credit-card"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.withdraw_requests') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.settings.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-settings"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.settings') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.roles.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.roles') }}</span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
