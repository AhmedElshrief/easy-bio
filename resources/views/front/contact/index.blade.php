@extends('front.layout.master')

@section('title', __('lang.contact'))

@section('css')
    <style>
        .right-text *,
        .right-text {
            text-align: right !important;
        }

        .main-menu ul li a {
            color: white !important;
        }

        pre {
            overflow: visible;
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
                            <h3 class="page__title mb-4">{{ __('lang.contact') }}</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ __('lang.home') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('lang.contact') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- contact area start -->
        <section class="contact__area pt-115 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-7 col-xl-7 col-lg-6">
                        <div class="contact__wrapper">
                            <div class="section__title-wrapper mb-40 w-100">
                                <pre>
                                 أهلاً بكم في منصة Easy Bio حيث علم الأحياء كما لم تراه من قبل

- ما هي المواد التي يتم تدريسها في المنصة ؟

يتم تدريس مادة الأحياء للصف الثالث الثانوي فقط - كما يتم تدريس المادة باللغة العربية (للمدارس الحكومي) و أيضاً الأحياء باللغة الإنجليزية (للمدارس اللغات)

- كيفية عمل المنصة ؟

يُفضل فتح المنصة على جهاز كمبيوتر أو لابتوب لتجربة أفضل.
لكل طالب محفظة داخل المنصة يستطيع شراء فيديوهات الحصص من خلالها ، و يتم خصم قيمة الحصة من المحفظة تلقائياً بعد الشراء و لا يمكن استرداد القيمة
المدفوعة بعد عملية الشراء ،
ويتوافر على المنصة فيديوهات شرح لكافة فصول المنهج و أيضاً فيديوهات حل أسئلة سواء من كتب خارجية أو من ملزمة Easy Bio

ملحوظة هامة : بعد الشراء يتم توفير الحصة للطالب لمدة لا تتجاوز ال١٠ ساعات كحد أقصى (مع العلم أن الحصة لا تتجاوز ال٣ ساعات) ثم بعدها يتم اغلاق
الحصة ؛ لذا يجب على الطالب شراء الحصة فقط عند استعداده لمشاهدتها و هذا حتى لا يحدث تراكم للحصص.


- كيفية الدفع لمشاهدة فيديوهات Easy Bio ؟

يقوم الطالب بإنشاء حساب جديد على المنصة ثم يتم الدفع عن طريق عن طريق فودافون كاش و بعدها يتم التواصل مع تيم المنصة هاتفياً أو على الواتساب
لشحن رصيد المحفظة.

- كيفية طلب ملازم Easy Bio ؟

يتم طلب الملازم بعد دفع قيمتها عن طريق فودافون كاش و ستصل إليك عن طريق البريد المصري.
ملحوظة هامة جداً : عزيزي الطالب ممنوع منعاً باتاً طلب استرجاع النقود المدفوعة للمحفظة و لا يتم ارجاع أي نقود للطالب بعد التحويل و التفعيل ، شكراً لحسن تفهمكم و عام سعيد بإذن الله.
                                 </pre>
                            </div>
                            <div class="contact__form">

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 offset-xxl-1 col-xl-4 offset-xl-1 col-lg-5 offset-lg-1">
                        <div class="contact__info white-bg p-relative z-index-1">
                            {{-- <div class="contact__shape">
                                <img class="contact-shape-1"
                                    src="{{ url('/front') }}/assets/img/contact/contact-shape-1.png" alt="">
                                <img class="contact-shape-2"
                                    src="{{ url('/front') }}/assets/img/contact/contact-shape-2.png" alt="">
                                <img class="contact-shape-3"
                                    src="{{ url('/front') }}/assets/img/contact/contact-shape-3.png" alt="">
                            </div> --}}
                            <div class="contact__info-inner white-bg">
                                <ul>
                                    <li>
                                        <div class="contact__info-item d-flex align-items-start mb-35">
                                            <div class="contact__info-icon mr-15">
                                                <svg class="map" viewBox="0 0 24 24">
                                                    <path class="st0"
                                                        d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z" />
                                                    <circle class="st0" cx="12" cy="10" r="3" />
                                                </svg>
                                            </div>
                                            <div class="contact__info-text">
                                                <h4>{{ __('lang.address_ar') }}</h4>
                                                <p><a target="_blank"
                                                        href="https://www.google.com/maps/place/محافظة بني سويف - أرض الحرية (أرض السجن قديماً) - برج الأطباء المتواجد أسفله صيدلية فريد عكاشة - على يسار مركز الإيمان للأشعة">
                                                        محافظة بني سويف - أرض الحرية (أرض السجن قديماً) - برج الأطباء
                                                        المتواجد أسفله صيدلية فريد عكاشة - على يسار مركز الإيمان للأشعة
                                                    </a>
                                                </p>

                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact__info-item d-flex align-items-start mb-35">
                                            <div class="contact__info-icon mr-15">
                                                <svg class="mail" viewBox="0 0 24 24">
                                                    <path class="st0"
                                                        d="M4,4h16c1.1,0,2,0.9,2,2v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6C2,4.9,2.9,4,4,4z" />
                                                    <polyline class="st0" points="22,6 12,13 2,6 " />
                                                </svg>
                                            </div>
                                            <div class="contact__info-text">
                                                <h4>{{ trans('lang.email') }}</h4>
                                                <p><a
                                                        href="mailto:{{ $settings['email'] ?? '#' }}">{{ $settings['email'] ?? '#' }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact__info-item d-flex align-items-start mb-35">
                                            <div class="contact__info-icon mr-15">
                                                <svg class="call" viewBox="0 0 24 24">
                                                    <path class="st0"
                                                        d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z" />
                                                </svg>
                                            </div>
                                            <div class="contact__info-text">
                                                <h4>{{ __('lang.phone') }}</h4>
                                                <p><a
                                                        href="tel:{{ $settings['phone'] ?? '#' }}">{{ $settings['phone'] ?? '#' }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="contact__social pl-30">
                                    <h4>Follow Us</h4>
                                    <ul>
                                        <li><a target="_blank" href="{{ $settings['facebook'] ?? '#' }}" class="fb"><i
                                                    class="social_facebook"></i></a></li>
                                        <li><a href="{{ $settings['twitter'] ?? '#' }}" class="tw"><i
                                                    class="social_twitter"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact area end -->

        <!-- contact info area end -->
    </main>
@endsection
