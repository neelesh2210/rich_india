<footer class="footer  subscribe-newsec">
    <div class="footer-top aos">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="footer-widget footer-menu">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}" title="{{env('APP_NAME')}}-logo" class="navbar-brand logo">
                                    <img src="{{ asset('frontend/images/logo-2.png') }}" alt="{{env('APP_NAME')}}-logo" width="150%">
                                </a>
                            </li>
                            <li>
                                @if (websiteData('support_phone'))
                                @foreach (json_decode(websiteData('support_phone')) as $support_phone)
                                    <a href="tel:{{ $support_phone }}">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <span>{{ $support_phone }}</span>
                                    </a>
                                    @unless ($loop->last)
                                        ,
                                    @endunless
                                @endforeach
                            @endif
                            </li>
                            <li>
                                <a href="mailto:{{ websiteData('email') }}">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span>{{ websiteData('email') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>{{ websiteData('address') }}</span>
                                </a>
                            </li>
                        </ul>
                        <a href="{{socialMediaLink('facebook')}}" target="_blank" class="icons">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="{{socialMediaLink('telegram')}}" target="_blank" class="icons">
                            <i class="fab fa-telegram" aria-hidden="true"></i>
                        </a>
                        <a href="{{socialMediaLink('instagram')}}" target="_blank" class="icons">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="{{socialMediaLink('linkedin')}}" target="_blank"
                            class="icons">
                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="{{socialMediaLink('youtube')}}" target="_blank"
                            class="icons">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Important Links</h2>
                        <ul>
                            <li>
                                <a href="{{route('privacy_policy')}}" title="{{env('APP_NAME')}}-Privacy-Policy">Privacy Policy </a>
                            </li>
                            <li>
                                <a href="{{route('term_and_condition')}}" title="{{env('APP_NAME')}}-Term-and-Conditions">Term and Conditions </a>
                            </li>
                            <li>
                                <a href="#" title="{{env('APP_NAME')}}-End-User-Agreement">End User Agreement </a>
                            </li>
                            <li>
                                <a href="{{route('cancel_and_refund_policy')}}" title="{{env('APP_NAME')}}-Cancelation-and-Refund">Cancelation and Refund</a>
                            </li>
                            <li>
                                <a href="#" title="{{env('APP_NAME')}}-FAQ">FAQ's</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Quick Links</h2>
                        <ul>
                            <li><a href="{{route('about')}}" title="{{env('APP_NAME')}}-About-Us">About Us</a></li>
                            <li><a href="#" title="{{env('APP_NAME')}}-All-Blog">Blog</a></li>
                            <li><a href="{{route('plan')}}" title="{{env('APP_NAME')}}-All-Courses">Our Courses</a></li>
                            <li><a href="{{route('contact')}}" title="{{env('APP_NAME')}}-Contact-Us">Contact Us</a></li>
                            <li>
                                @if (Auth::guard('web')->user())
                                <a title="{{env('APP_NAME')}}-Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
                                @else
                                <a title="{{env('APP_NAME')}}-Login" href="{{ route('signin') }}">Login / Signup</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Our Courses</h2>
                        <ul>
                            @foreach (App\CPU\PlanManager::withoutTrash()->get(); as $plan)
                                <li>
                                    <a href="{{route('plan.detail',$plan->slug)}}" title="{{env('APP_NAME')}}-{{$plan->title}}">
                                        {{$plan->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="copyright-text">
                            <p class="mb-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                Richin. All Rights Reserved.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-5">
                        <div class="copyright-text">
                            <p class="mb-0">
                                Design & Developed By <a href="https://www.techuptechnologies.com" target="_blank" title="Affilate Website & App Development Company.">Techup Technologies</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<script src="{{ asset('frontend/assets/js/common_app.js')}}"></script>
<script src="{{ asset('frontend/assets/js/feather.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/ResizeSensor.js')}}"></script>
<script src="{{ asset('frontend/assets/js/theia-sticky-sidebar.js')}}"></script>
<script src="{{ asset('frontend/assets/js/register.js')}}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/jquery.waypoints.js')}}"></script>
<script src="{{ asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/select2.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/snackbar.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/slick.js')}}"></script>
<script src="{{ asset('frontend/assets/js/aos.js')}}"></script>
<script src="{{ asset('frontend/assets/js/script.js')}}"></script>
<script src="{{ asset('frontend/assets/js/lity.js')}}"></script>
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
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

</script>

<script>
    $(document).ready(function() {
        $(".panel_list").eq(0).children(".panel_heading").addClass("active");
        $(".panel_list").eq(0).children(".panel_para").show();
        $(".panel_heading").on("click", function() {
            $(this).toggleClass("active");
            $(this).next(".panel_para").slideToggle(250);
            $(".panel_heading").not(this).next(".panel_para").slideUp(250);
            $(".panel_heading").not(this).removeClass("active");
        });
    });

</script>

<script>
    $("#dashboard-menu-toggle").click(function(e) {
        e.preventDefault();
        $("#dashboard-wrapper").toggleClass("toggled");
    });

</script>




<script>
    $(document).ready(function() {

        $(".video_show_button").click(function() {

            // alert($(this).data('videoshow'));

            $("." + $(this).data('videoshow')).toggle("slow");

        });

        $('#password_confirmation').change(function() {

            var pass = $('.confirm_password').val();

            if (pass) {

                if (pass == $(this).val()) {

                    $('#register').removeAttr('disabled');

                } else {

                    $('#msg_register').html('password not match').css('color', 'red').fadeIn().delay(6000).fadeOut();

                    $('#register').attr('disabled', 'disabled')



                }

            }

        });

        $('.copy_text').click(function(e) {

            e.preventDefault();

            var copyText = $(this).attr('href');



            document.addEventListener('copy', function(e) {

                e.clipboardData.setData('text/plain', copyText);

                e.preventDefault();

            }, true);



            document.execCommand('copy');

            // console.log('Link Copy : ', copyText);

            alert('Link Copy: ');

        });



    });

</script>
<!-- USer CHange Password -->
<script>
    $(document).ready(function() {
        $('#register-confpassword').keyup(function() {
            var register_password = $('#register-password').val();
            var register_password_len = register_password.length;
            if (register_password) {
                if (register_password_len == ($(this).val()).length) {
                    if ($(this).val() == register_password) {
                        $('#register-btn').removeAttr('disabled');
                    } else {
                        $('#register-btn').attr('disabled', 'disabled');
                        alert('Password Doesnt Match');
                    }
                } else {
                    $('#register-btn').attr('disabled', 'disabled');
                }

            } else {
                $('#register-btn').attr('disabled', 'disabled');
                alert('Please enter password first');
            }
        })
    })

</script>
<!-- USer CHange Password -->
<script>
    $(document).ready(function() {
        $('#email_check').change(function() {
            var email = $('#email_check').val();

            $.post('#', {
                    'email': email
                })
                .done(function(data) {
                    if (data == 'no') {
                        $('#email_msg').html('Email doesnt exsist pleae contact Admin for further details').css('color', 'red').fadeIn().delay(6000).fadeOut();
                        $('#email_btn').attr('disabled', 'disabled');
                    } else {
                        $('#email_btn').removeAttr('disabled');
                    }
                })
        })
    })

</script>
