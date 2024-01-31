<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!-- 

Grill Template 

http://www.templatemo.com/free-website-templates/417-grill

-->
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{asset('css/site/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/site/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('css/site/templatemo_style.css')}}">
        <link rel="stylesheet" href="{{asset('css/site/templatemo_misc.css')}}">
        <link rel="stylesheet" href="{{asset('css/site/flexslider.css')}}">
        <link rel="stylesheet" href="{{asset('css/site/testimonails-slider.css')}}">

        <script src="{{asset('js/site/vendor/modernizr-2.6.1-respond-1.1.0.min.js')}}"></script>
    </head>
    <body class="">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

            <header>
				@include("site.layouts.partials.header")
            </header>
            
			@yield('content')

			<footer>
				@include("site.layouts.partials.footer")
            </footer>

    
        <script src="{{asset('js/site/vendor/jquery-1.11.0.min.js')}}"></script>
        <script src="{{asset('js/site/vendor/jquery.gmap3.min.js')}}"></script>
        <script src="{{asset('js/site/plugins.js')}}"></script>
        <script src="{{asset('js/site/main.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>
</html>