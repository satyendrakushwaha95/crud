<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            
            html, body {
                overflow-y: hidden;
                margin: 0;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: fixed;
                right: 10px;
                top: 18px;
                color: white;
            }
            .overlay { 
                color:#fff;
                position:absolute;
                z-index:12;
                top:38%;
                left:0;
                width:100%;
                text-align:center;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 72px;
                font-family: 'Vast Shadow', cursive;
                font-weight: 100;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                color: black;
                outline: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .getstartedbtn {
                position: fixed;
                padding: 10px;
                top: 75%;
                z-index: 999999;
                width: 100%;
                text-align: center;
                outline:none;

            }
            .startbtn {
                color: #ffffff;
                padding: 15px;
                text-align: center;
                text-transform: uppercase;
                background: transparent;
                border: 3px solid #fff;
                z-index: 999999;
                cursor: pointer;
                border-radius: 12px;
                outline:none;
            }
            .startbtn:hover {
                color: #ffffff;
                padding: 15px;
                text-align: center;
                text-transform: uppercase;
                background: transparent;
                border: 3px solid #ffd721;
                z-index: 999999;
                cursor: pointer;
                border-radius: 12px;
                outline:none;
            }

        </style>
    </head>
    <body>
            <div class="overlay  position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}"><span style="color: white">Home</span></a>
                    @else
                        <a href="{{ url('/login') }}"><span style="color: white">Login</span></a>
                        <a href="{{ url('/register') }}"><span style="color: white">Register</span></a>
                    @endif
                </div>
            @endif

    

            <div class="content">
                <div class="title m-b-md">
                Project 3 - Testing
                </div>
        </div>
    </div>
    
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="1500">
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/scene-3.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="images/scene-5.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="images/scene-4.jpg" alt="New york" style="width:100%;">
      </div>

  </div>
</div>
            <div class="getstartedbtn"><!-- <a href="{{URL::to('/home')}}" class="btn">Get Started</a> -->
            <form action="{{URL::to('/home')}}">
                <input type="submit" class="btn startbtn" value="Get Started" />
            </form>
            </div>
    </body>
</html>


