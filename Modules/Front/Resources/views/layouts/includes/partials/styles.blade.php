
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>
<!-- Bootsrap -->
<link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css' ) }}">
<!-- Font awesome -->
<link rel="stylesheet" href="{{ asset('front/assets/css/font-awesome.min.css' ) }}">
<!-- Owl carousel -->
<link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.css' ) }}">
<!-- Template main Css -->
<link rel="stylesheet" href="{{ asset('front/assets/css/style.css' ) }}">
<!-- Modernizr -->
<script src="{{ asset('front/assets/js/modernizr-2.6.2.min.js' ) }}"></script>
@toastr_css

@yield('css')
<style type="text/css">
    #loading {
        position: fixed;
        width: 100%;
        height: 100vh;
        background: #fff url("{{ asset('images/adminloader.gif')}}")  no-repeat center center;
        z-index: 9999;
    }
</style>