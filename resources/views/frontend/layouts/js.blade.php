<script src="{{ asset('frontend/assets/vendors/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/tilt/tilt.jquery.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/countdown/countdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/richind.js') }}"></script>
<script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>

<script type="text/javascript">

    $(function(){
        //alerts
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
        });
        var success_message = "{{ Session::get('success') }}";
        var info_message = "{{ Session::get('info') }}";
        var error_message = "{{ Session::get('error') }}";
        var warning_message = "{{ Session::get('warning') }}";
        if (success_message != "") {
            success_alert(success_message);
        }
        if (info_message != "") {
            info_alert(info_message);
        }
        if (error_message != "") {
            error_alert(error_message)
        }
        if (warning_message != "") {
            warning_alert(warning_message)
        }
        function success_alert(success_message) {
            Toast.fire({
                icon: 'success',
                title: success_message
            })
        }
        function info_alert(info_message) {
            Toast.fire({
                icon: 'info',
                title: info_message
            })
        }
        function error_alert(error_message) {
            Toast.fire({
                icon: 'error',
                title: error_message
            })
        }
        function warning_alert(warning_message) {
            Toast.fire({
                icon: 'warning',
                title: warning_message
            })
        }
    });
</script>

@stack('js')
