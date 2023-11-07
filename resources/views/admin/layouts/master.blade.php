<!DOCTYPE html>
<html lang="{{ Session::get('locale') }}"
    @if (Session::get('locale') == 'en') dir="ltr" @else dir="rtl"  @endif>

    {{-- <html lang="{{ Session::get('locale') }}"
    @if (Session::get('locale') == 'ar') direction="rtl" dir="rtl" style="direction: rtl" @endif> --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ env('APP_NAME') }} | @yield('title')</title>

    {{-- <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" /> --}}
    @include('admin.layouts.css')
</head>

<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">


        <!-- Sidebar Start -->
        @include('admin.layouts.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('admin.layouts.header')
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                @yield('content')

                @include('admin.layouts.footer')
            </div>

        </div>
    </div>

    @include('admin.layouts.script')
    @include('vendor.sweetalert.alert')
</body>

</html>
