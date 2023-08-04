<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <style media="screen" type="text/css">

    </style>
    <style media="only screen and (max-width: 480px)" type="text/css">
        @media only screen and (max-width: 480px) {

            table[class="w320"] {
                width: 320px !important;
            }
        }
    </style>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Varela+Round');

        * {
            margin: 0;
            padding: 0;
            font-family: Varela Round, 'Segoe UI', 'Arial', 'san serif';
        }

        img {
            display: inline-block;
        }

        /* .container {
                max-width: 500px;
                margin: 10px auto;
                border-radius: 4px;
                border: 1px solid rgba(0, 0, 0, .1);
                min-height: 100px;
                position: relative;
            } */

        /* .logo {
                display: flex;
                margin: 10px auto 0;
                align-items: center;
                justify-content: center;
                padding-bottom: 15px;
                border-bottom: 1px dotted #ddd;
            } */

        /* .logo img {
            width: 80%;
        } */


        /* .c-name {
            display: inline-block;
            font-weight: 600;
        } */


        /* .thumbs {
                width: 100px;
                margin: auto;
                height: 100px;
            } */

        /*
            .illustration {
                width: 100%;
                text-align: center;
                box-shadow: 0 10px 20px -5px rgba(0, 0, 0, .05);
                border-radius: 0 0 50% 50% / 1%;
                text-align: center;
            } */

        /* .illustration img {
                width: 70%;
                margin: 30px auto;
            } */

        /* .hgroup {
                text-align: center;
                padding: 25px 30px 20px;
            } */

        /* .name {
                display: block;
                margin-bottom: 10px;
                color: #f87320;
                font-weight: 600;
                font-size: 1.1rem;
            } */

        /* .hgroup h1 {
                font-size: 19px;
                font-weight: 600;
                color: #000;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            } */

        .hgroup h2 {
            font-size: 19px;
        }

        /* .hgroup p {
                font-size: 15px;
                color: #000;
                margin-top: 10px;
                text-align: justify;
                line-height: 25px;
            } */

        /* .button-wrap {
                text-align: center;
                padding: 0 0 1rem;
            } */

        /* button.explore {
                border: none;
            } */

        /* button.explore a {
                padding: 15px 25px;
                font: inherit;
                background: linear-gradient(to right, #01345d, #0280EF);
                border-radius: 50px;
                border: 0;
                color: #fff;
                margin: auto;
                display: inline-block;
                transition: all .2s ease-in-out;
                cursor: pointer;
            } */

         button.explore a:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 10px -7px rgba(0, 0, 0, .1);
        }
    </style>

</head>

<body style="font-family:Varela Round, 'Segoe UI', 'Arial', 'san serif';">

    <div class="container" style="max-width:500px; margin:20px auto; border-radius:4px; border:1px solid rgba(0, 0, 0, .1); min-height:100px; position:relative;">
        <div class="logo" style="margin:10px auto 0; align-items:center; justify-content:center; padding-bottom: 15px; border-bottom: 1px dotted #ddd;">
            <center><img src="{{ asset('frontend/images/logo-2.png') }}" alt="cc-logo" border="0" style="width:80%;"></center>
        </div>

        <div class="illustration" style="width: 100%; text-align: center; border-radius: 0 0 50% 50% / 1%; text-align: center; box-shadow: 0 10px 20px -5px rgb(0 0 0 / 15%);">

            <div style="text-align:center; padding:25px 30px 20px;">

                <span class="name" style="display:block;  margin-bottom:10px; color: #f87320; font-weight:600; font-size:1.1rem;">Hello,
                    @isset($user_name)
                        {{ $user_name->name }}
                    @endisset
                </span>

                <h1 style="font-size: 19px; font-weight: 600; color: #000; text-transform: uppercase; letter-spacing: 0.5px;">
                    Welcome to RichIND!</h1>

                <div class="thumbs" style="width:100px; margin:auto; height:100px;">
                    <img src="{{ asset('frontend/images/good.png') }}" alt="good" border="0" style="width: 80%; margin: 30px auto;">
                </div>

            </div>

        </div>

        <div class="hgroup" style="text-align:center; padding: 25px 30px 20px;">
            <p style="font-size: 15px; color: #000; margin-top: 10px;text-align: justify; line-height: 25px;">
                RichIND is a leading affiliate marketing website that specializes in digital marketing courses. Our
                mission is to provide high-quality training to help individuals and businesses develop the skills they
                need to succeed in the digital age.</p>
            <p style="font-size: 15px; color: #000; margin-top: 10px;text-align: justify; line-height: 25px;">You have
                successfully been registered to use RichIND </p>
        </div>
        <div class="button-wrap" style="border:none;text-align: center; padding: 0 0 1rem;">
            <button class="explore" style="border:none; background: #fff;">
                <a href="{{ route('signin') }}" style="padding: 15px 25px; font: inherit; background: #392c7d; border-radius: 50px; border: 0; color: #fff; margin: auto; display: inline-block; transition: all .2s ease-in-out; cursor: pointer;">
                    Visit Account and Start Managing</a>
            </button>
        </div>
    </div>
</body>

</html>


</body>

</html>
