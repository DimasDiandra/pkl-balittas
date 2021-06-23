<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BALITTAS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <link href="{{asset('/css/homeawal.css')}}" rel="stylesheet">
<script src="{{ asset('/js/app.js') }}">

</script>
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