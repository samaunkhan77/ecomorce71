<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from nest-frontend-v6.netlify.app/index-5 by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jun 2024 09:28:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>E-Commerce 71</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs')}}/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css')}}/plugins/animate.min.css" />
    <link rel="stylesheet" href="{{asset('assets/css')}}/main5103.css?v=6.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>

<body>
@include('sweetalert::alert')
<!-- Quick view -->
@include('frontend.components.quick')
@include('frontend.components.header')
@include('frontend.components.mobile-header')
<!--End header-->
@yield('content')
@include('frontend.components.footer')
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="{{asset('assets/imgs')}}/theme/loading.gif" alt="" />
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS-->
<script src="{{asset('assets/js')}}/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{asset('assets/js')}}/vendor/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/js')}}/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{asset('assets/js')}}/vendor/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/js')}}/plugins/slick.js"></script>
<script src="{{asset('assets/js')}}/plugins/jquery.syotimer.min.js"></script>
<script src="{{asset('assets/js')}}/plugins/waypoints.js"></script>
<script src="{{asset('assets/js')}}/plugins/wow.js"></script>
<script src="{{asset('assets/js')}}/plugins/perfect-scrollbar.js"></script>
<script src="{{asset('assets/js')}}/plugins/magnific-popup.js"></script>
<script src="{{asset('assets/js')}}/plugins/select2.min.js"></script>
<script src="{{asset('assets/js')}}/plugins/counterup.js"></script>
<script src="{{asset('assets/js')}}/plugins/jquery.countdown.min.js"></script>
<script src="{{asset('assets/js')}}/plugins/images-loaded.js"></script>
<script src="{{asset('assets/js')}}/plugins/isotope.js"></script>
<script src="{{asset('assets/js')}}/plugins/scrollup.js"></script>
<script src="{{asset('assets/js')}}/plugins/jquery.vticker-min.js"></script>
<script src="{{asset('assets/js')}}/plugins/jquery.theia.sticky.js"></script>
<script src="{{asset('assets/js')}}/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="{{asset('assets/js')}}/main5103.js?v=6.0"></script>
<script src="{{asset('assets/js')}}/shop5103.js?v=6.0"></script>
</body>


<!-- Mirrored from nest-frontend-v6.netlify.app/index-5 by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jun 2024 09:28:28 GMT -->
</html>
