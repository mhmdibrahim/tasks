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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/favicon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/favicon-72x72.png">
    <link rel="apple-touch-icon-precomposed" href="img/favicon/favicon-54x54.png">

    <!-- CSS
    ================================================== -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Template styles-->
    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="css/animate.css">
    @yield('styles')
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    @yield('head_scripts')
</head>

<body>
@yield('content')

@yield('scripts')
</body>
</html>