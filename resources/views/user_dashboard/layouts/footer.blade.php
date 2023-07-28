<footer class="footer">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> all right reserved.
            </div>

        </div>
    </div>
</footer>
<!-- bundle -->
<script src="{{ asset('user_dashboard/js/vendor.min.js') }}"></script>

<script src="{{ asset('user_dashboard/js/jquery.knob.min.js') }}"></script>
<!-- Apex js-->
<script src="{{ asset('user_dashboard/js/apexcharts.min.js') }}"></script>

<script src="{{asset('user_dashboard/js/daterangepicker.js')}}"></script>

<script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>

<!-- Dashboard init-->
<script src="{{ asset('user_dashboard/js/pages/dashboard-sales.init.js')}}"></script>

<script src="{{ asset('user_dashboard/js/app.min.js') }}"></script>


<script type="text/javascript">

    $(function(){
        //alerts
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
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

    $('#reservation').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('#reservation').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + '-' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
</script>

