<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Foundation Template | Portfolio Theme</title>
    <meta name="description" content="Documentation and reference library for ZURB Foundation. JavaScript, CSS, components, grid and more."/>
    <meta name="author" content="ZURB, inc. ZURB network also includes zurb.com"/>
    <meta name="copyright" content="Vitor Faiante. Copyright &copy; date"/>
    <link rel="stylesheet" href="/css/styles.css"/>
    @yield('header')
</head>
<body>

<link href="http://fonts.googleapis.com/css?family=Raleway:600,400,200" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet" type="text/css">

<div class="row">
    <div class="small-12 medium-4 large-6 columns namelogo">
        <h1>Name/Logo/Brand</h1>
    </div>
    <div class="small-12 medium-8 large-6 columns">
        <div class="nav-bar">
            <ul class="button-group">
                <li><a href="#" class="button">About</a></li>
                <li><a href="#" class="button">Work</a></li>
                <li><a href="#" class="button">Contact</a></li>
            </ul>
        </div>
    </div>
</div>

@yield('content')

<footer class="row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-6 columns">
                <p>© Copyright no one at all. Go to town.</p>
            </div>
            <div class="large-6 columns">
                <ul class="inline-list right">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Suscribe</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
    @yield('footer')
</body>
</html>