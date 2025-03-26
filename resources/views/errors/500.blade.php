<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 - Internal Server Error</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
        }

        #notfound {
            position: relative;
            height: 100vh;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        #notfound .notfound-bg {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            overflow: hidden;
        }

        #notfound .notfound-bg>div {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 1px;
            background-color: #eee;
        }

        #notfound .notfound-bg>div:nth-child(1) {
            left: 20%;
        }

        #notfound .notfound-bg>div:nth-child(2) {
            left: 40%
        }

        #notfound .notfound-bg>div:nth-child(3) {
            left: 60%
        }

        #notfound .notfound-bg>div:nth-child(4) {
            left: 80%
        }

        #notfound .notfound-bg>div:after {
            content: '';
            position: absolute;
            top: 0px;
            left: -0.5px;
            -webkit-transform: translateY(-160px);
            -ms-transform: translateY(-160px);
            transform: translateY(-160px);
            height: 160px;
            width: 2px;
            background-color: #5751e1;
        }

        @-webkit-keyframes drop {
            90% {
                height: 20px;
            }

            100% {
                height: 160px;
                -webkit-transform: translateY(calc(100vh + 160px));
                transform: translateY(calc(100vh + 160px));
            }
        }

        @keyframes drop {
            90% {
                height: 20px;
            }

            100% {
                height: 160px;
                -webkit-transform: translateY(calc(100vh + 160px));
                transform: translateY(calc(100vh + 160px));
            }
        }

        #notfound .notfound-bg>div:nth-child(1):after {
            -webkit-animation: drop 3s infinite linear;
            animation: drop 3s infinite linear;
            -webkit-animation-delay: 0.2s;
            animation-delay: 0.2s;
        }

        #notfound .notfound-bg>div:nth-child(2):after {
            -webkit-animation: drop 2s infinite linear;
            animation: drop 2s infinite linear;
            -webkit-animation-delay: 0.7s;
            animation-delay: 0.7s;
        }

        #notfound .notfound-bg>div:nth-child(3):after {
            -webkit-animation: drop 3s infinite linear;
            animation: drop 3s infinite linear;
            -webkit-animation-delay: 0.9s;
            animation-delay: 0.9s;
        }

        #notfound .notfound-bg>div:nth-child(4):after {
            -webkit-animation: drop 2s infinite linear;
            animation: drop 2s infinite linear;
            -webkit-animation-delay: 1.2s;
            animation-delay: 1.2s;
        }

        .notfound {
            max-width: 520px;
            width: 100%;
            text-align: center;
        }

        .notfound .notfound-404 {
            height: 210px;
            line-height: 210px;
        }

        .notfound .notfound-404 h1 {
            font-family: "Poppins", sans-serif;
            font-size: 188px;
            font-weight: 700;
            margin: 0px;
            text-shadow: 4px 4px 0px #ffc224;
        }

        .notfound h2 {
            font-family: "Poppins", sans-serif;
            font-size: 42px;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1.6px;
        }

        .notfound p {
            font-family: "Poppins", sans-serif;
            color: #000;
            font-weight: 400;
            margin-top: 20px;
            margin-bottom: 25px;
        }

        .notfound a {
            font-family: "Poppins", sans-serif;
            padding: 10px 30px;
            display: inline-block;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            background: #5751e1;
            box-shadow: 4px 6px 0px 0px #050071;
            text-decoration: none;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
            border-radius: 50px;
            letter-spacing: 1px;
        }

        .notfound a:hover {
            color: #000;
            background-color: #ffc224;
            -webkit-box-shadow: 0px 0px 0px 0px #000, 0px 0px 0px 2px #ffc224;
            box-shadow: 0px 0px 0px 0px #000, 0px 0px 0px 2px #ffc224;
        }
    </style>
</head>

<body>
    <div id="notfound">
        <div class="notfound-bg">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="notfound">
            <div class="notfound-404">
                <h1>500</h1>
            </div>
            <h2>Internal Server Error</h2>
            <p>Oops! Something went wrong on our end. Please try again later or go back to the homepage.
            </p>
            <a href="/">Homepage</a>
        </div>
    </div>
</body>

</html>
