@if (Session::get('locale') == 'ar')
    <link href="{{ asset('assets/css/styles_rtl.min.css') }}" rel="stylesheet" />
@else
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" />
@endif

<link href="{{ asset('assets/css/w3.css') }}" rel="stylesheet" />

@yield('css')
