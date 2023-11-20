<!-- header area start -->
<header>
    <div id="header-sticky" class="header__area header__transparent header__padding-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-2 col-sm-4 col-6">
                    <div class="header__left d-flex">
                        <div class="logo">
                            <a href="index.html">
                                <img width="50px" src="{{ url('/front') }}/assets/img/logo/logo.png" alt="logo">
                            </a>
                        </div>
                        <div class="header__category d-none d-lg-block">
                            <nav>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-10 col-sm-8 col-6">
                    <div class="header__right d-flex justify-content-end align-items-center">
                        <div class="main-menu main-menu-2">
                            <nav id="mobile-menu" class="m-auto">
                                <ul>
                                    <li class="">
                                        <a href="{{ route('front.home') }}">{{ __('lang.home') }}</a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('front.courses') }}">{{ __('lang.watch_lessons') }}</a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('front.contact') }}">{{ __('lang.about_platform') }}</a>
                                    </li>
                                    @if (auth('student')->user())
                                        <li class="">
                                            <a href="{{ route('student.home') }}">{{ __('lang.student_dashboard') }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <div class="header__btn header__btn-2 ml-50 d-none d-sm-block">
                            @if (auth('student')->user())
                                <img src="{{ auth('student')->user()->image_path }}" class="w3-round-large m-1"
                                    style="width: 40px">
                                {{ auth('student')->user()->name }}
                            @else
                                <a href="{{ route('student.login') }}" class="e-btn">{{ __('lang.login') }}</a>
                            @endif
                        </div>
                        <div class="sidebar__menu d-xl-none">
                            <div class="sidebar-toggle-btn ml-30" id="sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->
