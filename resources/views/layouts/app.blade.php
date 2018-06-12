<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Project-3</title>
    
<!-- AJAX -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Faster+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
    <style>

    .floatLeft { width: 50%; float: left; }
    .floatRight {width: 50%; float: right; }

    .zindex{
    z-index: 1;
    position: relative;
             }
      </style>
<!-- Chosen --> 
         
    <script src="{{ asset('plugin/chosen/chosen.jquery.js') }}"></script>
    <link href="{{ asset('plugin/chosen/chosen.css') }}" rel="stylesheet"> 
    
    <script src="{{ asset('plugin/chosen/chosen.jquery.min.js') }}"></script>
    <link href="{{ asset('plugin/chosen/chosen.min.css') }}" rel="stylesheet">
   
        
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top ">
            <div class="container-fluid" style="padding-right: 20px">
                <div class="navbar-header">
                        <div class="navbarBrand ">
                    <!-- Branding Image -->
                    
                    <img src="logo.png" style="height: 45px;">
                    <a href="{{ url('/') }}">Project-3</a>
                     
                </div>
                </div>

                    <ul class="nav navbar-nav navbar-left ">
                    @if (Auth::user())

                    <li class="active nav-item">
                    <a class="nav-link" href="{{'home'}}"><i class="fa fa-home" aria-hidden="true" style="color: #d13114;"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                        <li class="dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: #0da300;"></i> Post
                           <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                             <li><a href="{{ url('/articles') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Articles</a></li>
                             <li><a href="{{ url('/blogs') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Blogs</a></li>
                           </ul>
                         </li>

                         <li class="dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="#">Designs
                           <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                             <li><a href="{{ url('/design1') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i> Design 1 - Homepage</a></li>
                             <li><a href="{{ url('/design2') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i> Design 2 - Login</a></li>
                             <li><a href="{{ url('/design3') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i> Design 3</a></li>
                             <li><a href="{{ url('/design4') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i> Design 4 - Login</a></li>
                           </ul>
                         </li>
            
                    @endif
                    </ul>                  
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Register</a></li>
                        @else
                            <li> <a href="{{ route('adminPanel') }}"><i class="fa fa-cogs" aria-hidden="true" style="color: #2191f2;"></i> Admin</a> </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true" ></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('profile') }}"><i class="fa fa-user" aria-hidden="true" ></i> Profile</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>

        </nav>
    </div>

        @yield('content')
        <div class="footer">
            <div class="footer-body">
          <span style="color: black;"  >Copyright &copy; 2018 </span>- Satyendra Kushwaha
            <span class="pull-right"><span style="color: black;">Follow Me-</span>
                <!--Facebook icon-->
                <a href="http://facebook.com/iviicky" target="_blank"> <i class="fa fa-facebook-square" aria-hidden="true"></i> </a>&nbsp;
                <!--Instagram icon-->
                <a href="http://instagram.com/i_viicky" target="_blank"> <i class="fa fa-instagram" aria-hidden="true"></i> </a>&nbsp;
                <!--Linkedin icon-->
                <a href="https://in.linkedin.com/in/satyendrakushwaha" target="_blank"> <i class="fa fa-linkedin-square" aria-hidden="true"></i> </a>&nbsp;
        </div>
    </div>
    <!-- Scripts -->
</body>
</html>
