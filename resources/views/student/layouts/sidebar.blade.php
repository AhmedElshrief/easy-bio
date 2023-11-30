<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('student.home') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('front.home') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/home.png') }}"
                                alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.website') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('student.home') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/home.png') }}"
                                alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.dashboard') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('student.lessons.*') ? 'active' : '' }}"
                        href="{{ route('student.lessons.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/lesson.png') }}"
                                alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.lessons') }}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('student.faqs.index') }}" aria-expanded="false">
                        <span>
                            <img width="27" height="27" src="{{ asset('assets/images/sidebar/faq.png') }}"
                                alt="">
                        </span>
                        <span class="hide-menu">{{ __('lang.faqs') }}</span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
