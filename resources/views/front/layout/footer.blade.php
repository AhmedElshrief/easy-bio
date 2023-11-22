<!-- footer area start -->
<footer>
    <div class="footer__area grey-bg-2">
        <div class="footer__top pt-190 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <div class="footer__logo">
                                    <a href="index.html">
                                        <img src="{{ asset('front/assets/img/logo/logo.png') }}" width="50px"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="footer__widget-body footer__widget-body-2">
                                <p>ما هي المنصة ؟ منصة Easy Bio هي منصة متخصصة في تدريس مادة الأحياء للصف الثالث الثانوي
                                    للمدارس الحكومية و أيضاً لمدارس اللغات من هو صاحب المنصة ؟ د/ عبدالرحمن أحمد صابر -
                                    خريج كلية طب بشري جامعة بني سويف ، و هو متخصص في تدريس مادة الأحياء لعدة سنوات</p>

                                <div class="footer__social">
                                    <ul>
                                        <li><a href="{{ $settings['facebook'] ?? '#' }}"><i
                                                    class="social_facebook"></i></a></li>
                                        <li><a href="{{ $settings['twitter'] ?? '#' }}" class="tw"><i
                                                    class="social_twitter"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-xxl-2 offset-xxl-1 col-xl-2 offset-xl-1 col-lg-3 offset-lg-0 col-md-2 offset-md-1 col-sm-5 offset-sm-1">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title footer__widget-title-2">{{ __('lang.useful_links') }}
                                </h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link footer__link-2">
                                    <ul>
                                        <li><a href="{{ route('front.courses') }}">{{ __('lang.watch_lessons') }}</a>
                                        </li>
                                        <li><a href="{{ route('front.courses') }}">{{ __('lang.lectures') }}</a></li>
                                        <li><a href="{{ route('front.contact') }}">{{ __('lang.contact') }}</a></li>
                                        <li><a href="{{ route('front.contact') }}">{{ __('lang.about_platform') }}</a>
                                        </li>
                                        <li><a href="{{ route('front.courses') }}">{{ __('lang.lessons') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 offset-lg-0 col-md-3 offset-md-1 col-sm-6">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title footer__widget-title-2">{{ __('lang.courses') }}</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link footer__link-2">
                                    <ul>
                                        @foreach (App\Models\Course::where('active', 1)->get() as $item)
                                            <li><a
                                                    href="{{ route('front.showCourses', $item->id) }}">{{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-6">
                        <div class="footer__widget footer__pl-70 mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title footer__widget-title-2">{{ __('lang.home_title') }}
                                </h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__subscribe footer__subscribe-2">

                                    <p>
                                        ابدا رحلة تعلمك فى الحال

                                    </p>
                                    <a target="_blank" href="{{ url('/courses') }}" class="btn btn-primary mr-10"><i
                                            class="fab fa-send"></i>
                                        {{ __('lang.join_us') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom footer__bottom-2">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        {{-- <div class="footer__copyright footer__copyright-2 text-center">
                            <p>© 2022 Educal, All Rights Reserved. Design By <a href="index.html">Theme Pure</a>
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->
