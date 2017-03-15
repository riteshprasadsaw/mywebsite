<!DOCTYPE html>
<html>
<head>
    <title>BeAutomationExpert</title>

    <script>
        
    var Laravel={
        csrfToken:"{{csrf_token()}}",
        stripeKey:"{{config('services.stripe.key')}}"
    };
    </script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="tools/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="tools/jquery.min.js"></script> 
    <script type="text/javascript" src="tools/cufon-yui.js"></script>
    <script type="text/javascript" src="tools/Bebas_400.font.js"></script>
    <script type="text/javascript" src="tools/Bell_Gothic_Std_300.font.js"></script>
    <script type="text/javascript">
        Cufon.replace('a.logo', {fontFamily: 'Bebas'});
        Cufon.replace('a.logo span', {fontFamily: 'Bell Gothic Std'});
    </script>

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
        <!-- <div class="flex-center position-ref full-height">
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
 -->
        <div class="main_container">
            <div class="header">
                <a class="logo" href="#">BeAutomationExpert<span>Learn Modern Automation</span></a>
            </div>
            <div class="content">
                <h1>hello.<span>We’re Coming Very Soon</span></h1>
                <div class="right_side">
                    <p> <a href="#">riteshandromeda@gmail.com</a><br/>9711998218</p>
                    <ul class="s_icons">
                        <li class="fb"><a href="#"></a></li>
                        <li class="tw"><a href="#"></a></li>
                        <li class="in"><a href="#"></a></li>
                    </ul>
                </div>
            </div>
            <form class="email" method="POST" action="/emails">
                {{csrf_field()}}
                
                <input type="text" class="field" onfocus="if(this.value=='Get Notified (Email Address)') this.value='';" onblur="if(this.value=='' || this.value==' ') this.value='Get Notified (Email Address)';" value="Get Notified (Email Address)" />
                <input type="button" class="submit" />
            </form>
    
        </div>


    </body>

</html>

</html>

