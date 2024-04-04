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

         button.explore a:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 10px -7px rgba(0, 0, 0, .1);
        }
    </style>

</head>

<body style="font-family:Varela Round, 'Segoe UI', 'Arial', 'san serif';">

    <div class="container" style="max-width:525px; margin:20px auto; border-radius:4px; border:1px solid rgba(0, 0, 0, .1); min-height:100px; position:relative;background: linear-gradient(90deg, #9d177e85, #4c27a66e);">
        <div class="logo" style="margin:10px auto 0; align-items:center; justify-content:center; padding-bottom: 15px; border-bottom: 1px dashed #c3c3c391;">
            <center><img src="{{ asset('frontend/images/logo-2.png') }}" alt="cc-logo" border="0" style="width:275px;"></center>
        </div>

        <div class="illustration" style="width: 100%; text-align: center; border-radius: 0 0 50% 50% / 1%; text-align: center; box-shadow: 0 10px 20px -5px rgb(0 0 0 / 15%);">

            <div style="text-align:center; padding:25px 30px 20px;">

                <span class="name" style="display:block;  margin-bottom:10px; color: #5222a4; font-weight:600; font-size:1.1rem;">Hello,
                    @isset($user_name)
                        {{ $user_name->name }}
                    @endisset
                </span>

                <h1 style="font-size: 19px; font-weight: 600; color: #000; text-transform: uppercase; letter-spacing: 0.5px;">
                    Welcome to RichIND!</h1>

                <div class="thumbs" style="width:150px; margin:auto; height:150px;">
                    <img src="{{ asset('frontend/images/hanshake.gif') }}" alt="good" border="0" style="width: 100%;">
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
            <button class="explore" style="border:none; background: transparent;">
                <a href="{{ route('index') }}" style="text-decoration-line: none;font-size: 15px;padding: 15px 25px; background: #971680; border: 0; color: #fff; margin: auto; display: inline-block; transition: all .2s ease-in-out; cursor: pointer; font-weight: bold;letter-spacing: 1px;">
                    Visit Account and Start Managing <img src="{{ asset('frontend/images/next.png') }}" style="margin: -4px"> </a>
            </button>
        </div>
    </div>
</body>

</html>


</body>

</html>
