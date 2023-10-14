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
                    <a class="sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.dashboard') }}</span>
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
                    <a class="sidebar-link" href="{{ route('admin.levels.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.levels') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.courses.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
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
                    <a class="sidebar-link" href="{{ route('admin.students.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">{{ __('lang.students') }}</span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
