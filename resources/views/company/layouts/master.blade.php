<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>@yield('title', 'Company Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/mmj-favicon.png') }}">
    @include('company.layouts.partials.styles')
    @yield('styles')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">

        @include('company.layouts.partials.sidebar')

        <!-- main content area start -->
        <div class="main-content">
            @include('company.layouts.partials.header')
            @yield('content')
        </div>
        <!-- main content area end -->
        @include('company.layouts.partials.footer')
    </div>
    <!-- page container area end -->

    @include('company.layouts.partials.offsets')
    @include('company.layouts.partials.scripts')
    @yield('scripts')
    @include('sweetalert::alert')
</body>

</html>
