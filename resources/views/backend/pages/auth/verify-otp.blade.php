<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from bestwpware.com/html/tf/duralux-demo/auth-register-minimal.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jun 2024 06:03:25 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="WRAPCODERS">
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>Duralux || Register Minimal</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('back/assets/images')}}/favicon.ico">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('back/assets/css')}}/bootstrap.min.css">
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('back/assets/vendors')}}/css/vendors.min.css">
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('back/assets/css')}}/theme.min.css">
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
    <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!--! ================================================================ !-->
<!--! [Start] Main Content !-->
<!--! ================================================================ !-->
@include('sweetalert::alert')
<main class="auth-minimal-wrapper">
    <div class="auth-minimal-inner">
        <div class="minimal-card-wrapper">
            <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                    <img src="{{asset('back/assets/images')}}/logo-abbr.png" alt="" class="img-fluid">
                </div>
                <div class="card-body p-sm-5">
                    <h2 class="fs-20 fw-bolder mb-4">Verify <a href="javascript:void(0);" class="float-end fs-12 text-primary"></a></h2>
                    <h4 class="fs-13 fw-bold mb-2">Please enter th e code generated one time password to verify your account.</h4>
                    <p class="fs-12 fw-medium text-muted"><span>A code has been sent to</span> <strong>{{@$user->email}}</strong></p>
                    <form action="{{route('verify.otp.post')}}" method="post" class="w-100 mt-4 pt-2">
                        @csrf
                        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                            <input class="m-2 text-center form-control rounded" type="text" name="otp" required>
                            {{--<input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" required>
                            <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" required>
                            <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" required>
                            <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" required>
                            <input class="m-2 text-center form-control rounded" type="text" id="fifth" maxlength="1" required>
                            <input class="m-2 text-center form-control rounded" type="text" id="sixth" maxlength="1" required>--}}
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-lg btn-primary w-100">Validate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!--! ================================================================ !-->
<!--! [End] Main Content !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! BEGIN: Theme Customizer !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! [End] Theme Customizer !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! Footer Script !-->
<!--! ================================================================ !-->
<!--! BEGIN: Vendors JS !-->
<script src="{{asset('back/assets/vendors')}}/js/vendors.min.js"></script>
<!-- vendors.min.js {always must need to be top} -->
<script src="{{asset('back/assets/vendors')}}/js/lslstrength.min.js"></script>
<!--! END: Vendors JS !-->
<!--! BEGIN: Apps Init  !-->
<script src="{{asset('back/assets/js')}}/common-init.min.js"></script>
<!--! END: Apps Init !-->
<!--! BEGIN: Theme Customizer  !-->
<script src="{{asset('back/assets/js')}}/theme-customizer-init.min.js"></script>
<!--! END: Theme Customizer !-->
</body>


<!-- Mirrored from bestwpware.com/html/tf/duralux-demo/auth-register-minimal.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jun 2024 06:03:25 GMT -->
</html>



