<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BALITTAS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100%;
            background-color: #ffffff;
            color: #ffffff;
            font-family: 'Times New Roman', serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        .bg-box {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/opacity/see-through */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            height: 100%;
            width: 100%;
            padding: 50px;
            text-align: center;
            
            font-family: 'Times New Roman', serif;
        }

        .bg-image {
            /* The image used */
            background-image: url('../assets/background.jpg');
            opacity: 0.8;
            /* Add the blur effect */
            filter: blur(8px);
            -webkit-filter: blur(8px);
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center ;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
        }

        .btn-primary {
            font-weight: 500;
            font-size: 16px;
            color: #FFC963;
            box-shadow: 0px 10px 20px rgba(134, 142, 150, 0.3);
            border: 2px solid white;
            border-radius: 8px;
            padding-left: 30px;
            padding-right: 30px;
            
        }

        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:focus {
            border: 2px solid #a1563f;
            color: #ffffff;
            background: #fece00;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            font-weight: 600;
            color: #000000;
        }

        .links>a {
            color: #ffffff;
            padding: 16px 22px;
            display: inline-block;
            width: 160px;
            text-align: center;
            vertical-align: middle;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
            color: white;
        }

        .col-md-8>img {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="bg-image"></div>

    <div class="bg-box">
        <div class="center">
            <div class="title m-b-md">
                BALITTAS
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <img src="{{ asset('assets/pkl.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>

            @if (Route::has('login'))
            <div class="links">
                @auth
                <a href="{{ url('/home') }}" class="btn btn-primary">BALITTAS</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
</body>

</html>