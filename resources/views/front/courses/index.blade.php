@extends('front.layout.master')

@section('title', __('lang.courses'))

@section('css')
    <style>
        .right-text *,
        .right-text {
            text-align: right !important;
        }

        .main-menu ul li a {
            color: white !important;
        }
    </style>
@endsection

@section('content')

    <main>


        <!-- page title area start -->
        <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
            data-background="{{ url('/front') }}/assets/img/page-title/page-title.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="page__title-wrapper mt-110">
                            <h3 class="page__title mb-4">{{ __('lang.courses') }}</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ __('lang.home') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('lang.courses') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- course area start -->
        <section class="course__area pt-120 pb-120">
            <div class="container">

                <div class="row">
                    <div class="col-xxl-12">
                        <div class="course__tab-conent">
                            <div class="tab-content" id="courseTabContent">
                                <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                    aria-labelledby="grid-tab">
                                    <div class="row">
                                        @foreach ($courses as $item)
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                                <div class="course__item white-bg mb-30 fix">
                                                    <div class="course__thumb w-img p-relative fix">
                                                        <a href="{{ route('front.showCourses', $item->id) }}">
                                                            <img src="{{ asset($item->image) }}" alt="">
                                                        </a>
                                                        <div class="course__tag">
                                                            <a href="#">{{ optional($item->level)->name }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="course__content">
                                                        <div
                                                            class="course__meta d-flex align-items-center justify-content-between">
                                                            <div class="course__lesson">
                                                                <span><i
                                                                        class="far fa-book-alt"></i>{{ $item->lessons()->count() }}
                                                                    {{ __('lang.lessons') }}</span>
                                                            </div>
                                                            <div class="course__rating">
                                                                {{-- <span><i class="icon_star"></i>4.5 (44)</span> --}}
                                                            </div>
                                                        </div>
                                                        <h3 class="course__title">
                                                            <a href="{{ route('front.showCourses', $item->id) }}">
                                                                {{ $item->title }}
                                                            </a>
                                                        </h3>

                                                    </div>
                                                    <div
                                                        class="course__more d-flex justify-content-between align-items-center">
                                                        <div class="course__status">
                                                        </div>
                                                        <div class="course__btn">
                                                            <a href="{{ route('front.showCourses', $item->id) }}"
                                                                class="link-btn">
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

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- course area end -->

        <!-- cta area start -->
        <section class="cta__area mb--120">
            <div class="container">
                <div class="cta__inner blue-bg fix">
                    <div class="cta__shape">
                        <img src="assets/img/cta/cta-shape.png" alt="">
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xxl-7 col-xl-7 col-lg-8 col-md-8">
                            <div class="cta__content">
                                <h3 class="cta__title">
                                    ابدا رحلة تعلمك فى الحال
                                </h3>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-5 col-lg-4 col-md-4">
                            <div class="cta__more d-md-flex justify-content-end p-relative z-index-1">
                                <a href="#" class="e-btn e-btn-white"> {{ __('lang.join_us') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta area end -->


    </main>

@endsection
