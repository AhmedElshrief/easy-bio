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
                            <h3 class="page__title">{{ __('lang.lessons') }}</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">{{ __('lang.home') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('lang.lessons') }}</li>
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
                <div class="course__tab-inner grey-bg-2 mb-50">
                    <div class="row align-items-center">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="course__tab-wrapper d-flex align-items-center">
                                <div class="course__tab-btn">
                                    <ul class="nav nav-tabs" id="courseTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#grid" type="button" role="tab" aria-controls="grid"
                                                aria-selected="true">
                                                <svg class="grid" viewBox="0 0 24 24">
                                                    <rect x="3" y="3" class="st0" width="7" height="7" />
                                                    <rect x="14" y="3" class="st0" width="7" height="7" />
                                                    <rect x="14" y="14" class="st0" width="7" height="7" />
                                                    <rect x="3" y="14" class="st0" width="7" height="7" />
                                                </svg>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link list active" id="list-tab" data-bs-toggle="tab"
                                                data-bs-target="#list" type="button" role="tab" aria-controls="list"
                                                aria-selected="false">
                                                <svg class="list" viewBox="0 0 512 512">
                                                    <g id="Layer_2_1_">
                                                        <path class="st0"
                                                            d="M448,69H192c-17.7,0-32,13.9-32,31s14.3,31,32,31h256c17.7,0,32-13.9,32-31S465.7,69,448,69z" />
                                                        <circle class="st0" cx="64" cy="100" r="31" />
                                                        <path class="st0"
                                                            d="M448,225H192c-17.7,0-32,13.9-32,31s14.3,31,32,31h256c17.7,0,32-13.9,32-31S465.7,225,448,225z" />
                                                        <circle class="st0" cx="64" cy="256" r="31" />
                                                        <path class="st0"
                                                            d="M448,381H192c-17.7,0-32,13.9-32,31s14.3,31,32,31h256c17.7,0,32-13.9,32-31S465.7,381,448,381z" />
                                                        <circle class="st0" cx="64" cy="412" r="31" />
                                                    </g>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="course__view">
                                    <h4>Showing 1 - 9 of 84</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="course__sort d-flex justify-content-sm-end">
                                <div class="course__sort-inner">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="course__tab-conent">
                            <div class="tab-content" id="courseTabContent">
                                <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                    aria-labelledby="grid-tab">
                                    <div class="row">
                                        @foreach ($resource->lessons()->get() as $item)
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                                <div class="course__item white-bg mb-30 fix">
                                                    <div class="course__thumb w-img p-relative fix">
                                                        <a href="course-details.html">
                                                            <img src="{{ asset($item->image) }}" alt="">
                                                        </a>
                                                        <div class="course__tag">
                                                            <a href="#">{{ optional($item->lecture)->title }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="course__content">
                                                        <div
                                                            class="course__meta d-flex align-items-center justify-content-between">
                                                            <div class="course__lesson">
                                                                <span><i
                                                                        class="far fa-book-alt"></i>{{ $item->files()->count() }}
                                                                    {{ __('lang.files') }}</span>
                                                            </div>
                                                            <div class="course__rating">
                                                                {{-- <span><i class="icon_star"></i>4.5 (44)</span> --}}
                                                            </div>
                                                        </div>
                                                        <h3 class="course__title">
                                                            <a href="#  ">
                                                                {{ $item->title }}
                                                            </a>
                                                        </h3>

                                                    </div>
                                                    <div class="course__more">

                                                        <div class="course__btn">
                                                            <form method="post" action="{{ route('front.buyLesson') }}">
                                                                @csrf
                                                                <input type="hidden" name="lesson_id"
                                                                    value="{{ $item->id }}">

                                                                <button type="submit" class="btn btn-primary d-block"
                                                                    style="width: 100%" href="" class="link-btn">
                                                                    {{ __('lang.buy') }}
                                                                    <i class="far fa-arrow-right"></i>
                                                                </button>
                                                            </form>
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
