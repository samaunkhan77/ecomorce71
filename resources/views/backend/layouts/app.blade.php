<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>E-Com 71 Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/imgs')}}/theme/favicon.svg" />
    <!-- Template CSS -->
    <link href="{{asset('admin/assets/css')}}/main5103.css?v=6.0" rel="stylesheet" type="text/css" />
    <script src="{{asset('admin/assets/js')}}/vendors/color-modes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style>
        .tall-textarea {
            height: 300px;
        }
        .icon-bold {
            font-weight: bold;
        }

    </style>
</head>

<body>
@include('sweetalert::alert')
<div class="screen-overlay"></div>
@include('backend.components.navbar')
<main class="main-wrap">
    @include('backend.components.header')
    @yield('admin')
    <!-- content-main end// -->
    @include('backend.components.footer')
</main>
<script src="{{asset('admin/assets/js')}}/vendors/jquery-3.6.0.min.js"></script>
<script src="{{asset('admin/assets/js')}}/vendors/bootstrap.bundle.min.js"></script>
<script src="{{asset('admin/assets/js')}}/vendors/select2.min.js"></script>
<script src="{{asset('admin/assets/js')}}/vendors/perfect-scrollbar.js"></script>
<script src="{{asset('admin/assets/js')}}/vendors/jquery.fullscreen.min.js"></script>
<script src="{{asset('admin/assets/js')}}/vendors/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<!-- Main Script -->
<script src="{{asset('admin/assets/js')}}/main5103.js?v=6.0" type="text/javascript"></script>
<script src="{{asset('admin/assets/js')}}/custom-chart.js" type="text/javascript"></script>
<script>
    new DataTable('#example');
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
</script>
</body>
</html>
