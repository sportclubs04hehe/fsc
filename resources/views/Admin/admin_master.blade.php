<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FSC Company</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{asset('Backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('Backend/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('Backend/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('Backend/assets/images/favicon.png')}}" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->

    <!-- partial -->
    @include('Admin.Body.sidebar')
    @include('Admin.Body.header')
        <!-- partial -->
        <div class="main-panel">
                @yield('admin')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
           @include('Admin.Body.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->


    <!-- page-body-wrapper ends -->
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('Backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('Backend/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('Backend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('Backend/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('Backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('Backend/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('Backend/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('Backend/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('Backend/assets/js/misc.js')}}"></script>
<script src="{{asset('Backend/assets/js/settings.js')}}"></script>
<script src="{{asset('Backend/assets/js/dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/assets/js/todolist.js')}}"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->
</body>
</html>
