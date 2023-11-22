@extends('front.layout.master')

@section('title', __('lang.home'))

@section('css')
    <style>
        .right-text *,
        .right-text {
            text-align: right !important;
        }

        .main-menu ul li a {
            color: black !important;
        }

        .sticky .main-menu ul li a {
            color: black !important;
        }
    </style>
@endsection

@section('content')
    <main>

        <!-- hero area start -->
        <section class="hero__area hero__height hero__height-2 d-flex align-items-center blue-bg-3 p-relative fix">
            <div class="hero__shape">
                <img class="hero-1-circle" src="{{ url('/front') }}/assets/img/shape/hero/hero-1-circle.png" alt="">
                <img class="hero-1-circle-2" src="{{ url('/front') }}/assets/img/shape/hero/hero-1-circle-2.png"
                    alt="">
                <img class="hero-1-dot-2" src="{{ url('/front') }}/assets/img/shape/hero/hero-1-dot-2.png" alt="">
            </div>
            <div class="container">
                <div class="hero__content-wrapper mt-90">
                    <div class="row align-items-center">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="hero__content hero__content-2 p-relative z-index-1">
                                <h1 class="hero__title hero__title-2">
                                    EASY BIO

                                </h1>
                                <h2>
                                    {{ __('lang.home_title') }}
                                </h2>
                                <button>
                                    {{ __('lang.get_started') }}
                                </button>

                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="hero__thumb-wrapper mb--120">
                                <div class="hero__thumb-2 scene">
                                    <img class="hero-big" src="{{ url('/front') }}/assets/img/boy.png" alt="">
                                    <img class="hero-shape-purple"
                                        src="{{ url('/front') }}/assets/img/hero/hero-2/hero-shape-purple.png"
                                        alt="">

                                    <div class="hero__promotion d-flex white-bg layer" data-depth="0.1">
                                        <div class="hero__promotion-icon inspiration mr-10">
                                            <span>
                                                <svg viewBox="0 0 512 512">
                                                    <g>
                                                        <path class="st0"
                                                            d="M158.5,87.1c7.2-4.1,9.6-13.3,5.5-20.5l-15-26c-4.2-7.2-13.4-9.7-20.5-5.5c-7.2,4.1-9.6,13.3-5.5,20.5l15,26   C142.2,88.9,151.4,91.2,158.5,87.1z" />
                                                        <path class="st0"
                                                            d="M66.6,348l-26,15c-7.2,4.1-9.6,13.3-5.5,20.5c4.2,7.2,13.4,9.6,20.5,5.5l26-15c7.2-4.1,9.6-13.3,5.5-20.5   C83,346.3,73.8,343.9,66.6,348z" />
                                                        <path class="st0"
                                                            d="M445.4,164l26-15c7.2-4.1,9.6-13.3,5.5-20.5s-13.4-9.6-20.5-5.5l-26,15c-7.2,4.1-9.6,13.3-5.5,20.5   C429.1,165.7,438.3,168.1,445.4,164z" />
                                                        <path class="st0"
                                                            d="M430.4,374l26,15c7.1,4.1,16.3,1.7,20.5-5.5c4.1-7.2,1.7-16.3-5.5-20.5l-26-15c-7.2-4.1-16.3-1.7-20.5,5.5   C420.7,360.7,423.2,369.8,430.4,374z" />
                                                        <path class="st0"
                                                            d="M81.6,138l-26-15c-7.2-4.1-16.3-1.7-20.5,5.5s-1.7,16.3,5.5,20.5l26,15c7.1,4.1,16.3,1.7,20.5-5.5   C91.3,151.3,88.8,142.2,81.6,138z" />
                                                        <path class="st0"
                                                            d="M374,81.6l15-26c4.1-7.2,1.7-16.3-5.5-20.5c-7.2-4.2-16.3-1.7-20.5,5.5l-15,26c-4.1,7.2-1.7,16.3,5.5,20.5   C360.6,91.2,369.8,88.9,374,81.6z" />
                                                        <path class="st0"
                                                            d="M271,46V15c0-8.3-6.7-15-15-15s-15,6.7-15,15v31c0,8.3,6.7,15,15,15C264.3,61,271,54.3,271,46z" />
                                                        <path class="st0"
                                                            d="M15,271h31c8.3,0,15-6.7,15-15s-6.7-15-15-15H15c-8.3,0-15,6.7-15,15C0,264.3,6.7,271,15,271z" />
                                                        <path class="st0"
                                                            d="M497,241h-31c-8.3,0-15,6.7-15,15c0,8.3,6.7,15,15,15h31c8.3,0,15-6.7,15-15S505.3,241,497,241z" />
                                                        <path class="st0" d="M271,259.5l-15-30l-15,30V271h30V259.5z" />
                                                        <path class="st0" d="M241,301h30v60h-30V301z" />
                                                        <path class="st0"
                                                            d="M93.5,226.9c-9.4,54.9,8.7,110.3,48.6,148.3c24.7,23.5,38.9,57.6,38.9,91.8c0,24.8,20.2,45,45,45h60   c24.8,0,45-20.2,45-45c0-34.1,14.2-68.2,38.9-91.8c33-31.4,51.1-73.8,51.1-119.2c0-90.6-73-164.4-164.4-164.9   C172.2,90.6,106.4,151.7,93.5,226.9z M211,256c0-2.3,0.5-4.6,1.6-6.7l30-60c5.1-10.2,21.7-10.2,26.8,0l30,60c1,2.1,1.6,4.4,1.6,6.7   v120c0,8.3-6.7,15-15,15h-60c-8.3,0-15-6.7-15-15V256z" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="hero__promotion-text">
                                            <h5>{{ __('lang.new_idea') }}</h5>
                                            <p>{{ __('lang.new_idea_desc') }}</p>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="hero__promotion education d-none d-lg-flex white-bg layer" data-depth="0.2">
                                        <div class="hero__promotion-icon mr-10">
                                            <span class="cap">
                                                <svg viewBox="0 0 791.8 791.8">
                                                    <g>
                                                        <path class="st0"
                                                            d="M395.9,501l-236.2-72.7v71.5v49.9c0,56.1,105.8,101.6,236.3,101.6s236.3-45.5,236.3-101.6   c0-0.4-0.1-0.9-0.2-1.3V428.3L395.9,501z" />
                                                        <path class="st0"
                                                            d="M0,318.7l84.4,30.2l7.2-15.4l31-2.6l4.4,4.6l-26.6,6.3l-3.9,11.5c0,0-60.1,125.6-51.3,187c0,0,37.5,22.4,75,0   l10-168v-14l55.8-12.6l-3.9,9.7L140.5,369l19.2,6.9l236.2,72.7l236.2-72.7l159.7-57.1L395.9,166.4L0,318.7z" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="hero__promotion-text">
                                            <h5>{{ App\Models\Lesson::count() }}</h5>
                                            <p>{{ __('lang.new_lessons_desc') }}</p>
                                        </div>
                                    </div>
                                    <div class="hero__class d-none d-lg-flex layer" data-depth="0.3">
                                        <div class="hero__class-thumb mr-15">
                                            <img src="{{ url('/front') }}/assets/img/hero/hero-2/hero-sm.jpg"
                                                alt="">
                                        </div>
                                        <div class="hero__class-text">
                                            <h5>{{ __('lang.new_student_ux') }}</h5>
                                            <p>{{ __('lang.tomorrow_desc') }}</p>
                                            <a href="/">{{ __('lang.join_us') }}</a>
                                        </div>
                                    </div>
                                    <div class="hero__mic">
                                        <span>
                                            <svg viewBox="0 0 512 512">
                                                <g>
                                                    <g>
                                                        <path class="st0"
                                                            d="M435.7,0H126.5C89.6,0,59.6,30,59.6,66.9v378.3c0,36.9,30,66.9,66.9,66.9h309.2c9.2,0,16.7-7.5,16.7-16.7    c0-17.5,0-461.2,0-478.6C452.4,7.5,444.9,0,435.7,0z M338.9,396.2c0,13.7-15.7,21.5-26.6,13.4L244,358.9h-54.2    c-9.2,0-16.7-7.5-16.7-16.7v-72c0-9.2,7.5-16.7,16.7-16.7H244l68.3-50.7c11-8.2,26.6-0.3,26.6,13.4V396.2z M419,100.3H126.5    c-18.5,0-33.5-15-33.5-33.5c0-18.5,15-33.5,33.5-33.5H419V100.3z" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="206.5" y="286.8" class="st0" width="26.3"
                                                            height="38.7" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <polygon class="st0"
                                                            points="266.2,278.5 266.2,333.8 305.5,363 305.5,249.3   " />
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero area end -->

        <!-- services area start -->
        <section class="services__area pt-115 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3">
                        <div class="section__title-wrapper section-padding mb-60 text-center">
                            <h2 class="section__title">
                                Easy Bio
                            </h2>
                            <p>{{ __('lang.easy_bio_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="services__item blue-bg-4 mb-30">
                            <div class="services__icon">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="m16 10c-1.431 0-2.861-.424-4.283-1.271-.442-.264-.717-.756-.717-1.286v-2.943c0-.276.224-.5.5-.5s.5.224.5.5v2.943c0 .176.09.343.229.426 2.538 1.514 5.004 1.514 7.541 0 .14-.083.23-.25.23-.426v-2.943c0-.276.224-.5.5-.5s.5.224.5.5v2.943c0 .529-.275 1.021-.718 1.285-1.421.848-2.851 1.272-4.282 1.272z" />
                                    <path
                                        d="m16 7c-.071 0-.143-.016-.209-.046l-6.5-3c-.178-.082-.291-.259-.291-.454s.113-.372.291-.454l6.5-3c.133-.061.286-.061.419 0l6.5 3c.177.082.29.259.29.454s-.113.372-.291.454l-6.5 3c-.066.03-.138.046-.209.046zm-5.307-3.5 5.307 2.449 5.307-2.449-5.307-2.449z" />
                                    <path
                                        d="m1.5 18c-.276 0-.5-.224-.5-.5v-15c0-1.379 1.122-2.5 2.5-2.5h6c.276 0 .5.224.5.5s-.224.5-.5.5h-6c-.827 0-1.5.673-1.5 1.5v15c0 .276-.224.5-.5.5z" />
                                    <path
                                        d="m7.5 20h-4c-1.378 0-2.5-1.121-2.5-2.5s1.122-2.5 2.5-2.5h14.5v-2.5c0-.276.224-.5.5-.5s.5.224.5.5v3c0 .276-.224.5-.5.5h-15c-.827 0-1.5.673-1.5 1.5s.673 1.5 1.5 1.5h4c.276 0 .5.224.5.5s-.224.5-.5.5z" />
                                    <path
                                        d="m18.5 20h-6c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h5.5v-3.5c0-.276.224-.5.5-.5s.5.224.5.5v4c0 .276-.224.5-.5.5z" />
                                    <path
                                        d="m12.5 24c-.111 0-.222-.037-.313-.109l-2.187-1.75-2.188 1.75c-.15.12-.355.143-.529.06-.173-.084-.283-.259-.283-.451v-6c0-.276.224-.5.5-.5s.5.224.5.5v4.96l1.688-1.351c.183-.146.442-.146.625 0l1.687 1.351v-4.96c0-.276.224-.5.5-.5s.5.224.5.5v6c0 .192-.11.367-.283.45-.069.033-.143.05-.217.05z" />
                                    <path
                                        d="m14.5 18h-9c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h9c.276 0 .5.224.5.5s-.224.5-.5.5z" />
                                </svg>
                            </div>
                            <div class="services__content">
                                <h3 class="services__title">
                                    تعلم & وتمتع </h3>
                                <p>
                                    شكل بسيط و جذاب وطريقة سهلة لعرض المحتوى التعليمى ليساعدك على التعلم اسرع
                                    وانجاز مهام اكثر
                                </p>

                                <a href="about.html" class="link-btn-2">
                                    <i class="far fa-arrow-right"></i>
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="services__item pink-bg mb-30">
                            <div class="services__icon">
                                <svg viewBox="0 0 512 512">
                                    <path class="st0"
                                        d="M288,512c-76.5,0-138.7-62.2-138.7-138.7v-64c0-5.9,4.8-10.7,10.7-10.7h256c5.9,0,10.7,4.8,10.7,10.7v64  C426.7,449.8,364.5,512,288,512z M170.7,320v53.3c0,64.7,52.7,117.3,117.3,117.3S405.3,438,405.3,373.3V320H170.7z" />
                                    <path class="st0"
                                        d="M458.7,426.7h-44.8c-5.9,0-10.7-4.8-10.7-10.7c0-5.9,4.8-10.7,10.7-10.7h44.8c8.6,0,16.6-3.3,22.4-9.4  c6.2-6.1,9.6-14,9.6-22.6c0-17.6-14.4-32-32-32h-37.3c-5.9,0-10.7-4.8-10.7-10.7s4.8-10.7,10.7-10.7h37.3  c29.4,0,53.3,23.9,53.3,53.3c0,14.4-5.6,27.8-15.8,37.7C486.5,421.1,473.1,426.7,458.7,426.7L458.7,426.7z" />
                                    <path class="st0"
                                        d="M236.6,256c-3.3,0-6.6-1.5-8.6-4.4c-3.5-4.8-2.4-11.4,2.4-14.9c6.7-4.9,10.1-10.9,9.6-17.1  c-0.6-7-6.2-13.6-15.2-18c-16-7.7-25.9-20.6-27.2-35.3c-1.2-13.8,5.5-27,18.3-36.3c4.8-3.5,11.4-2.4,14.9,2.4  c3.5,4.8,2.4,11.4-2.4,14.9c-6.7,4.9-10.1,10.9-9.6,17.1c0.6,7,6.2,13.6,15.2,18c16,7.7,25.9,20.6,27.2,35.3  c1.2,13.8-5.5,27-18.3,36.3C241,255.3,238.8,256,236.6,256L236.6,256z" />
                                    <path class="st0"
                                        d="M338,256c-3.3,0-6.6-1.5-8.6-4.4c-3.5-4.8-2.4-11.4,2.4-14.9c6.7-4.9,10.1-10.9,9.6-17.1  c-0.6-7-6.2-13.6-15.2-18c-16-7.7-25.9-20.6-27.2-35.3c-1.2-13.8,5.5-27,18.3-36.3c4.8-3.5,11.4-2.4,14.9,2.4  c3.5,4.8,2.4,11.4-2.4,14.9c-6.7,4.9-10.1,10.9-9.6,17.1c0.6,7,6.2,13.6,15.2,18c16,7.7,25.9,20.6,27.2,35.3  c1.2,13.8-5.5,27-18.3,36.3C342.3,255.3,340.1,256,338,256z" />
                                    <path class="st0"
                                        d="M426.7,512H149.3c-5.9,0-10.7-4.8-10.7-10.7s4.8-10.7,10.7-10.7h277.3c5.9,0,10.7,4.8,10.7,10.7  S432.6,512,426.7,512z" />
                                    <path class="st0"
                                        d="M32,442.1c-7.2,0-14.2-2.4-20-7c-7.6-6.1-12-15.3-12-25V66.3c0-12,6.9-23.2,17.6-28.5  c101.9-51.3,178-51.1,238.4,1.1c60.4-52.2,136.5-52.4,238.4-1.1c10.7,5.3,17.6,16.5,17.6,28.5v200.3c0,5.9-4.8,10.7-10.7,10.7  s-10.7-4.8-10.7-10.7V66.3c0-4-2.3-7.7-5.8-9.4c-97-48.9-167.3-47.6-221.5,4.1c-4.1,3.9-10.6,3.9-14.7,0  c-54.2-51.7-124.5-53-221.5-4.2c-3.6,1.8-5.8,5.5-5.8,9.5V410c0,3.3,1.5,6.4,4,8.4c1.5,1.2,4.7,3,9,2.1c25.7-6,46.7-9.8,65.9-12.1  c5.5-0.7,11.1,3.5,11.9,9.3c0.7,5.8-3.5,11.2-9.3,11.9c-18.4,2.2-38.6,6-63.7,11.8C36.7,441.9,34.3,442.1,32,442.1L32,442.1z" />
                                    <path class="st0"
                                        d="M256,106.7c-5.9,0-10.7-4.8-10.7-10.7V53.3c0-5.9,4.8-10.7,10.7-10.7s10.7,4.8,10.7,10.7V96  C266.7,101.9,261.9,106.7,256,106.7z" />
                                </svg>
                            </div>
                            <div class="services__content">
                                <h3 class="services__title">
                                    وفر وقتك

                                </h3>
                                <p>
                                    يمكن ببساطه الاستماع الى دروسك فى اى وقت وفى اى مكان او من خلال حجرتك وانت تحتسى كوب من
                                    القهوه
                                </p>

                                <a href="about.html" class="link-btn-2">
                                    <i class="far fa-arrow-right"></i>
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="services__item purple-bg mb-30">
                            <div class="services__icon">
                                <svg viewBox="0 0 24 24">
                                    <g>
                                        <path
                                            d="m23.5 10c-.1 0-.2 0-.3-.1l-2.5-1.7c-.2-.1-.5-.2-.8-.2h-6.4c-.8 0-1.5-.7-1.5-1.5v-5c0-.8.7-1.5 1.5-1.5h9c.8 0 1.5.7 1.5 1.5v8c0 .2-.1.4-.3.4 0 .1-.1.1-.2.1zm-10-9c-.3 0-.5.2-.5.5v5c0 .3.2.5.5.5h6.4c.5 0 1 .1 1.4.4l1.7 1.2v-7.1c0-.3-.2-.5-.5-.5z" />
                                    </g>
                                    <g>
                                        <path
                                            d="m.5 12c-.1 0-.2 0-.2-.1-.2 0-.3-.2-.3-.4v-8c0-.8.7-1.5 1.5-1.5h8c.3 0 .5.2.5.5s-.2.5-.5.5h-8c-.3 0-.5.2-.5.5v7.1l1.7-1.1c.4-.3.9-.5 1.4-.5h8.4c.3 0 .5.2.5.5s-.2.5-.5.5h-8.4c-.3 0-.6.1-.8.3l-2.5 1.7c-.1 0-.2 0-.3 0z" />
                                    </g>
                                    <g>
                                        <path
                                            d="m5.5 18c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3zm0-5c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                    </g>
                                    <g>
                                        <path
                                            d="m10.5 24c-.3 0-.5-.2-.5-.5v-2c0-.8-.7-1.5-1.5-1.5h-6c-.8 0-1.5.7-1.5 1.5v2c0 .3-.2.5-.5.5s-.5-.2-.5-.5v-2c0-1.4 1.1-2.5 2.5-2.5h6c1.4 0 2.5 1.1 2.5 2.5v2c0 .3-.2.5-.5.5z" />
                                    </g>
                                    <g>
                                        <path
                                            d="m18.5 18c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3zm0-5c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                    </g>
                                    <g>
                                        <path
                                            d="m23.5 24c-.3 0-.5-.2-.5-.5v-2c0-.8-.7-1.5-1.5-1.5h-6c-.8 0-1.5.7-1.5 1.5v2c0 .3-.2.5-.5.5s-.5-.2-.5-.5v-2c0-1.4 1.1-2.5 2.5-2.5h6c1.4 0 2.5 1.1 2.5 2.5v2c0 .3-.2.5-.5.5z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="services__content">
                                <h3 class="services__title">

                                    تنافس وسط زملائك

                                </h3>
                                <p>
                                    كلاما زاد اهتمامك بدروسك و واجباتك ز امتحناتك كلما اكتسبت نفاط خبره تساعدك على الظهور فى
                                    قائمة المنافسين
                                </p>

                                <a href="about.html" class="link-btn-2">
                                    <i class="far fa-arrow-right"></i>
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="services__item green-bg mb-30">
                            <div class="services__icon">
                                <svg viewBox="0 0 512 512">
                                    <path class="st0"
                                        d="M256,512c-1.6,0-3.1-0.3-4.6-1c-53.3-25.3-120.8-27.2-212.3-5.7c-9.6,2.1-19.5-0.1-27.1-6.3  c-7.6-6.1-12-15.3-12-25V130.3c0-12,6.9-23.2,17.6-28.5c45.1-22.8,84.5-35.1,120.5-37.6c5.7-0.3,11,4,11.4,9.9  c0.4,5.9-4,11-9.9,11.4c-33.1,2.3-69.9,13.9-112.4,35.4c-3.6,1.8-5.9,5.5-5.9,9.5V474c0,3.3,1.5,6.4,4,8.4c1.5,1.2,4.7,3.1,9,2.1  c93.8-22.1,164.5-20.5,221.6,5.1c57.1-25.5,127.8-27.1,221.8-5c4.4,0.9,7.4-0.9,8.9-2.1c2.6-2,4-5.1,4-8.4V130.3  c0-4-2.3-7.7-5.8-9.4c-47-23.7-87-35.4-122.5-35.8c-5.9-0.1-10.6-4.9-10.6-10.8c0.1-5.8,4.8-10.6,10.7-10.6h0.1  c38.8,0.4,81.9,12.9,131.9,38.1c10.6,5.3,17.6,16.5,17.6,28.5V474c0,9.8-4.4,18.9-12,25c-7.6,6.1-17.5,8.3-27,6.3  c-91.6-21.5-159.1-19.8-212.4,5.6C259.1,511.7,257.6,512,256,512L256,512z" />
                                    <path class="st0"
                                        d="M256,506.7c-5.9,0-10.7-4.8-10.7-10.7V266.7c0-5.9,4.8-10.7,10.7-10.7s10.7,4.8,10.7,10.7V496  C266.7,501.9,261.9,506.7,256,506.7z" />
                                    <path class="st0"
                                        d="M96,341.3c-1,0-2.1-0.1-3.2-0.5c-5.6-1.8-8.8-7.7-7-13.4C134.1,172.8,193.5,67.4,267.5,5.3  c6.1-5.1,14.4-6.6,21.6-4.1c7,2.5,12.1,8.4,13.6,15.9c9.9,50.6,8.2,93.7-5.2,128.2c-1.1,2.9-3.4,5.2-6.4,6.2c-2.9,1-6.2,0.8-8.9-0.8  l-26.3-15v61.4c0,3.3-1.6,6.5-4.3,8.5c-28.2,21.1-66.3,33.5-113.3,36.6c-11.2,28.3-22,58.8-32.2,91.6  C104.7,338.4,100.5,341.3,96,341.3L96,341.3z M281.8,21.3c-51.7,43.3-96,108.8-134.3,198.8c35.6-3.6,64.9-13.2,87.2-28.5v-74.3  c0-3.8,2-7.3,5.3-9.2c3.2-1.9,7.3-1.9,10.6,0l31,17.7C289.7,97,289.8,62,281.8,21.3L281.8,21.3z" />
                                </svg>
                            </div>
                            <div class="services__content">
                                <h3 class="services__title">
                                    بيئه لطيفة و مسليه

                                </h3>
                                <p>
                                    سوف تشعر من خلال تجربتك انك مستمتع و ايضا سوف يتحول التعلم الى امر ممتع و شيق وبذلك يكون
                                    وقت المذاكره مسلى
                                </p>

                                <a href="about.html" class="link-btn-2">
                                    <i class="far fa-arrow-right"></i>
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services area end -->

        <!-- about area start -->
        <section class="about__area pt-90 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 offset-xxl-1 col-xl-6 col-lg-6">
                        <div class="about__thumb-wrapper">

                            <div class="about__review">
                                <h5> <span>8,200+</span> five ster reviews</h5>
                            </div>
                            <div class="about__thumb ml-100">
                                <img src="{{ url('/front') }}/assets/img/about/about.jpg" alt="">
                            </div>
                            <div class="about__banner mt--210">
                                <img src="{{ url('/front') }}/assets/img/about/about-banner.jpg" alt="">
                            </div>
                            <div class="about__student ml-270 mt--80">
                                <a href="#">
                                    <img src="{{ url('/front') }}/assets/img/about/student-4.jpg" alt="">
                                    <img src="{{ url('/front') }}/assets/img/about/student-3.jpg" alt="">
                                    <img src="{{ url('/front') }}/assets/img/about/student-2.jpg" alt="">
                                    <img src="{{ url('/front') }}/assets/img/about/student-1.jpg" alt="">
                                </a>
                                <p>Join over <span>4,000+</span> students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="about__content pl-70 pr-60 pt-25">
                            <div class="section__title-wrapper mb-25">
                                <h2 class="section__title w3-right-align">
                                    Easy Bio
                                </h2>
                                <p class="w3-right-align">
                                    فلسفتنا هى التعلم بشكل افضل واسهل حتى يقوم الطالب الاستماع الى الدروس من خلال الفيديوهات
                                    المرفوعه بعد ذلك يقوم الطالب برفع تعليق في قسم التعليقات ليشاهده الاخرين ويقوم ايضا
                                    الطالب بالذهاب الى قائمه الواجبات لحل الواجب المرفق مع الدرس ورفع مره اخرى للتصحيح
                                    ويستطيع الطالب الذهاب الى قائمه الامتحانات وانا امتحان الكتروني ايسل صح الامتحان
                                    اوتوماتيك وتظهر له الدرجه في الحال
                                </p>
                            </div>

                            <a href="{{ url('/courses') }}" class="e-btn e-btn-border">
                                {{ __('lang.join_us') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->

        <!-- course area start -->
        <section class="course__area pt-115 pb-120 grey-bg">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12 text-center">
                        <div class="section__title-wrapper mb-60">
                            <h2 class="section__title">
                                {{ __('lang.discover_our_courses') }}
                            </h2>
                            <p>
                                {{ __('lang.discover_our_courses_desc') }}
                            </p>
                        </div>
                    </div>

                </div>
                <div class="row grid">
                    @foreach ($courses as $course)
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 grid-item cat1 cat2 cat4">
                            <div class="course__item white-bg mb-30 fix">
                                <div class="course__thumb w-img p-relative fix">
                                    <a href="course-details.html">
                                        <img src="{{ asset($course->image) }}" alt="">
                                    </a>
                                    <div class="course__tag">
                                        {{-- <a href="#">Art & Design</a> --}}
                                    </div>
                                </div>
                                <div class="course__content">
                                    <div class="course__meta d-flex align-items-center justify-content-between">
                                        <div class="course__lesson">
                                            <span><i class="far fa-book-alt"></i>{{ $course->lessons()->count() }}
                                                {{ __('lang.lesson') }}</span>
                                        </div>
                                        <div class="course__rating">
                                            <span><i class="icon_star"></i>{{ $course->lectures()->count() }} </span>
                                        </div>
                                    </div>
                                    <h3 class="course__title">
                                        <a href="course-details.html">{{ $course->title }}</a>
                                    </h3>
                                    <div class="course__teacher d-flex align-items-center">
                                        <div class="course__teacher-thumb mr-15">
                                            <img src="{{ asset('front/assets/img/logo/logo.png') }}" alt="">
                                        </div>
                                        <h6>
                                            {{ __('lang.home_title') }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="course__more d-flex justify-content-between align-items-center">
                                    <div class="course__status">
                                    </div>
                                    <div class="course__btn">
                                        <a href="course-details.html" class="link-btn">
                                            {{ __('lang.view') }}
                                            <i class="far fa-arrow-right"></i>
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- course area end -->


        <!-- counter area start -->
        <section class="counter__area pt-145 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xl-3 col-xl-6 offset-xl-3">
                        <div class="section__title-wrapper text-center mb-60">
                            <h2 class="section__title">
                                نفخر على
                            </h2>
                            <p>
                                لدينا الكثير من الانجازات
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div
                        class="col-xxl-2 offset-xxl-1 col-xl-2 offset-xl-1 col-lg-3 col-md-3 offset-md-0 col-sm-5 offset-sm-2">
                        <div class="counter__item mb-30">
                            <div class="counter__icon user mb-15">
                                <svg viewBox="0 0 490.7 490.7">
                                    <path class="st0"
                                        d="m245.3 98c-39.7 0-72 32.3-72 72s32.3 72 72 72 72-32.3 72-72-32.3-72-72-72zm0 123.3c-28.3 0-51.4-23-51.4-51.4s23-51.4 51.4-51.4 51.4 23 51.4 51.4-23 51.4-51.4 51.4z" />
                                    <path class="st0"
                                        d="m389.3 180.3c-28.3 0-51.4 23-51.4 51.4s23 51.4 51.4 51.4c28.3 0 51.4-23 51.4-51.4s-23.1-51.4-51.4-51.4zm0 82.2c-17 0-30.8-13.9-30.8-30.8s13.9-30.8 30.8-30.8 30.8 13.9 30.8 30.8-13.9 30.8-30.8 30.8z" />
                                    <path class="st0"
                                        d="m102.9 180.3c-28.3 0-51.4 23-51.4 51.4s23 51.4 51.4 51.4 51.4-23 51.4-51.4-23-51.4-51.4-51.4zm0 82.2c-17 0-30.8-13.9-30.8-30.8s13.9-30.8 30.8-30.8 30.8 13.9 30.8 30.8-13.7 30.8-30.8 30.8z" />
                                    <path class="st0"
                                        d="m245.3 262.5c-73.7 0-133.6 59.9-133.6 133.6 0 5.7 4.6 10.3 10.3 10.3s10.3-4.6 10.3-10.3c0-62.3 50.7-113 113-113s113.1 50.7 113.1 113c0 5.7 4.6 10.3 10.3 10.3s10.3-4.6 10.3-10.3c0-73.7-60-133.6-133.7-133.6z" />
                                    <path class="st0"
                                        d="m389.3 303.6c-17 0-33.5 4.6-47.9 13.4-4.8 3-6.4 9.2-3.5 14.2 3 4.8 9.2 6.4 14.2 3.5 11.2-6.8 24.1-10.4 37.3-10.4 39.7 0 72 32.3 72 72 0 5.7 4.6 10.3 10.3 10.3s10.3-4.6 10.3-10.3c-0.2-51.3-41.8-92.7-92.7-92.7z" />
                                    <path class="st0"
                                        d="m149.4 316.9c-14.5-8.7-30.9-13.3-47.9-13.3-51 0-92.5 41.5-92.5 92.5 0 5.7 4.6 10.3 10.3 10.3s10.3-4.6 10.3-10.3c0-39.7 32.3-72 72-72 13.2 0 26 3.6 37.2 10.4 4.8 3 11.2 1.4 14.2-3.5 2.9-4.9 1.2-11.1-3.6-14.1z" />
                                </svg>
                            </div>
                            <div class="counter__content">
                                <h4><span data-purecounter-duration="1" data-purecounter-end="{{ $data['students'] }}"
                                        class="purecounter">{{ $data['students'] }}</span></h4>
                                <p>الطلاب</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-5">
                        <div class="counter__item counter__pl-80 mb-30">
                            <div class="counter__icon book mb-15">
                                <svg viewBox="0 0 512 512">
                                    <path class="st0"
                                        d="M458.7,512h-384c-29.4,0-53.3-23.9-53.3-53.3V53.3C21.3,23.9,45.3,0,74.7,0H416c5.9,0,10.7,4.8,10.7,10.7v74.7  h32c5.9,0,10.7,4.8,10.7,10.7v405.3C469.3,507.2,464.6,512,458.7,512z M42.7,96v362.7c0,17.6,14.4,32,32,32H448v-384H74.7  C62.7,106.7,51.6,102.7,42.7,96L42.7,96z M74.7,21.3c-17.6,0-32,14.4-32,32s14.4,32,32,32h330.7v-64H74.7z" />
                                    <path class="st0"
                                        d="M309.3,298.7c-2.8,0-5.5-1.1-7.6-3.1l-56.4-56.5l-56.4,56.4c-3.1,3.1-7.6,4-11.6,2.3c-4-1.6-6.6-5.5-6.6-9.8V96  c0-5.9,4.8-10.7,10.7-10.7S192,90.1,192,96v166.3l45.8-45.8c4.2-4.2,10.9-4.2,15.1,0l45.8,45.8V96c0-5.9,4.8-10.7,10.7-10.7  S320,90.1,320,96v192c0,4.3-2.6,8.2-6.6,9.9C312.1,298.4,310.7,298.7,309.3,298.7L309.3,298.7z" />
                                </svg>
                            </div>
                            <div class="counter__content">
                                <h4><span data-purecounter-duration="1" data-purecounter-end="{{ $data['courses'] }}"
                                        class="purecounter">{{ $data['courses'] }}</span></h4>
                                <p>الكورسات</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-xxl-2 offset-xxl-0 col-xl-3 offset-xl-0 col-lg-3 offset-lg-0 col-md-3 offset-md-0 col-sm-5 offset-sm-2">
                        <div class="counter__item counter__pl-34 mb-30">
                            <div class="counter__icon graduate mb-15">
                                <svg viewBox="0 0 512 512">
                                    <g id="Page-1">
                                        <g id="_x30_01---Degree">
                                            <path id="Shape" class="st0"
                                                d="M500.6,86.3L261.8,1c-3.8-1.3-7.9-1.3-11.7,0L11.3,86.3C4.5,88.7,0,95.2,0,102.4    s4.5,13.6,11.3,16.1L128,160.1v53.2c0,33.2,114.9,34.1,128,34.1s128-1,128-34.1v-53.2l25.6-9.1v19.6c0,9.4,7.6,17.1,17.1,17.1    h17.1c9.4,0,17.1-7.6,17.1-17.1V145c0-4-1-7.8-2.8-11.4l42.7-15.3c6.8-2.4,11.3-8.9,11.3-16.1S507.5,88.8,500.6,86.3L500.6,86.3z     M366.9,194.6c-32.5-14.8-101-15.4-110.9-15.4s-78.4,0.6-110.9,15.4v-74.3c5.1-6.6,45.4-17.8,110.9-17.8s105.8,11.2,110.9,17.8    V194.6z M256,230.4c-63.1,0-102.8-10.4-110.2-17.1c7.4-6.6,47.1-17.1,110.2-17.1s102.8,10.4,110.2,17.1    C358.8,220,319.1,230.4,256,230.4z M413.6,131.5L384,142v-22.5c0-33.2-114.9-34.1-128-34.1s-128,1-128,34.1V142L17.1,102.4    l239.1-85.3L426.7,78v43C421.3,123,416.7,126.6,413.6,131.5z M443.7,170.7h-17.1v-25.6c0-4.7,3.8-8.5,8.5-8.5s8.5,3.8,8.5,8.5    v25.6H443.7z M443.7,120.7V84.1l51.2,18.3L443.7,120.7z" />
                                            <path id="Shape_1_" class="st0"
                                                d="M486.4,264.5c-0.5,0-1,0-1.5,0.1C409.2,276.4,332.6,282,256,281.5    c-76.6,0.5-153.2-5.2-228.9-16.9c-0.5-0.1-1-0.1-1.5-0.1c-6,0-25.6,6.8-25.6,93.9s19.6,93.9,25.6,93.9c0.5,0,1-0.1,1.5-0.2    c58.2-9.2,116.9-14.6,175.8-16l-16.7,40c-2.6,6.4-1,13.7,3.9,18.5s12.3,6.1,18.6,3.4l6.5-2.8l2.8,6.5c2.7,6.3,8.9,10.4,15.7,10.4    h0.2c6.9-0.1,13.1-4.3,15.6-10.6l14.8-35.5l14.8,35.3c2.6,6.5,8.8,10.7,15.7,10.8h0.3c6.8,0,12.9-4,15.6-10.2l2.9-6.5l6.4,2.8    c6.3,2.8,13.8,1.5,18.7-3.4c5-4.8,6.5-12.2,3.9-18.6L326.3,437c53.1,1.9,106,7,158.5,15.4c0.5,0.1,1,0.1,1.5,0.1    c6,0,25.6-6.8,25.6-93.9S492.4,264.5,486.4,264.5L486.4,264.5z M283.3,298.4c3.5,13,5.6,26.4,6.2,39.9c-19.3-9-42-6.9-59.4,5.5    c-0.4-15.3-2.4-30.6-5.9-45.5c10.3,0.2,20.9,0.3,31.8,0.3C265.3,298.7,274.4,298.6,283.3,298.4z M264.5,435.2    c-23.6,0-42.7-19.1-42.7-42.7s19.1-42.7,42.7-42.7s42.7,19.1,42.7,42.7S288.1,435.2,264.5,435.2z M25.6,285.9    c6.5,23.6,9.4,48.1,8.5,72.5c0.9,24.5-2,48.9-8.5,72.5c-6.5-23.6-9.4-48.1-8.5-72.5C16.2,333.9,19.1,309.5,25.6,285.9z     M42.8,432.4c4.7-13.5,8.4-36.2,8.4-74s-3.7-60.5-8.4-74c54.2,7.5,108.8,12,163.5,13.5c5.1,19.7,7.5,40.1,7,60.5    c0,1.2,0,2.4-0.1,3.6c-10.2,17-11.3,38-2.7,55.9l-0.4,0.9C154.2,420.2,98.3,424.7,42.8,432.4L42.8,432.4z M233.9,494.9l-6.2-14.3    c-1.9-4.3-6.9-6.3-11.2-4.4l-14.4,6.3l20-48c8.2,8.3,18.7,14.1,30.1,16.5L233.9,494.9z M312.6,476.2c-4.3-1.9-9.3,0.1-11.2,4.4    l-6.3,14.2L276.8,451c11.5-2.4,21.9-8.1,30.2-16.5l20,47.8L312.6,476.2z M484.7,434.8c-54.8-8.4-110.1-13.6-165.5-15.4l-0.6-1.5    c10.7-22.6,6.1-49.5-11.5-67.3c-0.1-17.7-2.1-35.3-6.1-52.6c61.5-1.4,122.9-6.7,183.7-16.1c4,6.7,10.2,33.3,10.2,76.4    S488.6,428,484.7,434.8L484.7,434.8z" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="counter__content">
                                <h4><span data-purecounter-duration="1" data-purecounter-end="{{ $data['lectures'] }}"
                                        class="purecounter">{{ $data['lectures'] }}</span></h4>
                                <p>المحاضرات</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 offset-xxl-1 col-xl-3 col-lg-3 col-md-3 col-sm-5">
                        <div class="counter__item mb-30">
                            <div class="counter__icon globe mb-15">
                                <svg viewBox="0 0 512 512">
                                    <path class="st0"
                                        d="M444.2,150.6c6.9-14.6,10.9-30.4,11.8-46.6c0.1-48.5-39.2-87.9-87.8-88c-28,0-54.4,13.3-71,35.9  C175.7,29.1,58.6,109.2,35.8,230.8s57.3,238.6,178.9,261.4c121.6,22.8,238.6-57.3,261.4-178.9c2.6-13.6,3.8-27.4,3.8-41.3  C480,228.9,467.6,186.7,444.2,150.6z M464,272c0,39.2-11.1,77.6-32.1,110.8c-7.1-34.3-20.4-42.5-36.7-48.8  c-5.3-1.6-10.3-4.4-14.4-8.1c-5.9-6.6-11-13.8-15.2-21.5c-11.4-18.8-25.5-42.1-57.7-58.2l-5.9-2.9c-40.4-20-54-26.8-34.8-84.2  c3.5-10.5,9.5-20.1,17.4-27.9c9.9,32.7,34,71.5,55,101.4c11,15.6,32.6,19.4,48.2,8.4c3.3-2.3,6.1-5.1,8.4-8.4  c14.7-20.6,28-42.3,39.7-64.7C454.4,199.5,464,235.4,464,272z M368,32c39.7,0,72,32.3,72,72c0,24.8-20.2,67.2-56.8,119.4  c-6,8.4-17.6,10.4-26,4.4c-1.7-1.2-3.2-2.7-4.4-4.4C316.2,171.2,296,128.8,296,104C296,64.3,328.3,32,368,32z M48,272  c0-45.4,14.9-89.6,42.4-125.7c12,7.9,65.3,45.5,53.6,86.2c-4.9,14.7-3.4,30.8,4.2,44.3c14.1,24.4,45,32.4,45.6,32.6  c0.3,0.1,26.5,9.1,31.4,27.2c2.7,9.9-1.5,21.5-12.6,34.5c-12.5,15.5-29.2,27.1-48,33.5c-14.5,5.6-27.3,10.6-33.5,33.7  C78.8,399,48,337.4,48,272z M256,480c-39.2,0-77.5-11.1-110.6-32c3.6-20.1,10.6-22.9,25.1-28.5c21.3-7.4,40.1-20.5,54.3-38  c14.8-17.3,20.1-33.8,15.9-49.2c-7.3-26.3-40.4-37.6-42.4-38.2c-0.2-0.1-25.5-6.6-36.3-25.2c-5.3-9.8-6.3-21.4-2.6-31.9  c14.3-50.1-42.1-92-58.8-103.1C140,89.4,196.6,64,256,64c10.9,0,21.7,0.9,32.5,2.6c-5.6,11.7-8.5,24.5-8.5,37.4  c0,3.2,0.3,6.4,0.7,9.5c-13.3,10.4-23.2,24.5-28.6,40.5c-23.6,70.6,1.4,83.1,42.9,103.6l5.8,2.9c28,14,40.3,34.3,51.1,52.2  c4.9,8.8,10.7,17.1,17.5,24.6c5.7,5.3,12.5,9.3,20,11.7c12.9,5,24.1,9.4,29.2,52.4C379.4,451,319.4,480,256,480z M368,152  c26.5,0,48-21.5,48-48s-21.5-48-48-48s-48,21.5-48,48C320,130.5,341.5,152,368,152z M368,72c17.7,0,32,14.3,32,32s-14.3,32-32,32  s-32-14.3-32-32S350.3,72,368,72z" />
                                </svg>
                            </div>
                            <div class="counter__content">
                                <h4><span data-purecounter-duration="1" data-purecounter-end="{{ $data['lessons'] }}"
                                        class="purecounter">{{ $data['lessons'] }}</span></h4>
                                <p>الدروس</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter area end -->


        <!-- blog area start -->
        <section class="blog__area pt-115 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3">
                        <div class="section__title-wrapper text-center mb-60">
                            <h2 class="section__title">أخر الاخبار</h2>
                            <p>
                                تابع احدث المقالات
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="blog__item white-bg mb-30 transition-3 fix">
                            <div class="blog__thumb w-img fix">
                                <a href="blog-details.html">
                                    <img src="{{ url('/front') }}/assets/img/blog/blog-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog__content">
                                <div class="blog__tag">
                                    <a href="#">
                                        التعلم, اولاين
                                    </a>
                                </div>
                                <h3 class="blog__title"><a href="#">
                                        كيف تبدا التعلم اونلاين
                                    </a></h3>
                                <p>
                                    التعليم عبر الانترنت اصبح من اهم وسائل التعليم في عصرنا هذا ، ومع التطور الكبير في
                                    التكنولوجيا كذلك تطورت اساليب التعلم اون لاين و اصبحت كثيرة جدا . و ما أحبه حقًا في هذا
                                    العصر الرقمي هو مدى سهولة تعلم أي شيء تريده.
                                </p>

                                <div class="blog__meta d-flex align-items-center justify-content-between">
                                    <div class="blog__author d-flex align-items-center">
                                        <div class="blog__author-thumb mr-10">
                                            <img src="{{ url('/front') }}/assets/img/blog/author/author-1.jpg"
                                                alt="">
                                        </div>
                                        <div class="blog__author-info">
                                            <h5>
                                                {{ __('lang.home_title') }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="blog__date d-flex align-items-center">
                                        <i class="fal fa-clock"></i>
                                        <span>
                                            {{ date('Y-m-d') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="blog__item white-bg mb-30 transition-3 fix">
                            <div class="blog__thumb w-img fix">
                                <a href="blog-details.html">
                                    <img src="{{ url('/front') }}/assets/img/blog/blog-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog__content">
                                <div class="blog__tag">
                                    <a href="#">
                                        الوقت و الادارة
                                    </a>
                                </div>
                                <h3 class="blog__title"><a href="#">
                                        كيف تدير وقتك
                                    </a></h3>
                                <p>
                                    تعتبر إدارة الوقت من أهمّ العوامل التي تؤدّي إلى النجاح، وبشكل خاصّ في وقتنا الحالي، حيث
                                    زادت أهمية تنظيم وإدارة الوقت بسبب كثرة وسائل الترفيه التي تسبّب إهدار الوقت بشكل غير
                                    مفيد، وتعتبر إدارة الوقت من الأمور التي تحتاج إلى حزمٍ وإصرار.
                                </p>

                                <div class="blog__meta d-flex align-items-center justify-content-between">
                                    <div class="blog__author d-flex align-items-center">
                                        <div class="blog__author-thumb mr-10">
                                            <img src="{{ url('/front') }}/assets/img/blog/author/author-1.jpg"
                                                alt="">
                                        </div>
                                        <div class="blog__author-info">
                                            <h5>
                                                {{ __('lang.home_title') }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="blog__date d-flex align-items-center">
                                        <i class="fal fa-clock"></i>
                                        <span>
                                            {{ date('Y-m-d') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="blog__item white-bg mb-30 transition-3 fix">
                            <div class="blog__thumb w-img fix">
                                <a href="blog-details.html">
                                    <img src="{{ url('/front') }}/assets/img/blog/blog-3.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog__content">
                                <div class="blog__tag">
                                    <a href="#">
                                        النجاح و التفوق
                                    </a>
                                </div>
                                <h3 class="blog__title"><a href="#">
                                        كيف تكون ناجحاً في حياتك
                                    </a></h3>
                                <p>
                                    الجميع يتحدّث عن الأشخاص الناجحين وعن قدراتهم وامكانياتهم وعزيمتهم التي تجعلهم يصلون
                                    للقمة دائماً، فهم المثال الأعلى لأي شخص يرغب تحقيق النجاح، ولأننا نريد أن تصبح أنت أيضاً
                                    شخص ناجح سنُعرّفك على أهم التصرفات التي يقوم بها الأشخاص الناجحين لتكون مثلهم.
                                </p>

                                <div class="blog__meta d-flex align-items-center justify-content-between">
                                    <div class="blog__author d-flex align-items-center">
                                        <div class="blog__author-thumb mr-10">
                                            <img src="{{ url('/front') }}/assets/img/blog/author/author-1.jpg"
                                                alt="">
                                        </div>
                                        <div class="blog__author-info">
                                            <h5>
                                                {{ __('lang.home_title') }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="blog__date d-flex align-items-center">
                                        <i class="fal fa-clock"></i>
                                        <span>
                                            {{ date('Y-m-d') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </section>
        <!-- blog area end -->

        <!-- cta area start -->
        <section class="cta__area mb--100">
            <div class="container">
                <div class="cta__inner cta__inner-2 blue-bg fix">
                    <div class="cta__shape">
                        <img src="{{ url('/front') }}/assets/img/cta/cta-shape.png" alt="">
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-6">
                            <div class="cta__content">
                                <h3 class="cta__title">
                                    ابدا رحلة تعلمك فى الحال
                                </h3>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6">
                            <div class="cta__apps d-lg-flex justify-content-end p-relative z-index-1">
                                <a target="_blank" href="#" class="mr-10"><i class="fab fa-send"></i>
                                    {{ __('lang.join_us') }}
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta area end -->

    </main>
@endsection
