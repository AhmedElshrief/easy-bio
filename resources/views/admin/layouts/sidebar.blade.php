<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.home') }}" class="text-nowrap logo-img">
                <img src="{{ asset($settings['logo'] ?? '')  }}" width="80" height="40" alt="" />
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
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/home.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.dashboard') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}" href="{{ route('admin.courses.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/course.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.courses') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.lectures.*') ? 'active' : '' }}" href="{{ route('admin.lectures.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/lecture.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.lectures') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.lessons.*') ? 'active' : '' }}" href="{{ route('admin.lessons.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/lesson.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.lessons') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}" href="{{ route('admin.students.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/student.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.students') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.levels.*') ? 'active' : '' }}" href="{{ route('admin.levels.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/level.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.levels') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.cities.*') ? 'active' : '' }}" href="{{ route('admin.cities.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/city.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.cities') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/faq.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.faqs') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}" href="{{ route('admin.admins.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/admin.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.admins') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.withdraw_requests.*') ? 'active' : '' }}" href="{{ route('admin.withdraw_requests.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/payment.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.withdraw_requests') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/setting.png') }}" alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.settings') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/permission.png') }}" alt="">
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
