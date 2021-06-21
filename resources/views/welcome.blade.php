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
            html, body {
                background-color: #ffffff;
                color: #636b6f;
                font-family: 'Times New Roman', serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .btn-primary {
                font-weight: 500;
                font-size: 16px;
                color: #FFC963;
                background: #00275E;
                box-shadow: 0px 10px 20px rgba(134, 142, 150, 0.3);
                border: 2px solid transparent;
                border-radius: 20px;
                padding-left: 30px;
                padding-right: 30px;
            }

            .btn-primary:hover, .btn-primary:active, .btn-primary:focus {
                    border: 2px solid #FFC963;
                    color: #00275E;
                    background: #FFC963;
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
                color: #00275E;
            }

            .links > a {
                color: #FFC963;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .col-md-8 > img {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        BALITTAS
                    </div>
             
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="{{asset('assets/pkl.png')}}" class="img-fluid">
                        </div>
                    </div>
                </div>

                @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('/home') }}"class="btn btn-primary">BALITTAS</a>
                    @else
                        <a href="{{ route('login') }}"class="btn btn-primary">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"class="btn btn-primary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        </div>
    </body>
</html>
