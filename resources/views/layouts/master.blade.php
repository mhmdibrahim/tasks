<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Syal Dashboard</title>


    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons
    ================================================== -->
    <link rel="icon" href="" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/favicon/favicon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/favicon/favicon-72x72.png">
    <link rel="apple-touch-icon-precomposed" href="/img/favicon/favicon-54x54.png">

    <!-- CSS
    ================================================== -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="/css/bootstrap_rtl.css">
    @endif
    <!-- Template styles-->
    <!-- FontAwesome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    @auth

        <link rel="stylesheet" href="/css/adding.css">
        <link rel="stylesheet" href="/css/extra.css">
        <link  rel="stylesheet"  href="/css/datePicker.css">
        @if(app()->getLocale() == 'ar')
            <link rel="stylesheet" href="/css/headerFooterArabic.css">
        @else
            <link rel="stylesheet" href="/css/headerFooter.css">
        @endif

    @endauth
    @yield('styles')
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
@yield('head_scripts')
</head>

<body>
@auth
    @include('layouts.partials.header')
@endauth
@yield('content')
@auth
    @include('layouts.partials.footer')
@endauth

<!-- initialize jQuery Library -->
<script type="text/javascript" src="/js/jquery.js"></script>
<!-- Bootstrap jQuery -->
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
@auth
    <script src="/js/flatpickr.min.js"></script>
    <script src="/js/adding.js" type="text/javascript"></script>
@endauth
@yield('scripts')
</body>
</html>