<script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.appear.js') }}"></script>
<script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script type="text/javascript">
// Convert function to format numbers in Indian currency format
function convert(num) {
    return num.toLocaleString('en-IN'); // Formats number as per Indian numbering system
}

$('.counter-value').each(function () {
    const targetValue = parseInt($(this).text().replace(/,/g, ''), 10); // Ensure numeric value

    if (isNaN(targetValue)) {
        console.error(`Invalid target value for counter: ${$(this).text()}`);
        return; // Skip this element if target value is not a valid number
    }

    $(this).prop('Counter', 0).animate(
        {
            Counter: targetValue,
        },
        {
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(convert(Math.ceil(now))); // Applying Indian currency formatting
            }.bind(this), // Ensures proper `this` context
        }
    );
});


    $(function() {
        $('.select2').select2();

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
