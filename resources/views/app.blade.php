<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Laravel Todo Tasks">
    <meta name="author" content="Vitor Faiante">

    <title>Laravel Todo Tasks</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{!! asset('assets/css/app.css') !!}"/>
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header-custom')
</head>

<body>
    @include('partials.nav')

    <div class="container">
        @yield('content')
    </div>
    <!-- /container -->

    <!-- Footer Scripts -->
    <script src="{!! asset('assets/js/jquery.js') !!}"></script>
    <script src="{!! asset('assets/js/bootstrap.js') !!}"></script>
    @yield('footer-custom')
</body>
</html>