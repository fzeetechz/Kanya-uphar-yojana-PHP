
<!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

<!-- Bootsrap javascript file -->
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>

<!-- owl carouseljavascript file -->
<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>

<!-- Template main javascript -->
<script src="{{ asset('front/assets/js/main.js') }}"></script>

<!-- Validation -->
<script type="text/javascript" src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
@toastr_js
@toastr_render

@yield('js')
<script>
    jQuery(document).ready(function() {
        jQuery('#loading').fadeOut(1000);
    });
</script>
