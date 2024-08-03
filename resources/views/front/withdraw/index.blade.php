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

        .vodafone-container {
            z-index: 9;
            bottom: -150px;
        }

        .vodafone-card {
            background-image: url('{{ asset('front/assets/img/vodafone.jpg') }}');
            background-size: 100% 100%;
            width: 400px;
            height: 250px;
            padding: 20px;
            margin: auto;
            z-index: 9;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .vodafone-card .phone {
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            margin-top: 170px;
            letter-spacing: 2px;
        }

        .form-group {
            text-align: right;
        }
    </style>
@endsection

@section('content')

    <main>


        <!-- page title area start -->
        <section style=""
            class="w3-display-container page__title-area page__title-height page__title-overlay d-flex align-items-center"
            data-background="{{ url('/front') }}/assets/img/page-title/page-title.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="page__title-wrapper mt-110">
                            <h3 class="page__title">{{ __('lang.withdraw_request') }}</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ __('lang.home') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('lang.withdraw_request') }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w3-display-bottommiddle vodafone-container">
                <div class="vodafone-card">
                    <div class="phone">{{ $phone }}</div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- course area start -->
        <section class="course__area pt-2 pb-120">
            <div class="container pt-5">

                <br>
                <br>
                <br>
                <br>
                <div class="w3-modal-content p-5 mt-5 w3-round-large w3-card">
                    <form method="POST" action="{{ route('front.withdraw.store') }}" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-center mb-3">
                            {{ __('lang.withdraw_title') }}
                        </h2>

                        <div class="form-group mb-2">
                            <b>{{ __('lang.amount') }}</b>
                            <input required type="number" name="amount" class="form-control">
                        </div>

                        <div class="form-group mb-2">
                            <b>{{ __('lang.amount_image') }}</b>
                            <input required type="file" name="image" accept="image/*" class="form-control">
                        </div>

                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary w3-block">{{ __('lang.submit') }}</button>
                        </div>

                    </form>
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
