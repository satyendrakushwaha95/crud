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
    <style>

    .floatLeft { width: 50%; float: left; }
    .floatRight {width: 50%; float: right; }

    </style>
<!-- Chosen --> 
         
    <script src="{{ asset('plugin/chosen/chosen.jquery.js') }}"></script>
    <link href="{{ asset('plugin/chosen/chosen.css') }}" rel="stylesheet"> 
    
    <script src="{{ asset('plugin/chosen/chosen.jquery.min.js') }}"></script>
    <link href="{{ asset('plugin/chosen/chosen.min.css') }}" rel="stylesheet">
   
        
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Project-3
                    </a>
                </div>

                    <ul class="nav navbar-nav navbar-left">
                    @if (Auth::user())

                    <li class="active nav-item">
                    <a class="nav-link" href="{{'home'}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                        <li class="dropdown">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="#">Post
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
                             <li><a href="{{ url('/design1') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i> Design 1</a></li>
                             <li><a href="{{ url('/design2') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i> Design 2</a></li>
                             <li><a href="{{ url('/design3') }}"><i class="fa fa-file-image-o" aria-hidden="true"></i> Design 3</a></li>
                           </ul>
                         </li>
            
                    @endif
                    </ul>                  
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('profile') }}">Profile</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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
        @yield('content')
    </div>
    <!-- Scripts -->
</body>
</html>
