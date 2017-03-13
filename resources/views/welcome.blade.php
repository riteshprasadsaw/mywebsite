<!DOCTYPE html>
<html>
<head>
    <title>Selenium Made Easy</title>

    <script>
        
    var Laravel={
        csrfToken:"{{csrf_token()}}",
        stripeKey:"{{config('services.stripe.key')}}"
    };
    </script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>
  
   <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login1'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif


            <div class="content">
                <div class="title m-b-md">
                    Our site is under construction.
                </div>
                <hr>
                <h2> Please come back after some time. </h2>
                
            </div>
        </div>
    </body>

</html>

</html>

