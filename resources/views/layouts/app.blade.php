<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- Stylesheets -->
    <link href="{{asset('assets/frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/revolution-slider.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('assets/frontend/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('assets/frontend/images/favicon.ico')}}" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="{{asset('assets/frontend/css/responsive.css')}}" rel="stylesheet">
    <!-- CSS -->
    <!-- jQuery and JS bundle w/ Popper.js -->

    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{asset('assets/frontend/js/respond.js')}}"></script><![endif]-->
    @toastr_css

    @yield('style')
</head>

<body>
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"><div class="loader"><div class="cssload-container"><div class="cssload-speeding-wheel"></div></div></div></div>

    <!-- Main Header-->

     @include('partials.frontend.main_header')
    <!--End Main Header -->



   @yield('content')

    <!--Main Footer-->

    @include('partials.frontend.footer')

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>



<script src="{{asset('assets/frontend/js/jquery.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/revolution.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.fancybox-media.js')}}"></script>
<script src="{{asset('assets/frontend/js/owl.js')}}"></script>
<script src="{{asset('assets/frontend/js/wow.js')}}"></script>
<script src="{{asset('assets/frontend/js/script.js')}}"></script>
@toastr_js
@toastr_render

@yield('script')
</body>
</html>
